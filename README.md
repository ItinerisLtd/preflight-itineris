# itinerisltd/preflight-itineris

[![Packagist Version](https://img.shields.io/packagist/v/itinerisltd/preflight-itineris.svg)](https://packagist.org/packages/itinerisltd/preflight-itineris)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/itinerisltd/preflight-itineris.svg)](https://packagist.org/packages/itinerisltd/preflight-itineris)
[![Packagist Downloads](https://img.shields.io/packagist/dt/itinerisltd/preflight-itineris.svg)](https://packagist.org/packages/itinerisltd/preflight-itineris)
[![GitHub License](https://img.shields.io/github/license/itinerisltd/preflight-itineris.svg)](https://github.com/ItinerisLtd/preflight-itineris/blob/master/LICENSE)
[![Hire Itineris](https://img.shields.io/badge/Hire-Itineris-ff69b4.svg)](https://www.itineris.co.uk/contact/)

Extra [preflight-command](https://github.com/ItinerisLtd/preflight-command) checkers for [Itineris](https://www.itineris.co.uk/) projects.

**This package only make sense for Itineris projects. Abort immediately!**

## Installation

### 1A. WP CLI - Kinsta

[Kinsta](https://bit.ly/kinsta-wp-cli-v2) still using WP CLI v1.x. 
Contact [Kinsta](https://bit.ly/kinsta-wp-cli-v2) support team to upgrade your site's WP CLI to v2.
(It might take a few hours)


```bash
$ wp package install itinerisltd/preflight-itineris:@stable
```

Other [`itinerisltd/preflight-xxx` packages](./composer.json) are *bundled*. 

### 1B. WP CLI - AWS

Merge [itinerisltd/trellis-aws](http://github.com/itinerisltd/trellis-aws) master, then re-provision.

### 2. Bedrock

This means `<bedrock>/config/preflight.toml`:

```
// <bedrock>/config/application.php

Config::define('PREFLIGHT_DIR', __DIR__);

// Not recommanded. Update Bedrock!!!!
// In case you are using an old Bedrock without roots/wp-config:
define('PREFLIGHT_DIR', __DIR__);
```

### 3. preflight.toml

Copy this to `<bedrock>/config/preflight.toml`:

```toml
# <bedrock>/config/preflight.toml

# Use TOML v0.4.0 syntax
# See: https://github.com/toml-lang/toml/blob/master/versions/en/toml-v0.4.0.md

# TOML v0.5.0 not yet supported

########################################################################
#                                                                      #
#     If you disable or change any `itineris-xxx` checker options,     #
#     you must write comments explaining the reasons!                  #
#                                                                      #
########################################################################

[blacklisted-usernames]
blacklist = [
  'itineris',
]

[extra-expected-status-codes]
enabled = false # Enable if needed

# Use expected production URL (i.e: client's URL)
# Starts with 'https://'
[extra-production-home-url]
url = 'https://preflightcommand.com' # TODO

[extra-production-site-url]
url = 'https://preflightcommand.com' # TODO

[extra-required-constants]
enabled = false # Enable if needed

[extra-required-packages]
enabled = false # Enable if needed

[extra-required-plugins]
enabled = false # Enable if needed
```

## Usage

```bash
$ wp help preflight
$ wp help preflight <subcommand>

# List all checkers
$ wp preflight checklist

# Validate preflight.toml file
$ wp preflight config validate

# Run the checks
$ wp preflight check

# More info
$ wp preflight check --fields=id,status,message,description,link

# Print in yaml, for smaller screens
$ wp preflight check --fields=id,description,link,status,messages --format=yaml

# See all check options
$ wp help preflight check
```

## Plugins

These plugins *inject* their checks automatically (no installation needed): 

- https://github.com/ItinerisLtd/gf-sagepay
- https://github.com/ItinerisLtd/gf-worldpay
