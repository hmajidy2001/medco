<?php
/**
 * Contains a list of all custom action hooks and corresponding functions defined for Suffusion. 
 * This file is included in functions.php
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

//
// The following section defines different hooks with actions
//

add_action('wp_print_styles', 'suffusion_disable_plugin_styles');

add_action('suffusion_document_header', 'suffusion_include_skin');
add_action('suffusion_document_header', 'suffusion_include_dbx');
add_action('suffusion_document_header', 'suffusion_include_featured_js');
add_action('suffusion_document_header', 'suffusion_include_sidebar_tabs_js');
add_action('suffusion_document_header', 'suffusion_include_magazine_js');
add_action('suffusion_document_header', 'suffusion_include_jqfix_js');
add_action('suffusion_document_header', 'suffusion_include_ie_fixes');
add_action('suffusion_document_header', 'suffusion_include_custom_styles');
add_action('suffusion_document_header', 'suffusion_include_custom_header_js');
add_action('suffusion_document_header', 'suffusion_include_custom_js_files');

add_action('suffusion_page_header', 'suffusion_display_header');
add_action('suffusion_page_header', 'suffusion_display_navigation');

add_action('suffusion_page_navigation', 'suffusion_display_hierarchical_navigation');

add_action('suffusion_after_begin_container', 'suffusion_print_widget_area_below_header');
add_action('suffusion_after_begin_container', 'suffusion_print_left_sidebars');

add_action('suffusion_before_begin_content', 'suffusion_featured_posts');
add_action('suffusion_after_begin_content', 'suffusion_template_specific_header');

add_action('suffusion_content', 'suffusion_excerpt_or_content');

add_action('suffusion_after_begin_post', 'suffusion_print_post_page_title');

add_action('suffusion_before_end_post', 'suffusion_post_footer');

add_action('suffusion_before_end_content', 'suffusion_pagination');

add_action('suffusion_before_end_container', 'suffusion_print_right_sidebars');
add_action('suffusion_before_end_container', 'suffusion_print_widget_area_above_footer');

add_action('suffusion_page_footer', 'suffusion_display_footer');

add_action('suffusion_document_footer', 'suffusion_include_custom_footer_js');

/*
 * The following section says what to do for each action
 */
function suffusion_document_header() {
	do_action('suffusion_document_header');
}

function suffusion_page_header() {
	do_action('suffusion_page_header');
}

function suffusion_after_begin_container() {
	do_action('suffusion_after_begin_container');
}

function suffusion_before_begin_content() {
	do_action('suffusion_before_begin_content');
}

function suffusion_after_begin_content() {
	do_action('suffusion_after_begin_content');
}

function suffusion_content() {
	do_action('suffusion_content');
}

function suffusion_after_begin_post() {
	do_action('suffusion_after_begin_post');
}

function suffusion_before_end_post() {
	do_action('suffusion_before_end_post');
}

function suffusion_before_end_content() {
	do_action('suffusion_before_end_content');
}

function suffusion_before_end_container() {
	do_action('suffusion_before_end_container');
}

function suffusion_page_footer() {
	do_action('suffusion_page_footer');
}

function suffusion_document_footer() {
	do_action('suffusion_document_footer');
}

function suffusion_page_navigation() {
	do_action('suffusion_page_navigation');
}

//
// This section defines the individual callback functions
//

/*
 * Determines the theme selected by the user and includes the stylesheet for it
 */
function suffusion_include_skin() {
	global $suf_color_scheme;
	$skin = "dark-green.css";
	if (substr($suf_color_scheme, 0, 10) == "dark-theme") {
		$skin = "dark-".substr($suf_color_scheme, 11).".css";
	}
	else {
		$skin = substr($suf_color_scheme, 12).".css";
	}
?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/<?php echo $skin;?>" type="text/css" media="all"/>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/plugins.css" type="text/css" media="all"/>
<?php
	if (($rtl = get_locale_stylesheet_uri()) != '') {
?>
		<link rel="stylesheet" href="'.<?php echo $rtl; ?>.'" type="text/css" media="all" />
<?php
	}
?>
<!--		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/rtl.css" type="text/css" media="all" />-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />
<?php
}

