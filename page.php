<?php if ( ! defined( 'ABSPATH' ) ) exit;

get_header( pdgc_get_header_footer_type() ); ?>

<div class="container">
    <div class="site-content__outer">
        <div class="row">
            <div class="site-content__inner col-lg-8 offset-lg-2 editor">
                <?php if ( ! get_field( 'hide_page_title' ) ): ?>
                    <h1 class="h1 text-center h-mgb-<?php the_field( 'page_title_margin' ); ?> h-mgb-sm-l"><?php echo str_replace( '&#8212;', '-', get_the_title() ); ?></h1>
                <?php endif; ?>

                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();