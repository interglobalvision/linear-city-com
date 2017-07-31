<?php
  $what_we_do_page = get_page_by_path('what-we-do');

  if (!empty($what_we_do_page)) {
    $summary = get_post_meta($what_we_do_page->ID,'_igv_what_we_do_home_summary', true);
    $thumbnail = get_the_post_thumbnail($what_we_do_page);
    $permalink = get_the_permalink($what_we_do_page);
?>
  <section id="what-we-do-home">
    <div class="container">
      <div class="grid-row">
        <div class="grid-item item-m-5">
          <h2 class="font-heavy">What We Do</h2>
        </div>
      </div>
      <div class="grid-row">
        <div class="grid-item item-m-7">
          <?php echo apply_filters('the_content', $summary); ?>
          <a href="<?php echo $permalink; ?>">Learn more</a>
        </div>
        <div class="grid-item item-m-5">
          <?php echo $thumbnail; ?>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>
