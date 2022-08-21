<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return; ?>

<div class="h-spacer" id="spacer-<?php echo $block[ 'id' ]; ?>">

    <style>
        #spacer-<?php echo $block[ 'id' ]; ?> {
            height: <?php the_field( 'desktop' ); ?>px;
        }

        <?php if ( get_field( 'tablet' ) || get_field( 'tablet' ) == '0' ): ?>
            @media( max-width: 1099px ) {
                #spacer-<?php echo $block[ 'id' ]; ?> {
                    height: <?php the_field( 'tablet' ); ?>px;
                }
            }
        <?php endif; ?>

        <?php if ( get_field( 'mobile' ) || get_field( 'mobile' ) == '0' ): ?>
            @media( max-width: 767px ) {
                #spacer-<?php echo $block[ 'id' ]; ?> {
                    height: <?php the_field( 'mobile' ); ?>px;
                }
            }
        <?php endif; ?>
    </style>

</div>