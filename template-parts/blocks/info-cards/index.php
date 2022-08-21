<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

$has_legend = ( get_field( 'title' ) || get_field( 'text' ) ) ? true : false;

if ( have_rows( 'cards' ) ): ?>
    <div class="b-info-cards h-mgb-xxl h-mgb-sm-xl" data-stretch>
        <div class="row">
            <?php if ( $has_legend ): ?>
                <div class="b-info-cards__legend col-lg-4 h-mgb-md-l">
                    <?php if ( get_field( 'title' ) ): ?>
                        <h3 class="h2 h-mgb-l"><?php the_field( 'title' ); ?></h3>
                    <?php endif; ?>

                    <?php if ( get_field( 'text' ) ): ?>
                        <div class="b-info-cards__text editor">
                            <?php the_field( 'text' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php pdgc_button( get_field( 'button' ), '', 'btn-more' ); ?>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="b-info-cards__items row">
                        <?php while ( have_rows( 'cards' ) ): the_row(); ?>
                            <div class="b-info-cards__item col-md-6">
                                <?php get_template_part( 'template-parts/blocks/info-cards/card' ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php while ( have_rows( 'cards' ) ): the_row(); ?>
                    <div class="b-info-cards__items col-lg-3">
                        <?php get_template_part( 'template-parts/blocks/info-cards/card' ); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>