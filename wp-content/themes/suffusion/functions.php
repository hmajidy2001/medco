<?php
/**
 * Core functions file for the theme. Includes other key files.
 *
 * @package Suffusion
 * @subpackage Functions
 */

load_theme_textdomain("suf_theme", TEMPLATEPATH. "/translation");

$themename = "Suffusion";
$shortname = "suf";

// Option names
$color_scheme = $shortname."_color_scheme";
$sidebar_header = $shortname."_sidebar_header";
$show_shadows = $shortname."_show_shadows";
$body_style_setting = $shortname."_body_style_setting";
$body_font_style_setting = $shortname."_body_font_style_setting";
$header_style_setting = $shortname."_header_style_setting";

if (get_option($color_scheme) === FALSE) {
    $theme_name = "root";
}
else {
    $theme_name = get_option($color_scheme);
}

//Essential for multi-selects. Do not delete!!! And do not move it below the next statement!!!
$spawned_options = array();
$page_array = null;
$category_array = null;

// Global variables
$SUFFUSION_COMMENT_TYPES = array('comment' => __('Comments', 'suf_theme'), 'trackback' => __('Trackbacks', 'suf_theme'), 'pingback' => __('Pingbacks', 'suf_theme'));

$sidebar_tabs = array(
	'archives' => array('title' => __('Archives', 'suf_theme')),
	'categories' => array('title' => __('Categories', 'suf_theme')),
	'links' => array('title' => __('Links', 'suf_theme')),
	'meta' => array('title' => __('Meta', 'suf_theme')),
	'pages' => array('title' => __('Pages', 'suf_theme')),
	'recent_comments' => array('title' => __('Recent Comments', 'suf_theme')),
	'recent_posts' => array('title' => __('Recent Posts', 'suf_theme')),
	'search' => array('title' => __('Search', 'suf_theme')),
	'tag_cloud' => array('title' => __('Tag Cloud', 'suf_theme')),
	'custom_tab_1' => array('title' => __('Custom Tab 1', 'suf_theme')),
	'custom_tab_2' => array('title' => __('Custom Tab 2', 'suf_theme')),
	'custom_tab_3' => array('title' => __('Custom Tab 3', 'suf_theme')),
	'custom_tab_4' => array('title' => __('Custom Tab 4', 'suf_theme')),
	'custom_tab_5' => array('title' => __('Custom Tab 5', 'suf_theme')),
	'custom_tab_6' => array('title' => __('Custom Tab 6', 'suf_theme')),
	'custom_tab_7' => array('title' => __('Custom Tab 7', 'suf_theme')),
	'custom_tab_8' => array('title' => __('Custom Tab 8', 'suf_theme')),
	'custom_tab_9' => array('title' => __('Custom Tab 9', 'suf_theme')),
	'custom_tab_10' => array('title' => __('Custom Tab 10', 'suf_theme')),
);

include_once (TEMPLATEPATH . "/admin/theme-definitions.php");
include_once (TEMPLATEPATH . "/admin/theme-options.php");

function suffusion_add_admin() {
	global $themename, $shortname, $options, $spawned_options;

	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['formaction'] ) {
			$form_category = $_REQUEST['formcategory'];
			$filtered_options = get_options_for_category($options, $form_category);

			foreach ($filtered_options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				}
				else {
					delete_option( $value['id'] );
				}
			}

			$filtered_spawned_options = get_spawned_options_for_category($options, $spawned_options, $form_category);
			foreach ($filtered_spawned_options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				}
				else {
					delete_option( $value['id'] );
				}
			}

			header("Location: themes.php?page=functions.php&saved=true&category=$form_category");
			die;
		}
		else if( 'reset' == $_REQUEST['formaction'] || 'reset_all' == $_REQUEST['formaction']) {
			$form_category = $_REQUEST['formcategory'];
			if ('reset_all' == $_REQUEST['formaction']) {
				$category = 'all';
			}
			else {
				$category = $form_category;
			}
			$filtered_options = get_options_for_category($options, $category);

			foreach ($filtered_options as $value) {
				delete_option( $value['id'] );
			}

			$filtered_spawned_options = get_spawned_options_for_category($options, $spawned_options, $category);
			foreach ($filtered_spawned_options as $value) {
				delete_option( $value['id'] );
			}

			header("Location: themes.php?page=functions.php&".$_REQUEST['formaction']."=true&category=$form_category");
			die;
		}
	}

	add_theme_page($themename." Theme Options", "".$themename." Theme Options", 'edit_themes', basename(__FILE__), 'suffusion_admin');

}

