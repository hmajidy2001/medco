<?php
/**
 * Default (first) sidebar
 *
 * @package Suffusion
 * @subpackage Templates
 */

global $options;
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
    	$$value['id'] = $value['std'];
    }
    else {
    	$$value['id'] = get_option( $value['id'] );
    }
}
?>
<div class="dbx-group <?php echo $suf_sidebar_alignment;?>" id="sidebar">
<?php 
if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) {
	if ($suf_sidebar_1_def_widgets == 'show') {
?>
      <!--sidebox start -->
      <div id="categories" class="dbx-box suf-widget">
        <h3 class="dbx-handle <?php echo $suf_sidebar_header;?>"><?php _e('Categories', 'suf_theme'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="archives" class="dbx-box suf-widget">
        <h3 class="dbx-handle <?php echo $suf_sidebar_header;?>"><?php _e('Archives', 'suf_theme'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php wp_get_archives('type=monthly'); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="links" class="dbx-box suf-widget">
        <h3 class="dbx-handle <?php echo $suf_sidebar_header;?>"><?php _e('Links', 'suf_theme'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="meta" class="dbx-box suf-widget">
        <h3 class="dbx-handle <?php echo $suf_sidebar_header;?>"><?php _e('Meta', 'suf_theme'); ?></h3>
        <div class="dbx-content">
          <ul>
				<?php wp_register(); ?>
				<li class="login"><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid XHTML', 'suf_theme'); ?></a></li>
					<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)', 'suf_theme'); ?></a></li>
              <li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)', 'suf_theme'); ?></a></li>
              <li class="wordpress"><a href="http://www.wordpress.org" title="Powered by WordPress">WordPress</a></li>
              <li><a href="http://dryicons.com/" title="DryIcons">DryIcons</a></li>
          </ul>
        </div>
      </div>
      <!--sidebox end -->
<?php 
	}
} 
?>
</div><!--/sidebar -->
