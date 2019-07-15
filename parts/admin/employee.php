<?php
function register_employee() {
    register_post_type('employee', array(
        'label'  => 'employee',
        'labels' => array(
            'name'               => 'Сотрудники',
            'singular_name'      => 'Сотрудник',
            'add_new'            => 'Добавить сотрудника',
            'add_new_item'       => 'Новый сотрудник',
            'edit_item'          => 'Редактирование записи',
            'new_item'           => 'Новый сотрудник',
            'view_item'          => 'Смотреть сотрудника',
            'search_items'       => 'Найти сотрудника',
            'not_found'          => 'Сотрудник не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'menu_name'          => 'Сотрудники',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessperson',
        'hierarchical' => false,
        'supports' => array(
            'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail',
        ),
    ));
}

add_action('init', 'register_employee', 2);

function employee_position_callback($post){

    $position = get_post_meta($post->ID, 'employee_position', true);

    echo '<textarea style="width: 100%" rows="4" name="position" required value="'.($position ? $position : "").'" />'

        . $position.'</textarea>';


}

function init_employee_position() {
    add_meta_box(
        'employee_position',
        'Должность',
        'employee_position_callback',
        ['employee'],
        'side',
        'high'
    );
}

add_action('add_meta_boxes', 'init_employee_position');

function employee_position_save($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
    if (!current_user_can('edit_post', $post_id)) {return;}

    $position = $_POST['position'];

    if($position){
        update_post_meta($post_id, 'employee_position', $position);
    }

}

add_action('save_post', 'employee_position_save');


?>