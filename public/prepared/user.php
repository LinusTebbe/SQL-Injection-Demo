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

$data = null;

if (count($_POST) > 0) {
    $data = $preparedStatementService->getUser($_POST['input']);
}
?>
<html lang="de">
    <?= require __DIR__ . '/../../parts/head.php' ?>
    <body>
    <?= require __DIR__ . '/../../parts/breadcrumbs/prepared.php' ?>
        <form method="post">
            <label>
                Nach E-Mail suchen:
                <input name="input" value="<?= $_POST['input']?>">
            </label>
            <input type="submit" value="Absenden">
        </form>
        <table>
            <?=$resultRenderingService->renderTableResult($data) ?>
        </table>
    </body>
</html>
