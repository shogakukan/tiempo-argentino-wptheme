<?php

class Widgets_Theme_TA
{
    public function __construct()
    {

        //HOME DESKTOP
        add_action('widgets_init', [$this, 'home_desktop_widgets']);
        add_action('widgets_init', [$this, 'home_desktop_pop']);
        add_action('widgets_init', [$this, 'home_desktop_fixed']);
        add_action('widgets_init', [$this, 'home_desktop_vslider']);

        //HOME MOBILE
        add_action('widgets_init', [$this, 'home_mobile_widgets']);
        add_action('widgets_init', [$this, 'home_mobile_pop']);
        add_action('widgets_init', [$this, 'home_mobile_fixed']);
        add_action('widgets_init', [$this, 'home_mobile_vslider']);

        //ARTICLE DESKTOP
        add_action('widgets_init', [$this, 'article_desktop_widgets']);
        add_action('widgets_init', [$this, 'article_desktop_paragraph_2_3']);
        add_action('widgets_init', [$this, 'article_desktop_paragraph_3_4']);

        //ARTICLE MOBILE
        add_action('widgets_init', [$this, 'article_mobile_widgets']);
        add_action('widgets_init', [$this, 'article_mobile_paragraph_2_3']);

        //OTHERS
        add_action('widgets_init', [$this, 'section_widgets']);
        add_action('widgets_init', [$this, 'micrositio_widgets']);

        //AMP
        add_action('widgets_init', [$this, 'article_amp_widgets']);

        //INSERTIONS
        add_filter('the_content', [$this, 'insert_home_rows']);
        //add_action('widgets_init', [$this, 'insert_article_mobile_paragraph_2_3']);
        add_filter('the_content', [$this, 'insert_article_desktop_paragraph_2_3']);
        add_filter('the_content', [$this, 'insert_article_amp_posimage']);
        add_filter('the_content', [$this, 'insert_article_amp_paragraph_3_4']);
        add_filter('the_content', [$this, 'insert_article_desktop_paragraph_3_4']);
        add_filter('the_content', [$this, 'insert_article_mobile_paragraph_2_3']);
    }

