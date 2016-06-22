<?php
/**
 * Constructs a tabbed box in the sidebar with different pseudo-widgets.
 * This is only shown when you have at least one sidebar displayed on the page.
 * Currently the standard WordPress widgets are supported here.
 * There are plans to add support for some popular widgets later
 */

global $sidebar_tabs, $options, $tabs_alignment;
foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
    	$$value['id'] = $value['std'];
    }
    else {
    	$$value['id'] = get_option( $value['id'] );
    }
}

function suffusion_sbtab_archives() {
	global $suf_sbtab_archives_type, $suf_sbtab_archives_post_count, $suf_sbtab_archives_list_type;
	$args = array('type' => $suf_sbtab_archives_type);
	if ($suf_sbtab_archives_post_count == 'show') {
		$args['show_post_count'] = true;
	}

	$args['format'] = $suf_sbtab_archives_list_type;
	if ($suf_sbtab_archives_list_type == 'html') {
		echo '<ul>';
	}
	else {
		echo "<select onChange='document.location.href=this.options[this.selectedIndex].value;'>\n";
		echo "<option value=''>".__('Select', 'suf_theme')."</option>";
	}
	wp_get_archives($args);
	if ($suf_sbtab_archives_list_type == 'html') {
		echo '</ul>';
	}
	else {
		echo '</select>';
	}
}

function suffusion_sbtab_categories() {
	global $suf_sbtab_categories_hierarchical, $suf_sbtab_categories_post_count;
	$args = array('use_desc_for_title' => false, 'orderby' => 'name', 'title_li' => false);
	if ($suf_sbtab_categories_hierarchical == 'flat') {
		$args['hierarchical'] = false;
	}
	if ($suf_sbtab_categories_post_count == 'show') {
		$args['show_count'] = true;
	}
	echo '<ul>';
	wp_list_categories($args);
	echo '</ul>';
}

function suffusion_sbtab_links() {
	echo '<ul>';
	wp_list_bookmarks(array('categorize' => false, 'title_li' => false));
	echo '</ul>';
}

function suffusion_sbtab_meta() {
	echo '<ul>';
	wp_register();
?>
		<li><?php wp_loginout(); ?></li>
		<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0', 'suf_theme')); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>', 'suf_theme'); ?></a></li>
		<li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php echo esc_attr(__('The latest comments to all posts in RSS', 'suf_theme')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>', 'suf_theme'); ?></a></li>
<?php
	wp_meta();
	echo '</ul>';
}

function suffusion_sbtab_pages() {
	echo '<ul>';
	wp_list_pages(array('title_li' => false));
	echo '</ul>';
}

function suffusion_sbtab_recent_comments() {
	global $comment;
	echo '<ul>';
	$comments = get_comments(array('status' => 'approve', 'number' => 10));
	if ($comments) { 
		foreach ((array) $comments as $comment) {
			echo  '<li>' . sprintf(_x('%1$s on %2$s', 'widgets'), get_comment_author_link(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		}
	}
	echo '</ul>';
}

function suffusion_sbtab_recent_posts() {
	echo '<ul>';
	wp_get_archives(array('type' => 'postbypost', 'limit' => 10));
	echo '</ul>';
}

function suffusion_sbtab_search() {
	include (TEMPLATEPATH . '/searchform.php');
}

function suffusion_sbtab_tag_cloud() {
	wp_tag_cloud();
}

function suffusion_sbtab_custom_tab_1() {
	global $suf_sbtab_custom_tab_1_contents;
	echo stripslashes($suf_sbtab_custom_tab_1_contents);
}

function suffusion_sbtab_custom_tab_2() {
	global $suf_sbtab_custom_tab_2_contents;
	echo stripslashes($suf_sbtab_custom_tab_2_contents);
}

function suffusion_sbtab_custom_tab_3() {
	global $suf_sbtab_custom_tab_3_contents;
	echo stripslashes($suf_sbtab_custom_tab_3_contents);
}

function suffusion_sbtab_custom_tab_4() {
	global $suf_sbtab_custom_tab_4_contents;
	echo stripslashes($suf_sbtab_custom_tab_4_contents);
}

function suffusion_sbtab_custom_tab_5() {
	global $suf_sbtab_custom_tab_5_contents;
	echo stripslashes($suf_sbtab_custom_tab_5_contents);
}

function suffusion_sbtab_custom_tab_6() {
	global $suf_sbtab_custom_tab_6_contents;
	echo stripslashes($suf_sbtab_custom_tab_6_contents);
}

function suffusion_sbtab_custom_tab_7() {
	global $suf_sbtab_custom_tab_7_contents;
	echo stripslashes($suf_sbtab_custom_tab_7_contents);
}

function suffusion_sbtab_custom_tab_8() {
	global $suf_sbtab_custom_tab_8_contents;
	echo stripslashes($suf_sbtab_custom_tab_8_contents);
}

function suffusion_sbtab_custom_tab_9() {
	global $suf_sbtab_custom_tab_9_contents;
	echo stripslashes($suf_sbtab_custom_tab_9_contents);
}

function suffusion_sbtab_custom_tab_10() {
	global $suf_sbtab_custom_tab_10_contents;
	echo stripslashes($suf_sbtab_custom_tab_10_contents);
}

?>

	<div class="tab-box tab-box-<?php echo $tabs_alignment; ?> fix">
	<!-- The tabs -->
	<ul class="sidebar-tabs">
<?php
$first = true;
foreach ($sidebar_tabs as $sidebar_tab => $sidebar_tab_details) {
	$option_name = 'suf_sbtab_widgets_'.$sidebar_tab;
	if (get_option($option_name) === FALSE) {
	}
	else {
		$first_class = '';
		if ($first) {
			$first = false;
			$first_class = 'sbtab-first';
		}
		$title_field = 'suf_sbtab_'.$sidebar_tab.'_title';
		if ($$title_field) {
			$title_value = $$title_field;
		}
		else {
			$title_value = $sidebar_tab_details['title'];
		}
?>
		<li class="sbtab-<?php echo $sidebar_tab; ?> sidebar-tab <?php echo $first_class; ?>"><a class="sbtab-<?php echo $sidebar_tab; ?> tab" title="<?php echo $title_value; ?>"><?php echo $title_value; ?></a></li>
<?php
	}
}
?>
	</ul>

<?php
$first = true;
foreach ($sidebar_tabs as $sidebar_tab => $sidebar_tab_details) {
	$option_name = 'suf_sbtab_widgets_'.$sidebar_tab;
	if (get_option($option_name) === FALSE) {
	}
	else {
		$first_class = '';
		if ($first) {
			$first = false;
			$first_class = 'sbtab-content-first';
		}
?>
		<div class="sbtab-content-<?php echo $sidebar_tab; ?> sidebar-tab-content <?php echo $first_class; ?>">
<?php
		$sbtab_function = 'suffusion_sbtab_'.$sidebar_tab;
		if (function_exists($sbtab_function)) {
			$sbtab_function();
		}
		else {
			echo $sidebar_tab_details['title'];
		}
?>
	</div>
<?php
	}
}
?>
</div><!-- tab-box -->


