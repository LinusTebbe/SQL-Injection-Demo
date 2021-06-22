<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;

use PDO;
use PDOStatement;

abstract class AbstractStatementService
{
    protected PDO $pdo;

    public function __construct(
        PDO $pdo
    ) {
        $this->pdo = $pdo;
    }

    /**
     * @param string               $query
     * @param array<string, mixed> $parameters
     */
    abstract public function buildStatement(
        string $query,
        array $parameters
    ): array;

    public function getUser(string $userInput): array {
        return $this->buildStatement(
            'SELECT id, first_name, last_name, email FROM `users` WHERE email=:email LIMIT 1',
            [
                ':email' => $userInput,
            ]
        );
    }

    public function checkUserLogin(string $email, string $password): string
    {
        return $this->buildStatement(
            'SELECT email FROM users WHERE email=:email AND password=:password',
            [
                ':email' => $email,
                ':password' => $password,
            ]
        )[0]['email'] ?? '';
    }
}