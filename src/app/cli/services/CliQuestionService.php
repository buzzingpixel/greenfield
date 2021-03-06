<?php
declare(strict_types=1);

namespace src\app\cli\services;

use src\app\cli\factories\ConsoleQuestionFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\HelperInterface;

class CliQuestionService
{
    private $questionHelper;
    private $consoleInput;
    private $consoleOutput;
    private $consoleQuestionFactory;

    public function __construct(
        HelperInterface $questionHelper,
        InputInterface $consoleInput,
        OutputInterface $consoleOutput,
        ConsoleQuestionFactory $consoleQuestionFactory
    ) {
        $this->questionHelper = $questionHelper;
        $this->consoleInput = $consoleInput;
        $this->consoleOutput = $consoleOutput;
        $this->consoleQuestionFactory = $consoleQuestionFactory;
    }

    public function ask(
        string $question,
        bool $required = true,
        bool $hidden = false
    ): string {
        $questionEntity = $this->consoleQuestionFactory->make($question);

        if ($hidden) {
            $questionEntity->setHidden(true);
        }

        $val = '';

        while (! $val) {
            $val = $this->questionHelper->ask(
                $this->consoleInput,
                $this->consoleOutput,
                $questionEntity
            );

            if (! $required) {
                return \is_string($val) ? $val : '';
            }

            if (! $val) {
                $this->consoleOutput->writeln(
                    '<fg=red>You must provide a value</>'
                );
            }
        }

        return $val;
    }
}
