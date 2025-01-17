<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

error_reporting(E_ALL ^ E_WARNING);
define('TA_ARTICLES_COMPATIBLE_POST_TYPES', ['ta_article', 'ta_audiovisual']);
define('TA_THEME_PATH', get_template_directory());
define('TA_THEME_URL', get_template_directory_uri());
define('TA_ASSETS_PATH', TA_THEME_PATH . "/assets");
define('TA_ASSETS_URL', TA_THEME_URL . "/assets");
define('TA_IMAGES_URL', TA_ASSETS_URL . "/img");
define('TA_ASSETS_CSS_URL', TA_THEME_URL . "/css");
define('TA_ASSETS_JS_URL', TA_THEME_URL . "/js");
define('TA_THEME_VERSION','1.3.19');

require_once TA_THEME_PATH . '/inc/gen-base-theme/gen-base-theme.php';
require_once TA_THEME_PATH . '/inc/rewrite-rules.php';
require_once TA_THEME_PATH . '/inc/widgets.php';
require_once TA_THEME_PATH . '/inc/cooperativa.php';

class TA_Theme
{
	static private $initialized = false;
	/**
	*	@property array $latest_most_viewed 									Guarda los articulos mas leidos de los ultimos dias
	*/
	static public $latest_most_viewed = [];

	static public function initialize()
	{
		if (self::$initialized)
			return false;
		self::$initialized = true;

		self::add_themes_supports();
		self::register_menues();


		if (is_admin()) {
			require_once TA_THEME_PATH . '/inc/attachments.php';
		}

		require_once TA_THEME_PATH . '/inc/functions.php';
		require_once TA_THEME_PATH . '/inc/rest.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Blocks_Container.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Blocks_Container_Manager.php';
		require_once TA_THEME_PATH . '/inc/classes/Data_Manager.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Article.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Balancer_Article.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Placeholder_Article.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Edicion_Impresa.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Author.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Balancer_Author.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Tag.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section_Factory.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section_Data.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Section.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Photographer.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Balancer_DB.php';
		require_once TA_THEME_PATH . '/inc/classes/TA_Taller.php';

		//$most_viewed_query = ta_get_latest_most_viewed_query(array( 'posts_per_page'	=> -1 ));
		//self::$latest_most_viewed = $most_viewed_query->posts;

		add_action('gen_modules_loaded', array(self::class, 'register_gutenberg_categories'));
		add_action('wp_enqueue_scripts', array(self::class, 'enqueue_scripts'));
		add_action('admin_init', array(self::class, 'clean_dashboard'));
		RB_Filters_Manager::add_action('ta_theme_admin_scripts', 'admin_enqueue_scripts', array(self::class, 'admin_scripts'));

		add_filter('gen_check_post_type_name_dash_error', function ($check, $post_type) {
			if ($post_type == 'tribe-ea-record' || $post_type == 'ep-pointer' || $post_type == 'ep-synonym')
				return false;
			return $check;
		}, 10, 2);

		self::customizer();

		require_once TA_THEME_PATH . '/inc/comments-metaboxes.php';

		if (is_admin()) {
			require_once TA_THEME_PATH . '/inc/menu-items.php';
		}

		require_once TA_THEME_PATH . '/inc/classes/TA_Micrositio.php';
		require_once TA_THEME_PATH . '/inc/micrositios.php';
		self::get_plugins_assets();
		add_action('admin_menu', [__CLASS__, 'remove_posts']);
		self::increase_curl_timeout();
		self::remove_quick_edit();
		add_action( 'after_setup_theme', [self::class,'languages_path'] );

		self::sync_articles_topics_and_places();

		add_action('quienes_somos_banner', [self::class, 'extra_home_content']);
		add_action('nota_apertura', [self::class, 'nota_apertura_content']);
		add_action('wp_insert_comment', function ($id, $comment) {
			add_comment_meta($comment->comment_ID, 'is_visitor', $comment->user_id == 0, true);
		}, 2, 10);

		//add_action('wp_head',[self::class,'head_script']);

		self::redirect_searchs();
		self::filter_contents();
		self::searchpage();
    
		add_action('admin_head',[self::class,'not_admin']);
	}

	static public function not_admin()
	{
		if(is_admin()) {
			$user = wp_get_current_user();
			$roles = $user->roles;

			if(!in_array('administrator',$roles)) {
				echo '<style>
				.wp-block-lazyblock-contenedor-avisos{
					padding: 20px 20px 0 20px !important;
				}
				.wp-block-lazyblock-contenedor-avisos .lzb-content-controls, .wp-block-lazyblock-contenedor-avisos .lzb-preview-server{
					display: none !important;
				}
				</style>';
			}
		}
	}

	static public function languages_path()
	{
		load_theme_textdomain( 'gen-base-theme', get_template_directory() . '/languages' );
	}

	static public function head_script()
	{
		if(is_single()) { //mow player para 1 video en las internas
			echo '<script async src="https://mowplayer.com/dist/player.js"></script>';
		}
	}

	/**
	*	Filter the content if it has blocks and identifies top level blocks that
	*	have inner blocks, storing a flag $is_rendering_inner_blocks that indicates
	*	to any render wheter it is inside a block or not
	*/
	static private function filter_contents(){
		global $is_rendering_inner_blocks;
		$is_rendering_inner_blocks = false;
		RB_Filters_Manager::add_action('ta_identify_top_level_parent_blocks', 'the_content', function($content){
			if(!has_blocks($content))
		        return $content;

		    global $is_rendering_inner_blocks;
		    $parsed_blocks = parse_blocks( $content );
		    $content = "";
			$wpautop_priority = has_filter( 'the_content', 'wpautop' );
			if($wpautop_priority !== false)
				remove_filter( 'the_content', 'wpautop', $wpautop_priority );
		    foreach ($parsed_blocks as $parsed_block){
		        if(isset($parsed_block['innerBlocks']) && !empty($parsed_block['innerBlocks'])){
		            $is_rendering_inner_blocks = true;
		        }

		        $content .= render_block($parsed_block);
		        $is_rendering_inner_blocks = false;
		    }

			if($wpautop_priority !== false)
				add_filter( 'the_content', '_restore_wpautop_hook', $wpautop_priority );

		    return $content;
		}, array(
			'priority'		=> 0,
			'accepted_args'	=> 1,
		));
	}

