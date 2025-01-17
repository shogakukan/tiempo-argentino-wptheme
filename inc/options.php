<?php

class DatosFooter {
	private $datos_footer_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'datos_footer_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'datos_footer_page_init' ) );
	}

	public function datos_footer_add_plugin_page() {
		add_theme_page(
			'Datos Footer', // page_title
			'Datos Footer', // menu_title
			'manage_options', // capability
			'datos-footer', // menu_slug
			array( $this, 'datos_footer_create_admin_page' ) // function
		);
	}

	public function datos_footer_create_admin_page() {
		$this->datos_footer_options = get_option( 'datos_footer_option_name' ); ?>

		<div class="wrap">
			<h2>Datos Footer</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'datos_footer_option_group' );
					do_settings_sections( 'datos-footer-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function datos_footer_page_init() {
		register_setting(
			'datos_footer_option_group', // option_group
			'datos_footer_option_name', // option_name
			array( $this, 'datos_footer_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'datos_footer_setting_section', // id
			'Datos', // title
			array( $this, 'datos_footer_section_info' ), // callback
			'datos-footer-admin' // page
		);

		add_settings_field(
			'direccin_0', // id
			'Dirección', // title
			array( $this, 'direccin_0_callback' ), // callback
			'datos-footer-admin', // page
			'datos_footer_setting_section' // section
		);

		add_settings_field(
			'editores_1', // id
			'Editores', // title
			array( $this, 'editores_1_callback' ), // callback
			'datos-footer-admin', // page
			'datos_footer_setting_section' // section
		);

		add_settings_field(
			'registro_n_o_texto_2', // id
			'Registro (nº o texto)', // title
			array( $this, 'registro_n_o_texto_2_callback' ), // callback
			'datos-footer-admin', // page
			'datos_footer_setting_section' // section
		);

		// add_settings_field(
		// 	'n_edicin_3', // id
		// 	'Nº Edición', // title
		// 	array( $this, 'n_edicin_3_callback' ), // callback
		// 	'datos-footer-admin', // page
		// 	'datos_footer_setting_section' // section
		// );

		add_settings_field(
			'fecha_4', // id
			'Fecha inicial', // title
			array( $this, 'fecha_4_callback' ), // callback
			'datos-footer-admin', // page
			'datos_footer_setting_section' // section
		);
	}

	public function datos_footer_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['direccin_0'] ) ) {
			$sanitary_values['direccin_0'] = sanitize_text_field( $input['direccin_0'] );
		}

		if ( isset( $input['editores_1'] ) ) {
			$sanitary_values['editores_1'] = sanitize_text_field( $input['editores_1'] );
		}

		if ( isset( $input['registro_n_o_texto_2'] ) ) {
			$sanitary_values['registro_n_o_texto_2'] = sanitize_text_field( $input['registro_n_o_texto_2'] );
		}

		// if ( isset( $input['n_edicin_3'] ) ) {
		// 	$sanitary_values['n_edicin_3'] = sanitize_text_field( $input['n_edicin_3'] );
		// }

		if ( isset( $input['fecha_4'] ) ) {
			$sanitary_values['fecha_4'] = sanitize_text_field( $input['fecha_4'] );			
		}

		return $sanitary_values;
	}

	public function datos_footer_section_info() {
		
	}

	public function direccin_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="datos_footer_option_name[direccin_0]" id="direccin_0" value="%s">',
			isset( $this->datos_footer_options['direccin_0'] ) ? esc_attr( $this->datos_footer_options['direccin_0']) : ''
		);
	}

	public function editores_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="datos_footer_option_name[editores_1]" id="editores_1" value="%s">',
			isset( $this->datos_footer_options['editores_1'] ) ? esc_attr( $this->datos_footer_options['editores_1']) : ''
		);
	}

	public function registro_n_o_texto_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="datos_footer_option_name[registro_n_o_texto_2]" id="registro_n_o_texto_2" value="%s">',
			isset( $this->datos_footer_options['registro_n_o_texto_2'] ) ? esc_attr( $this->datos_footer_options['registro_n_o_texto_2']) : ''
		);
	}

	// public function n_edicin_3_callback() {
	// 	printf(
	// 		'<input class="regular-text" type="text" name="datos_footer_option_name[n_edicin_3]" id="n_edicin_3" value="%s">',
	// 		isset( $this->datos_footer_options['n_edicin_3'] ) ? esc_attr( $this->datos_footer_options['n_edicin_3']) : ''
	// 	);
	// }

	public function fecha_4_callback() {
		printf(
			'<input class="regular-text" type="date" name="datos_footer_option_name[fecha_4]" id="fecha_4" value="%s">',
			isset( $this->datos_footer_options['fecha_4'] ) ? esc_attr( $this->datos_footer_options['fecha_4']) : ''
		);
	}

}

