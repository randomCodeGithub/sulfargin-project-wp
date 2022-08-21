<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Theme defines.
 */
$pdgc = wp_get_theme();

define( 'PDGC_VER',    $pdgc->get( 'Version' ) );
define( 'PDGC_PATH',   get_stylesheet_directory() );
define( 'PDGC_URL',    get_stylesheet_directory_uri() );
define( 'PDGC_ASSETS', PDGC_URL . '/assets' );

/**
 * Include themes static assets.
 */
include PDGC_PATH . '/includes/assets.php';

/**
 * Include ACF blocks.
 */
include PDGC_PATH . '/includes/blocks.php';

/**
 * Actions and filters.
 */
include PDGC_PATH . '/includes/filters.php';

/**
 * Custom theme functions.
 */
include PDGC_PATH . '/includes/functions.php';

/**
 * Custom iamge sizes.
 */
include PDGC_PATH . '/includes/images.php';

/**
 * Include menu related functions.
 */
include PDGC_PATH . '/includes/menu.php';

/**
 * Custom options pages.
 */
include PDGC_PATH . '/includes/options.php';