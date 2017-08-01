<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
    get_template_part('partials/globie');
    get_template_part('partials/seo');
  ?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

  <?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php } ?>
  <?php wp_head(); ?>

  <?php
    $has_splash = false;

    if (is_front_page()) {
      $splash = get_post_meta($post->ID,'_igv_splash_image', true);
      if (!empty($splash)) {
        $has_splash = true;
      }
    } else if (is_singular('property') && has_post_thumbnail()) {
      $has_splash = true;
    }
  ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<section id="main-container">

  <header id="header" <?php echo $has_splash ? 'class="splash-header"' : ''; ?>>
    <div class="container">
      <div class="grid-row margin-top-tiny margin-bottom-small align-items-center">
        <div class="grid-item item-s-8 item-m-4">
          <h1 class="font-serif font-size-large"><a href="<?php echo home_url(); ?>">LinearCityDevelopment</a></h1>
        </div>
        <div class="grid-item item-s-4 item-m-8">
          <ul id="header-menu" class="u-inline-list text-align-right font-heavy">
            <li><a href="<?php echo home_url('property'); ?>">Properties</a></li>
            <li><a href="<?php echo home_url('what-we-do'); ?>">What We Do</a></li>
            <li><a href="<?php echo home_url('press'); ?>">Press</a></li>
            <li><a href="<?php echo home_url('filming'); ?>">Filming</a></li>
          </ul>
          <div id="mobile-open-holder" class="text-align-right grid-row justify-end align-items-center">
            <?php echo url_get_contents(get_template_directory_uri() . '/dist/img/hamburger.svg'); ?>
          </div>
        </div>
      </div>
    </div>
    <div id="mobile-menu">
      <div class="container">
        <div class="grid-row margin-top-tiny margin-bottom-small align-items-center">
          <div class="grid-item item-s-8">
            <h1 class="font-serif font-size-large"><a href="<?php echo home_url(); ?>">LinearCityDevelopment</a></h1>
          </div>
          <div class="grid-item item-s-4">
            <div class="text-align-right grid-row justify-end align-items-center">
              <?php echo url_get_contents(get_template_directory_uri() . '/dist/img/close.svg'); ?>
            </div>
          </div>
          <div class="grid-item item-s-12 margin-top-mid margin-bottom-mid">
            <ul class="font-heavy font-size-mid">
              <li class="margin-bottom-basic"><a href="<?php echo home_url('property'); ?>">Properties</a></li>
              <li class="margin-bottom-basic"><a href="<?php echo home_url('what-we-do'); ?>">What We Do</a></li>
              <li class="margin-bottom-basic"><a href="<?php echo home_url('press'); ?>">Press</a></li>
              <li class="margin-bottom-basic"><a href="<?php echo home_url('filming'); ?>">Filming</a></li>
            </ul>
          </div>
          <?php
            $footer_email = IGV_get_option('_igv_site_options', '_igv_email_address');
            $footer_phone = IGV_get_option('_igv_site_options', '_igv_phone_number');
            $footer_address = IGV_get_option('_igv_site_options', '_igv_office_address');

            if ($footer_email) {
          ?>
          <div class="grid-item item-s-12 margin-bottom-basic">
            <h4 class="font-heavy">Email</h4>
            <a class="font-size-mid" href="mailto:<?php echo $footer_email; ?>" target="_blank" rel="noopener"><?php echo $footer_email; ?></a>
          </div>
          <?php
            }

            if ($footer_phone) {
          ?>
          <div class="grid-item item-s-12 margin-bottom-basic">
            <h4 class="font-heavy">Phone</h4>
            <a class="font-size-mid" href="tel:<?php echo $footer_phone; ?>"><?php echo $footer_phone; ?></a>
          </div>
          <?php
            }

            if ($footer_address) {
          ?>
          <div class="grid-item item-s-12 margin-bottom-basic">
            <h4 class="font-heavy">Offices</h4>
            <a class="font-size-mid" href="https://www.google.com/maps/search/<?php echo urlencode($footer_address); ?>/" target="_blank" rel="noopener"><?php echo apply_filters('the_content', $footer_address); ?></a>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </header>
