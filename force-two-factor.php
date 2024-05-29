<?php

/**
 * Plugin Name: Force Two Factor
 * Plugin URI: https://github.com/wearefixel/force-two-factor
 * Description: Forces email-based two-factor authentication for all users unless another provider is enabled.
 * Version: 1.1.0
 * Author: Fixel
 * Author URI: https://wearefixel.com
 * Requires Plugins: two-factor
 */

function force2f_loaded(): void
{
    include_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

    YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
        'https://github.com/wearefixel/force-two-factor',
        __FILE__,
        'force-two-factor'
    );
}
add_action('plugins_loaded', 'force2f_loaded');

function force2f_providers(array $providers): array
{
    if (empty($providers) && class_exists('Two_Factor_Email')) {
        $providers[] = 'Two_Factor_Email';
    }

    return $providers;
}
add_action('two_factor_enabled_providers_for_user', 'force2f_providers');
