<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $index = $wp_query->current_post;

    $quote = get_post_meta($post->ID, '_igv_quote_text', true);
    $link = get_post_meta($post->ID, '_igv_quote_link', true);
    $publication = get_post_meta($post->ID, '_igv_quote_publication', true);

    if ($link) {
      $publication = '<a href="' . $link . '">' . $publication . '</a>';
    }

    if (has_post_thumbnail()) {

      if ($index > 0) {
        render_divider();
      }
?>
    <article <?php post_class('grid-row margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">
      <div class="grid-item item-s-4">
        <?php the_post_thumbnail('item-l-4'); ?>
      </div>
      <div class="grid-item item-s-8">
        <span class="font-size-extra"><?php echo $quote; ?></span><span class="font-size-large"> - <?php echo $publication; ?></span>
      </div>
    </article>
<?php

    render_divider();

    } else {
?>
    <article <?php post_class('grid-row margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">
      <div class="grid-item item-s-12">
        <span class="font-size-extra"><?php echo $quote; ?></span><span class="font-size-large"> - <?php echo $publication; ?></span>
      </div>
    </article>
<?php
    }

  }
} else {
?>
      <div class="grid-row margin-bottom-basic">
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
      </div>
<?php
} ?>

    </div>
  </section>

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
