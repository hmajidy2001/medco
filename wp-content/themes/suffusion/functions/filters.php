<?php
/**
 * Defines a list of filter hooks and the functions tied to those hooks
 *
 * @package Suffusion
 * @subpackage Functions
 */

// First we will get all options from the database, then we will individually invoke the options within each function as required.
global $options;
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
    	$$value['id'] = $value['std'];
    }
    else {
    	$$value['id'] = get_option( $value['id'] );
    }
}

add_filter('get_pages', 'suffusion_replace_page_with_alt_title');

add_filter('the_content_more_link', 'suffusion_set_more_link');

add_filter('the_content', 'suffusion_pages_link', 8);

add_filter('comment_reply_link', 'suffusion_hide_reply_link_for_pings', 10, 4);
add_filter('get_comments_number', 'suffusion_filter_trk_ping_from_count');
add_filter('get_comments_pagenum_link', 'suffusion_append_comment_type');

function suffusion_replace_page_with_alt_title($pages, $args = array()) {
	if ($pages && is_array($pages)) {
		foreach ($pages as $page) {
			if (get_option("suf_alt_page_title_".$page->ID) === FALSE || trim(get_option("suf_alt_page_title_".$page->ID)) == "") {
			}
			else {
				$page->post_title = get_option("suf_alt_page_title_".$page->ID);
			}
		}
	}
	return $pages;
}

function suffusion_set_more_link($more_link_text) {
	return "<div class='more-link fix'>".$more_link_text."</div>";
}

function suffusion_pages_link($content) {
	$args = array(
		'before' => '<div class="page-links"><strong>'.__('Pages:', 'suf_theme').'</strong>',
		'after' => '</div>',
		'link_before' => '<span class="page-num">',
		'link_after' => '</span>',
		'next_or_number' => 'number',
		'echo' => 0
	);
	$content .= wp_link_pages($args);
	return $content;
}

function suffusion_hide_reply_link_for_pings($link, $custom_options = array(), $current_comment, $current_post) {
	global $suf_show_hide_reply_link_for_pings;
	if ($suf_show_hide_reply_link_for_pings != "allow") {
		if (($current_comment->comment_type != "") && ($current_comment->comment_type != "comment")) {
			$link = "";
		}
	}
	return $link;
}

function suffusion_filter_trk_ping_from_count($output) {
	global $post, $suf_show_track_ping;

	if (!is_admin()) {
		$all_comments = get_comments('status=approve&post_id=' . $post->ID);
		$comments_by_type = separate_comments($all_comments);
		$comments_number = count($comments_by_type['comment']);
		if ($suf_show_track_ping == "show" || $suf_show_track_ping == "separate") {
			return $output;
		}
		else {
			return $comments_number;
		}
	}
	else {
		return $output;
	}
}

function suffusion_get_comment_type_from_request() {
	global $post, $suf_show_track_ping, $SUFFUSION_COMMENT_TYPES;
	$comment_type = $_REQUEST['comment_type'];

	if ($comment_type == null || $comment_type == "" || $SUFFUSION_COMMENT_TYPES[$comment_type] == null) {
		$all_comments = get_comments('status=approve&post_id=' . $post->ID);
		$comments_by_type = separate_comments($all_comments);

		if (count($comments_by_type['comment']) > 0) {
			$comment_type = 'comment';
		}
		else if (count($comments_by_type['trackback']) > 0){
			$comment_type = 'trackback';
		}
		else if (count($comments_by_type['pingback']) > 0){
			$comment_type = 'pingback';
		}
	}
	return $comment_type;
}

function suffusion_list_comments() {
	global $suf_show_track_ping, $SUFFUSION_COMMENT_TYPES;
	if ($suf_show_track_ping == "show") {
		$commentargs = array(
			"avatar_size" => 48 
		);
	}
	else if ($suf_show_track_ping == "separate") {
		$comment_type = suffusion_get_comment_type_from_request();
		$commentargs = array(
			"avatar_size" => 48,
			"type" => "$comment_type"
		);
	}
	else if ($suf_show_track_ping == "hide") {
		$commentargs = array(
			"avatar_size" => 48,
			"type" => "comment"
		);
	}

	echo "<ol class=\"commentlist\">\n";
	wp_list_comments($commentargs); 
	echo "</ol>\n";
}

