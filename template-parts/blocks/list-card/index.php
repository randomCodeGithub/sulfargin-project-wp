<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

if ( have_rows( 'list' ) ): ?>
    <div class="b-list-card <?php if ( ! get_field( 'title' ) ): ?>b-list-card--no-title<?php endif; ?> <?php if ( ! get_field( 'button' ) ): ?>b-list-card--no-button<?php endif; ?> h-mgb-xxl h-mgb-sm-xl" data-stretch>
        <?php $icon_style = get_field( 'icon_style' ); ?>

        <div class="c-card c-card--is-large h-relative">
            <?php if ( get_field( 'title' ) ): ?>
                <h3 class="h2 h-mgb-l"><?php the_field( 'title' ); ?></h3>
            <?php endif; ?>

            <ul class="b-list-card__list c-icon-list">
                <?php while ( have_rows( 'list' ) ): the_row(); ?>
                    <li class="c-icon-list__item">
                        <?php pdgc_featured_icon( get_sub_field( 'icon' ), get_sub_field( 'color' ), '', $icon_style ); ?>

                        <p class="c-icon-list__text"><?php the_sub_field( 'text' ); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="b-list-card__button-wrap">
                <?php pdgc_button( get_field( 'button' ), 'b-list-card' ); ?>
            </div>

            <?php if ( $img = get_field( 'image' ) ): ?>
                <figure class="b-list-card__decor h-bg-cover d-none d-lg-block"></figure>

                <figure class="b-list-card__image d-none d-lg-block" <?php if ( get_field( 'image_offset' ) ): ?>style="padding-right: <?php the_field( 'image_offset' ); ?>px;"<?php endif; ?>>
                    <?php pdg_img( $img, array( 624, 1000 ), array( 'crop' => false ) ); ?>
                </figure>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>