function suffusion_include_dbx() {
	global $suf_sidebar_1_dnd, $suf_sidebar_2_dnd, $suf_sidebar_1_expcoll, $suf_sidebar_2_expcoll, $suf_sidebar_count;
	if (is_page_template('no-sidebars.php') || $suf_sidebar_count == 0 ||
		($suf_sidebar_count == 1 && $suf_sidebar_1_dnd != "enabled") || 
		($suf_sidebar_1_dnd != "enabled" && $suf_sidebar_2_dnd != "enabled")) {
		// No point in including the rather large dbx.js if Drag-and-drop is disabled for both sidebars, or if the sidebars themselves are disabled.
	}
	else {
		$expcoll_1 = $suf_sidebar_1_expcoll == "enabled" ? "yes" : "no";
		$expcoll_2 = $suf_sidebar_2_expcoll == "enabled" ? "yes" : "no";
?>
	<!-- Sidebar docking boxes (dbx) by Brothercake - http://www.brothercake.com/ -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/dbx.js"></script>
	<script type="text/javascript">
	/* <![CDATA[ */
	window.onload = function() {
		//initialise the docking boxes manager
		var manager = new dbxManager('main'); 	//session ID [/-_a-zA-Z0-9/]
		
<?php
		if ($suf_sidebar_1_dnd == "enabled") {?>
		//create new docking boxes group
		var sidebar = new dbxGroup(
			'sidebar', 		// container ID [/-_a-zA-Z0-9/]
			'vertical', 		// orientation ['vertical'|'horizontal']
			'7', 			// drag threshold ['n' pixels]
			'no',			// restrict drag movement to container axis ['yes'|'no']
			'10', 			// animate re-ordering [frames per transition, or '0' for no effect]
			'<?php echo $expcoll_1; ?>', 			// include open/close toggle buttons ['yes'|'no']
			'open', 		// default state ['open'|'closed']
			'open', 		// word for "open", as in "open this box"
			'close', 		// word for "close", as in "close this box"
			'click-down and drag to move this box', // sentence for "move this box" by mouse
			'click to %toggle% this box', // pattern-match sentence for "(open|close) this box" by mouse
			'use the arrow keys to move this box', // sentence for "move this box" by keyboard
			', or press the enter key to %toggle% it',  // pattern-match sentence-fragment for "(open|close) this box" by keyboard
			'%mytitle%  [%dbxtitle%]' // pattern-match syntax for title-attribute conflicts
		);
<?php
		}
		if ($suf_sidebar_count > 1) {
			if ($suf_sidebar_2_dnd == "enabled") {
?>
		var sidebar_2 = new dbxGroup(
			'sidebar-2', 		// container ID [/-_a-zA-Z0-9/]
			'vertical', 		// orientation ['vertical'|'horizontal']
			'7', 			// drag threshold ['n' pixels]
			'no',			// restrict drag movement to container axis ['yes'|'no']
			'10', 			// animate re-ordering [frames per transition, or '0' for no effect]
			'<?php echo $expcoll_2; ?>', 			// include open/close toggle buttons ['yes'|'no']
			'open', 		// default state ['open'|'closed']
			'open', 		// word for "open", as in "open this box"
			'close', 		// word for "close", as in "close this box"
			'click-down and drag to move this box', // sentence for "move this box" by mouse
			'click to %toggle% this box', // pattern-match sentence for "(open|close) this box" by mouse
			'use the arrow keys to move this box', // sentence for "move this box" by keyboard
			', or press the enter key to %toggle% it',  // pattern-match sentence-fragment for "(open|close) this box" by keyboard
			'%mytitle%  [%dbxtitle%]' // pattern-match syntax for title-attribute conflicts
		);
<?php
			}
		}?>
	};
	/* ]]> */
	</script>

<?php
	}
	// We will include the css, nonetheless, because we require the styles from it ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/dbx.css" media="screen, projection" />

<?php
}

function suffusion_include_ie_fixes() {?>
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie-fix.css" type="text/css" media="all" />
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

<!--[if lt IE 7]>
<script src="<?php bloginfo('stylesheet_directory'); ?>/belatedpng.js"></script>
<script>
	//Drew Diller's Belated PNG: http://dillerdesign.wordpress.com/2009/07/02/belatedpng-img-nodes-javascript-event-handling/
  	DD_belatedPNG.fix('.png_bg, img, .suf-widget ul li, #sidebar ul li, #sidebar-2 ul li, .sidebar-tab-content ul li, li.suf-mag-catblock-post, input, .searchform .searchsubmit, submit, .searchsubmit, .postdata .category, .postdata .comments, .postdata .edit, .previous-entries a, .next-entries a, .post-nav .next a, .post-nav .previous a, .post .date, h3#comments, #h3#respond, input.searchsubmit');
 </script>
<![endif]-->

<?php
}

function suffusion_include_custom_styles() {
	global $suf_custom_css_link_1, $suf_custom_css_link_2, $suf_custom_css_link_3, $suf_custom_css_code;
?>
	<!-- CSS styles constructed using option definitions -->
	<style type="text/css">
<?php
	include_once (TEMPLATEPATH . '/custom-styles.php');
?>
	</style>
	<!-- /CSS styles constructed using option definitions -->

	<!-- Custom CSS stylesheets linked through options -->
<?php 
	if (isset($suf_custom_css_link_1) && trim($suf_custom_css_link_1) != "") { ?>
	<link rel="stylesheet" href="<?php echo $suf_custom_css_link_1; ?>" type="text/css" media="all" />
<?php
	}
	if (isset($suf_custom_css_link_2) && trim($suf_custom_css_link_2) != "") {?>
	<link rel="stylesheet" href="<?php echo $suf_custom_css_link_2; ?>" type="text/css" media="all" />
<?php
	}
	if (isset($suf_custom_css_link_3) && trim($suf_custom_css_link_3) != "") {?>
	<link rel="stylesheet" href="<?php echo $suf_custom_css_link_3; ?>" type="text/css" media="all" />
<?php }?>
	<!-- /Custom CSS stylesheets -->

<?php
if (isset($suf_custom_css_code) && trim($suf_custom_css_code) != "") { ?>
	<!-- Custom CSS styles defined in options -->
	<style type="text/css">
<?php echo stripslashes($suf_custom_css_code); ?>
	</style>
	<!-- /Custom CSS styles defined in options -->
<?php }
}