function suf_admin_header_style() {
	if (isset($_REQUEST['category'])) {
		$category = $_REQUEST['category'];
	}
	else {
		$category = 'theme-selection';
	}
?>
	<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory') . '/admin/admin.css';?>" type="text/css" media="all"/>
	<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory') . '/admin/jscolor/jscolor.js';?>"></script>
	<script type="text/javascript">
		/* <![CDATA[ */
		$j = jQuery.noConflict();

		$j(document).ready(function() {
			// setting the tabs in the sidebar hide and show, setting the current tab
			$j('div.suf-options div').hide();
			$j('#<?php echo $category;?>').show();
			$j('#<?php echo $category;?> div').show();	// This is needed because #theme-selection has children divs which are hidden by the hide() call
			$j('div.suf-options ul.tabs li.<?php echo $category;?> a').addClass('current-tab');

			// SIDEBAR TABS
			$j('div.suf-options ul li a').click(function(){
				var thisClass = this.className.substring(0, this.className.indexOf(" "));
				$j('div.suf-options div').hide();
				$j('#' + thisClass).show();
				$j('#' + thisClass + " div").show();
				$j('div.suf-options ul.tabs li a').removeClass('current-tab');
				$j(this).addClass('current-tab');
			});
		});
		function submit_form(field, form) {
			form.elements['formaction'].value = field.name;
			if (field.name == 'reset_all') {
				if (confirm("This will reset ALL your configurations to the original values!!! Are you sure you want to continue?")) {
					form.submit();
				}
			}
			else if (field.name == 'reset') {
				if (confirm("This will reset all options on this page to the original values!!! Are you sure you want to continue?")) {
					form.submit();
				}
			}
			else {
				form.submit();
			}
		}
		/* ]]> */
	</script>
<?php
}
add_action('admin_head', 'suf_admin_header_style');

function suffusion_admin_script_loader() {
	wp_enqueue_script('jquery-ui-sortable');
}
add_action('admin_print_scripts', 'suffusion_admin_script_loader');

