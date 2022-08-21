jQuery( document ).ready( function( $ ) {
    $( document ).on( 'click', '.js-accordion', function() {
        $( this ).toggleClass( 'c-accordion__item--is-open' );
    } );
} );