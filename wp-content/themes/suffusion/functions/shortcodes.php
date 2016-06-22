<?php
/**
 * Contains a list of all custom shortcodes and corresponding functions defined for Suffusion. 
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Functions
 */

//add_shortcode('suffusion-featured', 'suffusion_sc_featured_posts');
add_shortcode('suffusion-categories', 'suffusion_sc_list_categories');

function suffusion_sc_featured_posts() {
	return suffusion_display_featured_posts(false);
}

function suffusion_sc_list_categories($attr) {
	if ($attr['title_li']) {
		$attr['title_li'] = shortcode_string_to_bool($attr['title_li']);
	}
	if ($attr['hierarchical']) {
		$attr['hierarchical'] = shortcode_string_to_bool($attr['hierarchical']);
	}
	if ($attr['use_desc_for_title']) {
		$attr['use_desc_for_title'] = shortcode_string_to_bool($attr['use_desc_for_title']);
	}
	if ($attr['hide_empty']) {
		$attr['hide_empty'] = shortcode_string_to_bool($attr['hide_empty']);
	}
	if ($attr['show_count']) {
		$attr['show_count'] = shortcode_string_to_bool($attr['show_count']);
	}
	if ($attr['show_last_update']) {
		$attr['show_last_update'] = shortcode_string_to_bool($attr['show_last_update']);
	}

	$attr['child_of'] = (int)$attr['child_of'];
	$attr['depth'] = (int)$attr['depth'];
	$attr['echo'] = false;

	$output = wp_list_categories( $attr );

	return $output;
}

?>
