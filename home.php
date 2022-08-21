<?php if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

<div class="container">
    <div class="site-content__outer">
        <div class="row">
            <div class="site-content__inner col-lg-8 offset-lg-2 editor">
                <h1 class="h1 text-center h-mgb-xl"><?php echo get_the_title( get_option( 'page_for_posts', true ) ); ?></h1>

                <?php if ( have_posts() ): ?>
                    <div class="b-posts h-mgb-xxl" data-stretch>
                        <div class="h-mgb-l">
                            <div class="row l-posts">
                                <?php while ( have_posts() ): the_post(); ?>
                                    <div class="l-posts__item col-lg-4 col-md-6">
                                        <?php get_template_part( 'template-parts/posts/post' ); ?>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>


                        <?php
                        global $wp_query;

                        pdg_pager( $wp_query, array(
                            'prev' => '<span class="c-pager__arrow-icon h-abs-c ic ic-caret-left"></span>',
                            'next' => '<span class="c-pager__arrow-icon h-abs-c ic ic-caret-right"></span>'
                        ) );
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();