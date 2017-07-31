<?php
get_header();
?>

<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $bios = get_post_meta($post->ID, '_igv_bios_group', true);

    $realestate_text = get_post_meta($post->ID, '_igv_realestate_text', true);
    $realestate_images = get_post_meta($post->ID, '_igv_realestate_images', true);

    $community_text = get_post_meta($post->ID, '_igv_community_text', true);
    $community_images = get_post_meta($post->ID, '_igv_community_images', true);

    $philanthropy_text = get_post_meta($post->ID, '_igv_philanthropy_text', true);
    $philanthropy_images = get_post_meta($post->ID, '_igv_philanthropy_images', true);


?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <section id="what-we-do-hero">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </section>

<?php
    if (has_post_thumbnail()) {
?>

          <section id="what-we-do-splash" class="splash-with-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'splash'); ?>)">

          </section>

<?php
    }

    if (!empty($bios)) {
?>
          <section id="what-we-do-bios">
            <div class="container">
<?php
      foreach ($bios as $bio) {
?>
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-4">
<?php
        if (!empty($bio['name'])) {
?>
                  <div class="highlight-section-title">
                    <h3 class="font-heavy"><?php echo $bio['name']; ?></h3>
                    <span><?php echo !empty($bio['position']) ? $bio['position'] : ''; ?></span>
                  </div>
<?php
        }
?>
                  <?php
                    if (!empty($bio['image_id'])) {
                      echo wp_get_attachment_image($bio['image_id'], 'item-l-4');
                    }
                  ?>
                </div>
                <div class="grid-item item-s-12 item-m-7 offset-m-1">
                  <?php echo !empty($bio['bio']) ? apply_filters('the_content', $bio['bio']) : ''; ?>
                </div>
              </div>
<?php
      }
?>
            </div>
          </section>
<?php
    }

    if (!empty($realestate_text)) {
      //diagonal_divider();

      render_what_we_do_section('realestate', 'Real Estate', $realestate_text, $realestate_images);

    }

    if (!empty($community_text)) {
      //diagonal_divider();

      render_what_we_do_section('community', 'Community', $community_text, $community_images);

    }

    if (!empty($philanthropy_text)) {
      //diagonal_divider();

      render_what_we_do_section('philanthropy', 'Philanthropy', $philanthropy_text, $philanthropy_images);

    }
?>


        </article>

<?php
  }
} ?>

</main>

<?php
get_footer();
?>