	/**
	*	Adds filters to redirect, in case of needed, a request to the correct search page
	*/
	static private function redirect_searchs(){
		RB_Filters_Manager::add_action('ta_theme_searchg_template_redirect', 'template_include', function($template){
			global $wp_query;
			if( !$wp_query->is_search )
				return $template;

			$post_type = get_query_var('post_type');
			if( $post_type == 'ta_article' ){
				return locate_template('search-ta_article.php');
			}

			return $template;
		});
	}

	static private function remove_quick_edit()
	{
		RB_Filters_Manager::add_filter('ta_remove_quick_edit', 'post_row_actions', function ($actions) {
			unset($actions['inline hide-if-no-js']);
			return $actions;
		}, array(
			'priority'	=> 10,
			'args'		=> 1,
		));
	}

	static private function increase_curl_timeout()
	{
		$timeout = 15;
		RB_Filters_Manager::add_filter('ta_curl_http_request_args', 'http_request_args', function ($request) use ($timeout) {
			$request['timeout'] = $timeout;
			return $request;
		}, array(
			'priority'	=> 100,
			'args'		=> 1,
		));
		RB_Filters_Manager::add_action('ta_curl_http_api', 'http_api_curl', function ($handle) use ($timeout) {
			curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($handle, CURLOPT_TIMEOUT, $timeout);
		}, array(
			'priority'	=> 100,
			'args'		=> 1,
		));
	}

	static public function add_themes_supports()
	{
		add_theme_support('post-thumbnails');

		add_image_size('destacado', 767, 1050);

		//svg support
		function cc_mime_types($mimes)
		{
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}
		add_filter('upload_mimes', 'cc_mime_types');
	}

	static private function register_menues()
	{
		RB_Wordpress_Framework::load_module('menu');
		register_nav_menus(
			array(
				'sections-menu' => __('Secciones'),
				'special-menu' => __('Especiales'),
				'extra-menu' => __('Extra'),
				'importante-menu' => __('Importante')
			)
		);
	}

	static public function enqueue_scripts()
	{
		wp_enqueue_style('bootstrap', TA_ASSETS_CSS_URL . '/libs/bootstrap/bootstrap.css');
		wp_enqueue_style('fontawesome', TA_ASSETS_CSS_URL . '/libs/fontawesome/css/all.min.css');
		wp_enqueue_style('ta_style', TA_ASSETS_CSS_URL . '/src/style.css');
		wp_enqueue_style('ta_style_utils', TA_ASSETS_CSS_URL . '/utils.css');
		//wp_enqueue_style('onboarding', TA_ASSETS_CSS_URL . '/onboarding.css');
		//wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], TA_THEME_VERSION);
		wp_enqueue_script('bootstrap', TA_ASSETS_JS_URL . '/libs/bootstrap/bootstrap.min.js', ['jquery'], TA_THEME_VERSION);
		//wp_enqueue_script('ta-podcast', TA_ASSETS_JS_URL . '/src/ta-podcast.js', ['jquery'], TA_THEME_VERSION);
		//wp_enqueue_script('tw-js', 'https://platform.twitter.com/widgets.js');
		wp_enqueue_script('ta_utils_js', TA_ASSETS_JS_URL . '/utils.js', ['jquery'], TA_THEME_VERSION);
		wp_enqueue_script('ta_comments', TA_ASSETS_JS_URL . '/src/comments.js', ['jquery'], TA_THEME_VERSION);
		wp_enqueue_script("ta-balancer-front-block-js", ['react', 'reactdom']);
		wp_enqueue_script("ta-mas-leidas-front-block-js",'',TA_THEME_VERSION);
		wp_enqueue_script("ta-searchpage-front-block-js",'',TA_THEME_VERSION);
		wp_localize_script(
			'ta-searchpage-front-block-js',
			'TASearchData',
			array(
				'searchpageUrl'	=> home_url( "/search/" ),
			),
		);

		wp_localize_script(
			'ta_comments',
			'wpRest',
			array(
				'restURL' 	=> get_rest_url(),
				'nonce' 	=> wp_create_nonce('wp_rest')
			),
		);

		add_action('wp_footer', function(){
			// Se les hace accesibles variables relacionadas al balanceador a los scripts del componente
			// de mas leidas y notas balancedas.
			wp_localize_script(
				'ta-balancer-front-block-js', // utilizado tambien por ta-mas-leidas-front-js
				'TABalancerApiData',
				array(
					'mostViewed' 			=> wp_list_pluck(self::$latest_most_viewed, 'ID'),
					'apiEndpoint'			=> TA_Balancer_DB::get_api_endpoint(),
					'themeUrl'				=> TA_THEME_URL,
					'articlesShownOnRender'	=> ta_get_articles_previews_shown_ids(),
					'balancerDaysAgo'		=> get_option('balancer_editorial_days') ?? 20,
					'masLeidasDaysAgo'		=> 10,
				),
			);
		});
	}

	static public function admin_scripts()
	{
		wp_enqueue_style('ta_theme_admin_css', TA_ASSETS_CSS_URL . '/src/admin.css');
		wp_enqueue_script('ta_theme_admin_js', TA_ASSETS_JS_URL . '/src/admin.js', ['jquery'],TA_THEME_VERSION);
		wp_enqueue_script('ta_admin_comments', TA_ASSETS_JS_URL . '/src/admin-comments.js', ['jquery', 'admin-comments'], TA_THEME_VERSION);
	}

