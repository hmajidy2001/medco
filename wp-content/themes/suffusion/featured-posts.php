<?php
/**
 * Creates a "Featured Posts" section for your blog.
 * Depending on the criteria you set, your featured posts can be picked 
 * from the "Sticky Posts", or based on a category that you define
 *
 * @package Suffusion
 * @subpackage Template
 */

global $options, $spawned_options;
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
    	$$value['id'] = $value['std'];
    }
    else {
    	$$value['id'] = get_option( $value['id'] );
    }
}

function suffusion_display_featured_posts($echo = true) {
	global $suf_featured_category_view, $suf_featured_tag_view, $suf_featured_search_view, $suf_featured_author_view, $suf_featured_time_view, $suf_featured_index_view;
	global $suf_featured_allow_sticky, $suf_featured_num_posts, $suf_featured_excerpt_position, $feautred_excerpt_position, $featured_post_counter, $excerpt_position;
	global $rotation, $alttb, $altlr;
	$ret = "";
	if ((is_category() && $suf_featured_category_view == "enabled") ||
		(is_tag() && $suf_featured_tag_view == "enabled") ||
		(is_search() && $suf_featured_search_view == "enabled") ||
		(is_author() && $suf_featured_author_view == "enabled") ||
		((is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_time_view == "enabled") ||
		(!(is_category() || is_tag() || is_search() || is_author() || is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_index_view == "enabled")) {
			
		$stickies = get_option('sticky_posts');
		$featured_categories = suf_get_allowed_categories('suf_featured_selected_categories');
		$featured_pages = suf_get_allowed_pages('suf_featured_selected_pages');
		if (is_array($stickies) && count($stickies) > 0 && $suf_featured_allow_sticky == "show") {
			$sticky_query = new WP_query(array('post__in' => $stickies));
		}
		if (is_array($featured_categories) && count($featured_categories) > 0) {
			$query_cats = array();
			foreach ($featured_categories as $featured_category) {
				$query_cats[count($query_cats)] = $featured_category->cat_ID;
			}
			$query_posts = implode(",", array_values($query_cats));
			$cat_query = new WP_query(array('cat' => $query_posts, 'post__not_in' => $stickies, 'posts_per_page' => $suf_featured_num_posts));
		}
		if (is_array($featured_pages) && count($featured_pages) > 0) {
			$query_pages = array();
			foreach ($featured_pages as $featured_page) {
				$query_pages[count($query_pages)] = $featured_page->ID;
			}
			$page_query = new WP_query(array('post_type' => 'page', 'post__in' => $query_pages, 'posts_per_page' => $suf_featured_num_posts, 'caller_get_posts' => 1));
		}
		
		$total_count = 0;
		if (isset($sticky_query->posts) && is_array($sticky_query->posts)) {
			$total_count += count($sticky_query->posts);
		}
		if (isset($cat_query->posts) && is_array($cat_query->posts)) {
			$total_count += count($cat_query->posts);
		}
		if (isset($page_query->posts) && is_array($page_query->posts)) {
			$total_count += count($page_query->posts);
		}
		if ($total_count > 0) {
			$alttb = array("top", "bottom");
			$altlr = array("left", "right");
			$rotation = array("top", "bottom", "left", "right");
			if (in_array($suf_featured_excerpt_position, $rotation)) {
				$excerpt_position = $suf_featured_excerpt_position;
			}
			$feautred_excerpt_position = 0;
			$featured_post_counter = 0;
			$ret .= "<div id=\"featured-posts\" class=\"fix\">";
			$ret .= "\t<div id=\"slider\" class=\"fix clear\">";
			$ret .= "\t\t<ul id=\"sliderContent\" class=\"fix clear\">";
			$ret .= suffusion_parse_featured_query_results($sticky_query);
			$ret .= suffusion_parse_featured_query_results($cat_query);
			$ret .= suffusion_parse_featured_query_results($page_query);
			$ret .= "\t\t</ul>";
			$ret .= "\t</div>";
			$ret .= suffusion_display_featured_pager($echo);
			$ret .= "</div>";
		}
	}
	if ($echo) {
		echo $ret;
	}
	return $ret;
}

function suffusion_parse_featured_query_results($query) {
	global $feautred_excerpt_position, $featured_post_counter, $suf_featured_num_posts, $suf_featured_excerpt_position, $excerpt_position, $rotation, $alttb, $altlr;
	$ret = "";
	if (isset($query->posts) && is_array($query->posts)) {
		while ($query->have_posts())  {
			if ($featured_post_counter >= $suf_featured_num_posts) {
				break;
			}
			$query->the_post();
			if ($suf_featured_excerpt_position == "rotate") {
				$excerpt_position = $rotation[$feautred_excerpt_position%4];
			}
			else if ($suf_featured_excerpt_position == "alttb") {
				$excerpt_position = $alttb[$feautred_excerpt_position%2];
			}
			else if ($suf_featured_excerpt_position == "altlr") {
				$excerpt_position = $altlr[$feautred_excerpt_position%2];
			}
			$feautred_excerpt_position++;
			$ret .= suffusion_display_single_featured_post($feautred_excerpt_position, $excerpt_position);
			$featured_post_counter++;
		}
	}
	return $ret;
}

function suffusion_display_single_featured_post($position, $excerpt_position) {
	global $suf_featured_excerpt_type, $post;
	$ret = "<li class=\"sliderImage sliderimage-$position\">";
	$ret .= suffusion_get_image(array('featured' => true, 'excerpt_position' => $excerpt_position, 'default' => true));
	if ($suf_featured_excerpt_type != 'none') {
		$ret .= "<div class=\"$excerpt_position\">";
		$ret .= "<p>";
		$ret .= "<a href=\"".get_permalink($post->ID)."\">";
		if ($suf_featured_excerpt_type != 'excerpt') { 
			$ret .= get_the_title($post->ID); 
		}
		$ret .= "</a>";
		if ($suf_featured_excerpt_type != 'title') {
			$excerpt = get_the_excerpt();
			$ret .= apply_filters('the_excerpt', $excerpt); 
		}
		$ret .= "</p>";
		$ret .= "</div>";
	}
	$ret .= "</li>";
	return $ret;
}

function suffusion_display_featured_pager() {
	global $suf_featured_pager, $suf_featured_controller;
	$ret = "";
	if ($suf_featured_pager == 'show' || $suf_featured_controller == 'show') {
		$ret .= "<div id='sliderIndex' class='fix'>";
		if ($suf_featured_pager == 'show') {
			$ret .= "<div id=\"sliderPager\">";
			$ret .= "</div>";
		}
		if ($suf_featured_controller == 'show') {
			$ret .= "<div id=\"sliderControl\">";
			$ret .= "\t<a class='sliderPrev' href='#'>&laquo; ". __('Previous Post', 'suf_theme')."</a>";
			$ret .= "\t<a class='sliderPause' href='#'>". __('Pause', 'suf_theme')."</a>";
			$ret .= "\t<a class='sliderNext' href='#'>". __('Next Post', 'suf_theme'). " &raquo;</a>";
			$ret .= "</div>";
		}
		$ret .= "</div>";
	}
	return $ret;
}
?>
