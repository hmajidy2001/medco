<?php 
/**
 * Invoked when no matches are found
 *
 * @package Suffusion
 * @subpackage Templates
 */

get_header(); 
?>
    <div id="main-col">
  	<div id="content">
      
    <div class="post">
	<h2><?php _e("Error 404 - Not Found", "suf_theme");?></h2>
		
		<div class="entry">
		<p><?php _e("Sorry, the page that you are looking for does not exist.", "suf_theme");?></p>	
		</div><!--/entry -->
	
		</div><!--/post -->
      </div><!-- /content -->
    </div><!-- main col -->
<?php get_footer(); ?>
