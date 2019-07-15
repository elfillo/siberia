<?php
function register_services() {
    register_post_type('services', array(
        'label'  => 'services',
        'labels' => array(
            'name'               => 'Услуги',
            'singular_name'      => 'Услуга',
            'add_new'            => 'Добавить услугу',
            'add_new_item'       => 'Новая услуга',
            'edit_item'          => 'Редактирование услуги',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Смотреть услугу',
            'search_items'       => 'Найти услугу',
            'not_found'          => 'Услуг не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'menu_name'          => 'Услуги',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-universal-access-alt',
        'hierarchical' => false,
        'supports' => array(
            'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail'
        ),
    ));
}

add_action('init', 'register_services', 2);
?>