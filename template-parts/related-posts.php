<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="b-related-posts" data-stretch>
    <h3 class="h2 h-mgb-l text-center"><?php _e( 'Другие статьи', 'mildronat' ); ?></h3>

    <div class="l-posts row">
        <?php foreach ( $posts as $wp_post ): ?>
            <?php
            global $post;

            $post = get_post( $wp_post );

            setup_postdata( $post );
            ?>

            <div class="l-posts__item col-lg-4 col-md-6">
                <?php get_template_part( 'template-parts/posts/post' ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>