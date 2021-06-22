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

$loginSuccessful = null;

if (count($_POST) > 0) {
    $loginSuccessful = $unpreparedStatementService->checkUserLogin($_POST['email'], $_POST['password']);
}
?>
<html lang="de">
    <?= require __DIR__ . '/../../parts/head.php' ?>
<body>
    <?= require __DIR__ . '/../../parts/breadcrumbs/unprepared.php' ?>
    <?= require __DIR__ . '/../../parts/loginForm.php' ?>
    <?= $resultRenderingService->renderLoginResult($loginSuccessful)?>
</body>
</html>
