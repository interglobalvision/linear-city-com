<?php

// to replace file_get_contents
function url_get_contents($Url) {
  if (!function_exists('curl_init')){
    die('CURL is not installed!');
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $Url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($httpcode !== 200) {
    return false;
  }

  return $output;
}

// get ID of page by slug
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if($page) {
		return $page->ID;
	} else {
		return null;
	}
}
// is_single for custom post type
function is_single_type($type, $post) {
  if (!$post || !is_single()) {
    return false;
  } else if (get_post_type($post->ID) === $type) {
    return true;
  } else {
    return false;
  }
}

// print var in <pre> tags
function pr($var) {
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}

// Debug page and template request
function debug_page_request() {
  global $wp, $template;
  define("D4P_EOL", "\r\n");
  echo '<!-- Request: ';
  echo empty($wp->request) ? "None" : esc_html($wp->request);
  echo ' -->'.D4P_EOL;
  echo '<!-- Matched Rewrite Rule: ';
  echo empty($wp->matched_rule) ? None : esc_html($wp->matched_rule);
  echo ' -->'.D4P_EOL;
  echo '<!-- Matched Rewrite Query: ';
  echo empty($wp->matched_query) ? "None" : esc_html($wp->matched_query);
  echo ' -->'.D4P_EOL;
  echo '<!-- Loaded Template: ';
  echo basename($template);
  echo ' -->'.D4P_EOL;
}

// Check post meta and echo, echo empty string if empty
function echo_post_meta($post_id, $field_id) {
  $meta = get_post_meta($post_id, $field_id, true);
  if (!empty($meta)) {
    echo $meta;
  } else {
    echo '';
  }
}

// Get attachment ID from URL
function get_image_id_from_url($image_url) {
  global $wpdb;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
  return $attachment[0];
}
