<?php
$home = get_page_by_path('home');
$splash_text = get_post_meta($home->ID,'_igv_splash_text', true);
$splash_image = get_post_meta($home->ID,'_igv_splash_image', true);
$splash_overlay = get_post_meta($home->ID,'_igv_splash_overlay', true);
?>
<section class="splash-holder">
  <div id="" class="splash-with-image container-full" style="background-image: url(<?php echo $splash_image; ?>);">
<?php
if (!empty($splash_overlay)) {
?>
    <div class="splash-overlay"></div>
<?php
}
?>
    <div class="container splash-text grid-row align-items-end">
      <div class="grid-item item-s-12 item-m-10 font-size-extra">
        <?php echo apply_filters('the_content',$splash_text); ?>
      </div>
    </div>
  </div>
</section>
