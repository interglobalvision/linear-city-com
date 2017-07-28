<?php
$properties = new WP_Query( array(
  'post_type' => 'property',
  'nopaging' => true,
));

if( $properties->have_posts() ) {
?>
  <section id="our-properties">
    <div class="grid-row justify-center">
      <div class="grid-item item-s-4 text-align-center">
        <h2>Our Properties</h2>
      </div>
    </div>

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
    // Check if should open a new `grid-row`
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

        </article>
<?php
    // Check if should close a new `grid-row`
    if ($close_row) {
?>
      </div> <!-- Close row -->
<?php
    }
  } // Close while
?>
    </div> <!-- Close container -->
  </section>
<?php
}
?>
