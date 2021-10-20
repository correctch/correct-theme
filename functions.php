<?php
/**
 * Theme Support
 */
add_theme_support('title-tag');
add_theme_support('custom-logo');

function theme_enqueue_styles()
{
    wp_enqueue_style('theme-styles', get_stylesheet_uri()); // This is where you enqueue your theme's main stylesheet
    $custom_css = theme_get_customizer_css();
    wp_add_inline_style('theme-styles', $custom_css);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_scripts()
{
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'theme_scripts');

//Verhindert das Laden von WP Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function add_custom_sizes()
{
    add_theme_support('post-thumbnails');
    add_image_size('full-image', 700);
    add_image_size('card', 400, 300, true);
    add_image_size('card-medium', 600, 450, true);
    add_image_size('card-big', 800, 600, true);
}

add_action('after_setup_theme', 'add_custom_sizes');

//Bildgroessen zur Auswahl hinzufuegen
function guru20_bildgroessen_auswaehlen($sizes)
{
    $custom_sizes = array('person' => 'Personen Portrait');
    return array_merge($sizes, $custom_sizes);
}

add_filter('image_size_names_choose', 'guru20_bildgroessen_auswaehlen');

if (function_exists('register_sidebar'))
    register_sidebar();

function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Hauptnavigation'),
            'social-menu' => __('Social Links'),
            'contact' => __('Kontakt Seite/n'),
        )
    );
}

add_action('init', 'register_my_menus');

function addCustomField($wp_customize, $name, $title, $type) {
    // Add Section
    $wp_customize->add_section($name, array(
        'title' => $title,
        'panel' => 'text_blocks',
        'priority' => 10
    ));

    // Add setting
    $wp_customize->add_setting($name . '_block', array(
        'default' => __(''),
        'sanitize_callback' => 'sanitize_text'
    ));

    // Add control
    $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            $name,
            array(
                'label' => $title,
                'section' => $name,
                'settings' => $name . '_block',
                'type' => $type
            )
        )
    );
}

/*
 * Register Our Customizer Stuff Here
 */
function register_theme_customizer($wp_customize)
{
    // Create custom panel.
    $wp_customize->add_panel('text_blocks', array(
        'priority' => 500,
        'theme_supports' => '',
        'title' => __('Texte & Links'),
        'description' => __('Set editable text for certain content.'),
    ));

    // Add Text
    addCustomField($wp_customize, 'impressum_text', __('Impressum'),'textarea');
    addCustomField($wp_customize, 'instagram_link', __('Instagram Link'),'link');
    addCustomField($wp_customize, 'twitter_link', __('Twitter Link'),'link');
    addCustomField($wp_customize, 'youtube_link', __('Youtube Link'),'link');
    addCustomField($wp_customize, 'linkedin_link', __('Linkedin Link'),'link');
    addCustomField($wp_customize, 'facebook_link', __('Facebook Link'),'link');
    addCustomField($wp_customize, 'footer_adresse', __('Footer Adresse'),'textarea');
    addCustomField($wp_customize, 'footer_links', __('Footer Links'),'textarea');


    // Accent color
    $wp_customize->add_setting('accent_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'section' => 'colors',
        'label' => esc_html__('Accent color', 'theme'),
    )));

    // Main color
    $wp_customize->add_setting('main_color', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
        'section' => 'colors',
        'label' => esc_html__('Main color', 'theme'),
    )));
}

add_action('customize_register', 'register_theme_customizer');

// Sanitize text
function sanitize_text($text)
{
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'class' => array(),
            'target' => array()
        ),
        'br' => array(),
        'p' => array(
            'class' => array(),
        ),
        //formatting
        'strong' => array(),
        'em' => array(),
        'b' => array(),
        'i' => array(
            'class' => array(),
        ),
        'h3' => array(),
        'h4' => array(),
        'img' => array(
            'src' => array(),
            'alt' => array(),
            'class' => array(),
        ),
    );
    return wp_kses($text, $allowed_html);
}

// Modify our styles registration like so
function theme_get_customizer_css()
{
    ob_start();

    $accent_color = get_theme_mod('accent_color', '');
    if (!empty($accent_color)) {
        ?>
        #footer, .team-group .card.card-accent, .pagination .nav-links .page-numbers.current,
        .media-text-wrapper.media-text-accent, .menu-kontakt-container  a
        {
            background: <?php echo $accent_color; ?> !important;
        }

        .card-white .card-list *{
            color: <?php echo $accent_color; ?> !important;
        }
        <?php
    }

    $main_color = get_theme_mod('main_color', '');
    if (!empty($main_color)) {
        ?>
        #cssmenu ul li.current_page_item > span a,
        #cssmenu ul li.current-menu-ancestor > span a,
        #cssmenu ul li.current-menu-item > span a,
        #cssmenu ul li.current-menu-parent > span a,
        .media-text-wrapper.media-text-white .list-title,  .media-text-wrapper.media-text-white li::marker,
        .step__details-list li::marker, .read-less, .read-more,
        .text a:not(.button):not(.wp-block-button__link), a.link:not(.button):not(.wp-block-button__link)
        .menu-item-has-children > ul.nav-expand-content, .step__title,
        .main-color, .main-color-on-hover:hover, .card-white .card-catchphrase {
            color: <?php echo $main_color; ?> !important;
        }

        .card-box .card-box-action, .button, .pagination .nav-links .page-numbers,
        .main-background, #header {
            background: <?php echo $main_color; ?> !important;
        }

        .border-main-color {
            border-color: <?php echo $main_color; ?> !important;
        }

        .menu-item-has-children > ul.nav-expand-content::before {
            border-bottom: solid 6px <?php echo $main_color; ?> !important;
        }

        .menu-item-has-children > ul.nav-expand-content {
            border-top: 5px solid <?php echo $main_color; ?>;
        }
        <?php
    }
    $css = ob_get_clean();
    return $css;
}

/*add_action('reset_api_init', function(){
    register_rest_route('baseURL/v1/baseEndPoint', '/endPoint/', array(
        'methods' => 'GET',
        'callback' => loadMoreBlog
    ))
});*/

function enable_ajax_functionality() {
  wp_localize_script( 'ajaxify', 'ajaxify_function', array('ajaxurl' => admin_url('admin-ajax.php')) );
}
add_action('template_redirect', 'enable_ajax_functionality');

function loadMoreBlog(){
    echo json_encode(['test']);
    wp_die();
}
add_action('wp_ajax_nopriv_loadMoreBlog', 'loadMoreBlog');

/**
 * Anpassungen Worpdress
 */
//Limit max menu depth in admin panel to 3
function q242068_limit_depth($hook)
{
    if ($hook != 'nav-menus.php') return;

    // override default value right after 'nav-menu' JS
    wp_add_inline_script('nav-menu', 'wpNavMenu.options.globalMaxDepth = 2;', 'after');
}

add_action('admin_enqueue_scripts', 'q242068_limit_depth');


add_action('admin_notices', 'my_theme_dependencies');

function my_theme_dependencies()
{
    if (!function_exists('block_lab'))
        echo '<div class="error"><p>' . __('Achtung: Das Theme benötigt Block Lab um zu funkionieren.', 'my-theme') . '</p></div>';
}

include('functions/custom-shortcodes.php');
include('functions/menu-walker.php');
?>