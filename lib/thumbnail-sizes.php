<?php

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );

  add_image_size( 'item-l-4', 790, 9999, false );
  add_image_size( 'property-thumb', 930, 616, true );
  add_image_size( 'property-main', 614, 614, false );

  add_image_size( 'splash', 1920, 9999, false );

  add_image_size( 'gallery', 9999, 700, false );
}