class EscribenHoy {
	private $escriben_hoy_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'escriben_hoy_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'escriben_hoy_page_init' ) );
	}

	public function escriben_hoy_add_plugin_page() {
		add_theme_page(
			'Escriben hoy', // page_title
			'Escriben hoy', // menu_title
			'manage_options', // capability
			'escriben-hoy', // menu_slug
			array( $this, 'escriben_hoy_create_admin_page' ) // function
		);
	}

	public function escriben_hoy_create_admin_page() {
		$this->escriben_hoy_options = get_option( 'escriben_hoy_option_name' ); ?>

		<div class="wrap">
			<h2>Escriben Hoy</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'escriben_hoy_option_group' );
					do_settings_sections( 'escriben-hoy-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function escriben_hoy_page_init() {
		register_setting(
			'escriben_hoy_option_group', // option_group
			'escriben_hoy_option_name', // option_name
			array( $this, 'escriben_hoy_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'escriben_hoy_setting_section', // id
			'Configuración', // title
			array( $this, 'escriben_hoy_section_info' ), // callback
			'escriben-hoy-admin' // page
		);


		add_settings_field(
			'semana_1', // id
			'Lunes', // title
			array( $this, 'semana_1_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_2', // id
			'Martes', // title
			array( $this, 'semana_2_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_3', // id
			'Miércoles', // title
			array( $this, 'semana_3_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_4', // id
			'Jueves', // title
			array( $this, 'semana_4_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_5', // id
			'Viernes', // title
			array( $this, 'semana_5_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_6', // id
			'Sábado', // title
			array( $this, 'semana_6_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);
		add_settings_field(
			'semana_0', // id
			'Domingo', // title
			array( $this, 'semana_0_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);

		add_settings_field(
			'ubicacion', // id
			'Ubicación', // title
			array( $this, 'ubicacion_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);

		add_settings_field(
			'dias', // id
			'Antígüedad de las notas (en días)', // title
			array( $this, 'dias_callback' ), // callback
			'escriben-hoy-admin', // page
			'escriben_hoy_setting_section' // section
		);


	}

	public function escriben_hoy_sanitize($input) {
		$sanitary_values = array();

		if ( isset( $input['semana_1'] ) ) {
			$sanitary_values['semana_1'] = sanitize_text_field( $input['semana_1'] );
		}

		if ( isset( $input['semana_2'] ) ) {
			$sanitary_values['semana_2'] = sanitize_text_field( $input['semana_2'] );
		}

		if ( isset( $input['semana_3'] ) ) {
			$sanitary_values['semana_3'] = sanitize_text_field( $input['semana_3'] );
		}

		if ( isset( $input['semana_4'] ) ) {
			$sanitary_values['semana_4'] = sanitize_text_field( $input['semana_4'] );
		}

		if ( isset( $input['semana_5'] ) ) {
			$sanitary_values['semana_5'] = sanitize_text_field( $input['semana_5'] );
		}

		if ( isset( $input['semana_6'] ) ) {
			$sanitary_values['semana_6'] = sanitize_text_field( $input['semana_6'] );
		}

		if ( isset( $input['semana_0'] ) ) {
			$sanitary_values['semana_0'] = sanitize_text_field( $input['semana_0'] );
		}

		if ( isset( $input['dias'] ) ) {
			$sanitary_values['dias'] = sanitize_text_field( $input['dias'] );
		}

		if ( isset( $input['ubicacion'] ) ) {
			$sanitary_values['ubicacion'] = sanitize_text_field( $input['ubicacion'] );
		}

		return $sanitary_values;
	}

	public function escriben_hoy_section_info() {
		
	}

	public function semana_1_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_1]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_1']) ? $this->escriben_hoy_options['semana_1'] : false, false )  . '/>'
		);
	}

	public function semana_2_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_2]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_2']) ? $this->escriben_hoy_options['semana_2'] : false, false )  . '/>'
		);
	}

	public function semana_3_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_3]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_3']) ? $this->escriben_hoy_options['semana_3'] : false, false )  . '/>'
		);
	}

	public function semana_4_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_4]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_4']) ? $this->escriben_hoy_options['semana_4'] : false, false )  . '/>'
		);
	}

	public function semana_5_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_5]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_5']) ? $this->escriben_hoy_options['semana_5'] : false, false )  . '/>'
		);
	}

	public function semana_6_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_6]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_6']) ? $this->escriben_hoy_options['semana_6'] : false, false )  . '/>'
		);
	}

	public function semana_0_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_0]" id="enable_0"  value="1"' . checked( '1', isset($this->escriben_hoy_options['semana_0']) ? $this->escriben_hoy_options['semana_0'] : false, false )  . '/>'
		);
	}

	public function dias_callback() {
		printf(
			'<input class="regular-text" type="number" name="escriben_hoy_option_name[dias]" id="dias"  value="%s" />',
			isset( $this->escriben_hoy_options['dias'] ) ? esc_attr( $this->escriben_hoy_options['dias']) : ''
		);
	}

	public function ubicacion_callback() {
		printf(
			'<input class="regular-text" type="number" name="escriben_hoy_option_name[ubicacion]" id="ubicacion"  value="%s" />',
			isset( $this->escriben_hoy_options['ubicacion'] ) ? esc_attr( $this->escriben_hoy_options['ubicacion']) : ''

		);
	}

}

