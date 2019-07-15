<?php
function register_departments() {
    register_post_type('departments', array(
        'label'  => 'departments',
        'labels' => array(
            'name'               => 'Подразделения',
            'singular_name'      => 'Подразделение',
            'add_new'            => 'Добавить подразделение',
            'add_new_item'       => 'Новое подразделение',
            'edit_item'          => 'Редактирование подразделение',
            'new_item'           => 'Новое подразделение',
            'view_item'          => 'Смотреть подразделение',
            'search_items'       => 'Найти подразделение',
            'not_found'          => 'Подразделение не найдено',
            'not_found_in_trash' => 'Не найдено в корзине',
            'menu_name'          => 'Подразделения',
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-admin-multisite',
        'hierarchical' => false,
        'supports' => array(
            'title', 'editor', 'comments', 'author',
        ),
    ));
}

add_action('init', 'register_departments', 2);


//add departments checkbox

function get_departments_filters() {
    $query = new WP_Query(array(
        'post_type'=> 'departments',
        'offset' => 0,
        'posts_per_page' => -1,
        'orderby' => array(
            'date' => ''
        ),
    ));

    if (!empty($query->posts)) {
        return $query->posts;
    } else {
        return false;
    }
}

function departments_metabox_callback($post){
    $departments = get_departments_filters();
    $departmentsIds = get_post_meta($post->ID, 'depart_id', true);
    if(!is_array($departmentsIds)) $departmentsIds = array($departmentsIds);

    if ($departments) {
        foreach ($departments as $department) {
            if (in_array($department->ID, $departmentsIds)) {
                echo '<input type="checkbox" value="'.$department->ID.'" checked  name="institutions_filters[]"/>';
                echo '<span>'.$department->post_title.'</span>';
                echo '<br>';
            } else {
                echo '<input type="checkbox" value="'.$department->ID.'" name="institutions_filters[]"/>';
                echo '<span>'.$department->post_title.'</span>';
                echo '<br>';
            }
        }
    }
}

function init_departments_metabox() {
    add_meta_box(
        'depart_list',
        'Подразделения',
        'departments_metabox_callback',
        ['employee'],
        'side',
        'high'
    );
}

add_action('add_meta_boxes', 'init_departments_metabox');

function departments_save($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
    if (!current_user_can('edit_post', $post_id)) {return;}

    $departmentsIds = $_POST['institutions_filters'];

    if($departmentsIds){
        update_post_meta($post_id, 'depart_id', $departmentsIds);
    }

}

add_action('save_post', 'departments_save');

function get_employee($post_id){
    $query = new WP_Query(array(
        'post_type'=> 'employee',
        'offset' => 0,
        'posts_per_page' => -1,
        'meta_key' => 'depart_id',
        'meta_query' => array(
            array(
                'key' => 'depart_id',
                'value' => array($post_id),
                'compare' => 'IN',
            )
        )
    ));

    if (!empty($query->posts)) {
        return $query->posts;
    } else {
        return false;
    }
}

?>