<?php

// Custom hooks (like excerpt length etc)

// Remove default post type from menu
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
  remove_menu_page('edit.php');
}

// Redirect all press_quotes singles to /press
add_action( 'template_redirect', 'single_post_types_redirect' );

function single_post_types_redirect() {

  $queried_post_type = get_query_var('post_type');

  if ( is_single() && $queried_post_type == 'press_quote' ) { // If single press quote
    wp_redirect( get_post_type_archive_link('press_quote'), 302 ); // Redirect to press quotes archive
    // NOTE:
    // Status 302 means Found. More here: https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/302
    // This should be switched to 301 on prodution or after dev. It's 302
    // to avoid horrible redirect caching in the browser
    exit;
  } else if ( is_single() && $queried_post_type == '' ) { // If default post single
    wp_redirect( get_home_url(), 302 ); // Redirect to homepage
    exit;
  }
}

// Programatically create Home, What We Do and Filming pages
function create_custom_pages() {
  $custom_pages = array(
    'home' => 'Home',
    'what-we-do' => 'What We Do',
    'filming' => 'Filming',
  );

  foreach($custom_pages as $page_name => $page_title) {
    if( empty(get_page_by_path($page_name)) ) {
      wp_insert_post( array(
        'post_type' => 'page',
        'post_title' => $page_title,
        'post_name' => $page_name,
        'post_status' => 'publish'
      ));
    }
  }
}
add_filter( 'after_setup_theme', 'create_custom_pages' );

