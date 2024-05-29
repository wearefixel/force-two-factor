<?php

/**
 * Plugin Name: Force Two Factor
 * Plugin URI: https://github.com/wearefixel/force-two-factor
 * Description: Forces email-based two-factor authentication for all users unless another provider is enabled.
 * Version: 1.0
 * Author: Fixel
 * Author URI: https://wearefixel.com
 * Requires Plugins: two-factor
 */

add_action('two_factor_enabled_providers_for_user', function (array $providers): array {
    if (empty($providers) && class_exists('Two_Factor_Email')) {
        $providers[] = 'Two_Factor_Email';
    }

    return $providers;
});
