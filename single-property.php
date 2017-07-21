<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">

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
    $bottom = get_post_meta($post->ID, '_igv_property_bottom_image', true);
?>

        <div class="splash-with-image grid-row margin-bottom-basic align-items-end justify-end" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
          <div class="grid-item">

            <h2><?php the_title(); ?></h2>

            <?php echo !empty($address) ? $address : ''; ?>

          </div>
        </div>

        <div class="grid-row">

<?php
    if (!empty($summary)) {
?>
          <div class="highlight-hero grid-item item-s-12 margin-bottom-basic">
            <?php echo $summary; ?>
          </div>
<?php
    }

    if (!empty($gallery)) {
      $i = 1;

      foreach ($gallery as $id => $image) {
        $offset = '';

        if ($i % 2 == 0) {
          $offset = 'offset-m-4 text-align-right';
        }
?>
          <div class="grid-item item-s-12 item-m-8 margin-bottom-basic <?php echo $offset; ?>">
            <?php echo wp_get_attachment_image($id, 'item-m-8'); ?>
          </div>
<?php
        $i++;
      }
    }

    /////////////////////////////// DIAGONAL ///////////////////////////////
?>

          <div class="grid-item item-s-12 margin-bottom-basic">
            <?php the_content(); ?>
          </div>

<?php
    if (!empty($bottom)) {
      $id = get_image_id_from_url($bottom);
?>

          <div class="grid-item item-s-12 item-m-8 offset-m-2 text-align-center margin-bottom-basic">
            <?php echo wp_get_attachment_image($id, 'item-m-8'); ?>
          </div>

<?php
    }
?>

        </div>

<?php
  }
?>
        </article>
<?php
} else {
?>
        <div class="u-alert grid-row">
          <div class="grid-item item-s-12">
            <?php _e('Sorry, this property was not found.'); ?>
          </div>
        </div>
<?php
} ?>

    </div>
  </section>
</main>

<?php
get_footer();
?>