function suffusion_include_custom_header_js() {
	global $suf_custom_header_js;
	if (isset($suf_custom_header_js) && trim($suf_custom_header_js) != "") {?>
<!-- Custom JavaScript for header defined in options -->
<script type="text/javascript">
/* <![CDATA[ */
<?php echo stripslashes($suf_custom_header_js)."\n"; ?>
/* ]]> */
</script>
<!-- /Custom JavaScript for header defined in options -->
<?php
	}
}

function suffusion_display_header() {
	global $suf_sub_header_vertical_alignment, $suf_header_fg_image_type, $suf_header_fg_image; ?>
    <div id="header" class="fix">
	<?php $header = $suf_header_fg_image_type == 'image' ? "<img src='$suf_header_fg_image' alt='".get_bloginfo('name')."'/>" : get_bloginfo('name');
	if ($suf_sub_header_vertical_alignment == "above") {	?>
   		<div class="description"><?php echo bloginfo('description');?></div>
   		<h1 class="blogtitle"><a href="<?php echo get_option('home');?>"><?php echo $header;?></a></h1>
	<?php
	}
	else {	?>
   		<h1 class="blogtitle"><a href="<?php echo get_option('home');?>"><?php echo $header;?></a></h1>
   		<div class="description"><?php echo bloginfo('description');?></div>
<?php
	}	?>
    </div><!-- /header -->
<?php
}

function suffusion_display_navigation() {
	global $suf_nav_contents;
?>
 	<div id="nav" class="fix">
<?php
	//Two options using native WP functionality:
	//1. wp_list_pages('title_li=&sort_column=menu_order&depth=3'); // This will need you to add the starting and ending <ul> tags
	//2. wp_page_menu('show_home=Home&menu_class=nav'); // This needs nothing and even creates the div. Works only for WP 2.7+
	//I am using a custom function here because I want to show the ">" for items with a dropdown. Also, page exclusions don't work as desired with standard functionality.
	if ($suf_nav_contents == "pages") {
		create_nav();
	}
	suffusion_display_right_header_widgets();
?>
	</div><!-- /nav -->
<?php
}

function suffusion_display_right_header_widgets() {
	global $suf_right_header_widgets_enabled, $suf_show_search;
	if ($suf_right_header_widgets_enabled == "enabled") {?>
		<!-- right-header-widgets -->
		<div id="right-header-widgets">
		<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Header Widgets') ) {
				if ($suf_show_search == "show") {
					include (TEMPLATEPATH . '/searchform.php'); 
				}
			}
		?>
		</div>
		<!-- /right-header-widgets -->
<?php
	}
}

/*
 * Displays the widget area below the header, if it is enabled.
 */
function suffusion_print_widget_area_below_header() {
	global $suf_widget_area_below_header_enabled, $suf_ns_wabh_enabled;
	if ($suf_widget_area_below_header_enabled == "enabled") {
		if (is_page_template('no-sidebars.php') && $suf_ns_wabh_enabled == 'not-enabled') { 
		}
		else { ?>
	<!-- horizantal-outer-widgets-1 Widget Area -->
	<div id="horizontal-outer-widgets-1" class="dbx-group fix">
		<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Area Below Header')) {
			}
		?>
	</div>
	<!-- /horizantal-outer-widgets-1 --><?php
		}
	}
}

/*
 * Prints the left sidebars, if the sidebars are enabled and are positioned on the left
 */
