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
    $summary = get_post_meta($post->ID, '_igv_property_summary', true);
    $gallery = get_post_meta($post->ID, '_igv_property_gallery', true);

    // Split $gallery into two arrays
    if (!empty($gallery)) {
      $first_gallery = array_slice($gallery, 0, 2, true);
      $second_gallery = array_slice($gallery, 2, count($gallery), true);
    }

?>
    <section>
      <div class="container-full">
        <div class="splash-with-image grid-row margin-bottom-basic align-items-end justify-end" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
          <div class="grid-item">

            <h2><?php the_title(); ?></h2>

            <span class="font-heavy"><?php echo !empty($address) ? $address : ''; ?></span>

          </div>
        </div>
      </div>
    </section>

<?php
    if (!empty($summary)) {
?>

    <section>
      <div class="container">
        <div class="grid-row">
          <div class="highlight-hero grid-item item-s-12 margin-bottom-basic font-heavy">
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

    <section>
      <div class="container">
        <div class="grid-row">

<?php
      foreach ($first_gallery as $id => $image) {
        $offset = '';

        if ($i == 2) {
          $offset = 'offset-m-4 text-align-right';
        }
?>
          <div class="grid-item item-s-12 item-m-8 margin-bottom-basic <?php echo $offset; ?>">
            <?php echo wp_get_attachment_image($id, 'item-m-8'); ?>
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

    <section>
      <div class="container">
        <div class="grid-row">
          <div class="grid-item item-s-12 margin-bottom-basic">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>

<?php
    if (!empty($second_gallery)) {

      render_divider();
?>
    <section>
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
