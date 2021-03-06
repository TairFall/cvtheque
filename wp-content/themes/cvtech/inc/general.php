<?php

/**
 * cvtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cvtech
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}
if (!function_exists('cvtech_setup')) :
    function cvtech_setup()
    {
        load_theme_textdomain('cvtech', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'cvtech'),
            )
        );
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'cvtech_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cvtech_content_width()
{
    $GLOBALS['content_width'] = apply_filters('cvtech_content_width', 640);
}
add_action('after_setup_theme', 'cvtech_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cvtech_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'cvtech'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'cvtech'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'cvtech_widgets_init');
/**
 * Enqueue scripts and styles.
 */
function cvtech_scripts()
{
    // STYLE
    wp_enqueue_style('style-candidat', '/wp-content/themes/cvtech/asset/css/style-candidat.css');
    wp_enqueue_style('jquerymodal', '/wp-content/themes/cvtech/asset/css/jquery.modal.min.css');
    wp_enqueue_style('cvtech-style', get_stylesheet_uri(), array(), _S_VERSION);
    // wp_style_add_data( 'cvtech-style', 'rtl', 'replace' );

    // fancyBox CSS
    wp_enqueue_style('jqueryfancybox', '/wp-content/themes/cvtech/asset/css/jquery.fancybox.min.css');


    // Jquery
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.js', array(), null, true);
    // Jquery Modal
    wp_enqueue_script('jquerymodal', '/wp-content/themes/cvtech/asset/js/jquery.modal.min.js', array(), null, true);
    // Jquery FancyBox
    wp_enqueue_script('jqueryfancybox', '/wp-content/themes/cvtech/asset/js/jquery.fancybox.min.js', array(), null, true);
    // SmoothScroll
    wp_register_script('smoothScroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js', null, null, true);
    wp_enqueue_script('smoothScroll');
    // JS
    wp_enqueue_script('js-candidat', '/wp-content/themes/cvtech/asset/js/main.js', array(), _S_VERSION, true);
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    // pass Ajax Url to script.js
    wp_localize_script('script', 'ajaxurl', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'cvtech_scripts');

add_action('wp_mail_failed', 'onMailError', 10, 1);
function onMailError($wp_error)
{
    echo '<pre style="height:200px;overflow-y: scroll;font-size:.8em;padding: 10px; font-family: Consolas, Monospace; background-color: #000; color: #fff;">';
    print_r($wp_error);
    echo '</pre>';
}
/////////// AJAX //////////////
function ajax_assets()
{
    // Charger notre script

    // Envoyer une variable de PHP ?? JS proprement
    wp_localize_script('ajax', 'ajaxurl', array('ajax_url' => get_admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'ajax_assets');


add_action('wp_ajax_candidate_info', 'candidate_info');
add_action('wp_ajax_nopriv_candidate_info', 'candidate_info');
function candidate_info()
{
    $errors = array();
    $success = false;

    $nom = cleanXss($_POST['info']['nom']);
    $prenom = cleanXss($_POST['info']['prenom']);
    $naissance = cleanXss($_POST['info']['naissance']);
    $adresse = cleanXss($_POST['info']['adresse']);
    $telephone = cleanXss($_POST['info']['telephone']);
    $permis = cleanXss($_POST['info']['permis']);

    $errors = ValidationText($errors, $nom, 'nom', 2, 10);
    $errors = ValidationText($errors, $prenom, 'prenom', 2, 10);
    $errors = ValidationText($errors, $naissance, 'naissance', 2, 20);
    $errors = ValidationText($errors, $adresse, 'adresse', 2, 100);
    $errors = ValidationText($errors, $telephone, 'telephone', 2, 20);
    $errors = ValidationText($errors, $permis, 'permis', 2, 10);

    if (count($errors) == 0) {
        $success = true;
        // global $wpdb;
        // $wpdb->insert('cv', array(
        //     'id_user' => '1',
        // ));
        // $wpdb->insert('cv_info_perso', array(
        //     'nom' => $nom,
        //     'prenom' => $prenom,
        //     'naissance' => $naissance,
        //     'adresse' => $adresse,
        //     'telephone' => $telephone,
        //     'permis' => $permis
        // ));
    }

    $data = array(
        'success' => $success,
    );
    showJson($data);
}


/////// FIN AJAX ///////
