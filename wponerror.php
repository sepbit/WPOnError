<?php
/**
Plugin Name: WpOnError
Plugin URI: https://gitlab.com/sepbit/wponerror
Description: Register GlobalEventHandlers.onerror in WordPress post type and optionally receive an email via wp_mail
Version: 1.1.2
Author: Vitor Guia
Author URI: https://vitor.guia.nom.br

@package WpOnError
 */

namespace Sepbit\WPOnError;

defined( 'ABSPATH' ) || exit();

define( 'SEPBIT_WPONERROR_VER', '1.1.2' );
define( 'SEPBIT_WPONERROR_DIR', plugin_dir_path( __FILE__ ) );
define( 'SEPBIT_WPONERROR_URL', plugin_dir_url( __FILE__ ) );
define( 'SEPBIT_WPONERROR_PRE', '_wponerror' );

require SEPBIT_WPONERROR_DIR . 'vendor/autoload.php';

/**
 * Post type
 */
add_action( 'init', array( __NAMESPACE__ . '\Controllers\PostTypeController', 'post_type' ) );
add_action( 'cmb2_init', array( __NAMESPACE__ . '\Controllers\PostTypeController', 'custom_fields' ) );

/**
 * Ajax
 */
add_action( 'wp_ajax_wponerror', array( __NAMESPACE__ . '\Controllers\AjaxController', 'ajax' ) );
add_action( 'wp_ajax_nopriv_wponerror', array( __NAMESPACE__ . '\Controllers\AjaxController', 'ajax' ) );
add_action( 'wp_enqueue_scripts', array( __NAMESPACE__ . '\Controllers\AjaxController', 'script' ) );

/**
 * Options page
 */
add_action( 'cmb2_init', array( __NAMESPACE__ . '\Controllers\OptionsPageController', 'options_page' ) );
