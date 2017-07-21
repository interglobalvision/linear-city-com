<?php
$splash_text = get_post_meta($post->ID,'_igv_splash_text', true);
$splash_image = get_post_meta($post->ID,'_igv_splash_image', true);
?>
  <section id="" class="splash-with-image margin-bottom-basic" style="background-image: url(<?php echo $splash_image; ?>);">
    <div class="splash-text grid-row">
      <div class="grid-item item-m-9 item-s-12">
        <?php echo apply_filters('the_content',$splash_text); ?>
      </div>
    </div>
  </section>
