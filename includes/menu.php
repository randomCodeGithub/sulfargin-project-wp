<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register footer menu.
 */
function pdgc_register_nav() {
    register_nav_menus( array(
        'header-pro' => 'Header ( Pro ) navigation',
        'footer'     => 'Footer navigation',
        'footer-pro' => 'Footer ( Pro ) navigation'
    ) );
}
add_action( 'init', 'pdgc_register_nav' );

/**
 * Additional menu classes.
 */
function pdgc_nav_class( $classes, $item ) {

    $curr = 'current-menu-item';

    if ( is_singular( 'post' ) && $item->object == 'page' && $item->object_id == get_option( 'page_for_posts', true ) ) {
        $classes[] = $curr;
    }

    if ( pdgc_is_pro_page( $item->object_id ) ) {
        $classes[] = 'js-pro';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class' , 'pdgc_nav_class' , 100 , 10 );