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
            'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail'
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
                echo '<input type="radio" value="'.$department->ID.'" checked  name="institutions_filters"/>';
                echo '<span>'.$department->post_title.'</span>';
                echo '<br>';
            } else {
                echo '<input type="radio" value="'.$department->ID.'" name="institutions_filters"/>';
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

function get_employee($post_ID){
    $items = [];

    $employees = query_posts('post_type=employee');

    foreach ($employees as $employee){
        $emp_depart_id = get_post_meta($employee->ID, 'depart_id', true);
        $emp_depart_id = (int)$emp_depart_id;

        if($emp_depart_id === $post_ID){
            $items[] = $employee;
        }
    }
    return $items;
}

function depart_program_callback($post){

    $program = get_post_meta($post->ID, 'depart_program', true);

    wp_editor($program, 'depart_program_data', array(
        'wpautop'       => 1,
        'media_buttons' => 1,
        'textarea_name' => 'depart_program_data', //нужно указывать!
        'textarea_rows' => 20,
        'tabindex'      => null,
        'editor_css'    => '',
        'editor_class'  => '',
        'teeny'         => 0,
        'dfw'           => 0,
        'tinymce'       => 1,
        'quicktags'     => 1,
        'drag_drop_upload' => false
    ) );


}

function init_program() {
    add_meta_box(
        'depart_program',
        'Программа',
        'depart_program_callback',
        ['departments'],
        'advanced',
        'high'
    );
}

add_action('add_meta_boxes', 'init_program');

function depart_program_save($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;}
    if (!current_user_can('edit_post', $post_id)) {return;}

    $program = $_POST['depart_program_data'];


    if($program){
        update_post_meta($post_id, 'depart_program', $program);
    }

}

add_action('save_post', 'depart_program_save');

?>