function suffusion_split_comments() {
	global $post, $suf_show_track_ping, $SUFFUSION_COMMENT_TYPES;
	
	if ($suf_show_track_ping != "separate") {
		return;
	}

	$all_comments = get_comments('status=approve&post_id=' . $post->ID);
	$comments_by_type = separate_comments($all_comments);

	echo "<div class=\"comment-response-types fix\">\n";
	foreach ($comments_by_type as $comment_type => $comment_type_list) {
		if ($comment_type == 'pings') {
			continue;
		}
		$type_number = count($comment_type_list);
		if ($type_number > 0) {
			$page_link = get_page_link($post->ID);
			$pretty_comment_type = $SUFFUSION_COMMENT_TYPES[$comment_type] == null ? $SUFFUSION_COMMENT_TYPES['comment'] : $SUFFUSION_COMMENT_TYPES[$comment_type];
			$request_comment_type = suffusion_get_comment_type_from_request();
			if ($request_comment_type != $comment_type) {
				$page_link = add_query_arg("comment_type", $comment_type, $page_link);
				echo "<a href=\"$page_link#comments\" class=\"comment-response-types\">".$pretty_comment_type." ($type_number)</a> ";
			}
			else {
				echo "<span class=\"comment-response-types\">".$pretty_comment_type." ($type_number)</span> ";
			}
		}
	}
	echo "</div>\n";
}

function suffusion_append_comment_type($link) {
	global $post, $suf_show_track_ping, $SUFFUSION_COMMENT_TYPES;
	
	if ($suf_show_track_ping != "separate") {
		return $link;
	}

	$comment_type = suffusion_get_comment_type_from_request();
	$link = add_query_arg("comment_type", $comment_type, $link);
	return $link;
}

function suffusion_comment_navigation() {
	global $suf_cpagination_type, $suf_cpagination_index, $suf_cpagination_prev_next, $suf_cpagination_show_all, $suf_show_track_ping, $SUFFUSION_COMMENT_TYPES;
	if ($suf_show_track_ping == 'show' || $suf_show_track_ping == 'hide') {
		$older = __("Older Comments", "suf_theme");
		$newer = __("Newer Comments", "suf_theme");
	}
	else {
		$comment_type = suffusion_get_comment_type_from_request();
		$older = sprintf(__('Older %1$s', 'suf_theme'), $SUFFUSION_COMMENT_TYPES[$comment_type]);
		$newer = sprintf(__('Newer %1$s', 'suf_theme'), $SUFFUSION_COMMENT_TYPES[$comment_type]);
	}
	if ($suf_cpagination_type == 'old-new') {
?>
	<div class="navigation fix">
		<div class="alignleft"><?php previous_comments_link("&laquo; $older"); ?></div>
		<div class="alignright"><?php next_comments_link("$newer &raquo;"); ?></div>
	</div>
<?php
	}
	else {
		// The user wants pagination
		global $wp_query, $cpage;
		$max_page = get_comment_pages_count();
		$prev_next = $suf_cpagination_prev_next == "show";
		$show_all = $suf_cpagination_show_all == "all";
		if (!$cpage && $max_page >= 1) {
			$current_page = 1;
		}
		else {
			$current_page = $cpage;
		}
		if ($max_page > 1) {
?>
		<div class="navigation fix"> 
			<div class="suf-page-nav fix"> 
<?php
			if ($suf_cpagination_index == "show") {
?>
				<span class="page-index"><?php printf(__('Page %1$s of %2$s', 'suf_theme'), $current_page, $max_page); ?></span>
<?php
			}
			echo paginate_comments_links(array(
				"base" => add_query_arg("cpage", "%#%"),
				"format" => '',
				"type" => "plain",
				"total" => $max_page,
				"current" => $current_page,
				"show_all" => $show_all,
				"end_size" => 2,
				"mid_size" => 2,
				"prev_next" => $prev_next,
				"next_text" => $older." &raquo;",
				"prev_text" => "&laquo; ".$newer,
			));
?>
			</div><!-- suf page nav -->
		</div><!-- page nav -->
<?php
		}
	}
}

function suffusion_filter_comment_gravatars() {
}
?>
