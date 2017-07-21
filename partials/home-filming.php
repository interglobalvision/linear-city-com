<?php
  $filming_page = get_page_by_path('filming');

  if (!empty($filming_page)) {
    $summary = get_post_meta($filming_page->ID,'_igv_filming_home_summary', true);
    $thumbnail = get_the_post_thumbnail($filming_page);
    $permalink = get_the_permalink($filming_page);
?>
  <section id="filming-home">
    <div class="grid-row">
      <div class="grid-item item-m-5">
        <h2>Filming</h2>
      </div>
    </div>
    <div class="grid-row">
      <div class="grid-item item-m-5">
        <?php echo $thumbnail; ?>
      </div>
      <div class="grid-item item-m-7">
        <?php echo apply_filters('the_content', $summary); ?>
      </div>
    </div>
    <div class="grid-row justify-end">
      <div class="grid-item item-m-4 text-align-center">
        <a href="<?php echo $permalink; ?>">Learn more</a>
      </div>
    </div>
  </section>
<?php
  }
?>

