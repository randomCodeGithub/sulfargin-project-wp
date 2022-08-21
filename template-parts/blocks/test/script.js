var survey = {
    id: false,
    post_id: false,
    current: 0,
    total: 0,
    choice: false,
    score: 0,
    elements: {
        main: $( '.survey-main' )[0],
        area: $( '.survey-area' )[0],
        intro: $( '.survey-intro' )[0],
        progress: $( '.survey-progress' )[0],
        progress_bar: $( '.survey-progress__line' )[0],
        progress_nums: $( '.survey-progress__nums' )[0],
        start: $( '.js-survey-start' )[0],
        next: $( '.js-survey-next' )[0],
        complete: $( '.js-survey-complete' )[0],
        share: $( '.js-survey-share' )[0]
    },

    init: function() {

        if ( $( survey.elements.main ).length ) {
            survey.post_id = parseInt( survey.elements.main.dataset.survey );
            survey.current = 1;
            survey.total = parseInt( survey.elements.progress.dataset.max );

            survey.listeners();
            survey.get_question( 1 );
        }

    },
    listeners: function() {

        // Start survey.
        $( survey.elements.start ).on( 'click', function() {
            $( survey.elements.intro ).addClass( 'd-none' );
            $( survey.elements.main ).removeClass( 'd-none' );

            $( document ).scrollTop( 0 );

            dataLayer.push( {
                'event': 'test-start'
            } );
        } );

        // Answer picker.
        $( document ).on( 'click', '.js-survey-answer', function() {
            $( '.js-survey-answer' ).removeClass( 'selected' );
            $( this ).addClass( 'selected' );

            survey.choice = parseInt( this.dataset.id );
        } );

        // Next button.
        $( survey.elements.next ).on( 'click', function() {
            if ( ! $( '.selected', survey.elements.area ).length ) {
                $( 'li', survey.elements.area ).addClass( 'error' );

                return;
            }
        
            $( this ).addClass( 'loading' );

            dataLayer.push( {
                'event': 'test-answer-q' + this.dataset.question
            } );

            survey.post_question();
        } );

        // Complete button.
        $( survey.elements.complete ).on( 'click', function() {
            if ( ! $( '.selected', survey.elements.area ).length ) {
                $( 'li', survey.elements.area ).addClass( 'error' );

                return;
            }

            dataLayer.push( {
                'event': 'test-answer-q' + this.dataset.question
            } );

            survey.save_survey();
        } );

    },
    post_question: function() {

        var data = {
            survey_id: survey.post_id,
            question_id: survey.current,
            choice: survey.choice,
            action: 'post_survey_question'
        };

        $.post( pdg_opts.ajax_url, data, function( res ) {
            survey.score += res.points;
            survey.current += 1;
            survey.get_question( survey.current );
        } );

    },
    get_question: function( id ) {

        var data = {
            survey_id: survey.post_id,
            question_id: id,
            current: survey.current,
            total: survey.total,
            action: 'get_survey_question'
        };

        $.ajax( {
            type: 'post',
            url: pdg_opts.ajax_url,
            data: data,
            beforeSend: function() {
                $( survey.elements.next ).addClass( 'loading' ).attr( 'data-question', id );
                $( survey.elements.complete ).attr( 'data-question', id );
            },
            complete: function() {
                $( survey.elements.next ).removeClass( 'loading' );
            },
            success: function( res ) {
                $( survey.elements.area ).empty();

                $( '<h2 class="survey-area__title h3">' + res.question + '</h2>' ).appendTo( survey.elements.area );
    
                var $list = $( '<ul class="survey-list"/>' );
    
                $.each( res.answers, function( i, answer ) {
                    $( '<li class="js-survey-answer" data-id="' + answer.id + '"><span class="survey-list-num"></span>' + answer.text + '</li>' ).appendTo( $list );
                } );
    
                $list.appendTo( survey.elements.area );
    
                if ( res.is_last ) {
                    $( survey.elements.next ).addClass( 'd-none' );
                    $( survey.elements.complete ).removeClass( 'd-none' );
                }
    
                if ( 'id' in res ) {
                    survey.id = res.id;
                }
    
                $( survey.elements.progress_bar ).width( res.progress + '%' );
                survey.elements.progress_nums.innerHTML = survey.current + '/' + survey.total;

                if ( id === 1 ) {
                    $( survey.elements.main ).addClass( 'init' );
                }
            }
        } );

    },
    save_survey: function() {

        var data = {
            id: survey.id,
            post_id: survey.post_id,
            score: survey.score,
            action: 'save_survey'
        };

        $.ajax( {
            type: 'post',
            url: pdg_opts.ajax_url,
            data: data,
            beforeSend: function() {
                $( survey.elements.complete ).addClass( 'loading' );
            },
            complete: function() {
                $( survey.elements.complete ).removeClass( 'loading' );
            },
            success: function( res ) {
                pdg_cookie_set( 'add_gtm', 'true', false );

                window.location.href = window.location.href + res.query;
            }
        } );

    }
};

$( document ).ready( function() {
    survey.init();

    $( '.js-survey-share' ).on( 'click', function() {
        dataLayer.push( {
            'event': 'test-share'
        } );
    } );

    $( '.js-share-nw' ).on( 'click', function( e ) {
        e.preventDefault();

        window.open( this.href, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes' );
    } );

    if ( $( '.survey-battery' ).length && pdg_cookie_get( 'add_gtm' ) === 'true' ) {
        if ( $( '.survey-battery--low' ).length ) {
            dataLayer.push( {
                'event': 'test-results-bad'
            } );
        } else if ( $( '.survey-battery--medium' ).length ) {
            dataLayer.push( {
                'event': 'test-results-good'
            } );
        } else if ( $( '.survey-battery--high' ).length ) {
            dataLayer.push( {
                'event': 'test-results-awesome'
            } );
        }

        pdg_cookie_set( 'add_gtm', 'false', false );
    }
} );