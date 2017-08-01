<?php
// Get Home page
$home = get_page_by_path('home');

if (!empty($home)) {

  $press_quotes_ids = array();

  // Get selected quotes IDs
  for ($i = 1; $i <= 3; $i++) {
    $press_quote_id = get_post_meta($home->ID,'_igv_home_press_quote_' . $i, true);

    if (!empty($press_quote_id)) {
      $press_quotes_ids[] = get_post_meta($home->ID,'_igv_home_press_quote_' . $i, true);
    }
  }

  if (!empty($press_quotes_ids) ){

    // Get press_quote posts
    $press_quotes = new WP_Query( array(
      'post_type' => 'press_quote',
      'post__in' => $press_quotes_ids,
    ));
  }

  if (!empty($press_quotes)) {
?>

  <section id="press-home" class="margin-top-large margin-bottom-large">
    <div class="container">
      <div class="grid-row margin-bottom-mid">
        <div class="grid-item item-s-12 item-m-5">
          <h2 class="font-heavy highlight highlight-heading font-size-large">Press</h2>
        </div>
      </div>
      <div class="grid-row">

<?php
    while ($press_quotes->have_posts()) {
      $press_quotes->the_post();

      $quote = get_post_meta($post->ID,'_igv_quote_text', true);
      $quote_link = get_post_meta($post->ID,'_igv_quote_link', true);
      $quote_author = get_post_meta($post->ID,'_igv_quote_author', true);

?>
        <div class="grid-item item-s-12 item-m-4 margin-bottom-mid">
          <div class="font-size-mid margin-bottom-basic">"<?php echo $quote; ?>"</div>
<?php if (!empty($quote_author)) { ?>
          <div class="font-bolder font-size-small">- <a <?php echo !empty($quote_link) ? 'href="' . $quote_link . '"' : ''; ?>><?php echo $quote_author; ?></a></div>
<?php } ?>
        </div>
<?php
    }
?>
      </div>

      <div class="grid-row">
        <div class="grid-item item-s-12 item-m-4 offset-m-8"><a class="button" href="<?php echo get_post_type_archive_link('press_quote') ?>">Press archive</a></div>
        </div>
      </div>
  </section>
<?php
  }
}
?>
