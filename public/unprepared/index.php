<?php

/**
 * @var NavigationRenderingService $navigationRenderingService
 */

declare(strict_types=1);

use SqlInjectionDemo\Service\NavigationRenderingService;

require __DIR__ . '/../../src/boot.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?= require __DIR__ . '/../../parts/head.php' ?>
    <body>
        <?= require __DIR__ . '/../../parts/breadcrumbs/unprepared.php' ?>
        <?= $navigationRenderingService->renderNavigation(NavigationRenderingService::VARIATION_UNPREPARED) ?>
    </body>
</html>