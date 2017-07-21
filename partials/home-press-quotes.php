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

  <section id="press-home">
    <div class="grid-row">
      <div class="grid-item item-m-5">
        <h2>Press</h2>
      </div>
    </div>
    <div class="grid-row">

<?php
    while ($press_quotes->have_posts()) {
      $press_quotes->the_post();

      $quote = get_post_meta($post->ID,'_igv_quote_text', true);
      $quote_link = get_post_meta($post->ID,'_igv_quote_link', true);

?>
      <div class="grid-item item-m-4">
        <div><?php echo $quote; ?></div>
        <h2>- <a href="<? echo $quote_link; ?>"><?php the_title(); ?></a></h2>
      </div>
<?php
    }
?>
    </div>

    <div class="grid-row">
      <div class="grid-item item-s-3"><a href="#">Press archive</a></div>
    </div>
  </section>
<?php
  }
}
?>
