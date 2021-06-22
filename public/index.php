<?php

/**
 * @var NavigationRenderingService $navigationRenderingService
 */

declare(strict_types=1);

use SqlInjectionDemo\Service\NavigationRenderingService;

require __DIR__ . '/../src/boot.php';


?>

<!DOCTYPE html>
<html lang="en">
    <?= require __DIR__ . '/../parts/head.php' ?>
    <body>
        <h2>
            Navigation
        </h2>
        <table class="navigation">
            <thead>
                <tr>
                    <td><h3><a href="/prepared">Prepared</a></h3></td>
                    <td><h3><a href="/unprepared">Unprepared</a></h3></td>
                    <td><h3><a href="/side-by-side">Side by Side</a></h3></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $navigationRenderingService->renderNavigation(NavigationRenderingService::VARIATION_PREPARED) ?>
                    </td>
                    <td>
                        <?= $navigationRenderingService->renderNavigation(NavigationRenderingService::VARIATION_UNPREPARED) ?>
                    </td>
                    <td>
                        <?= $navigationRenderingService->renderNavigation(NavigationRenderingService::VARIATION_SIDE_BY_SIDE) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>