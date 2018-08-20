<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Checkers\AbstractChecker;
use Itineris\Preflight\Config;
use Itineris\Preflight\ResultFactory;
use Itineris\Preflight\ResultInterface;
use WP_CLI;

class RequiredCachingPlugin extends AbstractChecker
{
    public const ID = 'itineris-required-caching-plugin';
    public const DESCRIPTION = 'Ensure exactly one caching plugin installed.';
    public const DEFAULT_INCLUDES = [
        'kinsta-mu-plugins',
        'w3-total-cache',
    ];

    /**
     * Run the check and return a result.
     *
     * Assume the checker is enabled and its config make sense.
     *
     * @param Config $config The config instance.
     *
     * @return ResultInterface
     */
    protected function run(Config $config): ResultInterface
    {
        $installedPlugins = WP_CLI::runcommand(
            'plugin list --fields=name --format=json',
            [
                'return' => true,
                'parse' => 'json',
                'launch' => true,
                'exit_error' => false,
            ]
        );
        $installedPlugins = array_map(function (array $plugin): string {
            return $plugin['name'];
        }, $installedPlugins);

        $cachingPlugins = array_intersect(
            $config->compileIncludes(static::DEFAULT_INCLUDES),
            $installedPlugins
        );

        switch (count($cachingPlugins)) {
            case 0:
                return ResultFactory::makeFailure($this, 'No caching plugin found');
            case 1:
                return ResultFactory::makeSuccess($this);
            default:
                return ResultFactory::makeFailure(
                    $this,
                    array_merge(['Multiple caching plugins found:'], $cachingPlugins)
                );
        }
    }
}
