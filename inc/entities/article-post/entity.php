<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
return array(
    'id'            => 'ta_article',
    'type'          => 'post_type',
    'args'          => array(
        'labels' 			=> array(
            'name' 				 => __( 'Artículos' ),
            'singular_name' 	 => __( 'Artículo' ),
            'add_new'            => __( 'Agregar' ),
            'add_new_item'       => __( 'Agregar nuevo Artículo' ),
            'edit_item'          => __( 'Editar Artículo' ),
            'new_item'           => __( 'Nuevo Artículo' ),
            'view_item'          => __( 'Ver' ),
            'search_items'       => __( 'Buscar Artículo' ),
            'not_found'          => __( 'No se encontraron artículos' ),
            'not_found_in_trash' => __( 'No se encontraron artículos' ),
        ),
        'public' 				=> true,
        'has_archive' 			=> 'articulos', //slug para archivo (usado por fecha en este caso)
        'rewrite' 				=>  true, //true para que si tenga url amigable y no definimos slug para poder sobre escribirlo como queramos
        'taxonomies'			=> ['ta_article_section'],
        'menu_position'			=> 5,
        'menu_icon'				=> TA_ASSETS_URL . '/img/articles-icon.png',
        'supports'				=> array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'comments'),
        'publicly_queryable' => true,
        'query_var'				=> true,
        'show_in_rest' 			=> true,
        'show_in_nav_menus' 	=> true,
        'post_per_page'			=> 10,
        'paged' 				=> $paged,
        'capability_type'		=> ['article', 'articles'], //para poder cambiar el tipo de regla (apuntar a una pagina por ejemplo con pagename),
        'capabilities'          => array(
            'delete_others_posts'               => 'delete_others_articles',
            'delete_posts'                      => 'delete_articles',
            'delete_private_posts'              => 'delete_private_articles',
            'delete_published_posts'            => 'delete_published_articles',
            'edit_others_posts'                 => 'edit_others_articles',
            'edit_posts'                        => 'edit_articles',
            'edit_private_posts'                => 'edit_private_articles',
            'edit_published_posts'              => 'edit_published_articles',
            'publish_posts'                     => 'publish_articles',
            'read_private_posts'                => 'read_private_articles',
        ),
        'map_meta_cap'          => true,
        "rb_config"			=> array(
            //     'templates'             => array(
            //         'single'                => 'test.php'
            //     ),
            'required_taxonomies'   => array(
                'ta_article_section'    => true,
            ),
        ),
    ),
    'metaboxes'     => array(
        'ta_article_alt_title' => array(
            'settings'  => array(
                'title'             => __('Título de portada', 'ta-genosha'),
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
        'ta_article_cintillo' => array(
            'settings'  => array(
                'title'             => __('Cintillo', 'ta-genosha'),
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
        'ta_article_isopinion' => array(
            'settings'  => array(
                'title'             => __('Opinión', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'description'             => __('Es artículo de opinión', 'ta-genosha'),
                        'input_type'            => 'checkbox',
                    ),
                ),
            ),
        ),
        'ta_article_special_format' => array(
            'settings'  => array(
                'title'             => __('Formato especial', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'description'    => __('Dejar vacío si es una nota normal', 'ta-genosha'),
                        'input_type'        => 'select',
                        'choices'            => array('audiovisual' => 'Audiovisual', 'fotogaleria' => 'Fotogalería')     
                    ),
                ),
            ),
        ),
        'ta_article_video' => array(
            'settings'  => array(
                'title'             => __('Video', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
            ),
            'input'  => array(
                'controls'        => array(
                    'text'   => array(
                        'label'             => __('Código de YouTube', 'ta-genosha'),
                        'description'       => __('Pegar la dirección URL entera del video', 'ta-genosha'),
                        'input_type'            => 'text',
                    ),
                ),
            ),
        ),
        'ta_article_gallery' => array(
            'settings'  => array(
                'title'             => __('Galeria', 'ta-genosha'),
                'context'           => 'side',
                'priority'          => 'high',
                'classes'           => array('ta-metabox'),
                'quick_edit'        => false,
            ),
            'input'  => array(
                'repeater'          => array(
                    'item_title'        => 'Media ($n)',
                    'accordion'         => true,
                ),
                'controls'		=> array(
                    'media'      => array(
                        'type'          => 'RB_Media_Control',
                        'store_value'   => 'id',
                    ),
                ),
            ),
        ),
    ),
);