    public function home_desktop_widgets()
    {
        $widgets = [
            'home_desk_preheader' => __('Home Desktop - Preheader', 'gen-base-theme'),
            'home_desk_posheader' => __('Home Desktop - Posheader', 'gen-base-theme'),
            'home_desk_row_1_2' => __('Home Desktop  - Fila 1-2', 'gen-base-theme'),
            'home_desk_row_3_4' => __('Home Desktop - Fila 3-4', 'gen-base-theme'),
            'home_desk_row_5_6' => __('Home Desktop - Fila 5-6', 'gen-base-theme'),
            'home_desk_row_7_8' => __('Home Desktop - Fila 7-8', 'gen-base-theme'),
            'home_desk_row_9_10' => __('Home Desktop - Fila 9-10', 'gen-base-theme')
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    public function article_desktop_widgets()
    {
        $widgets = [
            'article_desktop_preheader' => __('Nota Desktop - Preheader en nota', 'gen-base-theme'),
            'article_desktop_posheader' => __('Nota Desktop - Posheader', 'gen-base-theme'),
            'article_desktop_sidebar' => __('Nota Desktop - Sidebar', 'gen-base-theme'),
            'article_desktop_calltoaction' => __('Nota Desktop - Call to action', 'gen-base-theme'),
            'article_desktop_postext' => __('Nota Desktop - Abajo nota', 'gen-base-theme'),
            'article_desktop_postcomments' => __('Nota Desktop - Abajo comentarios', 'gen-base-theme'),
            'article_desktop_sidecomments' => __('Nota Desktop - Lado comentarios', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    public function home_mobile_fixed()
    {

        register_sidebar(array(
            'name'          => __('Home Mobile - Fija Abajo', 'gen-base-theme'),
            'id'            => 'home_mobile_fixed',
            'before_widget' => '<div id="sticky-abajo" class="d-block d-sm-none d-md-none d-lg-none position-fixed text-center">
            <div class="sticky-bajo mobile-fixed">
                <span class="cerrar-pop-abajo mobile-pop-close">
                    <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
                </span>',
            'after_widget'  => ' </div>
            </div>',
        ));
    }

    public function home_desktop_fixed()
    {
        register_sidebar(array(
            'name'          => __('Home Desktop - Fija Abajo', 'gen-base-theme'),
            'id'            => 'home_desktop_fixed',
            'before_widget' => '<div id="sticky-abajo" class="d-none d-sm-none d-md-block d-lg-block position-fixed text-center">
            <div class="sticky-bajo">
                <span class="cerrar-pop-abajo">
                    <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
                </span>',
            'after_widget'  => '</div>
            </div>',
        ));
    }

    public function home_mobile_vslider()
    {
        register_sidebar(array(
            'name'          => __('Home Mobile - VSlider', 'gen-base-theme'),
            'id'            => 'home_mobile_vslider',
            'before_widget' => '<div id="popup-avis" class="d-block d-sm-none d-md-none d-lg-none position-fixed">
            <div class="popup popup-mobile">
                <span class="cerrar-pop pop-mobile-close">
                    <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
                </span>
                ',
            'after_widget'  => ' </div>
            </div>',
        ));
    }

    public function home_desktop_vslider()
    {
        register_sidebar(array(
            'name'          => __('Home Desktop - VSlider', 'gen-base-theme'),
            'id'            => 'home_desktop_vslider',
            'before_widget' => ' <div id="vslider" class="d-none d-sm-none d-md-block d-lg-block position-fixed text-center">
            <div class="video-bajo">
                <span class="cerrar-vslider-desktop">
                    <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
                </span>',
            'after_widget'  => '</div>
            </div>',
        ));
    }

    public function home_desktop_pop()
    {
        register_sidebar(array(
            'name'          => __('Home Desktop - Popup', 'gen-base-theme'),
            'id'            => 'home_desktop_pop',
            'before_widget' => '<div id="popup-avis" class="d-none d-sm-none d-md-block d-lg-block position-fixed">
            <div class="popup">
                <span class="cerrar-pop">
                    <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
                </span>',
            'after_widget'  => '</div>
            </div>',
        ));
    }

    public function home_mobile_pop()
    {
        register_sidebar(array(
            'name'          => __('Home Mobile - Popup', 'gen-base-theme'),
            'id'            => 'home_mobile_pop',
            // 'before_widget' => '<div id="popup-avis-pop" class="popup-mobile popup d-block d-sm-none d-md-none d-lg-none position-fixed">
            // <div class="popup">
            //     <span class="cerrar-pop cerrar-pop-mobile">
            //         <img src="' . get_stylesheet_directory_uri() . '/assets/img/times-circle-regular.svg" />
            //     </span>',
            // 'after_widget'  => '</div>
            // </div>',
        ));
    }

    public function home_mobile_widgets()
    {
        $widgets = [
            'home_mob_posheader' => __('Home Mobile - Posheader', 'gen-base-theme'),
            'home_mob_row_1_2' => __('Home Mobile - Entre filas 1-2', 'gen-base-theme'),
            'home_mob_row_2_3' => __('Home Mobile - Entre filas 2-3', 'gen-base-theme'),
            'home_mob_row_3_4' => __('Home Mobile - Entre filas 3-4', 'gen-base-theme'),
            'home_mob_row_4_5' => __('Home Mobile - Entre filas 4-5', 'gen-base-theme'),
            'home_mob_row_5_6' => __('Home Mobile - Entre filas 5-6', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    public function article_mobile_widgets()
    {
        $widgets = [
            'article_mobile_posheader' => __('Nota Mobile - Posheader', 'gen-base-theme'),
            'article_mobile_postimage' => __('Nota Mobile - Posfoto', 'gen-base-theme'),
            'article_mobile_calltoaction' => __('Nota Mobile CallToAction', 'gen-base-theme'),
            'article_mobile_postext' => __('Nota Mobile - Posnota', 'gen-base-theme'),
            'article_mobile_precomments' => __('Nota Mobile - Precomentarios', 'gen-base-theme'),
            'article_mobile_popup' => __('Nota Mobile - Popup', 'gen-base-theme'),
            // 'note_mob_4' => __('Note Bajo Newsletter Mobi', 'gen-base-theme'),
            // 'note_mob_5' => __('Note Comentarios Mobi', 'gen-base-theme'),
            // 'note_mob_6' => __('Relacionados Mobi', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    /**
     * Middle note
     */

    public function article_desktop_paragraph_2_3()
    {
        register_sidebar(array(
            'name'          => __('Nota Desktop - Párrafo 2-3', 'gen-base-theme'),
            'id'            => 'article_desktop_paragraph_2_3',
            'before_widget' => '<div class="col-7 entre-1 mx-auto mt-5 mb-5 d-none d-ms-none d-md-block d-lg-block">',
            'after_widget'  => '</div>',
        ));
    }

    public function article_desktop_paragraph_3_4()
    {
        register_sidebar(array(
            'name'          => __('Nota Desktop - Párrafo 3-4', 'gen-base-theme'),
            'id'            => 'article_desktop_paragraph_3_4',
            'before_widget' => '<div class="col-7 entre-2 mx-auto mt-5 mb-5 d-none d-ms-none d-md-block d-lg-block">',
            'after_widget'  => '</div>',
        ));
    }

    public function article_mobile_paragraph_2_3()
    {
        $widgets = [
            'article_mobile_paragraph_2_3' => __('Nota Mobile - Párrafo 2-3', 'gen-base-theme'),
            //  'note_mob_mid_2' => __('Nota Mobile - Párrafo 3-4', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '<div class="d-block d-sm-none d-md-none d-lg-none mt-3 mb-3 max-auto col-12 text-center">',
                'after_widget'  => '</div>',
            ));
        }
    }

    public function article_amp_widgets()
    {
        $widgets = [
            'article_amp_posimage' => __('Nota AMP - Posfoto', 'gen-base-theme'),
            'article_amp_paragraph_3_4' => __('Nota AMP - Párrafos 3-4', 'gen-base-theme'),
            'article_amp_prerelated' => __('Nota AMP - Arriba de relacionadas', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    public function get_article_amp_posimage()
    {
        if (is_active_sidebar('article_amp_posimage')) :
            return dynamic_sidebar('article_amp_posimage');
        endif;
    }

    public function get_article_amp_paragraph_3_4()
    {
        if (is_active_sidebar('article_amp_paragraph_3_4')) :
            return dynamic_sidebar('article_amp_paragraph_3_4');
        endif;
    }

    public function article_amp_prerelated()
    {
        if (is_active_sidebar('article_amp_prerelated')) :
            $publi = '<div class="publi-amp-before-related">';
            $publi .= dynamic_sidebar('article_amp_prerelated');
            $publi .= '</div>';
            return $publi;
        endif;
    }

    public function insert_article_amp_paragraph_3_4($content)
    {
        if (get_post_type(get_the_ID()) == 'ta_article') {
            ob_start();
            $this->get_article_amp_paragraph_3_4();
            $widget_area_html_2 = ob_get_clean();

            if (is_single() && !is_admin() && function_exists('ampforwp_is_amp_endpoint') && ampforwp_is_amp_endpoint()) {
                return $this->insert_after_paragraph($widget_area_html_2, 3, $content);
            }
        }
        return $content;
    }

    public function get_article_desktop_paragraph_2_3()
    {
        if (is_active_sidebar('article_desktop_paragraph_2_3')) :
            return dynamic_sidebar('article_desktop_paragraph_2_3');
        endif;
    }

    public function get_article_desktop_paragraph_3_4()
    {
        if (is_active_sidebar('article_desktop_paragraph_3_4')) :
            return dynamic_sidebar('article_desktop_paragraph_3_4');
        endif;
    }

    public function get_article_mobile_paragraph_2_3()
    {
        if (is_active_sidebar('article_mobile_paragraph_2_3')) :
            return dynamic_sidebar('article_mobile_paragraph_2_3');
        endif;
    }


    public function insert_article_desktop_paragraph_2_3($content)
    {

        if (get_post_type(get_the_ID()) == 'ta_article') {
            ob_start();
            $this->get_article_desktop_paragraph_2_3();
            $widget_area_html = ob_get_clean();
            $class = 'widget-text wp_widget_plugin_box';

            if (is_single() && !is_admin() && (!function_exists('ampforwp_is_amp_endpoint') || (function_exists('ampforwp_is_amp_endpoint') && !ampforwp_is_amp_endpoint()))) {
                return $this->insert_after_paragraph($widget_area_html, 2, $content);
            }
        }
        return $content;
    }

    public function insert_article_desktop_paragraph_3_4($content)
    {

        if (get_post_type(get_the_ID()) == 'ta_article') {
            ob_start();
            $this->get_article_desktop_paragraph_3_4();
            $widget_area_html_2 = ob_get_clean();
            $class = 'widget-text wp_widget_plugin_box';
            str_replace($class, $class . ' entre-2', $widget_area_html_2);

            if (is_single() && !is_admin() && (!function_exists('ampforwp_is_amp_endpoint') || (function_exists('ampforwp_is_amp_endpoint') && !ampforwp_is_amp_endpoint()))) {
                return $this->insert_after_paragraph($widget_area_html_2, 3, $content);
            }
        }
        return $content;
    }

    public function insert_article_mobile_paragraph_2_3($content)
    {

        if (get_post_type(get_the_ID()) == 'ta_article') {
            ob_start();
            $this->get_article_mobile_paragraph_2_3();
            $widget_area_html_3 = ob_get_clean();

            if (is_single() && !is_admin() && (!function_exists('ampforwp_is_amp_endpoint') || (function_exists('ampforwp_is_amp_endpoint') && !ampforwp_is_amp_endpoint()))) {
                return $this->insert_after_paragraph($widget_area_html_3, 2, $content);
            }
        }
        return $content;
    }




    public function insert_after_paragraph($insertion, $paragraph_id, $content)
    {
        $closing_p = '</p>';
        $paragraphs = explode($closing_p, $content);

        foreach ($paragraphs as $index => $paragraph) {
            if (trim($paragraph)) {
                $paragraphs[$index] .= $closing_p;
            }

            if ($paragraph_id == $index + 1) {
                $paragraphs[$index] .= $insertion;
            }
        }

        return implode('', $paragraphs);
    }

    public function insert_article_amp_posimage($content)
    {
        if (get_post_type(get_the_ID()) == 'ta_article') {
            ob_start();
            $this->get_article_amp_posimage();
            $widget_area_html_2 = ob_get_clean();

            if (is_single() && !is_admin() && function_exists('ampforwp_is_amp_endpoint') && ampforwp_is_amp_endpoint()) {
                return $this->insert_before_paragraph($widget_area_html_2, 1, $content);
            }
        }
        return $content;
    }

    public function insert_before_paragraph($insertion, $paragraph_id, $content)
    {
        $closing_p = '<p>';
        $paragraphs = explode($closing_p, $content);

        foreach ($paragraphs as $index => $paragraph) {
            if (trim($paragraph)) {
                $paragraphs[$index] .= $closing_p;
            }

            if ($paragraph_id == $index + 1) {
                $paragraphs[$index] .= $insertion;
            }
        }

        return implode('', $paragraphs);
    }
    /**
     * Middle note
     */

    public function shortcode_portada($code)
    {
        return ADF()->show_ad($code);
    }

    /**
     * Sección
     */
    public function section_widgets()
    {
        $widgets = [
            'section_desktop_preheader' => __('Sección Desktop - Preheader', 'gen-base-theme'),
            'section_desktop_posheader' => __('Sección Desktop  - Posheader', 'gen-base-theme'),
            'section_desktop_sidebar_1' => __('Sección Desktop  - Sidebar 1', 'gen-base-theme'),
            'section_desktop_sidebar_2' => __('Sección Desktop  - Sidebar 2', 'gen-base-theme'),
            'section_mobile_posheader' => __('Sección Mobile  - Posheader', 'gen-base-theme'),
            'section_mobile_posarticles' => __('Sección Mobile - Posnotas', 'gen-base-theme'),
            'section_mobile_pospagination' => __('Sección Mobile - Pospaginación', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    /**
     * micrositio
     */
    public function micrositio_widgets()
    {
        $widgets = [
            'micrositio_desktop_posheader' => __('Micrositio Desktop - Posheader', 'gen-base-theme'),
            'micrositio_mobile_posheader' => __('Micrositio Mobile - Posheader', 'gen-base-theme'),
        ];

        foreach ($widgets as $key => $val) {
            register_sidebar(array(
                'name'          => $val,
                'id'            => $key,
                'before_widget' => '',
                'after_widget'  => '',
            ));
        }
    }

    function insert_home_rows($content)
    {
        if (is_front_page()) {
            $divider = '<!-- row divider -->';
            $preAdDesktop = '<div class="container d-none d-sm-none d-md-block mt-md-3 mb-md-3">' .
                '<div class="row d-flex">' .
                '<div class="mx-auto text-center">';
            $postAd = '</div>' .
                '</div>' .
                '</div>';

            $preAdMobile = '<div class="container d-block d-sm-none d-md-none d-lg-none mt-md-3 mb-md-3 text-center mt-3">' .
                '<div class="row d-flex">' .
                '<div class="col-12 mx-auto text-center">';

            $rows = explode($divider, $content);
            $result = "";

            $rows[0] = str_replace('lazy', '', $rows[0]);
            foreach ($rows as $index => $row) {
                $result .= $row;

                if ($index < 11) {
                    $adCode = 'home_desk_row_' . ($index + 1) . "_" . ($index + 2);
                    if (is_active_sidebar($adCode)) {
                        ob_start();
                        dynamic_sidebar($adCode);
                        $widget = ob_get_clean();
                        $result .= $preAdDesktop;
                        $result .= $widget;
                        $result .= $postAd;
                    }

                    if ($index < 6) {
                        $adCode = 'home_mob_row_' . ($index + 1) . "_" . ($index + 2);
                        if (is_active_sidebar($adCode)) {
                            ob_start();
                            dynamic_sidebar($adCode);
                            $widget = ob_get_clean();
                            $result .= $preAdMobile;
                            $result .= $widget;
                            $result .= $postAd;
                        }
                    }
                }
            }
            return $result;
        } else {
            return $content;
        }
    }
}


function widgets_ta()
{
    return new Widgets_Theme_TA();
}

widgets_ta();
