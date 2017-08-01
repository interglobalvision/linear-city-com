<?php
  $what_we_do_page = get_page_by_path('what-we-do');

  if (!empty($what_we_do_page)) {
    $summary = get_post_meta($what_we_do_page->ID,'_igv_what_we_do_home_summary', true);
    $thumbnail = get_the_post_thumbnail($what_we_do_page);
    $permalink = get_the_permalink($what_we_do_page);
?>
  <section id="what-we-do-home" class="margin-top-large margin-bottom-large">
    <div class="container">
      <div class="grid-row margin-bottom-mid">
        <div class="grid-item item-m-5">
          <h2 class="font-heavy font-size-large highlight highlight-heading">What We Do</h2>
        </div>
      </div>
      <div class="grid-row">
        <div class="grid-item item-m-7 font-size-large">
          <?php echo apply_filters('the_content', $summary); ?>
          <div class="text-align-right">
            <a class="button" href="<?php echo $permalink; ?>">Learn more</a>
          </div>
        </div>
        <div class="grid-item item-m-5 padding-top-basic">
          <?php echo $thumbnail; ?>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>
