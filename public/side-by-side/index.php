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

$unpreparedData = [];
$preparedData = [];

if (count($_POST) > 0) {
    $unpreparedData = $unpreparedStatementService->getUser($_POST['input']);
    $preparedData = $preparedStatementService->getUser($_POST['input']);
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
        <table id="result-wrapper">
            <thead>
                <tr><td>Unprepared</td><td>Prepared</td></tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border-right: #000 solid thin;">
                        <table id="unprepared-results">
                            <?=$tableRenderingService->renderTable($unpreparedData) ?>
                        </table>
                    </td>
                    <td>
                        <table id="prepared-results">
                            <?=$tableRenderingService->renderTable($preparedData) ?>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
