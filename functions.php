<?php 
//styles
function enqueue_styles(){  
    wp_enqueue_style('reset', get_template_directory_uri() .'/css/reset.css', null, false);
    wp_enqueue_style('main', get_template_directory_uri() .'/css/main.css', null, false);
    wp_enqueue_style('swiper', get_template_directory_uri() .'/css/swiper.css', null, false);
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
//scripts
function enqueue_script(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery-3.2.1.min.js', null, true);
    wp_enqueue_script('common_js', get_template_directory_uri() .'/js/common.js', array('jquery'), null, true);
    wp_enqueue_script('swiper', get_template_directory_uri() .'/js/swiper.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper_main', get_template_directory_uri() .'/js/swiper-main.js', array('jquery', 'swiper'), null, true);
    wp_enqueue_script('map', get_template_directory_uri() .'/js/map.js', array('jquery', 'swiper'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_script');
//header_menu
register_nav_menu('Header', 'Меню хэдера');

//add thumbnails
add_theme_support( 'post-thumbnails' );

require_once ('parts/admin/departments.php');
require_once ('parts/admin/employee.php');
require_once ('parts/admin/service.php');

?>