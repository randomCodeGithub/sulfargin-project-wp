<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Show icon list.
 */
if ( isset( $_GET['show-icons'] ) && is_user_logged_in() ) {

    $fh = fopen( get_stylesheet_directory() . '/assets/css/style.css', 'r' );
    $html  = '<div class="admin-icon-list">';
    $html .= '<div class="container">';
    $html .= '<table>';

    $arr = array();

    while ( $line = fgets( $fh ) ) {
        if ( substr( $line, 0, 4 ) == '.ic-' ) {
            $parts1 = explode( ':before', $line );
            $parts2 = explode( 'ic-', $parts1[0] );

            $arr[ $parts2[1] ] = ltrim( $parts1[0], '.' );
        }
    }

    ksort( $arr );

    foreach ( $arr as $name => $icon ) {
            $html .= '<tr>';
            $html .= '<td><input type="text" value="' . $name . '" onfocus="this.select()"></td>';
            $html .= '<td><span class="ic ' . $icon . '"></span></td>';
            $html .= '</tr>';
    }

    $html .= '</table>';
    $html .= '</div>';
    $html .= '</div>';

    fclose( $fh );

    echo $html;

}

/**
 * Output a button.
 * 
 * @param object $link   ACF link field
 * @param string $module Module class
 * @param string $class  Button class
 */
function pdgc_button( $link, $module = '', $class = 'btn-primary s-174' ) {

    if ( $link && $link['title'] && $link['url'] ) {
        include PDGC_PATH . '/template-parts/button.php';
    }

}

/**
 * Output colored circle with icon.
 * 
 * @param string $icon  Icon class
 * @param string $color Color code
 * @param string $class Additional classes
 * @param string $type  Type of icon ( filled | color )
 */
function pdgc_featured_icon( $icon, $color, $class = '', $type = 'filled' ) {

    if ( $icon && $color ) {
        $style = ( $type == 'filled' ) ? 'background-color: ' . $color . ';' : 'color: ' . $color . ';';
        $class .= ' c-featured-icon--' . $type;

        include PDGC_PATH . '/template-parts/featured-icon.php';
    }

}

/**
 * Output copyright with dynamic year.
 */
function pdgc_copyright() {

    if ( get_field( 'copyright', 'option' ) ) {
        include PDGC_PATH . '/template-parts/copyright.php';
    }

}

/**
 * Output related posts.
 * 
 * @param integer $id Post ID
 */
function pdgc_related_posts( $id ) {

    $posts = array();

    // Get related posts assigned to post.
    $related = get_field( 'related_posts', $id );
    $count   = ( empty( $related ) || ! $related ) ? 0 : count( $related );

    if ( $related ) {
        foreach ( $related as $post_arr ) {
            $posts[] = $post_arr['post'];
        }
    }

    // Run query to get rest of the posts.
    if ( $count < 3 ) {
        $query = new WP_Query( array(
            'posts_per_page' => 3 - $count
        ) );

        if ( $query->have_posts() ) {
            foreach ( $query->posts as $post ) {
                $posts[] = $post;
            }

            wp_reset_postdata();
        }
    }

    if ( $posts ) {
        include PDGC_PATH . '/template-parts/related-posts.php';
    }

}

/**
 * Check if viewing "Pro" page.
 * 
 * @return boolean
 */
function pdgc_is_pro_page( $id = false ) {

    $main = get_field( 'pro_main', 'option' );
    $id   = ( $id ) ? $id : get_the_ID();

    if ( is_page() ) {
        $ancestors = get_ancestors( $id, 'page' );

        if ( $id == $main->ID || in_array( $main->ID, $ancestors ) ) {
            return true;
        }
    }

    return false;

}

/**
 * Check if page is marked as "Pro"
 * and return needed extension.
 * 
 * @return string
 */
function pdgc_get_header_footer_type() {

    if ( pdgc_is_pro_page() ) {
        return 'pro';
    }

    return '';

}

/**
 * Shuffle associative array.
 * 
 * @param array $list
 * 
 * @return array
 */
function pdgc_shuffle_assoc( $list ) {

    if ( ! is_array( $list ) ) {
        return $list;
    }
  
    $keys = array_keys( $list );
    shuffle( $keys );
    $random = [];

    foreach ( $keys as $key ) {
        $random[$key] = $list[$key];
    }
  
    return $random;

}

/**
 * Get survey question.
 */
