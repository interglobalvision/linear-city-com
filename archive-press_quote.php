<?php
get_header();
?>

<main id="main-content" class="padding-top-large padding-bottom-large">

<?php
if( have_posts() ) {

  $count = $wp_query->post_count;

  while( have_posts() ) {
    the_post();

    $index = $wp_query->current_post;

    $quote = get_post_meta($post->ID, '_igv_quote_text', true);
    $link = get_post_meta($post->ID, '_igv_quote_link', true);
    $publication = get_post_meta($post->ID, '_igv_quote_author', true);
    $highlight = get_post_meta($post->ID, '_igv_quote_highlight', true);

    if ($link) {
      $publication = '<a href="' . $link . '">' . $publication . '</a>';
    }

    if ($highlight === 'on') {

      if ($index > 0) {
        render_divider();
      }
?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <div class="container">
        <div class="grid-row justify-center align-items-center margin-bottom-large margin-top-large">
<?php
      if (has_post_thumbnail()) {
?>
          <div class="grid-item item-s-4">
            <?php the_post_thumbnail('item-l-4'); ?>
          </div>
          <div class="grid-item item-s-8 highlight highlight-press">
<?php
      } else {
?>
          <div class="grid-item item-s-11 highlight highlight-hero">
<?php
      }
?>
            <div class="highlight-press-text">
              <span class="font-size-extra">"<?php echo $quote; ?>"</span><span class="u-inline-block font-size-mid font-bolder">&emsp;- <?php echo $publication; ?></span>
            </div>
          </div>
        </div>
      </div>
    </article>
<?php

      if ($index !== ($count - 1)) {
        render_divider();
      }

    } else {
?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <div class="container">
        <div class="grid-row margin-bottom-large margin-top-large justify-center">
          <div class="grid-item item-s-11">
            <span class="font-size-large">"<?php echo $quote; ?>"</span><span class="u-inline-block font-size-small font-bolder">&emsp;- <?php  echo $publication; ?></span>
          </div>
        </div>
      </div>
    </article>
<?php
    }

  }
} else {
?>
  <article>
    <div class="container">
      <div class="grid-row margin-bottom-basic">
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
      </div>
    </div>
  </article>
<?php
} ?>


  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
