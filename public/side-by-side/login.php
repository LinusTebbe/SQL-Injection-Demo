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
    $unpreparedData = $unpreparedStatementService->checkUserLogin($_POST['email'], $_POST['password']);
    $preparedData = $preparedStatementService->checkUserLogin($_POST['email'], $_POST['password']);
}
?>
<html lang="de">
    <?= require __DIR__ . '/../../parts/head.php' ?>
<body>
    <?= require __DIR__ . '/../../parts/breadcrumbs/side-by-side.php' ?>
    <?= require __DIR__ . '/../../parts/loginForm.php' ?>
    <table id="result-wrapper">
        <thead>
        <tr><td>Unprepared</td><td>Prepared</td></tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-right: #000 solid thin;">
                <?=$resultRenderingService->renderLoginResult($unpreparedData) ?>
            </td>
            <td>
                <?=$resultRenderingService->renderLoginResult($preparedData) ?>
            </td>
        </tr>
        </tbody>
    </table>
</body>
</html>
