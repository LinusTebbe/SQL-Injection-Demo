<?php
/**
 * @var PreparedStatementService   $preparedStatementService
 * @var UnpreparedStatementService $unpreparedStatementService
 * @var ResultRenderingService     $resultRenderingService
 */

declare(strict_types=1);

require __DIR__ . '/../../src/boot.php';

use SqlInjectionDemo\Service\PreparedStatementService;
use SqlInjectionDemo\Service\ResultRenderingService;
use SqlInjectionDemo\Service\UnpreparedStatementService;

$unpreparedData = null;
$preparedData = null;

if (count($_POST) > 0) {
    $unpreparedData = $unpreparedStatementService->getUser($_POST['input']);
    $preparedData = $preparedStatementService->getUser($_POST['input']);
}
?>
<html lang="de">
    <?= require __DIR__ . '/../../parts/head.php'?>
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
                            <?=$resultRenderingService->renderTableResult($unpreparedData) ?>
                        </table>
                    </td>
                    <td>
                        <table id="prepared-results">
                            <?=$resultRenderingService->renderTableResult($preparedData) ?>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