	static public function register_gutenberg_categories()
	{
		rb_add_gutenberg_category('ta-blocks', 'Tiempo Argentino', null);
	}

	static public function customizer()
	{
		RB_Wordpress_Framework::load_module('fields');
		RB_Wordpress_Framework::load_module('customizer');
		add_action('customize_register', array(self::class, 'require_customizer_panel'), 1000000);
	}

	/**
	*	Steps related to the search results page
	*/
	static private function searchpage(){

		function get_search_results_params(){
			global $wp;
			$url_info = wp_parse_url("http://base/{$wp->request}");
			$path_parts = explode('/', $url_info['path']) ?? null;
			return isset($path_parts[1]) && $path_parts[1] === 'search' ? array(
				'query'	=> $path_parts[2] ?? null,
				'page'		=> $path_parts[4] ?? 1,
			) : null;
		}
		// Not used anymore. Redirect is made via js
		// RB_Filters_Manager::add_action( 'ta_redirect_search_page', 'template_redirect', function($template) {
		// 	if ( is_search() && ! empty( $_GET['s'] ) ) {
		//         wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		//         exit();
		//     }
		// } );

		/**
		*	If the request has the search URL params, sets the correct template
		*/
		RB_Filters_Manager::add_action( 'ta_searchpage_front_script', 'template_include', function($template) {
			$search_results_params = get_search_results_params();
			if ( !$search_results_params )
				return $template;

			$template = TA_THEME_PATH . '/search-ta_article.php';

			wp_localize_script(
				'ta-searchpage-front-block-js',
				'TASearchQuery',
				array(
					's' 			=> $search_results_params['query'],
					'page' 			=> $search_results_params['page'],
				),
			);

			return $template;
		} );

		/**
		*	If search page, updates the main query params based on the URL params
		*/
		RB_Filters_Manager::add_action( 'ta_search_results_page_query_page', 'pre_get_posts', function( $query ){
			$search_results_params = get_search_results_params();
			if( $search_results_params && $query->is_main_query() ){
				$query->set( 'paged', $search_results_params['page'] );
				$query->is_search = true; // We making WP think it is Search page
				$query->is_page = false; // disable unnecessary WP condition
				$query->is_singular = false; // disable unnecessary WP condition
			}
		} );
	}

	static public function require_customizer_panel($wp_customize)
	{
		require TA_THEME_PATH . '/customizer.php';
	}
	/**
	 * Plugins
	 */
	static public function get_plugins_assets()
	{
		require_once TA_THEME_PATH . '/balancer/functions.php';
		require_once TA_THEME_PATH . '/user-panel/functions.php';
		require_once TA_THEME_PATH . '/subscriptions-theme/functions.php';
		require_once TA_THEME_PATH . '/mailtrain/functions.php';
		require_once TA_THEME_PATH . '/beneficios/functions.php';
		require_once TA_THEME_PATH . '/inc/users-api.php';
		require_once TA_THEME_PATH . '/inc/bloques-otros/bloques-otros.php';
		require_once TA_THEME_PATH . '/inc/delete-tool/posts.php';
		require_once TA_THEME_PATH . '/inc/options.php';
	}

	/**
	 * Menus remove
	 */
	static public function remove_posts()
	{
		remove_menu_page('edit.php');
	}

	static private function sync_articles_topics_and_places(){
		// Status change
        RB_Filters_Manager::add_action( "ta_sync_articles_topics_and_places", "save_post", function($post_ID, $post, $update){
			if( array_search($post->post_type, TA_ARTICLES_COMPATIBLE_POST_TYPES) === false )
				return;

			$article = TA_Article_Factory::get_article($post);
			$new_places = [];
			$new_topics = [];
			$topics = get_terms([
				'taxonomy' => 'ta_article_tema',
				'hide_empty' => false
			]);
			$places = get_terms([
				'taxonomy' => 'ta_article_place',
				'hide_empty' => false
			]);

			if($article->tags){
				foreach ($article->tags as $tag) {
					$comparable_name = strtolower(trim($tag->name));
					$new_places = [];
					$new_topics = [];

					if($comparable_name){
						foreach($places as $place){
							if( $comparable_name === strtolower(trim($place->name)) )
								$new_places[] = $place->term_id;
						}

						foreach ($topics as $topic) {
							if ( $comparable_name === strtolower(trim($topic->name)) )
								$new_topics[] = $topic->term_id;
						}
					}
				}
			}

			wp_set_post_terms($post_ID, $new_places, 'ta_article_place');
			wp_set_post_terms($post_ID, $new_topics, 'ta_article_tema');
		}, array(
			'priority'		=> 100,
			'accepted_args'	=> 3,
		) );
	}

	public static function extra_home_content()
	{
		require_once TA_THEME_PATH . '/inc/extra/banner-home-qs.php';
	}

	public static function nota_apertura_content()
	{
		require_once TA_THEME_PATH . '/inc/extra/nota-apertura.php';
	}

	static public function clean_dashboard()
	{
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
		remove_meta_box('dashboard_primary', 'dashboard', 'side');
		remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //since 3.8
	}

}

TA_Theme::initialize();

// Gutenberg block script enqueue outside post edition screen
add_action('admin_enqueue_scripts', function () {
	wp_enqueue_script("ta-index-block-js");
});

