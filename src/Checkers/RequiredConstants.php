<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Extra\Checkers\RequiredConstants as BaseRequiredConstants;

class RequiredConstants extends BaseRequiredConstants
{
    public const ID = 'itineris-required-constants';

    // TODO: https://deliciousbrains.com/wp-offload-s3/doc/settings-constants/
    public const DEFAULT_INCLUDES = [
        // https://deliciousbrains.com/wp-offload-s3/doc/defining-the-s3-bucket/
        'AS3CF_BUCKET',
        'AS3CF_REGION',

        // https://deliciousbrains.com/wp-offload-s3/doc/quick-start-guide/#save-access-keys
        'AS3CF_AWS_ACCESS_KEY_ID',
        'AS3CF_AWS_SECRET_ACCESS_KEY',
        'AS3CF_AWS_USE_EC2_IAM_ROLE',

        // https://deliciousbrains.com/wp-offload-s3/doc/activating-your-license/
        'AS3_CFPRO_LICENCE',

        // https://docs.gravityforms.com/wp-config-options/
        'GF_LICENSE_KEY',

        // https://docs.gravityforms.com/gform_disable_auto_update-constant/
        'GFORM_DISABLE_AUTO_UPDATE',

        // https://deliciousbrains.com/wp-migrate-db-pro/doc/activating-license/
        'WPMDB_LICENCE',
    ];
}
