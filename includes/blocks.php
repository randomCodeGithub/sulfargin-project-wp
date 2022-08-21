<?php if ( ! defined( 'ABSPATH' ) ) exit;

function pdgc_acf_blocks() {

    pdg_add_acf_block( 'Accordion', true, true );
    pdg_add_acf_block( 'Checklist', true );
    pdg_add_acf_block( 'Checklist With Video', true);
    pdg_add_acf_block( 'Contact', true );
    pdg_add_acf_block( 'CTA Slider', true, true, function() {
        wp_enqueue_style( 'pdg-slick' );
        wp_enqueue_script( 'pdg-slick' );
    } );
    pdg_add_acf_block( 'Icon Grid', true );
    pdg_add_acf_block( 'Zigzag', true );
    pdg_add_acf_block( 'Image Column With Text', true );
    pdg_add_acf_block( 'Image Columns', true );
    pdg_add_acf_block( 'Info Cards', true );
    pdg_add_acf_block( 'List Card', true );
    pdg_add_acf_block( 'Partners', true );
    pdg_add_acf_block( 'Pharmacy Map', true, true );
    pdg_add_acf_block( 'Posts', true );
    pdg_add_acf_block( 'Publications', true );
    pdg_add_acf_block( 'Spacer' );
    pdg_add_acf_block( 'Test', true, true, function() {
        wp_enqueue_style( 'cta-slider', PDGC_URL . '/template-parts/blocks/cta-slider/style.css' );
    } );
    pdg_add_acf_block( 'Videos', true, true );

}
add_action( 'acf/init', 'pdgc_acf_blocks' );