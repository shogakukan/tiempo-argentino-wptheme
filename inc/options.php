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
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_1]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_1'], false )  . '/>'
		);
	}

	public function semana_2_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_2]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_2'], false )  . '/>'
		);
	}

	public function semana_3_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_3]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_3'], false )  . '/>'
		);
	}

	public function semana_4_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_4]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_4'], false )  . '/>'
		);
	}

	public function semana_5_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_5]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_5'], false )  . '/>'
		);
	}

	public function semana_6_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_6]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_6'], false )  . '/>'
		);
	}

	public function semana_0_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="escriben_hoy_option_name[semana_0]" id="enable_0"  value="1"' . checked( '1', $this->escriben_hoy_options['semana_0'], false )  . '/>'
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
if ( is_admin() ) {
	$datos_footer = new DatosFooter();
	$escriben_hoy = new EscribenHoy();
}