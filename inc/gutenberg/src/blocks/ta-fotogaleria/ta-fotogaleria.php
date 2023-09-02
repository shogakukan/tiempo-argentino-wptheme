<?php
return array(
	'id'					=> 'ta/fotogaleria',
	'render_callback'	=> function($attributes, $content = ''){
		ob_start();
		require plugin_dir_path( __FILE__ ) . 'block-template.php';
		return ob_get_clean();
	},
);
