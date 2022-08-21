<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Excerpt more symbol.
 */
function pdgc_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'pdgc_excerpt_more' );

/**
 * Excerpt length.
 */
function pdgc_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'pdgc_custom_excerpt_length', 999 );

/**
 * Custom body classes.
 */
function pdgc_body_classes( $classes ) {
 
    if ( pdgc_is_pro_page() ) {
        $classes[] = 'pro';
    }
     
    return $classes;

}
add_filter( 'body_class', 'pdgc_body_classes' );