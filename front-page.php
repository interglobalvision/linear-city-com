<?php
get_header();
?>

<main id="main-content">

  <?php get_template_part('partials/home-splash'); ?>

  <?php get_template_part('partials/properties-grid'); ?>

  <?php get_template_part('partials/home-what-we-do'); ?>


<?php
/* ***********************************
 * WHAT WE DO SECTION
 * ***********************************/
  $what_we_do_page = get_page_by_path('what-we-do');
?>

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>