function ta_article_image_control($post, $meta_key, $attachment_id, $args = array()){
	$default_args = array(
		'title'			=> '',
		'description'	=> '',
	);
	extract(array_merge($default_args, $args));
	$image_url = isset(wp_get_attachment_image_src($attachment_id)[0]) ? wp_get_attachment_image_src($attachment_id)[0] : '';
	$empty = !$image_url;
?>
	<div id="test" class="ta-articles-images-controls" data-id="<?php echo esc_attr($post->ID); ?>" data-type="<?php echo esc_attr($post->post_type); ?>" data-metakey="<?php echo esc_attr($meta_key); ?>" data-metavalue="<?php echo esc_attr($attachment_id); ?>">
		<div class="image-selector">
			<?php if ($title) : ?>
				<p class="title"><?php echo esc_html($title); ?></p>
			<?php endif; ?>
			<?php if ($description) : ?>
				<p class="description"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
			<div class="image-box">
				<div class="bkg" style="background-image: url(<?php echo esc_attr($image_url); ?>);"></div>
				<div class="content">
					<div class="controls when-not-empty">
						<div class="remove-btn">x</div>
					</div>
					<div class="text when-empty">Seleccionar imagen</div>
					<div class="text when-not-empty">Cambiar imagen</div>
				</div>
			</div>
		</div>
		<div class="when-loading">
			Cargando...
		</div>
	</div>
<?php
}

if(current_user_can('edit_articles')){
	// POST COLUMN - Adding column to core post type
	rb_add_posts_list_column('ta_article_images_column', 'ta_article', 'Imágenes', function ($column, $post) {
		$article = TA_Article_Factory::get_article($post);
		if (!$article || !current_user_can('edit_post', $post->ID )){
			?><p>No puedes editar las imágenes de este artículo.</p><?php
			return;
		}

		$featured_attachment_id = isset($article->thumbnail_common['is_default']) && $article->thumbnail_common['is_default'] ? '' : (isset($article->thumbnail_common['attachment']->ID) ? $article->thumbnail_common['attachment']->ID : '');
		$featured_alt_attachment_id = isset($article->thumbnail_alt_common['is_default']) && $article->thumbnail_alt_common['is_default'] ? '' : (isset($article->thumbnail_alt_common['attachment']->ID) ? $article->thumbnail_alt_common['attachment']->ID : '');

		ta_article_image_control($post, '_thumbnail_id', $featured_attachment_id, array(
			'title'			=> 'Imagen Destacada',
		));
		ta_article_image_control($post, 'ta_article_thumbnail_alt', $featured_alt_attachment_id, array(
			'title'			=> 'Imagen Portada',
			//'description'	=> 'Sobrescribe la imagen principal en la portada',
		));
	}, array(
		'position'      => 4,
		'column_class'  => '',
		'should_add'	=> function(){
			$queried_object = get_queried_object();
			if(!$queried_object || $queried_object->name != 'ta_article')
				return false;

			if(!current_user_can('edit_articles'))
				return false;
			return true;
		}
	));
}



function ta_article_authors_rols_meta_register(){
	register_post_meta('ta_article', 'ta_article_authors_rols', array(
		'single' => true,
		'type' => 'object',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'object',
				'additionalProperties' => array(
					'type' => 'string',
				),
			),
		),
	));
}
add_action('init', 'ta_article_authors_rols_meta_register');

function ta_article_authors_subrols_meta_register(){
	register_post_meta('ta_article', 'ta_article_authors_subrols', array(
		'single' => true,
		'type' => 'object',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'object',
				'additionalProperties' => array(
					'type' => 'string',
				),
			),
		),
	));
}
add_action('init', 'ta_article_authors_subrols_meta_register');

function ta_article_thumbnail_alt_meta_register(){
	register_post_meta('ta_article', 'ta_article_thumbnail_alt', array(
		'single' 	=> true,
		'type' 		=> 'number',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'number',
			),
		),
	));
}
add_action('init', 'ta_article_thumbnail_alt_meta_register');

function ta_article_sister_article_meta_register(){
	register_post_meta('ta_article', 'ta_article_sister_article', array(
		'single' 	=> true,
		'type' 		=> 'number',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'number',
			),
		),
	));
}
add_action('init', 'ta_article_sister_article_meta_register');
function page_nota_apertura_meta_register(){
	register_post_meta('page', 'page_nota_apertura', array(
		'single' 	=> true,
		'type' 		=> 'object',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'object',
				'properties' => array(
					'post' => array(
						'type' => 'number',
					),
					'white_logo' => array(
						'type' => 'boolean',
					),
					'white_title' => array(
						'type' => 'boolean',
					)
				),
			),
		),
	));
}
add_action('init', 'page_nota_apertura_meta_register');
function ta_article_edicion_impresa_meta_register(){
	register_post_meta('ta_article', 'ta_article_edicion_impresa', array(
		'single' 	=> true,
		'type' 		=> 'number',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'number',
			),
		),
	));
}
add_action('init', 'ta_article_edicion_impresa_meta_register');

function ta_article_participation_meta_register(){
	register_post_meta('ta_article', 'ta_article_participation', array(
		'single' 	=> true,
		'type' 		=> 'object',
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'object',
				'properties' => array(
					'use' => array(
						'type' => 'boolean',
					),
					'use_live_date' => array(
						'type' => 'boolean',
					),
					'live_date' => array(
						'type' => 'number',
					),
					'live_title'  => array(
						'type' => 'string',
					),
					'live_link'  => array(
						'type' => 'string',
					),
				),
				// 'additionalProperties' => array(
				// 	'type' => 'string',
				// ),
			),
		),
	));
}
add_action('init', 'ta_article_participation_meta_register');

/**
 * filtro por creador
 */
function filter_by_the_author() {

	if ('ta_article' != $_REQUEST['post_type']) {
		return;
	}

	$params = array(
		'name' => 'author', // this is the "name" attribute for filter <select>
		'show_option_all' => 'Creador', // label for all authors (display posts without filter)
		'role' => 'administrator','editor'
	);

	if ( isset($_GET['user']) )
		$params['selected'] = $_GET['user']; // choose selected user by $_GET variable

	wp_dropdown_users( $params ); // print the ready author list
}

