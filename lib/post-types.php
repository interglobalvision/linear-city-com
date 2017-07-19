<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-property .dashicons-admin-post:before {
  content: "\f541";
}
#menu-posts-project .dashicons-admin-post:before {
  content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//Register Custom Post Types
add_action( 'init', 'register_cpt_property' );

function register_cpt_property() {

  $labels = array(
    'name' => _x( 'Properties', 'property' ),
    'singular_name' => _x( 'Property', 'property' ),
    'add_new' => _x( 'Add New', 'property' ),
    'add_new_item' => _x( 'Add New Property', 'property' ),
    'edit_item' => _x( 'Edit Property', 'property' ),
    'new_item' => _x( 'New Property', 'property' ),
    'view_item' => _x( 'View Property', 'property' ),
    'search_items' => _x( 'Search Properties', 'property' ),
    'not_found' => _x( 'No properties found', 'project' ),
    'not_found_in_trash' => _x( 'No properties found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Property:', 'property' ),
    'menu_name' => _x( 'Properties', 'property' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'property', $args );
}

add_action( 'init', 'register_cpt_press_quote' );

function register_cpt_press_quote() {

  $labels = array(
    'name' => _x( 'Press Quotes', 'press_quote' ),
    'singular_name' => _x( 'Press Quote', 'press_quote' ),
    'add_new' => _x( 'Add New', 'press_quote' ),
    'add_new_item' => _x( 'Add New Press Quote', 'press_quote' ),
    'edit_item' => _x( 'Edit Press Quote', 'press_quote' ),
    'new_item' => _x( 'New Press Quote', 'press_quote' ),
    'view_item' => _x( 'View Press Quote', 'press_quote' ),
    'search_items' => _x( 'Search Press Quotes', 'press_quote' ),
    'not_found' => _x( 'No press quotes found', 'project' ),
    'not_found_in_trash' => _x( 'No press quotes found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Press Quote:', 'press_quote' ),
    'menu_name' => _x( 'Press Quotes', 'press_quote' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'press_quote', $args );
}


add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

  $labels = array(
    'name' => _x( 'Projects', 'project' ),
    'singular_name' => _x( 'Project', 'project' ),
    'add_new' => _x( 'Add New', 'project' ),
    'add_new_item' => _x( 'Add New Project', 'project' ),
    'edit_item' => _x( 'Edit Project', 'project' ),
    'new_item' => _x( 'New Project', 'project' ),
    'view_item' => _x( 'View Project', 'project' ),
    'search_items' => _x( 'Search Projects', 'project' ),
    'not_found' => _x( 'No projects found', 'project' ),
    'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
    'parent_item_colon' => _x( 'Parent Project:', 'project' ),
    'menu_name' => _x( 'Projects', 'project' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,

    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'project', $args );
}
