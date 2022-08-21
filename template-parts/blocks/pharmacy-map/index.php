<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return; ?>

<div class="b-pharmacy-map h-mgb-xxl" data-stretch>
    <?php if ( get_field( 'text' ) ): ?>
        <p class="text-center h-mgb-xl"><?php the_field( 'text' ); ?></p>
    <?php endif; ?>

    <?php if ( get_field('widget_id') && get_field('product_id') ): ?>
        <iframe class="b-pharmacy-map__iframe" src="https://widget.vseapteki.ru/#/?widgetId=<?php the_field( 'widget_id' ); ?>&productIds=<?php the_field( 'product_id' ); ?>" width="100%" height="700" frameborder="0"></iframe>
    <?php endif; ?>
</div>