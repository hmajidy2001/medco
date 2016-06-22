<?php
/**
 * Search form
 *
 * @package Suffusion
 * @subpackage Templates
 */
?>

<form method="get" class="searchform" action="<?php bloginfo('home'); ?>/">
	<input type="text" value="<?php _e('Search','suf_theme');?>" name="s" class="searchfield" onfocus="if (this.value == '<?php _e("Search","suf_theme");?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search","suf_theme");?>';}" />
	<input type="submit" class="searchsubmit" value="" name="searchsubmit" />
</form>
