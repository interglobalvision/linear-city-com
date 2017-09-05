<?php
get_header();
?>

<main id="main-content">
  <section class="margin-top-large margin-bottom-mid padding-top-mid">
    <div class="container">
      <div class="grid-row justify-center">
        <h1 class="grid-item item-s-11 highlight highlight-hero font-size-extra font-heavy">
          Our Properties
        </h1>
      </div>
    </div>
  </section>

  <section id="posts">
    <div class="container">
      <div class="grid-row margin-bottom-large">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $address = get_post_meta($post->ID, '_igv_property_address', true);
?>

        <article <?php post_class('grid-item item-s-12 item-m-6 margin-top-mid'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('property-thumb', array('class'=>'margin-bottom-small')); ?>

            <h2 class="font-heavy font-size-mid"><?php the_title(); ?></h2>

            <?php echo !empty($address) ? $address : ''; ?>
          </a>

        </article>

<?php
  }
} else {
?>
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>