function pdgc_get_survey_question() {

    if ( isset( $_POST['survey_id'] ) && $_POST['survey_id'] ) {
        $survey_id = intval( strip_tags( $_POST['survey_id'] ) );
    } else {
        exit;
    }

    if ( isset( $_POST['question_id'] ) && $_POST['question_id'] ) {
        $question_id = intval( strip_tags( $_POST['question_id'] ) ) - 1;
    } else {
        exit;
    }

    if ( isset( $_POST['current'] ) ) {
        $current = intval( strip_tags( $_POST['current'] ) );
    }

    if ( isset( $_POST['total'] ) ) {
        $total = intval( strip_tags( $_POST['total'] ) );
    }

    $questions = get_field( 'questions', $survey_id );

    if ( $questions && isset( $questions[$question_id] ) ) {
        $return = [
            'question' => $questions[$question_id]['question'],
            'answers' => [],
            'progress' => ( 100 * $current ) / $total,
            'is_last' => false
        ];

        // Randomize anwers.
        $answers = $questions[$question_id]['answers'];
        $keys = array_keys( $answers );
        shuffle( $keys );

        foreach ( $keys as $key ) {
            $return['answers'][] = [
                'text' => $answers[$key]['text'],
                'id' => $key
            ];
        }

        // Check if last questions.
        if ( $question_id + 1 == count( $questions ) ) {
            $return['is_last'] = true;
        }

        // Assign unique ID for survey.
        if ( $question_id === 0 ) {
            $return['id'] = uniqid();
        }


        wp_send_json( $return );
    }

}
add_action( 'wp_ajax_nopriv_get_survey_question', 'pdgc_get_survey_question' );
add_action( 'wp_ajax_get_survey_question', 'pdgc_get_survey_question' );

/**
 * Post survey question.
 */
function pdgc_post_survey_question() {

    if ( isset( $_POST['survey_id'] ) && $_POST['survey_id'] ) {
        $survey_id = intval( strip_tags( $_POST['survey_id'] ) );
    } else {
        exit;
    }

    if ( isset( $_POST['question_id'] ) ) {
        $question_id = intval( strip_tags( $_POST['question_id'] ) ) - 1;
    } else {
        exit;
    }

    if ( isset( $_POST['choice'] ) ) {
        $choice = intval( strip_tags( $_POST['choice'] ) );
    } else {
        exit;
    }

    $questions = get_field( 'questions', $survey_id );

    if ( $questions && isset( $questions[$question_id] ) ) {
        wp_send_json( [
            'points' => (int) $questions[$question_id]['answers'][$choice]['points']
        ] );
    } else {
        wp_send_json( [
            'err' => 'no q'
        ] );
    }

}
add_action( 'wp_ajax_nopriv_post_survey_question', 'pdgc_post_survey_question' );
add_action( 'wp_ajax_post_survey_question', 'pdgc_post_survey_question' );

/**
 * Save survey data.
 */
function pdgc_save_survey() {

    if ( isset( $_POST['id'] ) && $_POST['id'] ) {
        $id = strip_tags( $_POST['id'] );
    } else {
        exit;
    }

    if ( isset( $_POST['post_id'] ) && $_POST['post_id'] ) {
        $post_id = intval( strip_tags( $_POST['post_id'] ) );
    } else {
        exit;
    }

    if ( isset( $_POST['score'] ) ) {
        $score = intval( strip_tags( $_POST['score'] ) );
    } else {
        exit;
    }

    wp_send_json( [
        'query' => '?result=' . $score
    ] );

}
add_action( 'wp_ajax_nopriv_save_survey', 'pdgc_save_survey' );
add_action( 'wp_ajax_save_survey', 'pdgc_save_survey' );

/**
 * Set survey image as og:image when viewing page with a survey on it.
 */
function pdgc_survey_og_image() {

    global $post;

    if ( is_object( $post ) && $post->post_content ) {
        $blocks = parse_blocks( $post->post_content );
        $survey_id = false;

        if ( $blocks ) {
            foreach ( $blocks as $block ) {
                if ( $block['blockName'] == 'acf/test' && isset( $block['attrs']['data']['test'] ) ) {
                    $survey_id = $block['attrs']['data']['test'];
                    break;
                }
            }
        }

        if ( $survey_id && get_field( 'intro_image', $survey_id ) ) {
            echo '<meta property="og:image" content="' . pdg_get_image_src( get_field( 'intro_image', $survey_id ), [1200, 627] ) . '">';
        }
    }

}
add_action( 'wp_head', 'pdgc_survey_og_image' );