<?php
/**
 * Footer template, invoked when get_footer() is called
 *
 * @package Suffusion
 * @subpackage Templates
 */

// Invoke hook - this creates the bottom widget area, the right sidebars etc.
suffusion_before_end_container();
?>
  </div><!-- /container -->

<?php suffusion_page_footer(); ?>
    <hr class="hidden" />
  </div><!--/wrapper -->

</div><!--/page -->

<?php
suffusion_document_footer();
wp_footer(); ?>

</body>
</html>
