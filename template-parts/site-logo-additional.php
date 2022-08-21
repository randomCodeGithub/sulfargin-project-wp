<?php if ( $logo = get_field( 'additional_logo', 'option' ) ): ?>
    <figure class="c-logo-additional">
        <?php pdg_img( $logo ); ?>
    </figure>
<?php endif; ?>