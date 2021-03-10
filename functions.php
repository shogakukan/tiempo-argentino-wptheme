<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

define('TA_THEME_PATH', get_template_directory());
define('TA_THEME_URL', get_template_directory_uri());
define('TA_ASSETS_PATH',TA_THEME_PATH . "/assets");
define('TA_ASSETS_URL', TA_THEME_URL . "/assets");
define('TA_IMAGES_URL', TA_ASSETS_URL . "/img");
define('TA_ASSETS_CSS_URL', TA_THEME_URL . "/css");

require_once TA_THEME_PATH. '/inc/gen-base-theme/gen-base-theme.php';



class TA_Theme{
	static private $initialized = false;

	static public function initialize(){
		if( self::$initialized )
			return false;
		self::$initialized = true;

		self::add_themes_supports();
		self::register_menues();
		/** permalinks filters */
		add_filter('post_type_link', [__CLASS__,'ta_secion__permalink_structure'], 10, 4);

		if( is_admin() ){
			require_once TA_THEME_PATH . '/inc/attachments.php';
		}

		require_once TA_THEME_PATH . '/inc/functions.php';
		require_once TA_THEME_PATH . '/inc/classes/Data_Manager.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section.php';
		add_action( 'gen_modules_loaded', array(self::class, 'register_gutenberg_categories') );
		add_action( 'wp_enqueue_scripts', array(self::class, 'enqueue_scripts') );

		add_filter('gen_check_post_type_name_dash_error', function($check, $post_type){
		    if($post_type == 'tribe-ea-record')
		        return false;
		    return $check;
		}, 10, 2);
	}

	static public function add_themes_supports() {
        add_theme_support('post-thumbnails');

        //svg support
        function cc_mime_types($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'cc_mime_types');
    }

	static private function register_menues() {
        RB_Wordpress_Framework::load_module('menu');
        register_nav_menus(
            array(
                'navbar-menu' => __('Navbar menú'),
                'dropwdown-header-menu' => __('Menú desplegable'),
                'footer-menu' => __('Footer menú'),
            )
        );
    }

	static public function enqueue_scripts(){
		wp_enqueue_style( 'bootstrap', TA_ASSETS_CSS_URL . '/libs/bootstrap/bootstrap.css' );
		wp_enqueue_style( 'ta_style', TA_ASSETS_CSS_URL . '/src/styles.css' );
	}

	static public function register_gutenberg_categories(){
		rb_add_gutenberg_category('ta-blocks', 'Tiempo Argentino', null);
	}

	/** Permalinks Secciones */
	static public function ta_secion__permalink_structure($post_link, $post, $leavename, $sample) {
		if (false !== strpos($post_link, '%ta_article_section%')) {
			$ta_article_section_type_term = get_the_terms($post->ID, 'ta_article_section');
			if (!empty($ta_article_section_type_term))
				$post_link = str_replace('%ta_article_section%', array_pop($ta_article_section_type_term)->
				slug, $post_link);
			else
				$post_link = str_replace('%ta_article_section%', 'uncategorized', $post_link);
		}
		return $post_link;
	}
}

TA_Theme::initialize();


function get_etiquetas($request){
    // init the resource
    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL               	=> "http://190.105.238.93:5000/api/textrank",
        CURLOPT_RETURNTRANSFER    	=> true,
		CURLOPT_POST				=> true,
		CURLOPT_HTTPHEADER			=> 'Content-Type: application/json',
		CURLOPT_POSTFIELDS			=> $request->get_body(),
    ));

    // execute
    $output = curl_exec($ch);

    // free
    curl_close($ch);

    return $output;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'ta/v1', '/etiquetador', array(
		'methods' 				=> 'POST',
		'callback' 				=> 'get_etiquetas',
		'permission_callback'	=> '__return_true',
	) );
} );