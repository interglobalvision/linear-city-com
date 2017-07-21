<?php
get_header();
?>

<main id="main-content">
<?php
$splash_text = get_post_meta($post->ID,'_igv_splash_text', true);
$splash_image = get_post_meta($post->ID,'_igv_splash_image', true);
?>
  <section id="" class="splash-with-image" style="background-image: url(<?php echo $splash_image; ?>);">
    <div class="splash-text grid-row">
      <div class="grid-item item-m-9 item-s-12">
        <?php echo apply_filters('the_content',$splash_text); ?>
      </div>
    </div>
  </section>
  <section id="posts">
    <div class="container">
      <div class="grid-row margin-bottom-basic">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>

        <article <?php post_class('grid-item item-s-12'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>

          <?php the_content(); ?>

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

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
