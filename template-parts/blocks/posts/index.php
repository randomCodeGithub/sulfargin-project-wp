<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

$has_pager = get_field( 'pager' );
$count     = intval( get_field( 'count' ) );

$args = array(
    'posts_per_page' => get_field( 'count' )
);

if ( $has_pager ) {
    $args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}

$query = new WP_Query( $args );

if ( $query->have_posts() ): ?>
    <div class="b-posts <?php if ( ! $has_pager && $count % 2 != 0 ): ?>b-posts--no-pager-odd<?php endif; ?> h-mgb-xxl h-mgb-sm-xl" data-stretch>
        <?php if ( get_field( 'title' ) ): ?>
            <h3 class="h2 h-mgb-l text-center"><?php the_field( 'title' ); ?></h3>
        <?php endif; ?>

        <div class="h-mgb-l">
            <div class="row l-posts">
                <?php while ( $query->have_posts() ): $query->the_post(); ?>
                    <div class="l-posts__item col-lg-4 col-md-6">
                        <?php get_template_part( 'template-parts/posts/post' ); ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>

        <?php if ( get_field( 'button' ) && ! $has_pager ): ?>
            <div class="text-center">
                <?php pdgc_button( get_field( 'button' ) ); ?>
            </div>
        <?php elseif ( $has_pager ): ?>
            <?php pdg_pager( $query, array(
                'prev' => '<span class="c-pager__arrow-icon h-abs-c ic ic-caret-left"></span>',
                'next' => '<span class="c-pager__arrow-icon h-abs-c ic ic-caret-right"></span>'
            ) ); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>