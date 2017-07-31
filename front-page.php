<?php
get_header();
?>

<main id="main-content">

  <?php get_template_part('partials/home-splash'); ?>

  <?php get_template_part('partials/home-properties'); ?>

  <?php render_divider(); ?>

  <?php get_template_part('partials/home-what-we-do'); ?>

  <?php render_divider(); ?>

  <?php get_template_part('partials/home-press-quotes'); ?>

  <?php render_divider(); ?>

  <?php get_template_part('partials/home-filming'); ?>

</main>

<?php
get_footer();
?>
