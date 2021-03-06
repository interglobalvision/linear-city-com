<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */


  // PROPERTY METABOXES
  $cmb_property = new_cmb2_box( array(
    'id'            => $prefix . 'property_metabox',
    'title'         => esc_html__( 'Information', 'cmb2' ),
    'object_types'  => array( 'property', ), // Post type
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Address', 'cmb2' ),
    'id'         => $prefix . 'property_address',
    'type'       => 'text',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Map URL', 'cmb2' ),
    'id'         => $prefix . 'property_map',
    'type'       => 'text_url',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Summary', 'cmb2' ),
    'id'         => $prefix . 'property_summary',
    'type'       => 'textarea_small',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Darken splash image', 'cmb2' ),
    'id'         => $prefix . 'splash_overlay',
    'type'       => 'checkbox',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Gallery', 'cmb2' ),
    'id'         => $prefix . 'property_gallery',
    'type'       => 'file_list',
  ) );

  // PRESS QUOTES METABOXES
  $cmb_press = new_cmb2_box( array(
    'id'            => $prefix . 'press_metabox',
    'title'         => esc_html__( 'Information', 'cmb2' ),
    'object_types'  => array( 'press_quote', ), // Post type
  ) );

  $cmb_press->add_field( array(
    'name'       => esc_html__( 'Author / Publication', 'cmb2' ),
    'id'         => $prefix . 'quote_author',
    'type'       => 'text',
  ) );

  $cmb_press->add_field( array(
    'name'       => esc_html__( 'Quote Text', 'cmb2' ),
    'id'         => $prefix . 'quote_text',
    'type'       => 'textarea_small',
  ) );

  $cmb_press->add_field( array(
    'name'       => esc_html__( 'Quote Link', 'cmb2' ),
    'id'         => $prefix . 'quote_link',
    'type'       => 'text_url',
  ) );

  $cmb_press->add_field( array(
    'name'       => esc_html__( 'Highlight?', 'cmb2' ),
    'id'         => $prefix . 'quote_highlight',
    'type'       => 'checkbox',
  ) );

  // HOME PAGE METABOXES
  $home_page = get_page_by_path('home');

  if (!empty($home_page) ) {
    $cmb_home = new_cmb2_box( array(
      'id'            => $prefix . 'home_metabox',
      'title'         => esc_html__( 'Options', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($home_page->ID) ),
    ) );

    $cmb_home->add_field( array(
      'name'       => esc_html__( 'Splash Text', 'cmb2' ),
      'id'         => $prefix . 'splash_text',
      'type'       => 'textarea_small',
    ) );

    $cmb_home->add_field( array(
      'name'       => esc_html__( 'Splash Image', 'cmb2' ),
      'id'         => $prefix . 'splash_image',
      'type'       => 'file',
    ) );

    $cmb_home->add_field( array(
      'name'       => esc_html__( 'Darken splash image', 'cmb2' ),
      'id'         => $prefix . 'splash_overlay',
      'type'       => 'checkbox',
    ) );

    // Get quote posts, to be used as slect field values
    $press_quote_posts = get_posts_as_options('press_quote');

    // Generate this field 3 times
    for($i = 1; $i <= 3; $i++) {
      $cmb_home->add_field( array(
        'name'       => esc_html__( 'Press Quote #' . $i, 'cmb2' ),
        'id'         => $prefix . 'home_press_quote_' . $i,
        'type'       => 'select',
        'show_option_none' => true,
        'options' => $press_quote_posts,
      ) );
    }
  }

  // WHAT WE DO PAGE METABOXES
  $what_we_do_page = get_page_by_path('what-we-do');

  if (!empty($what_we_do_page) ) {
    $cmb_what_we_do = new_cmb2_box( array(
      'id'            => $prefix . 'what_we_do_metabox',
      'title'         => esc_html__( 'Homepage options', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($what_we_do_page->ID) ),
    ) );

    $cmb_what_we_do->add_field( array(
      'name'       => esc_html__( 'Homepage Summary', 'cmb2' ),
      'id'         => $prefix . 'what_we_do_home_summary',
      'type'       => 'textarea_small',
    ) );

    // BIO GROUP
    $bios_group_id = $cmb_what_we_do->add_field( array(
      'id'          => $prefix . 'bios_group',
      'type'        => 'group',
      'description' => esc_html__( 'Team Biographies:', 'cmb2' ),
      'options'     => array(
        'group_title'   => esc_html__( 'Bio {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => esc_html__( 'Add Another Bio', 'cmb2' ),
        'remove_button' => esc_html__( 'Remove Bio', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
    ) );

        $cmb_what_we_do->add_group_field( $bios_group_id, array(
          'name'       => esc_html__( 'Name', 'cmb2' ),
          'id'         => 'name',
          'type'       => 'text',
        ) );

        $cmb_what_we_do->add_group_field( $bios_group_id, array(
          'name'       => esc_html__( 'Position', 'cmb2' ),
          'id'         => 'position',
          'type'       => 'text',
        ) );

        $cmb_what_we_do->add_group_field( $bios_group_id, array(
          'name' => esc_html__( 'Portrait', 'cmb2' ),
          'id'   => 'image',
          'type' => 'file',
        ) );

        $cmb_what_we_do->add_group_field( $bios_group_id, array(
          'name'       => esc_html__( 'Bio', 'cmb2' ),
          'id'         => 'bio',
          'type'       => 'textarea',
        ) );

        // REAL ESTATE
        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Real Estate', 'cmb2' ),
          'id'           => $prefix . 'realestate_title',
          'type'         => 'title',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Real Estate Text', 'cmb2' ),
          'id'           => $prefix . 'realestate_text',
          'type'         => 'textarea',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Real Estate Images', 'cmb2' ),
          'id'           => $prefix . 'realestate_images',
          'type'         => 'file_list',
          'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
        ) );

        // COMMUNITY
        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Community', 'cmb2' ),
          'id'           => $prefix . 'community_title',
          'type'         => 'title',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Community Text', 'cmb2' ),
          'id'           => $prefix . 'community_text',
          'type'         => 'textarea',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Community Images', 'cmb2' ),
          'id'           => $prefix . 'community_images',
          'type'         => 'file_list',
          'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
        ) );

        // PHILANTHROPY
        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Philanthropy', 'cmb2' ),
          'id'           => $prefix . 'philanthropy_title',
          'type'         => 'title',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Philanthropy Text', 'cmb2' ),
          'id'           => $prefix . 'philanthropy_text',
          'type'         => 'textarea',
        ) );

        $cmb_what_we_do->add_field( array(
          'name'         => esc_html__( 'Philanthropy Images', 'cmb2' ),
          'id'           => $prefix . 'philanthropy_images',
          'type'         => 'file_list',
          'preview_size' => array( 150, 150 ), // Default: array( 50, 50 )
        ) );

  }

  // FILMING PAGE METABOXES
  $filming_page = get_page_by_path('filming');

  if (!empty($filming_page) ) {
    $cmb_filming = new_cmb2_box( array(
      'id'            => $prefix . 'filming_metabox',
      'title'         => esc_html__( 'Information', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($filming_page->ID) ),
    ) );

    $cmb_filming->add_field( array(
      'name'       => esc_html__( 'Summary', 'cmb2' ),
      'id'         => $prefix . 'filming_summary',
      'type'       => 'textarea_small',
    ) );

    $cmb_filming->add_field( array(
      'name'       => esc_html__( 'Homepage Summary', 'cmb2' ),
      'id'         => $prefix . 'filming_home_summary',
      'type'       => 'textarea_small',
    ) );

    $cmb_filming->add_field( array(
      'name'       => esc_html__( 'Gallery', 'cmb2' ),
      'id'         => $prefix . 'filming_gallery',
      'type'       => 'file_list',
    ) );

    $cmb_filming->add_field( array(
      'name'       => esc_html__( 'Contact Email', 'cmb2' ),
      'id'         => $prefix . 'filming_contact_email',
      'type'       => 'text',
    ) );

    $cmb_filming->add_field( array(
      'name'       => esc_html__( 'Contact Phone', 'cmb2' ),
      'id'         => $prefix . 'filming_contact_phone',
      'type'       => 'text',
    ) );

  }

}

// Returns an array of quote posts
function get_posts_as_options($post_type) {
  $posts = get_posts( array(
    'post_type' => $post_type,
    'nopaging' => true,
  ));

  $posts_as_options = array();

  for($i = 0; $i < count($posts); $i++) {
    $post = $posts[$i];
    $posts_as_options[$post->ID] = $post->post_title;
  }

  return $posts_as_options;
}
?>