//add_action('restrict_manage_posts', 'filter_by_the_author');

/**
 * filtro por sección
 */
function filter_by_the_section() {

	if ('ta_article' != $_REQUEST['post_type']) {
		return;
	}

	$params = array(
		'name' => 'ta_article_section',
		'show_option_all' => 'Sección',
		'value_field' => 'slug',
		'taxonomy' => 'ta_article_section'
	);

	if ( isset($_GET['ta_article_section']) )
		$params['selected'] = $_GET['ta_article_section'];

	wp_dropdown_categories( $params );
}

add_action('restrict_manage_posts', 'filter_by_the_section');
/**
 * columnas
 */
add_filter('manage_ta_article_posts_columns', 'article_columns');
function article_columns($columns){
	$columns['ta_article_section'] = __('Sección');
	$columns['ta_article_author'] = __('Autor/a(s)');
	$columns['author'] = __('Editor/a');
	$columns['ta_article_edicion_impresa'] = __('Ed. impresa');
	return $columns;
}
add_filter('manage_edit-ta_article_sortable_columns', 'article_order_columns');
function article_order_columns($columns){
	$columns['author'] = 'author';
	$columns['ta_article_section'] = 'ta_article_section';
	$columns['ta_article_author'] = 'ta_article_author';
	return $columns;
}

function article_columns_data( $column, $post_id ) {
    switch ( $column ) {
        case 'ta_article_author':
            $terms = get_the_term_list( $post_id, 'ta_article_author', '', ', ', '' );
            if ( is_string( $terms ) ) {
                echo $terms;
            }
            break;
 
        case 'ta_article_section':
			$terms = get_the_term_list( $post_id, 'ta_article_section', '', ', ', '' );
            if ( is_string( $terms ) ) {
                echo $terms;
            }
            break;
		case 'ta_article_edicion_impresa':
			$issue_id = get_post_meta($post_id, 'ta_article_edicion_impresa', true);
			if ($issue_id){
				$issue_title = get_the_title($issue_id);
				if ( is_string( $issue_title ) ) {
					echo $issue_title;
				}
			}
			break;
    }
}
add_action( 'manage_posts_custom_column' , 'article_columns_data', 10, 2 );

//deactivate new widgets
add_filter( 'use_widgets_block_editor', '__return_false' );

function subscription_user_type($user_id)
{
	if(is_user_logged_in()) {
		$user_subscription = get_user_meta($user_id,'suscription',true);
		$suscription_type = get_post_meta($user_subscription,'_is_type',true);
		return $suscription_type;
	}

	return false;
}

function user_active($user_id) {
	if(is_user_logged_in()) {
		$user_active = get_user_meta(wp_get_current_user()->ID, '_user_status', true);
		return $user_active;
	}

	return false;
}

function author_amp()
{
	$authors = get_the_terms(get_queried_object_id(),'ta_article_author');
	$terms_string = join(' / ', wp_list_pluck($authors, 'name'));
	if($authors) {
		echo '<div class="amp-author">Por: '.$terms_string.'</div>';
	}
}

add_action('ampforwp_below_the_title','author_amp');


function publi_note_mob_before_related()
{
	widgets_ta()->article_amp_prerelated();
}
add_action('ampforwp_above_related_post','publi_note_mob_before_related');


function search_filter($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set( 'posts_per_page', -1 );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter' );

add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {
	if (!$query->get( 'posts_per_page') || $query->get( 'posts_per_page') >= 0 && $query->get( 'posts_per_page') < 13) {
		$types = ['ta_article_section', 'ta_article_author', 's', 'ta_article_author', 'ta_article_tag'];
		foreach ($types as $t) {
			if (isset($query->query[$t]) && $query->query[$t])
				$query->set( 'posts_per_page', 12 );
		}
		if (isset($query->query['post_type'])){
			if ($query->query['post_type'] == "ta_ed_impresa")
			$query->set( 'posts_per_page', 12 );
			if ($query->query['post_type'] == "ta_article")
				$query->set( 'posts_per_page', 12 );
		}

	}
}

/**
 * This function runs only with blocks of type "core/image".
 *
 * @param $block_content
 * @param $block
 * @return string
 */
function show_copyright($block_content, $block)
{

    //echo $block['attrs']['id'];
	$foto =ta_get_attachment_photographer($block['attrs']['id']);
	$preBlock = '<div class="img-container mt-3">';
	$posBlock = '</div>';
	ob_start();
	get_template_part('parts/image', 'copyright', array('photographer' => $foto));
	$content = ob_get_clean();
	return $preBlock . $block_content . $content . $posBlock;

}

add_filter('render_block_core/image', 'show_copyright', 10, 2);

function photographer_column( $cols ) {
    $cols["photographer"] = "Fotógrafo";
    return $cols;
}

function photographer_value( $column_name, $id ) {
    $meta = ta_get_attachment_photographer( $id );
    foreach($meta as $key => $value){
		if ($key == "term"){
			foreach($value as $k => $v){
				if ($k == "name"){
					echo $v;
					break;
				}
			}
		};
	}
}

function photographer_column_sortable( $cols ) {
    $cols["photographer"] = "name";
    return $cols;
}

function hook_new_media_columns() {
    add_filter( 'manage_media_columns', 'photographer_column' );
    add_action( 'manage_media_custom_column', 'photographer_value', 10, 2 );
    add_filter( 'manage_upload_sortable_columns', 'photographer_column_sortable' );
}
add_action( 'admin_init', 'hook_new_media_columns' );

add_action( 'add_attachment', 'delete_image_meta_caption' );
function delete_image_meta_caption( $post_ID ) {
    if ( wp_attachment_is_image( $post_ID )) {		
        $my_image_meta = array(
            'ID' => $post_ID,
            'post_excerpt' => "",
        );
        wp_update_post( $my_image_meta );   
    }
}

add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
 
    if( is_admin() ) { 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
		wp_enqueue_script('color_picker_js', TA_ASSETS_JS_URL . '/src/color.js', array( 'wp-color-picker' ), false, true );

    }
}
add_action( 'fix_printed_articles_date_cron', 'fix_printed_articles_date' );