function suffusion_print_left_sidebars() {
	global $suf_sidebar_count, $suf_sidebar_alignment, $suf_sidebar_2_alignment, $suf_sbtab_alignment, $tabs_alignment, $suf_sbtab_enabled;
	if (is_page_template("no-sidebars.php") || is_page_template("no-widgets.php")) {
		return;
	}

	if ($suf_sbtab_enabled == 'enabled' && (($suf_sidebar_count == 1 && $suf_sidebar_alignment == 'left') 
		|| ($suf_sidebar_count == 2 && ($suf_sidebar_alignment == 'left' || $suf_sidebar_2_alignment == 'left') && $suf_sbtab_alignment == 'left') 
		|| ($suf_sidebar_count == 2 && $suf_sidebar_alignment == 'left' && $suf_sidebar_2_alignment == 'left'))) {
		echo "<div id='sidebar-container' class='sidebar-container-left fix'>";
		$tabs_alignment = 'left';
		include_once (TEMPLATEPATH . '/sidebar-tabs.php');
	}
	
	if ($suf_sidebar_count > 0) {
		if ($suf_sidebar_alignment == "left") {
			get_sidebar();
		}
	}

	if ($suf_sidebar_count > 1) {
		if ($suf_sidebar_2_alignment == "left") {
			get_sidebar(2);
		}
	}

	if ($suf_sbtab_enabled == 'enabled' && (($suf_sidebar_count == 1 && $suf_sidebar_alignment == 'left') 
		|| ($suf_sidebar_count == 2 && ($suf_sidebar_alignment == 'left' || $suf_sidebar_2_alignment == 'left') && $suf_sbtab_alignment == 'left') 
		|| ($suf_sidebar_count == 2 && $suf_sidebar_alignment == 'left' && $suf_sidebar_2_alignment == 'left'))) {
		echo "</div> <!-- /#sidebar-container -->";
	}
}

/*
 * Displays the right sidebars, if the sidebars are enabled and are positioned on the right
 */
function suffusion_print_right_sidebars() {
	global $suf_sidebar_count, $suf_sidebar_alignment, $suf_sidebar_2_alignment, $suf_sbtab_alignment, $tabs_alignment, $suf_sbtab_enabled;
	if (is_page_template("no-sidebars.php") || is_page_template("no-widgets.php")) {
		return;
	}

	if ($suf_sbtab_enabled == 'enabled' && (($suf_sidebar_count == 1 && $suf_sidebar_alignment == 'right') 
		|| ($suf_sidebar_count == 2 && ($suf_sidebar_alignment == 'right' || $suf_sidebar_2_alignment == 'right') && $suf_sbtab_alignment == 'right') 
		|| ($suf_sidebar_count == 2 && $suf_sidebar_alignment == 'right' && $suf_sidebar_2_alignment == 'right'))) {
		echo "<div id='sidebar-container' class='sidebar-container-right fix'>";
		$tabs_alignment = 'right';
		include_once (TEMPLATEPATH . '/sidebar-tabs.php');
	}
	
	if ($suf_sidebar_count > 0) {
		if ($suf_sidebar_alignment == "right") {
			get_sidebar();
		}
	}
	
	if ($suf_sidebar_count > 1) {
		if ($suf_sidebar_2_alignment == "right") {
			get_sidebar(2);
		}
	}

	if ($suf_sbtab_enabled == 'enabled' && (($suf_sidebar_count == 1 && $suf_sidebar_alignment == 'right') 
		|| ($suf_sidebar_count == 2 && ($suf_sidebar_alignment == 'right' || $suf_sidebar_2_alignment == 'right') && $suf_sbtab_alignment == 'right') 
		|| ($suf_sidebar_count == 2 && $suf_sidebar_alignment == 'right' && $suf_sidebar_2_alignment == 'right'))) {
		echo "</div> <!-- /#sidebar-container -->";
	}
}

/*
 * Displays the widget area above the footer, if it is enabled.
 */
function suffusion_print_widget_area_above_footer() {
	global $suf_widget_area_above_footer_enabled, $suf_ns_waaf_enabled;
	if ($suf_widget_area_above_footer_enabled == "enabled") {
		if (is_page_template('no-sidebars.php') && ($suf_ns_waaf_enabled == 'not-enabled')) {
		}
		else { ?>
	<!-- horizantal-outer-widgets-2 Widget Area -->
	<div id="horizontal-outer-widgets-2" class="fix">
		<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Area Above Footer') ) {
			}
		?>
	</div>
	<!-- /horizantal-outer-widgets-2 -->
<?php
		}
	}
}

function suffusion_display_footer() {
	global $suf_footer_left, $suf_footer_center;
?>
	<div id="cred">
		<table>
			<tr>
				<td class="cred-left"><?php echo stripslashes($suf_footer_left); ?></td>
				<td class="cred-center"><?php echo stripslashes($suf_footer_center); ?></td>
			</tr>
		</table>
	</div>

<!--	<div class="designer">&copy; 2009 </div>
	<div class="valid"></div> -->
<!--	<div class="valid fix"><a href="http://validator.w3.org/check/referer">Valid XHTML</a></div>-->
<!--  </div>--><!-- cred -->

<!-- <?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds. -->
<?php
}

function suffusion_include_custom_footer_js() {
	global $suf_custom_footer_js;
	if (isset($suf_custom_footer_js) && trim($suf_custom_footer_js) != "") {
?>
<!-- Custom JavaScript for footer defined in options -->
<script type="text/javascript">
/* <![CDATA[ */
	<?php echo stripslashes($suf_custom_footer_js)."\n"; ?>
/* ]]> */
</script>
<!-- /Custom JavaScript for footer defined in options -->
<?php }
}

