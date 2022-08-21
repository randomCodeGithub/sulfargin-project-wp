<?php if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

<div class="container">
    <div class="site-content__outer">
        <div class="row">
            <div class="site-content__inner col-lg-8 offset-lg-2">
                <h1 class="h1 text-center h-mgb-l"><?php the_title(); ?></h1>

                <?php if ( has_post_thumbnail() ): ?>
                    <figure class="h-mgb-l">
                        <?php pdg_img( get_post_thumbnail_id(), 'post_medium', array(
                            'class' => array( 'h-w-100' )
                        ) ); ?>
                    </figure>
                <?php endif; ?>

                <div class="editor h-mgb-l">
                    <?php the_content(); ?>
                </div>

                <div class="text-center h-mgb-xxl">
                    <a class="btn btn-primary s-174" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'Все статьи', 'mildronat' ); ?></a>
                </div>

                <?php pdgc_related_posts( get_the_ID() ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();