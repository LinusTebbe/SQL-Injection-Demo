<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;

use PDO;

class PreparedStatementService extends AbstractStatementService
{
    public function buildStatement(string $query, array $parameters): array
    {
        $statement = $this->pdo->prepare($query);
        foreach ($parameters as $parameter => $value) {
            $statement->bindParam($parameter, $value);
        }
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}