function suffusion_admin() {
	global $themename, $shortname, $options, $spawned_options, $theme_name, $suf_theme_definitions;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved for this page.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset for this page.</strong></p></div>';
	if ( $_REQUEST['reset_all'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset for all pages.</strong></p></div>';
?>

<div class="wrap">
<h2>Settings for <?php echo $themename; ?></h2>

<div class="suf-options">
<?php
	$option_structure = get_option_structure($options);
	echo get_options_html($option_structure);

	foreach ($option_structure as $option) {
		if ($option['parent'] != "root" && $option['parent'] != null) {
			$category = $option['slug'];
			create_form($themename, $shortname, $options, $spawned_options, $theme_name, $suf_theme_definitions, $category);
		}
	}

?>
	</div><!-- suf-options -->
	</div><!-- wrap -->
	<?php
}

add_action('admin_menu', 'suffusion_add_admin');

// Begin legacy comments support
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/legacy-comments.php';
	return $file;
}
//End legacy coments support

function suf_get_formatted_page_array($prefix) {
	global $spawned_options, $page_array;
	$ret = array();
	$pages = get_pages('sort_column=menu_order');
	if ($pages == null) { $pages = array(); }
	foreach ($pages as $page) {
		if ($page_array == null) {
			$ret[$page->ID] = array ("title" => $page->post_title, "depth" => count(get_post_ancestors($page)));
		}
		$spawned_options[count($spawned_options)] = array(  "id" => $prefix."_".$page->ID,
													        "type" => "checkbox",
													        "parent" => $prefix,
									        				"std" => "false");
	}
	if ($page_array == null) {
		$page_array = $ret;
		return $ret;
	}
	else {
		return $page_array;
	}
}

function suf_get_formatted_category_array($prefix, $spawn = true) {
	global $spawned_options, $category_array;
	$ret = array();
	$args = array(
		"type" => "post",
		"orderby" => "name",
	);
	$categories = get_categories($args);
	if ($categories == null) { $categories = array(); }
	foreach ($categories as $category) {
		if ($category_array == null) {
			$ret[$category->cat_ID] = array("title" => $category->cat_name);
		}
		if ($spawn) {
			$spawned_options[count($spawned_options)] = array(  "id" => $prefix."_".$category->cat_ID,
														        "type" => "checkbox",
														        "parent" => $prefix,
																"std" => "false");
		}
	}
	if ($category_array == null) {
		$category_array = $ret;
		return $category_array;
	}
	else {
		return $category_array;
	}
}

function suf_get_allowed_categories($prefix) {
	$args = array(
		"type" => "post",
		"orderby" => "name",
	);
	$all_categories = get_categories($args);
	$allowed = array();
	foreach ($all_categories as $category) {
		if (get_option($prefix."_".$category->cat_ID)) {
			$allowed[count($allowed)] = $category;
		}
	}
	return $allowed;
}

if ( function_exists('register_sidebars') ) {
	if (get_option('suf_sidebar_jq_fix') == 'dont-use') {
		register_sidebars(2, array(
		    'name' => 'sidebar-%d',
			'before_widget' => '<!--widget start --><div id="%1$s" class="dbx-box suf-widget %2$s">',
			'after_widget' => '</div></div><!--widget end -->',
		    'before_title' => '<h3 class="dbx-handle '.get_option('suf_sidebar_header').'">',
			'after_title' => '</h3><div class="dbx-content">',
		));
		register_sidebar(array (
			"name" => "Right Header Widgets",
			"description" => "Widget area to the right of the navigation bar. This is a tiny widget area, so please don't try to put in large widgets here!",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="%2$s">',
			"after_widget" => '</div><!-- widget end -->',
			"before_title" => ' ',
			"after_title" => ' ',
		));
		register_sidebar(array (
			"name" => "Widget Area Below Header",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="suf-widget suf-horizontal-widget %2$s">',
			"after_widget" => '</div></div><!-- widget end -->',
			'before_title' => '<h3 class="dbx-handle '.get_option('suf_header_for_widgets_below_header').'">',
			'after_title' => '</h3><div class="dbx-content">',
		));
		register_sidebar(array (
			"name" => "Widget Area Above Footer",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="suf-widget suf-horizontal-widget %2$s ">',
			"after_widget" => '</div></div><!-- widget end -->',
			'before_title' => '<h3 class="dbx-handle '.get_option('suf_header_for_widgets_above_footer').'">',
			'after_title' => '</h3><div class="dbx-content">',
		));
	}
	else {
		register_sidebars(2, array(
		    'name' => 'sidebar-%d',
			'before_widget' => '<!--widget start --><div id="%1$s" class="dbx-box suf-widget %2$s"><div class="dbx-content">',
			'after_widget' => '</div></div><!--widget end -->',
		    'before_title' => '<h3 class="dbx-handle '.get_option('suf_sidebar_header').'">',
			'after_title' => '</h3>',
		));
		register_sidebar(array (
			"name" => "Right Header Widgets",
			"description" => "Widget area to the right of the navigation bar. This is a tiny widget area, so please don't try to put in large widgets here!",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="%2$s">',
			"after_widget" => '</div><!-- widget end -->',
			"before_title" => ' ',
			"after_title" => ' ',
		));
		register_sidebar(array (
			"name" => "Widget Area Below Header",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="suf-widget suf-horizontal-widget %2$s"><div class="dbx-content">',
			"after_widget" => '</div></div><!-- widget end -->',
			'before_title' => '<h3 class="dbx-handle '.get_option('suf_header_for_widgets_below_header').'">',
			'after_title' => '</h3>',
		));
		register_sidebar(array (
			"name" => "Widget Area Above Footer",
			"before_widget" => '<!-- widget start --><div id="%1$s" class="suf-widget suf-horizontal-widget %2$s "><div class="dbx-content">',
			"after_widget" => '</div></div><!-- widget end -->',
			'before_title' => '<h3 class="dbx-handle '.get_option('suf_header_for_widgets_above_footer').'">',
			'after_title' => '</h3>',
		));
	}
}

if (class_exists("WP_Widget")) {
	include_once (TEMPLATEPATH . '/suffusion-widgets.php');
}
include_once (TEMPLATEPATH . '/suffusion-classes.php');

if (current_user_can("manage_options")) {
	add_action('admin_menu', 'suffusion_add_page_fields');
}

function suffusion_add_page_fields() {
	if (function_exists('add_meta_box')) {
		add_meta_box('suffusion-page-box', 'Additional Options for Suffusion', 'suffusion_page_extras', 'page', 'normal', 'high');
		add_meta_box('suffusion-post-box', 'Additional Options for Suffusion', 'suffusion_post_extras', 'post', 'normal', 'high');
	}
}

function suffusion_page_extras() {
	global $post;
?>
	<p>
		<label for="suf_alt_page_title_<?php echo $post->ID; ?>">Page Title in Dropdown Menu</label><br/>
		<input type="text" 
			id="suf_alt_page_title_<?php echo $post->ID; ?>" 
			name="suf_alt_page_title_<?php echo $post->ID; ?>" 
			value="<?php echo get_option("suf_alt_page_title_".$post->ID); ?>" /> This text will be shown in the drop-down menus in the navigation bar. If left blank, the title of the page is used.
	</p>
	<p>
		<label for="suf_nav_pages_<?php echo $post->ID; ?>">Page Display in Dropdown Menu</label><br/>
		<input type="checkbox" 
			id="suf_nav_pages_<?php echo $post->ID; ?>" 
			name="suf_nav_pages_<?php echo $post->ID; ?>" 
			<?php if (get_option("suf_nav_pages_".$post->ID)) { echo " checked='checked' ";} ?> /> 
			If this box is not checked, it will be excluded from the drop-down menu in the navigation bar with all its children.
	</p>
	<p>
		<label for="thumbnail"><?php _e("Thumbnail", "suf_theme"); ?></label><br/>
		<input type="text" id="thumbnail" name="thumbnail" 
			value="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" /> <?php _e("Enter the full URL of the thumbnail image that you would like to use, including http://", "suf_theme"); ?>
	</p>
	<p>
		<label for="featured_image"><?php _e("Featured Image", "suf_theme"); ?></label><br/>
		<input type="text" id="featured_image" name="featured_image" 
			value="<?php echo get_post_meta($post->ID, "featured_image", true); ?>" /> <?php _e("Enter the full URL of the featured image that you would like to use, including http://", "suf_theme"); ?>
	</p>
<?php
}

function suffusion_save_page_fields($post_id) {
	if (current_user_can("manage_options")) {
		if ($_REQUEST["suf_alt_page_title_".$post_id]) {
			update_option("suf_alt_page_title_".$post_id, $_REQUEST["suf_alt_page_title_".$post_id]);
		}
		else {
			delete_option("suf_alt_page_title_".$post_id);
		}
		if ($_REQUEST["suf_nav_pages_".$post_id]) {
			update_option("suf_nav_pages_".$post_id, $_REQUEST["suf_nav_pages_".$post_id]);
		}
		else {
			delete_option("suf_nav_pages_".$post_id);
		}
	}
}
add_action("save_post", "suffusion_save_page_fields");
add_action("publish_page", "suffusion_save_page_fields");

function suffusion_post_extras() {
	global $post;
?>
	<p>
		<label for="thumbnail"><?php _e("Thumbnail", "suf_theme"); ?></label><br/>
		<input type="text" id="thumbnail" name="thumbnail" 
			value="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" /> <?php _e("Enter the full URL of the thumbnail image that you would like to use, including http://", "suf_theme"); ?>
	</p>
	<p>
		<label for="featured_image"><?php _e("Featured Image", "suf_theme"); ?></label><br/>
		<input type="text" id="featured_image" name="featured_image" 
			value="<?php echo get_post_meta($post->ID, "featured_image", true); ?>" /> <?php _e("Enter the full URL of the featured image that you would like to use, including http://", "suf_theme"); ?>
	</p>
	<p>
		<label for="suf_magazine_headline">Make this post a headline</label><br/>
		<input type="checkbox" id="suf_magazine_headline" name="suf_magazine_headline" 
			<?php if (get_post_meta($post->ID, 'suf_magazine_headline', true)) { echo " checked='checked' ";} ?> /> 
			If this box is checked, this post will show up as a headline in the magazine template.
	</p>
	<p>
		<label for="suf_magazine_excerpt">Make this post an excerpt in the magazine layout</label><br/>
		<input type="checkbox" id="suf_magazine_excerpt" name="suf_magazine_excerpt" 
			<?php if (get_post_meta($post->ID, 'suf_magazine_excerpt', true)) { echo " checked='checked' ";} ?> /> 
			If this box is checked, this post will show up as an excerpt in the magazine template.
	</p>
<?php
}

function suffusion_save_post_fields($post_id) {
	$suffusion_post_fields = array('thumbnail', 'featured_image', 'suf_magazine_headline', 'suf_magazine_excerpt');
	foreach ($suffusion_post_fields as $post_field) {
		$data = stripslashes($_POST[$post_field]);
		if (get_post_meta($post_id, $post_field) == '') {
			add_post_meta($post_id, $post_field, $data, true);
		}
		elseif ($data != get_post_meta($post_id, $post_field, true)) {
			update_post_meta($post_id, $post_field, $data);
		}
		elseif ($data == '') {
			delete_post_meta($post_id, $post_field, get_post_meta( $post_id, $post_field, true));
		}
	}
}

add_action("save_post", "suffusion_save_post_fields");
add_action("publish_post", "suffusion_save_post_fields");

add_action('wp_head', 'suf_add_header_contents');
function suf_add_header_contents() {
	suf_create_openid_links();
	suf_create_additional_feeds();
}

add_action('wp_footer', 'suf_add_footer_contents');
function suf_add_footer_contents() {
	suf_create_analytics_contents();
}

// OpenID stuff...
function suf_create_openid_links() {
	global $options;
	if (get_option('suf_openid_enabled') == "enabled") {
		echo "<!-- Start OpenID settings -->\n";
		echo "<link rel=\"openid.server\" href=\"".get_option('suf_openid_server')."\" />\n";
		echo "<link rel=\"openid.delegate\" href=\"".get_option('suf_openid_delegate')."\" />\n";
		echo "<!-- End OpenID settings -->\n";
	}
}
// ... End OpenID stuff

// Analytics ...
function suf_create_analytics_contents() {
	global $options;
	if (get_option('suf_analytics_enabled') == "enabled") {
		if (trim(get_option('suf_custom_analytics_code')) != "") {
			echo "<!-- Start Google Analytics -->\n";
			echo stripslashes(get_option('suf_custom_analytics_code'))."\n";
			echo "<!-- End Google Analytics -->\n";
		}
	}
}
// ... End Analytics

// Additional Feeds ...
function suf_create_additional_feeds() {
	global $options;
	echo "<!-- Start Additional Feeds -->\n";
	if (trim(get_option('suf_custom_rss_feed_1')) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".get_option('suf_custom_rss_title_1')."\" href=\"".get_option('suf_custom_rss_feed_1')."\" />\n";
	}
	if (trim(get_option('suf_custom_rss_feed_2')) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".get_option('suf_custom_rss_title_2')."\" href=\"".get_option('suf_custom_rss_feed_2')."\" />\n";
	}
	if (trim(get_option('suf_custom_rss_feed_3')) != "") {
		echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".get_option('suf_custom_rss_title_3')."\" href=\"".get_option('suf_custom_rss_feed_3')."\" />\n";
	}
	if (trim(get_option('suf_custom_atom_feed_1')) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".get_option('suf_custom_atom_title_1')."\" href=\"".get_option('suf_custom_atom_feed_1')."\" />\n";
	}
	if (trim(get_option('suf_custom_atom_feed_2')) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".get_option('suf_custom_atom_title_2')."\" href=\"".get_option('suf_custom_atom_feed_2')."\" />\n";
	}
	if (trim(get_option('suf_custom_atom_feed_3')) != "") {
		echo "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"".get_option('suf_custom_atom_title_3')."\" href=\"".get_option('suf_custom_atom_feed_3')."\" />\n";
	}
	echo "<!-- End Additional Feeds -->\n";
}
// ... End Additional Feeds

function get_excluded_pages($prefix) {
	$all_pages = get_pages('sort_column=menu_order');
	if ($all_pages == null) { $all_pages = array(); }
	// First we figure out which pages have to be excluded
	$exclude = array();
	foreach ($all_pages as $page) {
		if (get_option($prefix."_".$page->ID) === FALSE) {
			$exclude[count($exclude)] = $page->ID;
		}
	}

	// Now we need to figure out if these excluded pages are ancestors of any pages on the list. If so, we remove the descendents
	foreach ($all_pages as $page) {
		$ancestors = get_post_ancestors($page);
		foreach ($ancestors as $ancestor) {
			if (in_array($ancestor, $exclude)) {
				$exclude[count($exclude)] = $page->ID;
			}
		}
	}

	$exclusion_list = implode(",", $exclude);
	return $exclusion_list;
}

function suffusion_get_page_structure($id, $title, $link, $depth, $exclusion_list) {
	$page_structure = new Suf_Navigation_Structure($id, $title, $link, $depth, 'page');
	$page_structure->children = array();
	$child_pages = get_pages('sort_column=menu_order&parent='.$id.'&child_of='.$id.'&exclude='.$exclusion_list);
	if ($child_pages == null) { $child_pages = array(); }
	$child_depth = $depth + 1;
	foreach ($child_pages as $child_page) {
		$child_page_link = get_page_link($child_page->ID);
		$child = suffusion_get_page_structure($child_page->ID, $child_page->post_title, $child_page_link, $child_depth, $exclusion_list);
		$page_structure->children[count($page_structure->children)] = $child;
	}
	return $page_structure;
}

function suffusion_get_home_link_html() {
	$retStr = "";
	$suf_show_home = "";
	if (get_option("suf_show_home") === FALSE) {
		$suf_show_home = "none";
	}
	else {
		$suf_show_home = get_option("suf_show_home");
	}

	if ($suf_show_home == "text") {
		if (get_option("suf_home_text") === FALSE) {
			$suf_home_text = "Home";
		}
		else if (trim(get_option("suf_home_text")) == "") {
			$suf_home_text = "Home";
		}
		else {
			$suf_home_text = trim(get_option("suf_home_text"));
		}
		$retStr .= "\n\t\t\t\t\t"."<li><a href='".get_option("home")."'>".$suf_home_text."</a></li>";
	}
	else if ($suf_show_home == "icon") {
		$retStr .= "\n\t\t\t\t\t"."<li><a href='".get_option("home")."'><img src='".get_bloginfo("template_directory")."/images/home-light.png' alt='Home'/></a></li>";
	}
	return $retStr;
}

/**
 * This method takes a Suffusion_Nav_Structure object and parses it out to build the navigation menu.
 * The menu is based on Stu Nicholls' famous CSS-only navigation menu: http://www.cssplay.co.uk/menus/final_drop.html. I have made minor modifications to it.
 */
function suffusion_parse_nav_structure($nav_structure) {
	global $post;
	$retStr = "";
	if ($nav_structure->depth == 0) {
		$home_link = suffusion_get_home_link_html();
		if (($nav_structure->children != null && is_array($nav_structure->children) && count($nav_structure->children) > 0) || $home_link) {
			$retStr .= "\n\t\t\t\t\t"."<ul>";
			$retStr .= $home_link;
			foreach ($nav_structure->children as $child_page) {
				$retStr .= suffusion_parse_nav_structure($child_page);
			}
			$retStr .= "\n\t\t\t\t\t"."</ul>";
		}
	}
	else if ($nav_structure->depth == 1) {
		if (is_array($post->ancestors)) {
			$ancestors = $post->ancestors;
		}
		else {
			$ancestors = array();
		}

		$href = trim($nav_structure->link) == "" ? " href='#' onclick='return false;' " : " href='$nav_structure->link' ";
		if (is_page() && ($post->ID == $nav_structure->ID || in_array($nav_structure->ID, $ancestors)) && $nav_structure->type == 'page') {
			$retStr .= "\n\t\t\t\t\t"."<li><a $href class='highlighted'>".$nav_structure->title;
		}
		else if (is_category() && (single_cat_title('', false) == $nav_structure->title)&& $nav_structure->type == 'cat') {
			$retStr .= "\n\t\t\t\t\t"."<li><a $href class='highlighted'>".$nav_structure->title;
		}
		else {
			$retStr .= "\n\t\t\t\t\t"."<li><a $href>".$nav_structure->title;
		}

		if ($nav_structure->children != null && count($nav_structure->children) != 0) {
			$retStr .= "<!--[if IE 7]><!--></a><!--<![endif]-->";
			$retStr .= "<!--[if lte IE 6]><table><tr><td><![endif]-->";
			$retStr .= "\n\t\t\t"."<ul>";
			foreach ($nav_structure->children as $child_page) {
				$retStr .= "\n\t\t\t\t"."<li><a href='$child_page->link'";
				$retStr .= suffusion_parse_nav_structure($child_page);
			}
			$retStr .= "\n\t\t\t\t"."</ul>";
			$retStr .= "\n\t\t\t\t"."<!--[if lte IE 6]></td></tr></table></a><![endif]-->";
			$retStr .= "\n\t\t\t\t"."</li>";
		}
		else {
			$retStr .= "</a></li>";
		}
	}
	else {
		if ($nav_structure->children != null && count($nav_structure->children) != 0) {
			$retStr .= " class='drop' title=\"$nav_structure->title\"><!--[if !IE]>--><span class='float-ptr'>&gt;</span><!--<![endif]-->$nav_structure->title<!--[if lte IE 7]>&nbsp;&nbsp;&gt;<![endif]--> <!--[if (!IE)|(gt IE 7)]><span class='float-ptr'>&gt;</span><![endif]-->";
			$retStr .= "<!--[if IE 7]><!--></a><!--<![endif]-->";
			$retStr .= "<!--[if lte IE 6]><table><tr><td><![endif]-->";
			$retStr .= "\n\t\t\t"."<ul>";
			
			foreach ($nav_structure->children as $child_page) {
				$retStr .= "\n\t\t\t\t"."<li><a href='$child_page->link'";
				$retStr .= suffusion_parse_nav_structure($child_page);
			}
			$retStr .= "\n\t\t\t\t"."</ul>";
			$retStr .= "\n\t\t\t\t"."<!--[if lte IE 6]></td></tr></table></a><![endif]-->";
			$retStr .= "\n\t\t\t\t"."</li>";
		}
		else {
			$retStr .= " title=\"$nav_structure->title\">$nav_structure->title</a></li>";
		}
	}
	return $retStr;
}

function suf_get_excluded_categories($prefix) {
	$args = array(
		"type" => "post",
		"orderby" => "name",
	);
	$all_categories = get_categories($args);
	$excluded = array();
	foreach ($all_categories as $category) {
		if (get_option($prefix."_".$category->cat_ID)) {
		}
		else {
			$excluded[count($excluded)] = $category;
		}
	}
	return $excluded;
}

function create_nav_for_all() {
	global $post, $suf_nav_pages_style, $suf_nav_cat_style, $suf_nav_cat_tab_title, $suf_nav_page_tab_title, $suf_nav_page_tab_link, $suf_nav_cat_tab_link;
	
	$pages_excluded = get_excluded_pages("suf_nav_pages");
	$categories_excluded = suf_get_excluded_categories('suf_nav_cats');
	
	$nav_structure = new Suf_Navigation_Structure(0, 'Root', '', 0);
	$nav_structure->children = array();
	if ($suf_nav_pages_style == 'rolled-up') {
		$page_structure = suffusion_get_page_structure(0, $suf_nav_page_tab_title, $suf_nav_page_tab_link, 1, $pages_excluded);
		if ($page_structure->children != null && count($page_structure->children) > 0) {
			$nav_structure->children[count($nav_structure->children)] = $page_structure;
		}
	}
	else if ($suf_nav_pages_style == 'flattened') {
		$page_structure = suffusion_get_page_structure(0, $suf_nav_page_tab_title,  $suf_nav_page_tab_link, 0, $pages_excluded);
		foreach ($page_structure->children as $child_structure) {
			$nav_structure->children[count($nav_structure->children)] = $child_structure;
		}
	}

	if ($suf_nav_cat_style == 'rolled-up') {
		$category_structure = suffusion_get_category_structure(0, $suf_nav_cat_tab_title, $suf_nav_cat_tab_link, 1, $categories_excluded, 'page');
		if ($category_structure->children != null && count($category_structure->children) > 0) {
			$nav_structure->children[count($nav_structure->children)] = $category_structure;
		}
	}
	else if ($suf_nav_cat_style == 'flattened') {
		$category_structure = suffusion_get_category_structure(0, $suf_nav_cat_tab_title, $suf_nav_cat_tab_link, 0, $categories_excluded, 'cat');
		foreach ($category_structure->children as $child_structure) {
			$nav_structure->children[count($nav_structure->children)] = $child_structure;
		}
	}

	$retStr = suffusion_parse_nav_structure($nav_structure);
	return $retStr;
}

function create_nav($echo = true, $type = "pages") {
	$retStr = "";
	if ($type == "pages") {
		$retStr = create_nav_for_all();
	}
	if ($echo) {
		echo $retStr;
	}
	return $retStr;
}

/**
 * If more than one page exists, return TRUE.
 */
function show_page_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}
/**
 * If more than one post exists, return TRUE.
 */
