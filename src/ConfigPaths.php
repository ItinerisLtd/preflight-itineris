<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris;

use function WP_CLI\Utils\normalize_path;

class ConfigPaths
{
    /**
     * Register itineris.toml.
     *
     * Used in self::HOOK.
     *
     * @param array $paths The .toml config file paths.
     *
     * @return string[]
     */
    public static function mergeDefaultPath(array $paths): array
    {
        $paths[] = normalize_path(
            dirname(__FILE__, 2) . '/config/itineris.toml'
        );

        return $paths;
    }
}
