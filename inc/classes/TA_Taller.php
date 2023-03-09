<?php

/**
*   Common article data
*/

class TA_Taller extends Data_Manager{
    public $post = null;

    protected $defaults = array(
        'ID'                    => null,
        'title'                 => '',
        'excerpt'               => '',
        'excerpt_trimmed'       => '',
        'date'                  => '',
        'publication_info'      => '',
        'content'               => '',
        'cintillo'              => '',
        'encuentros'            => '',
        'thumbnail_common'      => null,
        'thumbnail_square'      => null,
        'thumbnail_16_9'        => null,
        'url'                   => '',
        'video'                 => '',
        'inscription_button'    => '',
        'opening_date'          => '',
        'price'                 => null,
        'teachers'              => null,    
    );

    public function __construct($post){
        $this->post = $post;
    }

    protected function get_ID(){
        return $this->post->ID;
    }

    
    protected function get_title(){
        return get_the_title($this->post);
    }

    protected function get_excerpt(){
        return $this->post->post_excerpt;
    }

    protected function get_excerpt_trimmed(){
        $excerpt_words = explode(' ', $this->excerpt);
        return count($excerpt_words) > 8 ? implode(' ', array_slice($excerpt_words, 0, 8)) . " " . '...' : $this->excerpt;
    }

    protected function get_url(){
        return get_permalink($this->post);
    }


    public function get_thumbnail_common($variation = null, $size = 'full'){
        $thumbnail_id = get_post_thumbnail_id($this->post);
        $attachment = $thumbnail_id ? get_post( $thumbnail_id ) : null;
        $thumb_data = null;

        if( !$attachment ){
            $thumb_data = array(
                'attachment'    => null,
                'url'           => TA_IMAGES_URL . '/article-no-image.jpg',
                'caption'       => '',
                'author'        => null,
                'position'      => null,
                'alt'           => __('No hay imagen', 'ta-genosha'),
                'is_default'    => true,
            );
        }
        else {
            $alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
            $thumb_data = array(
                'attachment'    => $attachment,
                'url'           => wp_get_attachment_image_url($attachment->ID, $size, false),
                'caption'       => has_excerpt($attachment) ? get_the_excerpt($attachment) : '',
                'author'        => ta_get_attachment_photographer($attachment->ID),
                'position'      => ta_get_attachment_positions($attachment->ID),
                'alt'           => $alt ? $alt : '',
                'is_default'    => false,
            );
        }

        return $thumb_data;
    }

    public function get_thumbnail_alt_common($variation = null, $size = 'full'){
        $thumbnail_id = get_post_meta($this->post->ID, 'ta_article_thumbnail_alt', true);
        $attachment = $thumbnail_id ? get_post( $thumbnail_id ) : null;
        $thumb_data = null;

        if( $attachment ){
            $alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
            $thumb_data = array(
                'attachment'    => $attachment,
                'url'           => wp_get_attachment_image_url($attachment->ID, $size, false),
                'caption'       => has_excerpt($attachment) ? get_the_excerpt($attachment) : '',
                'author'        => ta_get_attachment_photographer($attachment->ID),
                'position'      => ta_get_attachment_positions($attachment->ID),
                'alt'           => $alt ? $alt : '',
                'is_default'    => false,
            );
        }

        return $thumb_data;
    }

    /**
    *   @return string
    */
    public function get_cintillo(){
        return get_post_meta($this->post->ID, 'ta_taller_cintillo', true);
    }

    /**
    *   @return string
    */
    public function get_encuentros(){
        return get_post_meta($this->post->ID, 'ta_taller_classes', true);
    }

    /**
    *   @return string
    */

    public function get_video(){
        $video_code = get_post_meta($this->post->ID, 'ta_taller_video', true);
        return get_youtube_code($video_code);
    }

    /**
    *   @return string
    */

    public function get_inscription_button(){
        return get_post_meta($this->post->ID, 'ta_taller_inscription_button', true);
    }

    /**
    *   @return Date
    */

    public function get_opening_date(){
        $datetime = get_post_meta($this->post->ID, 'ta_taller_opening_date', true);
        $date = isset($datetime['date']) ? $datetime['date'] : "";
        $time = isset($datetime['time']) ? $datetime['time'] : "";
        if ($date) {
            setlocale(LC_ALL,"es_AR");
            $format = 'j \d\e F \d\e Y';
            $datetimeFormated = date_i18n($format, strtotime($date));
            if ($time) $datetimeFormated .= " a las " . $time . "hs";
            return $datetimeFormated;
        }
        return null;
    }


    public function get_price(){
        return get_post_meta($this->post->ID, 'ta_taller_price', true);
    }

    public function get_teachers(){
        return get_post_meta($this->post->ID, 'ta_taller_teachers', true);
    }

    protected function get_content(){
        return get_the_content($this->post->ID);
    }

}
