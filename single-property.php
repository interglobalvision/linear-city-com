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

    // Split $gallery into two arrays
    $first_gallery = array_slice($gallery, 0, 2, true);
    $second_gallery = array_slice($gallery, 2, count($gallery), true);

?>

        <div class="splash-with-image grid-row margin-bottom-basic align-items-end justify-end" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
          <div class="grid-item">

            <h2><?php the_title(); ?></h2>

            <span class="font-heavy"><?php echo !empty($address) ? $address : ''; ?></span>

          </div>
        </div>

        <div class="grid-row">

<?php
    if (!empty($summary)) {
?>
          <div class="highlight-hero grid-item item-s-12 margin-bottom-basic font-heavy">
            <?php echo $summary; ?>
          </div>
<?php
    }

    if (!empty($first_gallery)) {
      $i = 1;

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
    }

    render_divider();
?>

          <div class="grid-item item-s-12 margin-bottom-basic">
            <?php the_content(); ?>
          </div>

<?php
    if (!empty($second_gallery)) {

      render_divider();
?>

          <div class="grid-item item-s-12 item-m-8 offset-m-2 text-align-center margin-bottom-basic">

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
