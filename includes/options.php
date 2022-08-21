<?php if ( ! defined( 'ABSPATH' ) ) exit;

function pdgc_add_options_pages() {

    acf_add_options_sub_page( array(
        'page_title'  => 'Partners',
        'menu_title'  => 'Partners',
        'menu_slug'   => 'pdgc-partners',
        'post_id'     => 'pdgc-partners',
        'parent_slug' => 'pdgc-options'
    ) );

}
add_action( 'acf/init', 'pdgc_add_options_pages', 20 );