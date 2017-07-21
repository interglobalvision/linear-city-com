  <footer id="footer" class="container">
    <div class="grid-row">
      <div class="grid-item item-s-10 offset-s-1">
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
      </div>
      <div class="grid-item item-s-12">
        <ul class="text-align-right">
          <li><a href="<?php echo home_url('property'); ?>">Properties</a></li>
          <li><a href="<?php echo home_url('what-we-do'); ?>">What We Do</a></li>
          <li><a href="<?php echo home_url('press'); ?>">Press</a></li>
          <li><a href="<?php echo home_url('filming'); ?>">Filming</a></li>
        </ul>
      </div>
    </div>
<?php
  $footer_email = IGV_get_option('_igv_site_options', '_igv_email_address');
  $footer_phone = IGV_get_option('_igv_site_options', '_igv_phone_number');
  $footer_address = IGV_get_option('_igv_site_options', '_igv_office_address');
?>
    <div class="grid-row">
      <div class="grid-item item-s-8 offset-s-1">
        <?php
          if ($footer_email) {
        ?>
        <h4>Email</h4>
        <a href="mailto:<?php echo $footer_email; ?>" target="_blank" rel="noopener"><?php echo $footer_email; ?></a>
        <?php
          }
        ?>
      </div>
      <div class="grid-item item-s-6">
        <?php
          if ($footer_phone) {
        ?>
        <h4>Phone</h4>
        <a href="tel:<?php echo $footer_phone; ?>"><?php echo $footer_phone; ?></a>
        <?php
          }
        ?>
      </div>
      <div class="grid-item item-s-8">
        <?php
          if ($footer_address) {
        ?>
        <h4>Offices</h4>
        <a href="https://www.google.com/maps/search/<?php echo urlencode($footer_address); ?>/" target="_blank" rel="noopener"><?php echo apply_filters('the_content', $footer_address); ?></a>
        <?php
          }
        ?>
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