function suffusion_get_siblings_in_nav($ancestors, $index, $exclusion_list, $exclude, $echo = 1) {
	if (count($ancestors) <= $index || $index < 0) {
		return;
	}
	$exclusion_query = $exclude == "hide" ? "&exclude=".$exclusion_list : "";
	$children = wp_list_pages("title_li=&child_of=".$ancestors[$index]."&echo=".$echo.$exclusion_query);
	return $children;
}

function suffusion_display_hierarchical_navigation() {
	global $post, $suf_nav_breadcrumb, $suf_nav_exclude_in_breadcrumb;
	$ancestors = $post->ancestors;
	$exclusion_list = get_excluded_pages("suf_nav_pages");
	$num_ancestors = count($ancestors);
	
	if ($suf_nav_breadcrumb == "all") {
		for ($anc_index = 1; $num_ancestors - $anc_index >= 0; $anc_index++) {
			$style = ($anc_index == 1) ? "subnav" : "l".($anc_index + 1)."nav";
?>
	<div id="<?php echo $style;?>" class="fix">
		<ul> 
			<?php suffusion_get_siblings_in_nav($ancestors, $num_ancestors - $anc_index, $exclusion_list, $suf_nav_exclude_in_breadcrumb); ?>
		</ul>
	</div><?php echo "<!-- /".$style."-->"; ?>
<?php
		}
		$exclusion_query = $suf_nav_exclude_in_breadcrumb == "hide" ? "&exclude_tree=".$exclusion_list : "";
		$style = ($num_ancestors == 0) ? "subnav" : "l".($num_ancestors + 2)."nav";
		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0".$exclusion_query);
		if ($children) {
	?>
	<div id="<?php echo $style;?>" class="fix">
		<ul>
			<?php echo $children; ?>
		</ul>
	</div><!-- /sub nav -->
<?php
		}
	}
	suffusion_create_navigation_breadcrumb();
}

function suffusion_create_navigation_breadcrumb() {
	global $suf_nav_breadcrumb, $suf_breadcrumb_separator, $post;
	
	$ancestors = $post->ancestors;
	$num_ancestors = count($ancestors);
	if ($suf_nav_breadcrumb == "breadcrumb") {
		$anc_limit = $num_ancestors > 1 ? $num_ancestors - 2 : ($num_ancestors > 0 ? $num_ancestors - 1 : 0);
		if ($num_ancestors > 0) {
	?>
	<div id="subnav" class="fix">
		<div class="breadcrumb">
	<?php
			for ($i = $num_ancestors-1; $i>=0; $i--) {
				$anc_page = get_page($ancestors[$i]);
				echo "<a href='".get_permalink($ancestors[$i])."'>".$anc_page->post_title."</a> ".$suf_breadcrumb_separator." ";
			}
			echo $post->post_title;
	?>
		</div>
	</div><!-- /sub nav -->
	<?php
		}
	}
}

function suffusion_excerpt_or_content() {
	global $post, $suf_category_excerpt, $suf_tag_excerpt, $suf_archive_excerpt, $suf_index_excerpt, $suf_search_excerpt, $suf_author_excerpt, $suf_show_excerpt_thumbnail;
	if ((is_category() && $suf_category_excerpt == "excerpt") ||
		(is_tag() && $suf_tag_excerpt == "excerpt") ||
		(is_search() && $suf_search_excerpt == "excerpt") ||
		(is_author() && $suf_author_excerpt == "excerpt") ||
		((is_date() || is_year() || is_month() || is_day() || is_time())&& $suf_archive_excerpt == "excerpt") ||
		(!is_page() && $suf_index_excerpt == "excerpt")) {
		$show_image = $suf_show_excerpt_thumbnail == "show" ? true : false;
		suffusion_excerpt($show_image);
	}
	else {
		the_content(__('Continue reading', 'suf_theme').' &raquo;');
	}
}

function suffusion_excerpt($show_image = false) {
	global $post;
	if ($show_image) {
		echo suffusion_get_image(array());
	}
	the_excerpt();
}