class UltimoMomento {
	private $ultimo_momento;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ultimo_momento_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'ultimo_momento_page_init' ) );
	}

	public function ultimo_momento_add_plugin_page() {
		add_theme_page(
			'Último momento', // page_title
			'Último momento', // menu_title
			'manage_options', // capability
			'ultimo-momento', // menu_slug
			array( $this, 'ultimo_momento_create_admin_page' ) // function
		);
	}

	public function ultimo_momento_create_admin_page() {
		$this->ultimo_momento_options = get_option( 'ultimo_momento_option_name' ); ?>

		<div class="wrap">
			<h2>Último momento</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'ultimo_momento_option_group' );
					do_settings_sections( 'ultimo-momento-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function ultimo_momento_page_init() {
		register_setting(
			'ultimo_momento_option_group', // option_group
			'ultimo_momento_option_name', // option_name
			array( $this, 'ultimo_momento_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'ultimo_momento_setting_section', // id
			'¿Qué pasó?', // title
			array( $this, 'ultimo_momento_section_info' ), // callback
			'ultimo-momento-admin' // page
		);

		add_settings_field(
			'ultimo_momento', // id
			'Título', // title
			array( $this, 'ultimo_momento_callback' ), // callback
			'ultimo-momento-admin', // page
			'ultimo_momento_setting_section' // section
		);

		
	}

	public function ultimo_momento_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['ultimo_momento'] ) ) {
			$sanitary_values['ultimo_momento'] = sanitize_text_field( $input['ultimo_momento'] );
		}

		return $sanitary_values;
	}

	public function ultimo_momento_section_info() {
		
	}

	public function ultimo_momento_callback() {
		printf(
			'<input class="regular-text" type="text" name="ultimo_momento_option_name[ultimo_momento]" id="ultimo_momento" value="%s">',
			isset( $this->ultimo_momento_options['ultimo_momento'] ) ? esc_attr( $this->ultimo_momento_options['ultimo_momento']) : ''
		);
	}


}

