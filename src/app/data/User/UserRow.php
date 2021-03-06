<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace src\app\data\User;

use Atlas\Table\Row;

/**
 * @property mixed $id int(10,0) NOT NULL
 * @property mixed $guid varchar(255) NOT NULL
 * @property mixed $email_address text(65535) NOT NULL
 * @property mixed $password_hash varchar(255) NOT NULL
 * @property mixed $added_at datetime NOT NULL
 * @property mixed $added_at_time_zone varchar(255) NOT NULL
 */
class UserRow extends Row
{
    protected $cols = [
        'id' => null,
        'guid' => null,
        'email_address' => null,
        'password_hash' => null,
        'added_at' => null,
        'added_at_time_zone' => null,
    ];
}
