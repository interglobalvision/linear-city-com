<?php
  $filming_page = get_page_by_path('filming');

  if (!empty($filming_page)) {
    $summary = get_post_meta($filming_page->ID,'_igv_filming_home_summary', true);
    $thumbnail = get_the_post_thumbnail($filming_page);
    $permalink = get_the_permalink($filming_page);
?>
  <section id="filming-home" class="margin-top-large margin-bottom-large">
    <div class="container">
      <div class="grid-row margin-bottom-mid">
        <div class="grid-item item-m-5">
          <h2 class="font-heavy highlight highlight-heading font-size-large">Filming</h2>
        </div>
      </div>
      <div class="grid-row">
        <div class="grid-item item-m-5">
          <?php echo $thumbnail; ?>
        </div>
        <div class="grid-item item-m-7 text-align-right font-size-mid">
          <?php echo apply_filters('the_content', $summary); ?>
          <a class="button margin-top-basic" href="<?php echo $permalink; ?>">Learn more</a>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>