function suffusion_get_image($options = array()) {
	global $post, $suf_excerpt_thumbnail_alignment, $suf_excerpt_thumbnail_size, $suf_excerpt_thumbnail_custom_width, $suf_excerpt_thumbnail_custom_height;
	global $suf_featured_image_size, $suf_featured_image_custom_width, $suf_featured_image_custom_height;
	global $suf_mag_headline_image_size, $suf_mag_headline_image_custom_width, $suf_mag_headline_image_custom_height, $suf_mag_headline_image_alignment;
	global $suf_mag_excerpt_image_size, $suf_mag_excerpt_image_custom_width, $suf_mag_excerpt_image_custom_height;
	$img = "";
	$featured_found = false;
	if ($options['featured']) {
		// First try to retrieve a featured image, if "featured" is true
		$img = get_post_meta($post->ID, "featured_image", true);
		if (trim($img) != '') {
			$featured_found = true;
		}
		$featured_width = get_size_from_field($suf_featured_image_custom_width, '200px');
	   	$featured_width = (int)(substr($featured_width, 0, strlen($featured_width) - 2));
		$featured_height = get_size_from_field($suf_featured_image_custom_height, '200px');
	   	$featured_height = (int)(substr($featured_height, 0, strlen($featured_height) - 2));
	}
	if (trim($img) == "") {
		// Retrieve image from thumbnail
		$img = get_post_meta($post->ID, "thumbnail", true);
	}
	if (trim($img) == "") {
		// No thumbnail. Try getting the images from the gallery.
		$attachments = get_children(array(
			'post_parent' => $post->ID, 
			'post_status' => 'inherit', 
			'post_type' => 'attachment', 
			'post_mime_type' => 'image', 
			'order' => 'ASC', 
			'orderby' => 'menu_order'));
		if (is_array($attachments)) {
			if ($options['featured'] && $suf_featured_image_size == 'custom') {
				$width = $featured_width;
				$height = $featured_height;
				$size = array($width, $height);
			}
			else if ($options['mag-headline'] && $suf_mag_headline_image_size == 'custom') {
				$width = get_size_from_field($suf_mag_headline_image_custom_width, '200px');
			   	$width = (int)(substr($width, 0, strlen($width) - 2));
				$height = get_size_from_field($suf_mag_headline_image_custom_height, '200px');
			   	$height = (int)(substr($height, 0, strlen($height) - 2));
				$size = array($width, $height);
			}
			else if ($options['mag-excerpt'] && $suf_mag_excerpt_image_size == 'custom') {
				$width = get_size_from_field($suf_mag_excerpt_image_custom_width, '200px');
			   	$width = (int)(substr($width, 0, strlen($width) - 2));
				$height = get_size_from_field($suf_mag_excerpt_image_custom_height, '200px');
			   	$height = (int)(substr($height, 0, strlen($height) - 2));
				$size = array($width, $height);
			}
			else if ($suf_excerpt_thumbnail_size == 'custom') {
				$width = get_size_from_field($suf_excerpt_thumbnail_custom_width, '200px');
			   	$width = (int)(substr($width, 0, strlen($width) - 2));
				$height = get_size_from_field($suf_excerpt_thumbnail_custom_height, '200px');
			   	$height = (int)(substr($height, 0, strlen($height) - 2));
				$size = array($width, $height);
			}
			else {
				$size = $suf_excerpt_thumbnail_size;
			}
			foreach ( $attachments as $id => $attachment ) {
				$img = wp_get_attachment_image_src($id, $size);
				$img = $img[0];
				break;
			}
		}
	}
	if (trim($img) == "") {
		// No gallery. Try embedded images.
		preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post->post_content, $images );
		if (isset($images) && $images[1][0]) {
			$img = $images[1][0];
		}
	}

	if (trim($img) != "") {
		if ($options["featured"]) {
			if ($suf_featured_image_size != 'custom') {
				return "<a href=\"".get_permalink($post->ID)."\"><img src=\"".$img."\" alt=\"".$post->post_title."\" class=\"featured-excerpt-".$options["excerpt_position"]."\"/></a>";
			}
			else {
				return "<a href=\"".get_permalink($post->ID)."\"><img src=\"".$img."\" alt=\"".$post->post_title."\" class=\"featured-excerpt-".$options["excerpt_position"]."\" width='".$featured_width."px' height='".$featured_height."px'/></a>";
			}
		}
		else if ($options['mag-headline'] || $options['mag-excerpt']) {
			return "<a href=\"".get_permalink($post->ID)."\"><img src=\"".$img."\" alt=\"".$post->post_title."\" /></a>";
		}
		else {
			return "<a href=\"".get_permalink($post->ID)."\"><img src=\"".$img."\" alt=\"".$post->post_title."\" class=\"$suf_excerpt_thumbnail_alignment-thumbnail\"/></a>";
		}
	}
	else {
		return "";
	}
}