function fix_printed_articles_date () {
	$args = [
		'post_type' => 'ta_ed_impresa',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
		'date_query'            => array(
			'column'        => 'post_date',
			'after'         => '- 7 days'
		),
	];
	$issues = get_posts($args);
	foreach($issues as $issue) {
		$issueId = $issue->ID;
		$issueDate = get_the_date("Y-m-d H:i:s", $issue);
		$args = [
			'post_type' => 'ta_article',
			'posts_per_page' => -1,
			'meta_query' => array(
				array(
					'key'   => 'ta_article_edicion_impresa',
					'value' => $issueId,
				)
			),
		];
		$articles = get_posts($args);
		foreach($articles as $article){
			$articleId = $article->ID;
			wp_update_post(
				array (
					'ID' => $articleId,
					'post_date' => $issueDate,
					'post_date_gmt' => get_gmt_from_date( $issueDate ),
					)
			);
		}
	}
}

add_action( 'clean_cloudflare_cache_cron', 'clean_cloudflare_cache' );

function clean_cloudflare_cache () {
	$urls_array = [
		"https://www.tiempoar.com.ar/comunidad-tiempo",
		"https://www.tiempoar.com.ar/comunidad-tiempo/",
		"https://www.tiempoar.com.ar/micrositio/tiempo-de-viajes/",
		"https://www.tiempoar.com.ar/micrositio/tiempo-de-viajes",
		"https://www.tiempoar.com.ar/micrositio/qatar-2022/",
		"https://www.tiempoar.com.ar/micrositio/qatar-2022",
		"https://www.tiempoar.com.ar/newsletter",
		"https://www.tiempoar.com.ar/newsletter/",
		"https://www.tiempoar.com.ar/micrositio/ambiental/",
		"https://www.tiempoar.com.ar/micrositio/ambiental",
		"https://www.tiempoar.com.ar/micrositio/habitat/",
		"https://www.tiempoar.com.ar/micrositio/habitat",
		"https://www.tiempoar.com.ar/micrositio/medios/",
		"https://www.tiempoar.com.ar/micrositio/medios",
		"https://www.tiempoar.com.ar/micrositio/universitario/",
		"https://www.tiempoar.com.ar/micrositio/universitario",
		"https://www.tiempoar.com.ar/espectaculos/",
		"https://www.tiempoar.com.ar/espectaculos",
		"https://www.tiempoar.com.ar/asociate/",
		"https://www.tiempoar.com.ar/asociate",
	];
	purge_cloudflare($urls_array);
}

add_filter('the_content', 'insert_escriben_hoy', 1);

function insert_escriben_hoy($content){
    if (is_front_page() && isset(get_option( 'escriben_hoy_option_name' )['semana_' . date('w')]) && get_option( 'escriben_hoy_option_name' )['semana_' . date('w')]) {
		$today = date('w');
		$divider = '<!-- row divider -->';
        $rows = explode($divider, $content);
		$location = get_option( 'escriben_hoy_option_name' )['ubicacion'] > 0 ? get_option( 'escriben_hoy_option_name' )['ubicacion'] - 1 : 0;
        $rows[0] = str_replace('lazy', '', $rows[0]);
		$authors = getTodayAuthors();
		if ($authors && isset($rows[$location])){
			$rows[$location] .= '<div class="container-with-header ta-context dark-blue py-3">' .
			'<div class="context-color">' .
			'<div class="container line-height-0">' .
			'<div class="separator m-0"></div>' .
			'</div>' .
			'<div class="context-bg py-3 article-preview">' .
			'<div class="container ">' .
			'<a class="section-title">' .
			'<h4>Escriben hoy</h4>' .
			'</a>' .
			'</div>' .
			'<div class="sub-blocks mt-3 content">' .
			'<div class="container article-info-container">' .
			'<div class="author"><p>';
			foreach ($authors as $i => $author) {
				$rows[$location] .= '<a href="' . $author->archive_url . '">' . $author->name . '</a>';
				if ($i !== array_key_last($authors)) $rows[$location] .= " | ";
			}
			$rows[$location] .= '</p>' .
						'</div>' .
						'</div>' .
						'</div>' .
						'</div>' .
						'</div>' .
						'</div>';
		}
		$result = implode($divider, $rows);
        return $result;
    } else {
        return $content;
    }
}

add_action('save_post', 'clear_article_cache', 100, 2);
function clear_article_cache ($post_id, $post){
	if( array_search($post->post_type, TA_ARTICLES_COMPATIBLE_POST_TYPES) === false )
		return;

	$link = get_permalink($post);
	$last_char = substr($link, -1);
	if ($last_char == '/') {
		$link = substr($link, 0, -1);
	}
	$urls_array = array(
		$link,
		$link . '/',
		$link . '/amp',
		$link . '/amp' . '/'
	);
	
	$terms = get_the_terms($post, "ta_article_section");
    if ($terms && isset($terms[0])){
        $terms_array = $terms[0]->to_array();
        if (isset($terms_array['slug'])){
            $slug = $terms_array['slug'];
			if (str_contains($link, $slug)){
				$link = str_replace('/' . $slug . '/', '/ta_article' . '/', $link);
				array_push($urls_array,
					$link,
					$link . '/',
					$link . '/amp',
					$link . '/amp' . '/'
				);
			}
        }
    }
	purge_cloudflare ($urls_array);
}

