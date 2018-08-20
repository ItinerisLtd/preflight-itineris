<?php
declare(strict_types=1);

use Itineris\Preflight\Itineris\PreflightItineris;

if (! class_exists('WP_CLI')) {
    return;
}

PreflightItineris::run();
