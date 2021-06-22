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
<?= require __DIR__ . '/../../parts/breadcrumbs/side-by-side.php' ?>
<?= $navigationRenderingService->renderNavigation(NavigationRenderingService::VARIATION_SIDE_BY_SIDE) ?>
</body>
</html>