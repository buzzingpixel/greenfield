<?php
declare(strict_types=1);

namespace src\app\users\exceptions;

use Exception;
use Throwable;

class InvalidPasswordException extends Exception
{
    public function __construct(
        string $message = 'The specified password is invalid',
        int $code = 500,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
