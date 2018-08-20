<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Checkers\AbstractChecker;
use Itineris\Preflight\Config;
use Itineris\Preflight\ResultFactory;
use Itineris\Preflight\ResultInterface;

class RequiredPlaceholderImage extends AbstractChecker
{
    public const ID = 'itineris-required-placeholder-image';
    public const DESCRIPTION = 'Ensure placeholder image is set.';

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
        $placeholderImage = get_theme_mod('fabric_placeholder_image');

        return empty($placeholderImage)
            ? ResultFactory::makeFailure($this, "'fabric_placeholder_image' is empty")
            : ResultFactory::makeSuccess($this);
    }
}
