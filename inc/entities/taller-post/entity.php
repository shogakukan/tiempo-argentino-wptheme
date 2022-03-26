<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
return array(
    'id'            => 'ta_taller',
    'type'          => 'post_type',
    'args'          => array(
        'labels' 			=> array(
            'name' 				 => __( 'Talleres' ),
            'singular_name' 	 => __( 'Taller' ),
            'add_new'            => __( 'Agregar' ),
            'add_new_item'       => __( 'Agregar nuevo Taller' ),
            'edit_item'          => __( 'Editar Taller' ),
            'new_item'           => __( 'Nuevo Taller' ),
            'view_item'          => __( 'Ver' ),
            'search_items'       => __( 'Buscar Taller' ),
            'not_found'          => __( 'No se encontraron Talleres' ),
            'not_found_in_trash' => __( 'No se encontraron Talleres' ),
        ),
        'public' 				=> true,
        'has_archive' 			=> 'talleres', //slug para archivo (usado por fecha en este caso)
        //'rewrite' 				=> true, //true para que si tenga url amigable y no definimos slug para poder sobre escribirlo como queramos
        'rewrite'               => array( 'slug' => 'taller' ),
        'menu_position'			=> 5,
        'menu_icon'				=> TA_ASSETS_URL . '/img/articles-icon.png',
        'supports'				=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'publicly_queryable'    => true,
        'query_var'				=> true,
        'show_in_rest' 			=> true,
        'show_in_nav_menus' 	=> true,
        'post_per_page'			=> 10,
        'paged' 				=> $paged,
        'capability_type'		=> ['taller', 'talleres'], //para poder cambiar el tipo de regla (apuntar a una pagina por ejemplo con pagename),
        // 'rb_config'             => array(
        //     'templates'             => array(
        //         'single'                => 'test.php'
        //     ),
        // ),
    ),
    'metaboxes'     => array(
        'ta_taller_cintillo' => array(
            'settings'  => array(
                'title'             => __('Cintillo', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'description'             => __('Texto del cintillo', 'ta-genosha'),
                        'input_type'            => 'text',
                    ),
                ),
            ),
        ),
        'ta_taller_classes' => array(
            'settings'  => array(
                'title'             => __('Encuentros', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'description'             => __('Encuentros', 'ta-genosha'),
                        'input_type'            => 'text',
                    ),
                ),
            ),
        ),
        'ta_taller_vidriera' => array(
            'settings'  => array(
                'title'             => __('¿Mostrar en vidriera?', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'input_type'            => 'checkbox',
                    ),
                ),
            ),
        ),
        'ta_taller_opening_date' => array(
            'settings'  => array(
                'title'             => __('Fecha de inicio', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'date'      => array(
                        'controls'  => array(
                            'price'      => array(
                                'label'     => __('Fecha', 'ta-genosha'),
                                'input_type'    => 'date',
                            ),
                        ),
                    ),
                    'time'      => array(
                        'controls'  => array(
                            'price'      => array(
                                'label'     => __('Hora', 'ta-genosha'),
                                'input_type'    => 'time',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ta_taller_inscription_button' => array(
            'settings'  => array(
                'title'             => __('Link de inscripción', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'input_type'            => 'text',
                    ),
                ),
            ),
        ),
        'ta_taller_video' => array(
            'settings'  => array(
                'title'             => __('Video de YouTube', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'input_type'            => 'text',
                    ),
                ),
            ),
        ),
        'ta_taller_price' => array(
            'settings'  => array(
                'title'             => __('Aranceles', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'general'      => array(
                        'controls'  => array(
                            'price'      => array(
                                'label'     => __('General', 'ta-genosha'),
                                'input_type'    => 'text',
                            ),
                        ),
                    ),
                    'community'      => array(
                        'controls'  => array(
                            'price'      => array(
                                'label'     => __('Comunidad Tiempo', 'ta-genosha'),
                                'input_type'    => 'text',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ta_taller_teachers' => array(
            'settings'  => array(
                'title'             => __('Tallerista', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'repeater'          => array(
                    'item_title'        => 'Tallerista ($n)',
                    'accordion'         => true,
                ),
                'controls'        => array(
                    'name'      => array(
                        'controls'  => array(
                            'name'      => array(
                                'label'     => __('Nombre', 'ta-genosha'),
                                'input_type'    => 'text',
                            ),
                        ),
                    ),
                    'bio'      => array(
                        'controls'  => array(
                            'bio'      => array(
                                'label'     => __('Mini bio', 'ta-genosha'),
                                'input_type'    => 'textarea',
                            ),
                        ),
                    ),
                    'photo'      => array(
                        'controls'		=> array(
                            'media'      => array(
                                'label'     => __('Foto', 'ta-genosha'),
                                'type'          => 'RB_Media_Control',
                                'store_value'   => 'id',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    
);
