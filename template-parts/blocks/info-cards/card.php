<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="c-card c-card--is-large-y text-center">
    <?php pdgc_featured_icon( get_sub_field( 'icon' ), get_sub_field( 'color' ), 'c-featured-icon--is-centered h-mgb-s h-mgb-sm-m' ); ?>

    <div>
        <p class="c-card__title h4"><?php the_sub_field( 'title' ); ?></p>

        <?php if ( get_sub_field( 'sub_title' ) ): ?>
            <p><?php the_sub_field( 'sub_title' ); ?></p>
        <?php endif; ?>
    </div>
</div>