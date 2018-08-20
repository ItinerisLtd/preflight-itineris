<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Checkers\AbstractChecker;
use Itineris\Preflight\Config;
use Itineris\Preflight\ResultFactory;
use Itineris\Preflight\ResultInterface;

class ProductionWPEnv extends AbstractChecker
{
    public const ID = 'itineris-production-wp-env';
    public const DESCRIPTION = "Ensure 'WP_ENV' is production.";

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
        return defined('WP_ENV') && 'production' === constant('WP_ENV')
            ? ResultFactory::makeSuccess($this)
            : ResultFactory::makeFailure($this, "'WP_ENV' is not 'production' or not defined");
    }
}