function purge_cloudflare ($urls_array) {
	$email = get_option('cloudflare_cache_purge_option_name')['email'];
	$key = get_option('cloudflare_cache_purge_option_name')['key'];
	$zone = get_option('cloudflare_cache_purge_option_name')['zone'];
	if ($email && $key){
		$url = "https://api.cloudflare.com/client/v4/zones/" . $zone . "/purge_cache";
		$curl = curl_init();
		$payload = json_encode(array('files' => $urls_array));
		curl_setopt_array($curl,
			array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => $payload,
				CURLOPT_HTTPHEADER => array(
					'X-Auth-Email: ' . $email,
					'X-Auth-Key: ' . $key,
					'Content-Type: application/json'
					),
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
	}
}
function block_admin_access() {
	if(is_admin() && !defined('DOING_AJAX')) {
		$user = wp_get_current_user();
		$roles = $user->roles;
		if(in_array('digital',$roles) || in_array('subscriber',$roles)) {
			wp_redirect( home_url() ); exit;
		}
	}
}
add_action( 'admin_init', 'block_admin_access' );

function bloque_elecciones()
{
	require_once TA_THEME_PATH . '/parts/elecciones.php';
}
add_action('elecciones', 'bloque_elecciones');

function elecciones_get_results(){
	$options = get_option('elecciones_option_name');
	$url_nacion = isset($options['url_nacion']) ? $options['url_nacion'] : '';
	$token_nacion = isset($options['token_nacion']) ? $options['token_nacion'] : '';
	$url_caba = isset($options['url_caba']) ? $options['url_caba'] : '';
	
	if ($url_nacion && $token_nacion){
		$data_nacion = update_elecciones_data($url_nacion .'/resultados/getResultados?categoriaId=1', $token_nacion);
		if ($data_nacion){
			update_option('resultados_nacion', prosess_data_nacion($data_nacion, 'Presidenciales', 'Presidenciales', 'Todo el país', 100, 'nacion'));
		}
		$data_pba = update_elecciones_data($url_nacion .'/resultados/getResultados?distritoId=02&categoriaId=4', $token_nacion);
		if ($data_pba){
			update_option('resultados_pba', prosess_data_nacion($data_pba, 'Gobernación', 'PBA - Gobernación', 'Provincia de Buenos Aires', 102, 'pba'));

		}
	}
	if (false && $url_caba){
		$data_caba = update_elecciones_data($url_caba);
		if ($data_caba){
			update_option('resultados_caba', prosess_data_caba($data_caba));
		} elseif (!get_option('resultados_caba')){
			$path = get_bloginfo('template_directory') . '/parts/elecciones_data/from_api_caba.json';
			$jsonString = file_get_contents($path);
			$data_caba = json_decode($jsonString, true);
			update_option('resultados_caba', prosess_data_caba($data_caba));
		}
	}
	$urls_array = [
		"https://www.tiempoar.com.ar/resultados",
		"https://www.tiempoar.com.ar/resultados/",
	];
	purge_cloudflare($urls_array);

	
}

function update_elecciones_data($url, $token = null){
	$curl = curl_init();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	);
	if ($token){
		$options[CURLOPT_HTTPHEADER] = array(
			'Accept: application/json',
			'Authorization: Bearer ' . $token);
	}
	curl_setopt_array($curl, $options);
	

	$jsonData = curl_exec($curl);
	$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	if ($http_status >= 200 && $http_status < 300){
		return json_decode($jsonData, true);
	}
	return false;
}

