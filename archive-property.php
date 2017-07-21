<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">
      <div class="grid-row margin-bottom-basic">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $address = get_post_meta($post->ID, '_igv_property_address', true);
?>

        <article <?php post_class('grid-item item-s-12 item-m-6 margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('item-m-6', array('class'=>'margin-bottom-small')); ?>

            <h2><?php the_title(); ?></h2>

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
