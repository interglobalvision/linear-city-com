<?php
get_header();
?>

<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $summary = get_post_meta($post->ID, '_igv_filming_summary', true);
    $gallery = get_post_meta($post->ID, '_igv_filming_gallery', true);
    $contact_email = get_post_meta($post->ID, '_igv_filming_contact_email', true);
    $contact_phone = get_post_meta($post->ID, '_igv_filming_contact_phone', true);

?>

        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php
    if(!empty($summary)) {
?>
          <section id="filming-hero" class="margin-top-large margin-bottom-mid padding-top-mid">
            <div class="container">
              <div class="grid-row justify-center">
                <div class="grid-item item-s-11 highlight highlight-hero font-size-extra font-heavy">
                  <p><?php echo $summary; ?></p>
                </div>
              </div>
            </div>
          </section>

<?php
    }

    if (!empty($gallery)) {
?>
          <section>
            <div class="container-full margin-bottom-basic">
              <?php render_gallery_slider($gallery); ?>
            </div>
          </section>
<?php
    }
?>
          <section id="filming-content" class="margin-top-large margin-bottom-large">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-4">
                  <div class="highlight highlight-heading-wide margin-bottom-mid">
                    <h3 class="font-heavy font-size-large">Filming</h3>
                  </div>
                </div>
              </div>
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-6">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </section>
<?php
    render_divider();

    if (!empty($contact_email) || !empty($contact_phone)) {
?>
          <section id="filming-contact" class="margin-top-large margin-bottom-large">
            <div class="container">
              <div class="grid-row">
                <div class="grid-item item-s-12 item-m-4">
                  <div class="highlight highlight-heading-wide margin-bottom-mid">
                    <h3 class="font-heavy font-size-large">Contact Us</h3>
                  </div>
                </div>
              </div>
              <div class="grid-row">
<?php
      if (!empty($contact_email)) {
?>
                <div class="grid-item item-s-4 margin-bottom-basic">
                  <h4 class="font-heavy">Email</h4>
                  <a class="footer-contact-text" href="mailto:<?php echo $contact_email; ?>" target="_blank" rel="noopener"><?php echo $contact_email; ?></a>
                </div>
<?php
      }
      if (!empty($contact_phone)) {
?>
                <div class="grid-item item-s-4 margin-bottom-basic">
                  <h4 class="font-heavy">Phone</h4>
                  <a class="footer-contact-text" href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
                </div>
<?php
      }
?>
              </div>
            </div>
          </section>
<?php
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
