<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris;

use Itineris\Preflight\CheckerCollectionFactory;
use Itineris\Preflight\ConfigPaths as BaseConfigPaths;
use Itineris\Preflight\Itineris\Checkers\ProductionWPEnv;
use Itineris\Preflight\Itineris\Checkers\RequiredCachingPlugin;
use Itineris\Preflight\Itineris\Checkers\RequiredPlaceholderImage;
use WP_CLI;

class PreflightItineris
{
    private const CHECKERS = [
        ProductionWPEnv::class,
        RequiredCachingPlugin::class,
        RequiredPlaceholderImage::class,
    ];

    /**
     * Begin package execution.
     */
    public static function run(): void
    {
        foreach (self::CHECKERS as $checker) {
            WP_CLI::add_wp_hook(CheckerCollectionFactory::REGISTER_HOOK, [$checker, 'register']);
        }

        // Register .toml config files.
        WP_CLI::add_wp_hook(BaseConfigPaths::HOOK, [ConfigPaths::class, 'mergeDefaultPath'], 30000);
    }
}
