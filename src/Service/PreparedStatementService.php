<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;

use PDO;

class PreparedStatementService extends AbstractStatementService
{
    public function buildStatement(string $query, array $parameters): array
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute($parameters);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}