function suffusion_post_footer() { 
	global $suf_post_show_posted_by, $suf_page_show_posted_by, $suf_post_show_tags;
?>
		<div class="post-footer fix">
<?php 
	if ((!is_page() && $suf_post_show_posted_by == 'show') || (is_page() && $suf_page_show_posted_by == 'show')) {  ?>
			<span class="author"><?php printf(__('Posted by %1$s at %2$s', 'suf_theme'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a>', sprintf(get_the_time(get_option('time_format')))); ?></span>
<?php }
	if (!is_page() && $suf_post_show_tags == 'show') { ?>
			<span class="tags"><?php the_tags(__('Tagged with: ', 'suf_theme'),', ','<br />'); ?></span>
<?php } ?>
		</div>
<?php
}

function suffusion_disable_plugin_styles() {
	wp_deregister_style('wp-pagenavi');
}

function suffusion_pagination() {
	global $suf_pagination_type, $suf_pagination_index, $suf_pagination_prev_next, $suf_pagination_show_all;
	if (is_singular()) {
		return;
	}
    if (show_page_nav()) {
        if (function_exists("wp_pagenavi")) {
			// If the user has wp_pagenavi installed, we will use that for pagination
?>
		<div class="page-nav fix"> 
<?php
			wp_pagenavi();
?>
		</div><!-- page nav -->
<?php
		}
		else if ($suf_pagination_type == "numbered") {
			// The user doesn't have WP-PageNavi, but still wants pagination
			global $wp_query, $paged;
			$max_page = $wp_query->max_num_pages;
			$prev_next = $suf_pagination_prev_next == "show";
			$show_all = $suf_pagination_show_all == "all";
			if (!$paged && $max_page >= 1) {
				$current_page = 1;
			}
			else {
				$current_page = $paged;
			}
?>
		<div class="page-nav fix"> 
			<div class="suf-page-nav fix"> 
<?php
			if ($suf_pagination_index == "show") {
?>
				<span class="page-index"><?php printf(__('Page %1$s of %2$s', 'suf_theme'), $current_page, $max_page); ?></span>
<?php
			}
			echo paginate_links(array(
				"base" => add_query_arg("paged", "%#%"),
				"format" => '',
				"type" => "plain",
				"total" => $max_page,
				"current" => $current_page,
				"show_all" => $show_all,
				"end_size" => 2,
				"mid_size" => 2,
				"prev_next" => $prev_next,
				"next_text" => __('Older Entries', 'suf_theme'),
				"prev_text" => __('Newer Entries', 'suf_theme'),
			));
?>
			</div><!-- suf page nav -->
		</div><!-- page nav -->
<?php
		}
		else {
?>
		<div class="page-nav fix"> 
			<span class="previous-entries"><?php next_posts_link(__('Older Entries', 'suf_theme')); ?></span> 
			<span class="next-entries"><?php previous_posts_link(__('Newer Entries', 'suf_theme')); ?></span>
		</div><!-- page nav -->
<?php
		}
    }
}

function suffusion_comment_pagination() {
	global $suf_cpagination_type, $suf_cpagination_index, $suf_cpagination_prev_next, $suf_cpagination_show_all;
	if ($suf_cpagination_type == "numbered") {
		// The user wants pagination
		global $wp_query, $paged;
		$max_page = $wp_query->max_num_pages;
		$prev_next = $suf_cpagination_prev_next == "show";
		$show_all = $suf_cpagination_show_all == "all";
		if (!$paged && $max_page >= 1) {
			$current_page = 1;
		}
		else {
			$current_page = $paged;
		}
?>
		<div class="page-nav fix"> 
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
			"next_text" => __('Older Entries', 'suf_theme'),
			"prev_text" => __('Newer Entries', 'suf_theme'),
		));
?>
			</div><!-- suf page nav -->
		</div><!-- page nav -->
<?php
	}
	else {
?>
		<div class="page-nav fix"> 
			<span class="previous-entries"><?php next_posts_link(__('Older Entries', 'suf_theme')); ?></span> 
			<span class="next-entries"><?php previous_posts_link(__('Newer Entries', 'suf_theme')); ?></span>
		</div><!-- page nav -->
<?php
	}
}

