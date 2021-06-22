<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;

use PDO;

class UnpreparedStatementService extends AbstractStatementService
{
    public function buildStatement(string $query, array $parameters): array
    {
        foreach ($parameters as $parameter => $value) {
            $query = str_replace($parameter, '\'' . $value . '\'', $query);
        }

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}