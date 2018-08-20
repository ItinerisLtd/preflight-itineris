<?php
declare(strict_types=1);

namespace Itineris\Preflight\Itineris\Checkers;

use Itineris\Preflight\Extra\Checkers\RequiredConstants as BaseRequiredConstants;

class RequiredConstants extends BaseRequiredConstants
{
    public const ID = 'itineris-required-constants';

    public const DEFAULT_INCLUDES = [
        // Gravity Forms.
        // https://docs.gravityforms.com/wp-config-options/
        'GF_LICENSE_KEY',
        'GF_THEME_IMPORT_FILE',
        'GF_RECAPTCHA_PUBLIC_KEY',
        'GF_RECAPTCHA_PRIVATE_KEY',

        // Documents not found.
        'GF_DISABLE_CSS',
        'GF_OUTPUT_HTML5',

        // https://docs.gravityforms.com/gform_disable_auto_update-constant/
        'GFORM_DISABLE_AUTO_UPDATE',

        // WP Migrate DB Pro.
        // https://deliciousbrains.com/wp-migrate-db-pro/doc/activating-license/
        'WPMDB_LICENCE',

        // WP Offload S3.
        // https://deliciousbrains.com/wp-offload-s3/doc/activating-your-license/
        'AS3_CFPRO_LICENCE',

        // https://deliciousbrains.com/wp-offload-s3/doc/quick-start-guide/#save-access-keys
        'AS3CF_AWS_ACCESS_KEY_ID',
        'AS3CF_AWS_SECRET_ACCESS_KEY',

        // https://deliciousbrains.com/wp-offload-s3/doc/settings-constants/
        'WPOS3_SETTINGS',
    ];
}
