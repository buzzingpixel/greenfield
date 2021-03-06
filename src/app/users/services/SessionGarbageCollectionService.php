<?php
declare(strict_types=1);

namespace src\app\users\services;

use PDO;
use DateTime;
use DateTimeZone;
use src\app\data\factory\AtlasFactory;
use src\app\data\UserSession\UserSession;

class SessionGarbageCollectionService
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function __invoke()
    {
        $dateTime = new DateTime();
        $dateTime->setTimestamp(strtotime('30 days ago'));
        $dateTime->setTimezone(new DateTimeZone('UTC'));

        $sql = 'DELETE FROM user_sessions WHERE last_touched_at < ?';
        $q = $this->pdo->prepare($sql);
        $q->execute([$dateTime->format('Y-m-d H:i:s')]);
    }
}
