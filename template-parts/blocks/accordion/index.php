<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

if ( have_rows( 'accordion' ) ): ?>
    <div class="b-accordion h-mgb-xxl">
        <ul class="c-accordion">
            <?php while ( have_rows( 'accordion' ) ): the_row(); ?>
                <li class="c-accordion__item c-card js-accordion">
                    <div class="c-accordion__head"><?php the_sub_field( 'title' ); ?></div>

                    <div class="c-accordion__body editor">
                        <?php the_sub_field( 'text' ); ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>