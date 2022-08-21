<?php if ( ! defined( 'ABSPATH' ) ) exit;

if ( function_exists( 'fly_add_image_size' ) ) {
    fly_add_image_size( 'partner', 192, 192, false );
    fly_add_image_size( 'post_thumbnail', 360, 210, true );
    fly_add_image_size( 'post_medium', 840, 490, false );
}