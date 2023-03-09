<?php
$block = RB_Gutenberg_Block::get_block('ta/article-preview');

if(!$block) return '';
extract($block->get_render_attributes());

if( !$article ){
    if( $article_data && $article_type ){
        $article = TA_Article_Factory::get_article($article_data, $article_type);
        if( !$article )
            return '';
    }
    else
        return '';
}

$block_path = plugin_dir_path( __FILE__ );
$thumb_cont_class = $desktop_horizontal ? 'col-3 p-0' : '' ;
$info_class = $desktop_horizontal ? 'mt-0 col-9' : '';
$video = $article->video;

$class = $class ? "$class" : "";
$title = $article->alt_title ? $article->alt_title : $article->title;
$cintillo = $article->cintillo;
$url = $article->url;
$authors = $show_authors ? $article->authors : null;

if(str_contains($size, 'large')){
    if ($size == 'mega-large'){
        $imgSize = 'full';
        $ratioKey = 'real_ratio';
    } else {
        $imgSize = 'destacado';
        $ratioKey = 'ratio';  
    }
    $class .= ' destacado';
} else {
    $imgSize = 'medium';
}
$thumbnail = $article->get_thumbnail_alt_common(null, $imgSize) ? $article->get_thumbnail_alt_common(null, $imgSize) : $article->get_thumbnail_common(null, $imgSize);//$article->thumbnail_alt_common ? $article->thumbnail_alt_common : $article->thumbnail_common;
$thumbnail_url = $thumbnail ? $thumbnail['url'] : '';
$img_ratio_style = $thumbnail && isset($ratioKey) ? 'padding-bottom: calc(100% * ' . $thumbnail[$ratioKey] . ');': '';

// if($desktop_horizontal == true)
//     $class .= ' horizontal';

if(!$deactivate_opinion_layout)
    $layout = $article->isopinion ? 'opinion' : $layout;

switch ($layout) {
    case 'opinion':
        include "$block_path/templates/opinion.php";
    break;
    case 'common-tiny':
        include "$block_path/templates/common-tiny.php";
    break;
    default:
        include "$block_path/templates/common.php";
    break;
}


ta_add_article_preview_shown($article);
?>
