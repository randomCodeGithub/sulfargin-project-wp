<?php if (!defined('ABSPATH')) exit;

function pdgc_add_assets()
{

    wp_dequeue_style('contact-form-7');

    wp_enqueue_style('pdgc-main', PDGC_ASSETS . '/css/main.css', array(), PDGC_VER);
    wp_enqueue_script('pdgc-main', PDGC_ASSETS . '/main.js', array('jquery'), PDGC_VER, true);

    $pro_consent = get_field('pro_consent', 'option');

    wp_add_inline_script('pdgc-main', 'var pdgc = ' . json_encode(array(
        'consent' => array(
            'title'     => '<h3 class="h3 h-mgb-m text-center">' . $pro_consent['title'] . '</h3>',
            'sub_title' => '<p class="c-consent__sub-title text-center">' . $pro_consent['sub_title'] . '</p><div class="c-separator h-mgb-s"></div>',
            'text'      => '<div class="editor h-mgb-s p-small">' . $pro_consent['text'] . '</div><div class="c-separator h-mgb-m"></div>',
            'consent'   => '<p class="c-consent__consent h4 h-mgb-m text-center">' . $pro_consent['consent'] . '</p>',
            'accept'    => '<button class="c-consent__button btn btn-secondary small s-150 js-pro-accept">' . $pro_consent['accept'] . '</button>',
            'decline'   => '<button class="c-consent__button btn btn-neutral small s-150 js-pro-decline">' . $pro_consent['decline'] . '</button>',
        )
    )));

    if (is_front_page()) {
        wp_enqueue_style('pdg-slick');
        wp_enqueue_script('pdg-slick');
    }

    if (is_user_logged_in()) {
        wp_enqueue_style('pdgc-icons', PDGC_ASSETS . '/vendor/theme/icons.css', array(), PDGC_VER);
    }

    if (is_404()) {
        wp_enqueue_style('pdgc-404', PDGC_ASSETS . '/vendor/theme/404.css', array(), PDGC_VER);
    }

    if (is_home() || is_singular('post')) {
        wp_enqueue_style('pdgc-posts', PDGC_URL . '/template-parts/blocks/posts/style.css', array(), PDGC_VER);
    }

    if (pdgc_is_pro_page()) {
        wp_enqueue_style('pdgc-pro', PDGC_ASSETS . '/vendor/theme/pro.css', array(), PDGC_VER);
    }

    if (is_singular('survey')) {
        wp_enqueue_style('pdgc-survey', PDGC_ASSETS . '/vendor/theme/survey.css');
        wp_enqueue_script('pdgc-survey', PDGC_ASSETS . '/vendor/theme/survey.js', ['jquery'], PDGC_VER, true);
    }

    wp_enqueue_style('pdgc-late', PDGC_ASSETS . '/vendor/theme/late.css', array(), PDGC_VER);
    wp_enqueue_script('pdgc-late', PDGC_ASSETS . '/vendor/theme/late.js', array(), PDGC_VER, true);
}
add_action('wp_enqueue_scripts', 'pdgc_add_assets', 20);

function pdgc_admin_add_assets($hook)
{

    if ('post.php' !== $hook) {
        return;
    }

    wp_enqueue_script('pdgc-admin-main', PDGC_ASSETS . '/vendor/theme/admin.js');
}
add_action('admin_enqueue_scripts', 'pdgc_admin_add_assets');

function pdgc_gutenberg_scripts()
{
    wp_enqueue_script('nl-admin', PDGC_URL . '/assets/vendor/theme/gutenberg.js', array('wp-blocks'), wp_get_theme()->get('Version'), true);
}
add_action('enqueue_block_editor_assets', 'pdgc_gutenberg_scripts');