function suffusion_post_count() {
	$post_count = wp_count_posts();
	return $post_count->publish;
}

function check_integer($val) {
    return ($val !== true) && ((string)abs((int) $val)) === ((string) ltrim($val, '-0'));
}

function get_size_from_field($val, $default) {
	$ret = $default;
	if (substr(trim($val), -2) == "px") {
		$test_str = trim(substr(trim($val), 0, strlen(trim($val)) - 2));
		if (check_integer($test_str)) {
			$ret = $test_str."px";
		}
	}
	else if (check_integer(trim($val))) {
		$ret = trim($val)."px";
	}
	return $ret;
}

function suffusion_get_formatted_sbtab_array($prefix, $spawn = true) {
	global $sidebar_tabs, $spawned_options;

	foreach ($sidebar_tabs as $tab => $tab_options) {
		$spawned_options[count($spawned_options)] = array('id' => $prefix.'_'.$tab, 'type' => 'checkbox', 'parent' => $prefix, 'std' => 'false');
	}
	return $sidebar_tabs;
}

function suffusion_get_category_structure($id, $title, $link, $depth, $exclusion_list = array(), $type = 'cat') {
	$category_structure = new Suf_Navigation_Structure($id, $title, $link, $depth, $type);
	$category_structure->children = array();
	$exclude_categories = array();
	foreach ($exclusion_list as $category) {
		$exclude_categories[count($exclude_categories)] = $category->cat_ID;
	}
	$exclude = implode(',', $exclude_categories);
	$child_cats = get_categories(array('child_of' => $id, 'parent' => $id, 'exclude' => $exclude));
	if ($child_cats == null) { $child_cats = array(); }
	$child_depth = $depth + 1;
	foreach ($child_cats as $child_cat) {
		$child_cat_link = get_category_link($child_cat->cat_ID);
		$child = suffusion_get_category_structure($child_cat->cat_ID, $child_cat->cat_name, $child_cat_link, $child_depth, $exclusion_list);
		$category_structure->children[count($category_structure->children)] = $child;
	}
	return $category_structure;
}

function suffusion_get_category_ancestor_count($cat, $counter) {
	if ($cat == null || !$cat) {
		return $counter;
	}
	$count = $counter;
	if ($cat->category_parent) {
		$parent = get_category($cat->category_parent);
		$count = suffusion_get_category_ancestor_count($parent, $count + 1);
	}
	return $count;
}

function suf_get_allowed_pages($prefix) {
	$args = array(
		"sort_column" => "menu_order",
	);
	$all_pages = get_pages($args);
	$allowed = array();
	foreach ($all_pages as $page) {
		if (get_option($prefix."_".$page->ID)) {
			$allowed[count($allowed)] = $page;
		}
	}
	return $allowed;
}

include_once (TEMPLATEPATH . "/functions/actions.php");
include_once (TEMPLATEPATH . "/functions/filters.php");
include_once (TEMPLATEPATH . "/functions/shortcodes.php");
?>
