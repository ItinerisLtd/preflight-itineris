<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Extra\Checkers\RequiredPlugins as BaseRequiredPlugins;

class RequiredPlugins extends BaseRequiredPlugins
{
    public const ID = 'itineris-required-plugins';
    public const DEFAULT_INCLUDES = [
        'advanced-custom-fields-pro',
        'bb-plugin',
        'bb-theme-builder',
        'gravity-forms',
        'iwp-client',
        'redirection',
        'uk-cookie-consent',
        'wordpress-seo',
        'wp-offload-s3',
    ];
}
