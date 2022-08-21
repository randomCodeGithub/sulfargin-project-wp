/**
 * Get "Pro" consent window contents from pdgc variable
 * defined in includes/assets.php
 * 
 * @returns string
 */
function get_pro_consent_content() {
    return '<div class="c-consent">' + pdgc.consent.title + pdgc.consent.sub_title + pdgc.consent.text + pdgc.consent.consent + '<div class="text-center">' + pdgc.consent.decline + pdgc.consent.accept + '</div>' + '</div>';
}

/**
 * Shared fancybox options.
 * 
 * @param object options Additional options
 * @returns object
 */
function get_fancybox_options( options ) {

    var defaults = {
        touch:         false,
        hideScrollbar: false
    };

    if ( typeof options !== 'undefined' ) {
        for ( var attrname in options ) {
            defaults[attrname] = options[attrname];
        }
    }

    return defaults;

}

/**
 * Open "Pro" consent popup.
 */
function open_pro_consent_popup() {

    $.fancybox.open( get_pro_consent_content(), get_fancybox_options( {
        baseClass:    'consent',
        clickSlide:   false,
        clickOutside: false,
        smallBtn:     false,
        keyboard:     false,
        buttons:      [],
        hideScrollbar: true
    } ) );

}

$( document ).ready( function() {

    var $w = $( window );
    var $d = $( document );
    var $b = $( 'body' );

    var opts = {
        is_handheld: ( $w.width() < 1100 ) ? true : false
    };


    /**
     * Set checklist and icon list item classes based on item
     * height.
     */
    $( '.c-checklist__item' ).each( function( i, item ) {
        var $item = $( item );

        if ( $item.outerHeight() > 48 ) {
            $item.addClass( 'c-checklist__item--is-tall' );
        }
    } );

    $( '.c-icon-list__item' ).each( function( i, item ) {
        var $item  = $( item );
        var $p     = $( 'p', item );
        var height = $p.outerHeight();

        if ( height >= 100 ) {
            $item.addClass( 'c-icon-list__item--is-tall' );
        }

        if ( height <= 25 ) {
            $item.addClass( 'c-icon-list__item--is-short' );
        }
    } );


    /**
     * Clamp lines.
     */
    $( '.clamp' ).each( function( i, el ) {
        if ( el.hasAttribute( 'data-lines' ) ) {
            $clamp( el, {
                clamp: parseInt( $( el ).attr( 'data-lines' ) )
            } );
        }
    } );


    /**
     * Replace weird "-" dash symbol in
     * footer menus.
     */
    $( '.c-nav-footer a' ).each( function( i, link ) {
        $( link ).text( $( link ).text().replace( '—', '-' ) );
    } );


    /**
     * Consent for "Pro" pages.
     */
    var pro_consent_from_link = false;

    // Accept
    $d.on( 'click', '.js-pro-accept', function() {
        pdg_cookie_set( 'mdnproconsent', 'true', false );

        if ( pro_consent_from_link ) {
            window.location = pro_consent_from_link;
        } else {
            $.fancybox.close();
        }
    } );

    // Decline
    $d.on( 'click', '.js-pro-decline', function() {
        if ( $b.hasClass( 'pro' ) ) {
            window.location = '/';
        } else {
            $.fancybox.close();
        }
    } );

    $d.on( 'click', '.js-pro a', function() {
        if ( ! pdg_cookie_get( 'mdnproconsent' ) ) {
            pro_consent_from_link = this.href;

            open_pro_consent_popup();

            return false;
        }
    } );

    if ( $b.hasClass( 'pro' ) && pdg_cookie_get( 'mdnproconsent' ) != 'true' ) {
        open_pro_consent_popup();
    }


    /**
     * Video popup
     */
    $( '[data-fancybox="video"]' ).fancybox( get_fancybox_options( {
        baseClass: 'video-popup',
        arrows:    false,
        buttons:   ['close'],
        infobar:   false,
        toolbar:   true
    } ) );


    /**
     * Show / hide placeholders in contact
     * form.
     */
    $d.on( 'focus', '.c-input', function() {
        var $placeholder = $( this ).closest( '.c-input-wrap' ).find( '.c-placeholder' );

        $placeholder.addClass( 'c-placeholder--is-active' );
    } );

    $d.on( 'blur', '.c-input', function() {
        var $placeholder = $( this ).closest( '.c-input-wrap' ).find( '.c-placeholder' );

        $placeholder.removeClass( 'c-placeholder--is-active' );
    } );

    $d.on( 'keyup', '.c-input', function() {
        var $placeholder = $( this ).closest( '.c-input-wrap' ).find( '.c-placeholder' );

        if ( this.value.length ) {
            $placeholder.hide();
        } else {
            $placeholder.show();
        }
    } );


    // Fix video on IE11
    $( '.wp-block-video video' ).each( function( i, video ) {
        $( video ).height( $(video).height() );
    } );

    if ( $( '.wpcf7' ).length ) {
        var cf7 = document.querySelector( '.wpcf7' );
 
        cf7.addEventListener( 'wpcf7mailsent', function( e ) {
            $( '.c-placeholder', cf7 ).show();
        }, false );
    }

} );