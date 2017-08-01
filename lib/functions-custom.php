<?php

// Custom functions (like special queries, etc)

function render_what_we_do_section($id, $title, $text, $images) {

?>

<section id="what-we-do-<?php echo $id; ?>" class="margin-top-large margin-bottom-large">
  <div class="container">
    <div class="grid-row">
      <div class="grid-item item-s-12 item-m-6">
        <?php echo apply_filters('the_content', $text); ?>
      </div>

      <div class="grid-item item-s-12 item-m-6">
        <div class="highlight highlight-heading-alt margin-bottom-mid">
          <h3 class="font-heavy font-size-large"><?php echo $title; ?></h3>
        </div>
<?php
  if (!empty($images)) {
    foreach ($images as $image_id => $image_url) {
?>
        <div class="margin-bottom-small">
          <?php echo wp_get_attachment_image($image_id, 'item-l-6'); ?>
        </div>
<?php
    }
  }
?>
      </div>
    </div>
  </div>
</section>

<?php

}

function render_gallery_slider($images) {
?>
<div class="swiper-container grid-row">
  <div class="swiper-wrapper item-m-10">
<?php
  foreach($images as $image_id => $image) {
?>
          <div class="swiper-slide item-m-10">
            <?php echo wp_get_attachment_image($image_id, 'gallery'); ?>
          </div>
<?php
  }
?>
  </div>

  <div class="swiper-pagination"></div>

</div>

<?php

}
