<?php
get_header();
?>

<main id="main-content">
<?php
$splash_text = get_post_meta($post->ID,'_igv_splash_text', true);
$splash_image = get_post_meta($post->ID,'_igv_splash_image', true);
?>
  <section id="" class="splash-with-image margin-bottom-basic" style="background-image: url(<?php echo $splash_image; ?>);">
    <div class="splash-text grid-row">
      <div class="grid-item item-m-9 item-s-12">
        <?php echo apply_filters('the_content',$splash_text); ?>
      </div>
    </div>
  </section>
  <section id="posts">
    <div class="grid-row justify-center">
      <div class="grid-item item-s-4 text-align-center">
        <h2>Our Properties</h2>
      </div>
    </div>

<?php
$properties = new WP_QUERY( array(
  'post_type' => 'property',
  'nopaging' => true,
));

if( $properties->have_posts() ) {
?>
    <div class="container">
<?php
  while( $properties->have_posts() ) {
    $properties->the_post();
    $index = $properties->current_post + 1;

    $open_row = $index === 1 || $index % 3 === 1;
    $close_row = $index === $properties->post_count ||  $index === 3 || $index % 3 === 0;

    $item_classes = $index === 2 || $index % 3 === 2 ? 'margin-top-small' : '';
?>

<?php
    if ($open_row) {
?>
      <div class="grid-row">
<?php
    }
?>


        <article <?php post_class('grid-item item-s-4 text-align-center ' . $item_classes ); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail(); ?>
            <h3><?php echo the_title(); ?></h3>
          </a>

          <?php the_content(); ?>

        </article>
<?php
    if ($close_row) {
?>
      </div> <!-- Close row -->
<?php
    }
  }
?>
    </div> <!-- Close container -->
<?php
} else {
?>
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>
  </section>

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