function prosess_data_nacion($fromApi, $eleccion, $tagName, $region, $tagCode, $file_name){
	$path = get_bloginfo('template_directory')."/parts/elecciones_data/$file_name.json";
	$jsonString = file_get_contents($path);
	$agrupaciones = json_decode($jsonString, true);
	$una_from_api =     array(
		"tagCode" => $tagCode,
		'tagName' => $tagName,
		'region' => $region,
		'eleccion' => $eleccion,
		'fuente' => 'Dirección Nacional Electoral',
		'mesasTotalizadasPorcentaje' => number_format($fromApi["estadoRecuento"]['mesasTotalizadasPorcentaje'], 2, ",", "."),
		'participacionPorcentaje' => number_format($fromApi["estadoRecuento"]['participacionPorcentaje'], 2, ",", "."),
		'valoresTotalizadosOtros' => number_format($fromApi['valoresTotalizadosOtros']['votosNulosPorcentaje'] + $fromApi['valoresTotalizadosOtros']['votosEnBlancoPorcentaje'] + $fromApi['valoresTotalizadosOtros']['votosRecurridosComandoImpugnadosPorcentaje'], 2, ",", "."),
		'resultados' => [],
	);
	foreach ($fromApi["valoresTotalizadosPositivos"] as $agrupacion) {
		$agrupacion_id = $agrupacion["idAgrupacion"];
		if (!isset($agrupaciones[$agrupacion_id])) {
			continue;
		}
		$data = $agrupaciones[$agrupacion_id];
		$votos = $agrupacion['votos'] > 0 ? number_format($agrupacion['votos'], 0, ",", ".") : "-";
		$votosPorc = $agrupacion['votos'] > 0 ? number_format($agrupacion['votosPorcentaje'], 2, ",", ".") : '-';
		$agrupacion_data_final = array(
			'votos' => $votos,
			'votosPorc' => $votosPorc,
			'color' => $data['color'],
			'order' => $data['order'],
			'agrupacion' => $data['agrupacion'],
			'nombreCorto' => $data['nombreCorto'],
			'listas' => array()
		);
		foreach ($agrupacion['listas'] as $lista) {
			if (isset($data['listas'][$lista['idLista']])) {
				$agrupacion_data_final['listas'][] = array(
					'candidate' => $data['listas'][$lista['idLista']]['candidate'],
					'foto' => $data['listas'][$lista['idLista']]['foto'],
					'order' => $data['listas'][$lista['idLista']]['order'],
					'votosPorc' => number_format($lista['votosPorcentaje'] * $agrupacion['votosPorcentaje'] / 100, 2, ",", ".")
				);
				if($agrupacion['votos'] > 0){
					usort($agrupacion_data_final['listas'],function($a,$b){
						return (int)$a['votosPorc'] < (int)$b['votosPorc'];
					});
				} else {
					usort($agrupacion_data_final['listas'],function($a,$b){
						return (int)$a['order'] > (int)$b['order'];
					});
				}

			}
		}
		$una_from_api['resultados'][] = $agrupacion_data_final;
	}
	
	usort($una_from_api['resultados'],function($a,$b){
		return (int)$a['votosPorc'] < (int)$b['votosPorc'];
	});
	if ($fromApi['estadoRecuento']['cantidadVotantes'] > 0){
		usort($una_from_api['resultados'],function($a,$b){
			return (int)$a['votosPorc'] < (int)$b['votosPorc'];
		});
	} else {
		usort($una_from_api['resultados'], function ($a, $b) {
			return (int)$a['order'] > (int)$b['order'];
		});
	}
	return $una_from_api;
}
function prosess_data_caba($fromApi)
{
	$path = get_bloginfo('template_directory') . '/parts/elecciones_data/caba.json';
	$jsonString = file_get_contents($path);
	$agrupaciones = json_decode($jsonString, true);
	$valoresTotalizadosOtros = $fromApi['cant_votantes'] > 0 ? $fromApi['cant_votos_negativos'] * 100 / $fromApi['cant_votantes'] : 0;
	$dos_from_api =     array(
		"tagCode" => '101',
		'tagName' => "CABA - Jefatura de gobierno",
		'region' => 'CABA',
		'eleccion' => "Jefatura de gobierno",
		'fuente' => 'Instituto de Gestión Electoral (CABA)',
		'mesasTotalizadasPorcentaje' => number_format($fromApi["porcentaje_mesas_procesadas"], 2, ",", "."),
		'participacionPorcentaje' => number_format($fromApi["porcentaje_participacion"], 2, ",", "."),
		'valoresTotalizadosOtros' => number_format($valoresTotalizadosOtros, 2, ",", "."),
		'resultados' => [],
	);
	$votos_positivos = $fromApi['cant_votos_positivos'];
	$resultados_from_api =  $fromApi['resultados'];
	foreach ($agrupaciones as $agrupacion) {
		$agrupacion_data_final = array(
			'votos' => 0,
			'votosPorc' => number_format(0, 2, ",", "."),
			'color' => $agrupacion['color'],
			'agrupacion' => $agrupacion['agrupacion'],
			'nombreCorto' => $agrupacion['nombreCorto'],
			'order' => $agrupacion['order'],
			'listas' => array()
		);
		$votos_agrupacion = 0;
		foreach ($agrupacion['listas'] as $id_candidatura => $candidate) {
			$candidaturas_from_api = array_filter($resultados_from_api, function ($v, $k) use ($id_candidatura) {
				if (isset($v['id_candidatura'])) {
					return $v['id_candidatura'] == $id_candidatura;
				}
				return false;
			}, ARRAY_FILTER_USE_BOTH);
			if (isset(array_keys($candidaturas_from_api)[0]) && isset($candidaturas_from_api[array_keys($candidaturas_from_api)[0]])) {
				$votos = $candidaturas_from_api[array_keys($candidaturas_from_api)[0]]['cant_votos'];
				$votos_agrupacion += $votos;
				$porVotos = $votos_positivos > 0 ? $votos * 100 / $votos_positivos : 0;
				$agrupacion_data_final['listas'][] = array(
					'candidate' => $candidate['candidate'],
					'foto' => $candidate['foto'],
					'votosPorc' => number_format($porVotos, 2, ",", "."),
					'order' => $candidate['order']
				);
			}
		}
		if ($votos_agrupacion > 0){
			usort($agrupacion_data_final['listas'], function ($a, $b) {
				return (int)$a['votosPorc'] < (int)$b['votosPorc'];
			});
		} else {
			usort($agrupacion_data_final['listas'], function ($a, $b) {
				return (int)$a['order'] > (int)$b['order'];
			});
		}

		$agrupacion_data_final['votos'] = $votos_agrupacion > 0 ? $votos_agrupacion : '-';
		$agrupacion_data_final['votosPorc'] = $votos_agrupacion > 0 ? number_format($votos_agrupacion * 100 / $votos_positivos, 2, ",", ".") : '-';
		$dos_from_api['resultados'][] = $agrupacion_data_final;
	}
	if ($fromApi['cant_votos_positivos'] > 0){
		usort($dos_from_api['resultados'], function ($a, $b) {
			return (int)$a['votosPorc'] < (int)$b['votosPorc'];
		});
	} else {
		usort($dos_from_api['resultados'], function ($a, $b) {
			return (int)$a['order'] > (int)$b['order'];
		});
	}

	return $dos_from_api;
}
add_action( 'elecciones_cron', 'elecciones_get_results' );
// add_action( 'rest_api_init', function () {
// 	register_rest_route( 'theme/v1', '/caba', array(
// 	  'methods' => 'POST',
// 	  'callback' => 'save_caba_data',
// 	) );
//   } );

  function save_caba_data(WP_REST_Request $request){
	$data_caba = $request['data'];
	update_option('resultados_caba', prosess_data_caba($data_caba));
	wp_send_json( $data_caba ) ;
  }