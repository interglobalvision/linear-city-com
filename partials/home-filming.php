<?php
  $filming_page = get_page_by_path('filming');

  if (!empty($filming_page)) {
    $summary = get_post_meta($filming_page->ID,'_igv_filming_home_summary', true);
    $thumbnail = get_the_post_thumbnail($filming_page, 'item-l-6');
    $permalink = get_the_permalink($filming_page);
?>
  <section id="filming-home" class="margin-top-large margin-bottom-large">
    <div class="container">
      <div class="grid-row margin-bottom-mid">
        <div class="grid-item item-s-12 item-m-5">
          <h2 class="font-heavy highlight highlight-heading font-size-large">Filming</h2>
        </div>
      </div>
      <div class="grid-row">
        <div class="grid-item item-s-12 item-m-6 margin-bottom-basic">
          <?php echo $thumbnail; ?>
        </div>
        <div id="home-filming-text" class="grid-item item-s-12 item-m-6 font-size-mid">
          <div class="padding-bottom-basic">
            <?php echo apply_filters('the_content', $summary); ?>
          </div>
          <div id="home-filming-button-holder">
            <a class="button" href="<?php echo $permalink; ?>">Learn more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>
