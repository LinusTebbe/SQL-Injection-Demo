<?php
/**
 * @var PreparedStatementService $preparedStatementService
 * @var UnpreparedStatementService $unpreparedStatementService
 * @var TableRenderingService $tableRenderingService
 */

declare(strict_types=1);

require __DIR__ . '/../../src/boot.php';

use SqlInjectionDemo\Service\PreparedStatementService;
use SqlInjectionDemo\Service\TableRenderingService;
use SqlInjectionDemo\Service\UnpreparedStatementService;

$data = null;

if (count($_POST) > 0) {
    $data = $preparedStatementService->getUser($_POST['input']);
}
?>
<html lang="de">
    <head>
        <title>
            SQL Injection DEMO
        </title>
        <link rel="stylesheet" href="/styles.css">
    </head>
    <body>
        <form method="post">
            <label>
                Nach E-Mail suchen:
                <input name="input" value="<?= $_POST['input']?>">
            </label>
            <input type="submit" value="Absenden">
        </form>
        <table>
            <?=$tableRenderingService->renderTable($data) ?>
        </table>
    </body>
</html>
