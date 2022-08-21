<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

$is_flowchart = ( get_field( 'is_flowchart' ) ) ? true : false;

if ( have_rows( 'columns' ) ): ?>
    <div class="b-image-columns <?php if ( $is_flowchart ): ?>b-image-columns--is-flowchart<?php endif; ?> h-mgb-xxl h-mgb-sm-xl" data-stretch>
        <?php if ( get_field( 'title' ) ): ?>
            <h3 class="h2 h-mgb-m text-center"><?php the_field( 'title' ); ?></h3>
        <?php endif; ?>

        <?php if ( get_field( 'text' ) ): ?>
            <p class="b-image-columns__text text-center"><?php the_field( 'text' ); ?></p>
        <?php endif; ?>

        <div class="b-image-columns__items row align-items-end justidy-content-center">
            <?php $i = 1; while ( have_rows( 'columns' ) ): the_row(); ?>
                <div class="b-image-columns__item b-image-columns__item--<?php echo $i; ?> col-lg-4 text-center <?php if ( get_sub_field( 'order' ) ): ?>order-<?php the_sub_field( 'order' ); ?> order-lg-<?php echo $i; ?><?php endif; ?>">
                    <?php if ( get_sub_field( 'handheld_image' ) ): ?>
                        <div class="b-image-columns__image-wrap d-none d-lg-block">
                            <?php pdg_img( get_sub_field( 'image' ) ); ?>
                        </div>

                        <div class="b-image-columns__image-wrap d-lg-none">
                            <?php pdg_img( get_sub_field( 'handheld_image' ) ); ?>
                        </div>
                    <?php else: ?>
                        <div class="b-image-columns__image-wrap">
                            <?php pdg_img( get_sub_field( 'image' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( get_sub_field( 'text' ) ): ?>
                        <p class="b-image-columns__caption p-small"><?php the_sub_field( 'text' ); ?></p>
                    <?php endif; ?>

                    <?php if ( $is_flowchart ): ?>
                        <span class="b-image-columns__fc-icon ic ic-arrow-down d-lg-none"></span>
                    <?php endif; ?>
                </div>
            <?php $i++; endwhile; ?>
        </div>
    </div>
<?php endif; ?>