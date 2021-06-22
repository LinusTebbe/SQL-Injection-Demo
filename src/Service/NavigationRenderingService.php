<?php

declare(strict_types=1);

namespace SqlInjectionDemo\Service;


use UnexpectedValueException;

class NavigationRenderingService
{
    public const VARIATION_PREPARED = 'prepared';

    public const VARIATION_UNPREPARED = 'unprepared';

    public const VARIATION_SIDE_BY_SIDE = 'side-by-side';

    public const VARIATION_PREFIXES = [
        self::VARIATION_PREPARED     => '/prepared/',
        self::VARIATION_UNPREPARED   => '/unprepared/',
        self::VARIATION_SIDE_BY_SIDE => '/side-by-side/',
    ];

    public const DEMO_PAGES = [
        'user.php'  => 'User List',
        'login.php' => 'Login',
    ];

    public function renderNavigation(string $variation): string
    {
        if (!array_key_exists($variation, self::VARIATION_PREFIXES)) {
            throw new UnexpectedValueException(
                sprintf(
                    'Page variation "%s" is not a valid variation',
                    $variation
                ),
                1624288352740
            );
        }

        $output = '<ul>';

        foreach (self::DEMO_PAGES as $page => $title) {
            $output .= sprintf(
                '<li><a href="%s" title="%s">%s</a></li>',
                self::VARIATION_PREFIXES[$variation] . $page,
                $title,
                $title
            );
        }

        $output .= '</ul>';
        return $output;
    }
}