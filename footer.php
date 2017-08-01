  <footer id="footer" class="padding-top-basic padding-bottom-basic">
    <div class="container">
      <div class="grid-row margin-bottom-mid align-items-center">
        <div class="grid-item item-s-12 item-m-4 font-serif font-size-mid margin-bottom-mid">
          <a href="<?php echo home_url(); ?>">LinearCityDevelopment</a>
        </div>
        <nav class="grid-item item-s-12 item-m-8 margin-bottom-mid">
          <ul id="footer-menu" class="u-inline-list text-align-right font-heavy">
            <li><a href="<?php echo home_url('property'); ?>">Properties</a></li>
            <li><a href="<?php echo home_url('what-we-do'); ?>">What We Do</a></li>
            <li><a href="<?php echo home_url('press'); ?>">Press</a></li>
            <li><a href="<?php echo home_url('filming'); ?>">Filming</a></li>
          </ul>
        </nav>
      </div>
<?php
  $footer_email = IGV_get_option('_igv_site_options', '_igv_email_address');
  $footer_phone = IGV_get_option('_igv_site_options', '_igv_phone_number');
  $footer_address = IGV_get_option('_igv_site_options', '_igv_office_address');
?>
      <div class="grid-row">
        <div class="grid-item item-s-12 item-m-5 margin-bottom-basic">
          <?php
            if ($footer_email) {
          ?>
          <h4 class="font-heavy">Email</h4>
          <a class="footer-contact-text" href="mailto:<?php echo $footer_email; ?>" target="_blank" rel="noopener"><?php echo $footer_email; ?></a>
          <?php
            }
          ?>
        </div>
        <div class="grid-item item-s-12 item-m-3 margin-bottom-basic">
          <?php
            if ($footer_phone) {
          ?>
          <h4 class="font-heavy">Phone</h4>
          <a class="footer-contact-text" href="tel:<?php echo $footer_phone; ?>"><?php echo $footer_phone; ?></a>
          <?php
            }
          ?>
        </div>
        <div class="grid-item item-s-12 item-m-4 margin-bottom-basic">
          <?php
            if ($footer_address) {
          ?>
          <h4 class="font-heavy">Offices</h4>
          <a class="footer-contact-text" href="https://www.google.com/maps/search/<?php echo urlencode($footer_address); ?>/" target="_blank" rel="noopener"><?php echo apply_filters('the_content', $footer_address); ?></a>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </footer>

</section>

<?php
  get_template_part('partials/scripts');
  get_template_part('partials/schema-org');
?>

</body>
</html>
