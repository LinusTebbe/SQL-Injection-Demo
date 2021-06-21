<?php

declare(strict_types=1);

use SqlInjectionDemo\Service\PreparedStatementService;
use SqlInjectionDemo\Service\TableRenderingService;
use SqlInjectionDemo\Service\UnpreparedStatementService;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();
$dotenv->required(['DB_DSN']);

$dbConnection = new PDO($_ENV['DB_DSN'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

$preparedStatementService = new PreparedStatementService($dbConnection);
$unpreparedStatementService = new UnpreparedStatementService($dbConnection);

$tableRenderingService = new TableRenderingService();