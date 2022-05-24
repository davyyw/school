<?php 
function fwd_register_custom_post_types() {//for registering CPT
    $labels = array(
        'name'               => _x( 'Staff', 'post type general name' ),
        'singular_name'      => _x( 'Staff', 'post type singular name'),
        'menu_name'          => _x( 'Staffs', 'admin menu' ),
        'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'staff' ),
        'add_new_item'       => __( 'Add New Staff' ),
        'new_item'           => __( 'New Staff' ),
        'edit_item'          => __( 'Edit Staff' ),
        'view_item'          => __( 'View Staff' ),
        'all_items'          => __( 'All Staffs' ),
        'search_items'       => __( 'Search Staffs' ),
        'parent_item_colon'  => __( 'Parent Staffs:' ),
        'not_found'          => __( 'No staffs found.' ),
        'not_found_in_trash' => __( 'No staffs found in Trash.' ),
        'archives'           => __( 'Staff Archives'),
        'insert_into_item'   => __( 'Insert into staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff'),
        'filter_item_list'   => __( 'Filter staffs list'),
        'items_list_navigation' => __( 'Staffs list navigation'),
        'items_list'         => __( 'Staffs list'),
        'featured_image'     => __( 'Staff featured image'),
        'set_featured_image' => __( 'Set staff featured image'),
        'remove_featured_image' => __( 'Remove staff featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );
    $args = array(
        'labels'             => $labels,
        'description'   => 'Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staffs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title'),
    );
    register_post_type( 'fwd-staff', $args );

    $labels = array(
        'name'               => _x( 'Student', 'post type general name' ),
        'singular_name'      => _x( 'Student', 'post type singular name'),
        'menu_name'          => _x( 'Students', 'admin menu' ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student' ),
        'all_items'          => __( 'All Students' ),
        'search_items'       => __( 'Search Students' ),
        'parent_item_colon'  => __( 'Parent Students:' ),
        'not_found'          => __( 'No students found.' ),
        'not_found_in_trash' => __( 'No students found in Trash.' ),
        'archives'           => __( 'Student Archives'),
        'insert_into_item'   => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'   => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'         => __( 'Students list'),
        'featured_image'     => __( 'Student featured image'),
        'set_featured_image' => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title','editor', 'thumbnail'),
        'template' => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Add Description...',
            ) ),
            array( 'core/button', array(
                'placeholder' => 'Add Link...',
            ) ),
        ),
        'template_lock' => 'all',
    );
    register_post_type( 'fwd-student', $args );

}
add_action( 'init', 'fwd_register_custom_post_types' );

function fwd_register_taxonomies() { // Add Work Category taxonomy
    $labels = array(
        'name'              => _x( 'Staffs', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staffs' ),
        'all_items'         => __( 'All Staff' ),
        'parent_item'       => __( 'Parent Staff Category' ),
        'parent_item_colon' => __( 'Parent Staff Category:' ),
        'edit_item'         => __( 'Edit Staff Category' ),
        'view_item'         => __( 'View Staff Category' ),
        'update_item'       => __( 'Update Staff Category' ),
        'add_new_item'      => __( 'Add New Staff Category' ),
        'new_item_name'     => __( 'New Staff Category Name' ),
        'menu_name'         => __( 'Staff Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff-categories' ),
    );
register_taxonomy( 'fwd-stafftype', array( 'fwd-staff' ), $args );

$labels = array(
    'name'              => _x( 'Students', 'taxonomy general name' ),
    'singular_name'     => _x( 'Student', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Students' ),
    'all_items'         => __( 'All Student' ),
    'parent_item'       => __( 'Parent Student Category' ),
    'parent_item_colon' => __( 'Parent Student Category:' ),
    'edit_item'         => __( 'Edit Student Category' ),
    'view_item'         => __( 'View Student Category' ),
    'update_item'       => __( 'Update Student Category' ),
    'add_new_item'      => __( 'Add New Student Category' ),
    'new_item_name'     => __( 'New Student Category Name' ),
    'menu_name'         => __( 'Student Category' ),
);
$args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_menu'      => true,
    'show_in_nav_menu'  => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'student-categories' ),
);
register_taxonomy( 'fwd-studenttype', array( 'fwd-student' ), $args );
}
add_action( 'init', 'fwd_register_taxonomies');

//flushes permalinks when switching themes
function fwd_rewrite_flush() {
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fwd_rewrite_flush' );