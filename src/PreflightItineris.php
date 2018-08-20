<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris;

use Itineris\Preflight\CheckerCollectionFactory;
use Itineris\Preflight\Itineris\Checkers\ProductionWPEnv;
use Itineris\Preflight\Itineris\Checkers\RequiredCachingPlugin;
use Itineris\Preflight\Itineris\Checkers\RequiredConstants;
use Itineris\Preflight\Itineris\Checkers\RequiredPlaceholderImage;
use Itineris\Preflight\Itineris\Checkers\RequiredPlugins;
use WP_CLI;

class PreflightItineris
{
    private const CHECKERS = [
        ProductionWPEnv::class,
        RequiredCachingPlugin::class,
        RequiredConstants::class,
        RequiredPlaceholderImage::class,
        RequiredPlugins::class,
    ];

    /**
     * Begin package execution.
     */
    public static function run(): void
    {
        foreach (self::CHECKERS as $checker) {
            WP_CLI::add_wp_hook(CheckerCollectionFactory::REGISTER_HOOK, [$checker, 'register']);
        }
    }
}