class CloudflareCachePurge {
	private $cloudflare_cache_purge_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'cloudflare_cache_purge_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'cloudflare_cache_purge_page_init' ) );
	}

	public function cloudflare_cache_purge_add_plugin_page() {
		add_submenu_page(
			'options-general.php',
			'Cloudflare Cache Purge', // page_title
			'Cloudflare Cache Purge', // menu_title
			'manage_options', // capability
			'cloudflare-cache-purge', // menu_slug
			array( $this, 'cloudflare_cache_purge_create_admin_page' ) // function
		);
	}

	public function cloudflare_cache_purge_create_admin_page() {
		$this->cloudflare_cache_purge_options = get_option( 'cloudflare_cache_purge_option_name' ); ?>

		<div class="wrap">
			<h2>Cloudflare Cache Purge</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'cloudflare_cache_purge_option_group' );
					do_settings_sections( 'cloudflare-cache-purge-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function cloudflare_cache_purge_page_init() {
		register_setting(
			'cloudflare_cache_purge_option_group', // option_group
			'cloudflare_cache_purge_option_name', // option_name
			array( $this, 'cloudflare_cache_purge_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'cloudflare_cache_purge_setting_section', // id
			'Credenciales', // title
			array( $this, 'cloudflare_cache_purge_section_info' ), // callback
			'cloudflare-cache-purge-admin' // page
		);

		add_settings_field(
			'email', // id
			'Email', // title
			array( $this, 'email_callback' ), // callback
			'cloudflare-cache-purge-admin', // page
			'cloudflare_cache_purge_setting_section' // section
		);

		add_settings_field(
			'key', // id
			'Key', // title
			array( $this, 'key_callback' ), // callback
			'cloudflare-cache-purge-admin', // page
			'cloudflare_cache_purge_setting_section' // section
		);

		add_settings_field(
			'zone', // id
			'Zone', // title
			array( $this, 'zone_callback' ), // callback
			'cloudflare-cache-purge-admin', // page
			'cloudflare_cache_purge_setting_section' // section
		);
		
	}

	public function cloudflare_cache_purge_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['email'] ) ) {
			$sanitary_values['email'] = sanitize_text_field( $input['email'] );
		}
		if ( isset( $input['key'] ) ) {
			$sanitary_values['key'] = sanitize_text_field( $input['key'] );
		}
		if ( isset( $input['zone'] ) ) {
			$sanitary_values['zone'] = sanitize_text_field( $input['zone'] );
		}

		return $sanitary_values;
	}

	public function cloudflare_cache_purge_section_info() {
		
	}

	public function email_callback() {
		printf(
			'<input class="regular-text" type="text" name="cloudflare_cache_purge_option_name[email]" id="email" value="%s">',
			isset( $this->cloudflare_cache_purge_options['email'] ) ? esc_attr( $this->cloudflare_cache_purge_options['email']) : ''
		);
	}

	public function key_callback() {
		printf(
			'<input class="regular-text" type="text" name="cloudflare_cache_purge_option_name[key]" id="key" value="%s">',
			isset( $this->cloudflare_cache_purge_options['key'] ) ? esc_attr( $this->cloudflare_cache_purge_options['key']) : ''
		);
	}

	public function zone_callback() {
		printf(
			'<input class="regular-text" type="text" name="cloudflare_cache_purge_option_name[zone]" id="key" value="%s">',
			isset( $this->cloudflare_cache_purge_options['zone'] ) ? esc_attr( $this->cloudflare_cache_purge_options['zone']) : ''
		);
	}

	
}
class Elecciones {
	private $enable;
	private $url_nacion;
	private $token_nacion;
	private $url_caba;
	private $elecciones_options;
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'elecciones_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'elecciones_page_init' ) );
	}

	public function elecciones_add_plugin_page() {
		add_theme_page(
			'Elecciones', // page_title
			'Elecciones', // menu_title
			'manage_options', // capability
			'elecciones', // menu_slug
			array( $this, 'elecciones_create_admin_page' ) // function
		);
	}

	public function elecciones_create_admin_page() {
		$this->elecciones_options = get_option( 'elecciones_option_name' ); ?>

		<div class="wrap">
			<h2>Elecciones</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'elecciones_option_group' );
					do_settings_sections( 'elecciones-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function elecciones_page_init() {
		register_setting(
			'elecciones_option_group', // option_group
			'elecciones_option_name', // option_name
			array( $this, 'elecciones_sanitize' ) // sanitize_callback
		);
		add_settings_section(
			'elecciones_setting_section', // id
			'Credenciales', // title
			array( $this, 'elecciones_section_info' ), // callback
			'elecciones-admin' // page
		);
		add_settings_field(
			'enabled', // id
			'Mostrar', // title
			array( $this, 'enabled_callback' ), // callback
			'elecciones-admin', // page
			'elecciones_setting_section' // section
		);
		add_settings_field(
			'url_nacion', // id
			'URL Nación', // title
			array( $this, 'url_nacion_callback' ), // callback
			'elecciones-admin', // page
			'elecciones_setting_section' // section
		);
		add_settings_field(
			'token_nacion', // id
			'Token Nación', // title
			array( $this, 'token_nacion_callback' ), // callback
			'elecciones-admin', // page
			'elecciones_setting_section' // section
		);
		add_settings_field(
			'url_caba', // id
			'URL CABA', // title
			array( $this, 'url_caba_callback' ), // callback
			'elecciones-admin', // page
			'elecciones_setting_section' // section
		);

		
	}

	public function elecciones_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['enabled'] ) ) {
			$sanitary_values['enabled'] = sanitize_text_field($input['enabled']);
		}
		if ( isset( $input['url_nacion'] ) ) {
			$sanitary_values['url_nacion'] = sanitize_text_field( $input['url_nacion'] );
		}
		if ( isset( $input['token_nacion'] ) ) {
			$sanitary_values['token_nacion'] = sanitize_text_field( $input['token_nacion'] );
		}
		if ( isset( $input['url_caba'] ) ) {
			$sanitary_values['url_caba'] = sanitize_text_field( $input['url_caba'] );
		}

		return $sanitary_values;
	}

	public function elecciones_section_info() {
	}

	public function enabled_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="elecciones_option_name[enabled]"  value="1"' . checked( '1', isset($this->elecciones_options['enabled']) ? $this->elecciones_options['enabled'] : false, false )  . '/>'
		);
	}
	public function url_nacion_callback() {
		printf(
			'<input class="regular-text" type="text" name="elecciones_option_name[url_nacion]" value="%s">',
			isset( $this->elecciones_options['url_nacion'] ) ? esc_attr( $this->elecciones_options['url_nacion']) : ''
		);
	}
	public function token_nacion_callback() {
		printf(
			'<input class="regular-text" type="text" name="elecciones_option_name[token_nacion]" value="%s">',
			isset( $this->elecciones_options['token_nacion'] ) ? esc_attr( $this->elecciones_options['token_nacion']) : ''
		);
	}
	public function url_caba_callback() {
		printf(
			'<input class="regular-text" type="text" name="elecciones_option_name[url_caba]" value="%s">',
			isset( $this->elecciones_options['url_caba'] ) ? esc_attr( $this->elecciones_options['url_caba']) : ''
		);
	}


}
if ( is_admin() ) {
	$datos_footer = new DatosFooter();
	$escriben_hoy = new EscribenHoy();
	$ultimo_momento = new UltimoMomento();
	$cloudflare_cache_purge = new CloudflareCachePurge();
	$elecciones = new Elecciones();
}