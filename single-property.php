<?php
get_header();
?>

<main id="main-content">

<?php
if( have_posts() ) {
?>
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php
  while( have_posts() ) {
    the_post();

    $address = get_post_meta($post->ID, '_igv_property_address', true);
    $map_url = get_post_meta($post->ID, '_igv_property_map', true);
    $summary = get_post_meta($post->ID, '_igv_property_summary', true);
    $gallery = get_post_meta($post->ID, '_igv_property_gallery', true);
    $splash_overlay = get_post_meta($post->ID,'_igv_splash_overlay', true);

    // Add map link to address
    if (!empty($map_url)) {
      $address = '<a class="link-underline" target="_blank" rel="noopener" href="' . esc_url($map_url) . '">' . $address . '</a>';
    }

    // Split $gallery into two arrays
    if (!empty($gallery)) {
      $first_gallery = array_slice($gallery, 0, 2, true);
      $second_gallery = array_slice($gallery, 2, count($gallery), true);
    }

?>
    <section class="splash-holder">
      <div class="container-full splash-with-image" style="background-image: url(<?php the_post_thumbnail_url('splash'); ?>)">
<?php
    if (!empty($splash_overlay)) {
?>
        <div class="splash-overlay"></div>
<?php
    }
?>
        <div class="container splash-text grid-row margin-bottom-basic align-items-end justify-end" >
          <div class="grid-item text-align-right">

            <h2 class="font-size-giant"><?php the_title(); ?></h2>

            <span class="font-heavy"><?php echo !empty($address) ? $address : ''; ?></span>

          </div>
        </div>
      </div>
    </section>

<?php
    if (!empty($summary)) {
?>

    <section class="margin-top-large margin-bottom-large">
      <div class="container">
        <div class="grid-row justify-center">
          <div class="grid-item item-s-11 highlight highlight-hero font-size-large font-heavy">
            <?php echo $summary; ?>
          </div>
        </div>
      </div>
    </section>

<?php
      render_divider();

    }

    if (!empty($first_gallery)) {
      $i = 1;
?>

    <section class="margin-top-large margin-bottom-large">
      <div class="container">
        <div class="grid-row justify-between" id="property-image-row">

<?php
      foreach ($first_gallery as $id => $image) {
        $offset = '';

        if ($i == 2) {
          $offset = 'margin-top-large';
        }
?>
          <div class="grid-item item-s-12 item-l-auto margin-bottom-basic text-align-center <?php echo $offset; ?>">
            <?php echo wp_get_attachment_image($id, 'property-main'); ?>
          </div>
<?php
        $i++;
     }
?>

        </div>
      </div>
    </section>

<?php
      render_divider();

    }
?>

    <section class="margin-top-large margin-bottom-large">
      <div class="container">
        <div class="grid-row">
          <div class="grid-item item-s-12 margin-bottom-basic text-columns text-columns-m-2">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

<?php
    if (!empty($second_gallery)) {

      render_divider();
?>
    <section class="margin-top-large margin-bottom-large">
      <div class="container-full margin-bottom-basic">
        <?php render_gallery_slider($second_gallery); ?>
      </div>
    </section>
<?php
    }
?>


<?php
  }
?>
  </article>
<?php
} else {
?>
  <section>
    <div class="u-alert grid-row">
      <div class="grid-item item-s-12">
        <?php _e('Sorry, this property was not found.'); ?>
      </div>
    </div>
  </section>
<?php
} ?>

</main>

<?php
get_footer();