function suffusion_featured_posts() {
	global $suf_featured_category_view, $suf_featured_tag_view, $suf_featured_search_view, $suf_featured_author_view, $suf_featured_time_view, $suf_featured_index_view;
	global $suf_mag_featured_enabled;
	if ((is_category() && $suf_featured_category_view == "enabled") ||
		(is_tag() && $suf_featured_tag_view == "enabled") ||
		(is_search() && $suf_featured_search_view == "enabled") ||
		(is_author() && $suf_featured_author_view == "enabled") ||
		(is_page_template('magazine.php') && $suf_mag_featured_enabled == 'enabled') ||
		((is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_time_view == "enabled") ||
		(!(is_category() || is_tag() || is_search() || is_author() || is_date() || is_year() || is_month() || is_day() || is_time() || is_page_template('magazine.php')) 
			&& $suf_featured_index_view == "enabled")) {
	
		locate_template(array("featured-posts.php"), true);
		suffusion_display_featured_posts();
	}
}

function suffusion_include_featured_js() {
	global $suf_featured_interval, $suf_featured_fx, $suf_featured_excerpt_type, $suf_featured_category_view, $suf_featured_tag_view, $suf_featured_search_view;
	global $suf_featured_author_view, $suf_featured_time_view, $suf_featured_index_view, $suf_featured_transition_speed;
	if ((is_category() && $suf_featured_category_view == "enabled") ||
		(is_tag() && $suf_featured_tag_view == "enabled") ||
		(is_search() && $suf_featured_search_view == "enabled") ||
		(is_author() && $suf_featured_author_view == "enabled") ||
		((is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_time_view == "enabled") ||
		(!(is_category() || is_tag() || is_search() || is_author() || is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_index_view == "enabled")) {
			
		$pause = __('Pause', 'suf_theme');
		$resume = __('Resume', 'suf_theme');

		wp_enqueue_script('slider', get_bloginfo('template_directory') . '/scripts/slider/jquery.cycle.all.min.js', array('jquery'));
		wp_enqueue_script('slider-init', get_bloginfo('template_directory') . '/scripts/slider/slider-init.php?timeout='.$suf_featured_interval.'&fx='.$suf_featured_fx.'&speed='.$suf_featured_transition_speed.'&pause='.$pause.'&resume='.$resume, array('slider'));
	}
}

function suffusion_include_sidebar_tabs_js() {
	wp_enqueue_script('sidebar-tabs', get_bloginfo('template_directory') . '/scripts/sidebar-tabs.js', array('jquery'));
}

function suffusion_template_specific_header() {
	global $suf_cat_info_enabled, $suf_author_info_enabled;
	if (is_category() && ($suf_cat_info_enabled == 'enabled')) {
?>
		<div class="category-info fix">
			<h2 class="category-title"><?php single_cat_title(); ?></h2>
			<div class="category-description">
<?php 
		if (function_exists('get_cat_icon')) {
			get_cat_icon();
		}
?>
				<?php echo category_description(); ?>
			</div><!-- .category-description -->
		</div><!-- .category-info -->
<?php
	}
	else if (is_author() && ($suf_author_info_enabled == 'enabled')) {
		$id = get_query_var('author');
?>
		<div id="author-profile-<?php the_author_meta('user_nicename', $id); ?>" class="author-profile author-even fix">
			<h2 class="author-title fn n"><?php the_author_meta('display_name', $id); ?></h2>
			<div class="author-description">
				<?php echo get_avatar(get_the_author_meta('user_email', $id), '96'); ?>
				<p class="author-bio">
					<?php the_author_meta('description', $id); ?>
				</p><!-- /.author-bio -->
			</div><!-- /.author-description -->
		</div><!-- /.author-profile -->
<?php
	}
}

function suffusion_print_post_page_title() {
	global $post, $suf_post_show_cats, $suf_post_show_comment, $suf_page_show_comment;
	if (!is_page()) {
?>
		  <div class="date"><span><?php the_time('M') ?></span> <?php the_time('d') ?><span class="year"><?php the_time('Y') ?></span></div>
		  <div class="title">
			<h2  class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="postdata">
<?php
		if ($suf_post_show_cats == 'show') { ?>
				<span class="category"><?php the_category(', ') ?></span> 
<?php	}
		if (is_singular()) { ?>
			<span class="comments"><a href="#respond"><?php _e('Add comments', 'suf_theme'); ?></a></span>
<?php	}
		else if ($suf_post_show_comment == 'show') { ?>
				<span class="comments"><?php comments_popup_link(__('No Responses', 'suf_theme').' &#187;', __('1 Response', 'suf_theme').' &#187;', __('% Responses', 'suf_theme').' &#187;'); ?></span>
<?php	}
		if (is_singular()) { ?>
          	<span class="edit"><?php edit_post_link(__('Edit', 'suf_theme'), '', ''); ?></span>
<?php	}
?>
			</div><!-- postdata -->
		  </div>
<?php
	}
	else { ?>
        <h2 class="posttitle"><?php the_title(); ?></h2>
        <div class="postdata">
  			<?php if ('open' == $post->comment_status && $suf_page_show_comment == 'show') { ?>
			<span class="comments"><a href="#respond"><?php _e('Add comments', 'suf_theme'); ?></a></span>
			<?php } ?>
        	<span class="edit"><?php edit_post_link(__('Edit', 'suf_theme'), '', ''); ?></span>
        </div>
<?php
	}
}

function suffusion_include_custom_js_files() {
	global $suf_custom_js_file_1, $suf_custom_js_file_2, $suf_custom_js_file_3;
	if ($suf_custom_js_file_1) {
		wp_enqueue_script('suffusion-js-1', $suf_custom_js_file_1);
	}
	if ($suf_custom_js_file_2) {
		wp_enqueue_script('suffusion-js-2', $suf_custom_js_file_2);
	}
	if ($suf_custom_js_file_3) {
		wp_enqueue_script('suffusion-js-3', $suf_custom_js_file_3);
	}
}

function suffusion_include_magazine_js() {
	if (is_page_template('magazine.php')) {
		wp_enqueue_script('suf-magazine', get_bloginfo('template_directory') . '/scripts/magazine.js', array('jquery'));
	}
}

function suffusion_include_jqfix_js() {
	global $suf_sidebar_jq_fix;
	if ($suf_sidebar_jq_fix == 'use') {
		wp_enqueue_script('widget-fix', get_bloginfo('template_directory') . '/scripts/widget-fix.js', array('jquery'));
	}
}

?>
