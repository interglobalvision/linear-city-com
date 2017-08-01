<?php

// Custom functions (like special queries, etc)

function render_what_we_do_section($id, $title, $text, $images) {

?>
<section id="what-we-do-<?php echo $id; ?>">
  <div class="container">
    <div class="grid-row">
      <div class="grid-item item-s-12 item-m-6">
        <?php echo apply_filters('the_content', $text); ?>
      </div>

      <div class="grid-item item-s-12 item-m-6">
        <div class="highlight-section-title">
          <h3 class="font-heavy"><?php echo $title; ?></h3>
        </div>
        <?php
          if (!empty($images)) {
            foreach ($images as $image_id => $image_url) {
              echo wp_get_attachment_image($image_id, 'item-l-6');
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
      <!-- if we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

</div>

<?php

}
