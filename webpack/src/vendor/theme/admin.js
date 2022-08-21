jQuery( document ).ready( function( $ ) {
    $( document ).ajaxComplete( function() {
        $( '[data-type^="acf/"]' ).each( function( i, block ) {
            var $wrap = $( '.acf-block-fields', block );

            if ( ! $( '.pdgc-block-title', $wrap ).length ) {
                $( '<div class="pdgc-block-title" style="padding: 20px 22px; font-size: 16px; color: #fff; background: #23282e;">' + $( block ).attr( 'aria-label' ) + '</div>' ).prependTo( $wrap );
            }
        } );
    } );
} );