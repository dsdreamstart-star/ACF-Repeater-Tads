<?php
/**
 * Plugin Name: ACF Repeater Tabs
 * Description: An Elementor widget to display ACF Repeater fields as tabs.
 * Plugin URI:  https://example.com/
 * Version:     1.0.0
 * Author:      Gemini
 * Author URI:  https://google.com
 * Text Domain: acf-repeater-tabs
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Check if Elementor is loaded, and then register the widget.
 */
function acf_repeater_tabs_register_widget() {
    // Notice if Elementor is not active
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function() {
            echo '<div class="notice notice-warning is-dismissible"><p><strong>ACF Repeater Tabs</strong> requires <strong>Elementor</strong> to be installed and activated.</p></div>';
        });
        return;
    }

    // Notice if ACF Pro is not active
    if ( ! class_exists('ACF') ) {
         add_action( 'admin_notices', function() {
            echo '<div class="notice notice-warning is-dismissible"><p><strong>ACF Repeater Tabs</strong> requires <strong>Advanced Custom Fields (ACF) Pro</strong> to be installed and activated.</p></div>';
        });
        return;
    }

    // Register the widget
    add_action( 'elementor/widgets/register', function( $widgets_manager ) {
        require_once( __DIR__ . '/widgets/repeater-tabs-widget.php' );
        $widgets_manager->register( new \Elementor_ACF_Repeater_Tabs_Widget() );
    });
}
add_action( 'plugins_loaded', 'acf_repeater_tabs_register_widget' );
