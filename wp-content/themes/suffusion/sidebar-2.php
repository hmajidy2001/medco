<?php
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

<div class="dbx-group <?php echo $suf_sidebar_2_alignment;?>" id="sidebar-2">

  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
  <?php endif; ?>

</div><!--/sidebar-2 -->
