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

        <article <?php post_class('grid-item item-s-12'); ?> id="post-<?php the_ID(); ?>">
          <section id="what-we-do-hero">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </section>

          <section id="what-we-do-splash" class="splash-with-image">

          </section>

<?php
    if (!empty($bios)) {
?>
          <section id="what-we-do-bios">
            <div class="container">
<?php
      foreach ($bios as $bio) {
?>
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-4">
                  <div class="highlight-section-title">
                    <h3 class="font-heavy"><?php echo !empty($bio['name']) ? $bio['name'] : ''; ?></h3>
                    <span><?php echo !empty($bio['position']) ? $bio['position'] : ''; ?></span>
                  </div>
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
?>
          <section id="what-we-do-realestate">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-6">
                  <?php echo apply_filters('the_content', $realestate_text); ?>
                </div>

                <div class="grid-item item-s-12 item-m-6">
                  <div class="highlight-section-title">
                    <h3 class="font-heavy">Real Estate</h3>
                  </div>
                  <?php
                    if (!empty($realestate_images)) {
                      foreach ($realestate_images as $image_id => $image_url) {
                        echo wp_get_attachment_image($image_id, 'item-l-6');
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </section>
<?php
      }

      if (!empty($community_text)) {
        //diagonal_divider();
?>
          <section id="what-we-do-community">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-6">
                  <?php echo apply_filters('the_content', $community_text); ?>
                </div>

                <div class="grid-item item-s-12 item-m-6">
                  <div class="highlight-section-title">
                    <h3 class="font-heavy">Community</h3>
                  </div>
                  <?php
                    if (!empty($community_images)) {
                      foreach ($community_images as $image_id => $image_url) {
                        echo wp_get_attachment_image($image_id, 'item-l-6');
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </section>
<?php
      }

      if (!empty($philanthropy_text)) {
        //diagonal_divider();
?>
          <section id="what-we-do-philanthropy">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-6">
                  <?php echo apply_filters('the_content', $philanthropy_text); ?>
                </div>

                <div class="grid-item item-s-12 item-m-6">
                  <div class="highlight-section-title">
                    <h3 class="font-heavy">Philanthropy</h3>
                  </div>
                  <?php
                    if (!empty($philanthropy_images)) {
                      foreach ($philanthropy_images as $image_id => $image_url) {
                        echo wp_get_attachment_image($image_id, 'item-l-6');
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </section>
<?php
      }
?>


        </article>

<?php
  }
} else {
?>
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, this page does not exist :{'); ?></article>
<?php
} ?>

</main>

<?php
get_footer();
?>
