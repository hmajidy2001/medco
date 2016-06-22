<?php
/**
 * Dynamically generated styles
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

if ($suf_body_style_setting == 'custom') {
?>

body {
	background-color: #<?php echo $suf_body_background_color;?>;
<?php
	if ($suf_body_background_image != "") {
		$body_bg_url = " url($suf_body_background_image) ";
?>
	background-image: <?php echo $body_bg_url;?>;
	background-repeat: <?php echo $suf_body_background_repeat;?>;
	background-attachment: <?php echo $suf_body_background_attachment;?>;
	background-position: <?php echo $suf_body_background_position;?>;
<?php
	}
?>
}

#wrapper {
	background-color: #<?php echo $suf_wrapper_background_color; ?>;
<?php
	if ($suf_show_shadows == "show") {
?>
	/* Shadows - CSS3 for browsers that support it */
	box-shadow: 10px 10px 5px #888;
	-moz-box-shadow: 10px 10px 5px #888;
	-khtml-box-shadow: 10px 10px 5px #888;
	-webkit-box-shadow: 10px 10px 5px #888;
<?php
	}
?>
}

<?php
}
if ($suf_body_font_style_setting == 'custom') {
?>
body {
	color: #<?php echo $suf_font_color;?>;
	font-family: <?php echo $suf_body_font_family;?>;
}

a {
	color: #<?php echo $suf_link_color;?>;
	text-decoration: <?php echo $suf_link_style;?>;
}

a:visited {
	color: #<?php echo $suf_visited_link_color;?>;
	text-decoration: <?php echo $suf_visited_link_style;?>;
}

a:hover {
	color: #<?php echo $suf_link_hover_color;?>;
	text-decoration: <?php echo $suf_link_hover_style;?>;
}

<?php
}
function suf_get_widths($cust_wrapper_width) {
	global $suf_sidebar_count, $suf_sidebar_alignment, $suf_sidebar_2_alignment, $suf_mag_sidebars_enabled, $suf_mag_headline_image_container_width;
	$widths = array();
	if ($cust_wrapper_width < 600) {
		$wrapper_width = 600;
	}
	else {
		$wrapper_width = $cust_wrapper_width;
	}
	$widths['wrapper'] = $wrapper_width;
	if ($suf_sidebar_count == 0) {
		$widths['main-col'] = floor($wrapper_width);
		$widths['sidebar-1'] = 0;
		$widths['sidebar-2'] = 0;
		$widths['sidebar-container'] = 0;
		$widths['tabbed'] = 0;
	}
	else if ($suf_sidebar_count == 1) {
		$widths['main-col'] = floor(0.725 * $wrapper_width);
		$widths['sidebar-1'] = $wrapper_width - $widths['main-col'] - 15;
		$widths['sidebar-2'] = $wrapper_width - $widths['main-col'] - 15;
		$widths['sidebar-container'] = $widths['sidebar-1'] + 15;
		$widths['tabbed'] = $widths['sidebar-1'];
	}
	else if ($suf_sidebar_count == 2) {
		$widths['main-col'] = floor(0.63 * $wrapper_width);
		$widths['sidebar-1'] = floor(0.5 * ($wrapper_width - $widths['main-col'] - 30));
		$widths['sidebar-2'] = floor(0.5 * ($wrapper_width - $widths['main-col'] - 30));
		if ($suf_sidebar_alignment == $suf_sidebar_2_alignment) {
			$widths['sidebar-container'] = 2 * $widths['sidebar-1'] + 30;
			$widths['tabbed'] = $widths['sidebar-container'] - 17; // -17 because 2px are added by borders of widgets
		}
		else {
			$widths['sidebar-container'] = $widths['sidebar-1'] + 15;
			$widths['tabbed'] = $widths['sidebar-container'] - 15;
		}
	}
	
	$widths['title'] = $widths['main-col'] - 90;
	$widths['category'] = $widths['main-col'] - 275;
	$widths['tags'] = $widths['main-col'] - 275;
	$widths['calendar-side-padding'] = 4;

//	if ($suf_mag_sidebars_enabled == 'show') {
		$widths['mag-headlines'] = $widths['main-col'] - 2;
//	}
//	else {
//		$widths['mag-headlines'] = $widths['wrapper'] - 2;
//	}
	$mag_hl_photos = get_size_from_field($suf_mag_headline_image_container_width, "250px");
	$widths['mag-headline-photos'] = (int)(substr($mag_hl_photos, 0, strlen($mag_hl_photos) - 2));
	$widths['mag-headline-block'] = $widths['mag-headlines'] - $widths['mag-headline-photos'] - 34;
	return $widths;
}

function suf_get_widths_from_components($component_widths) {
	global $suf_sidebar_count, $suf_sidebar_alignment, $suf_sidebar_2_alignment, $suf_sbtab_alignment, $suf_mag_sidebars_enabled, $suf_mag_headline_image_container_width;
	$widths = array();
	$main_col_width = $component_widths['main-col'] < 380 ? 380 : $component_widths['main-col'];
	$sb_1_width = $component_widths['sidebar-1'] < 95 ? 95 : $component_widths['sidebar-1'];
	$sb_2_width = $component_widths['sidebar-2'] < 95 ? 95 : $component_widths['sidebar-2'];

	if ($suf_sidebar_count == 0) {
		$widths['main-col'] = $main_col_width;
		$widths['sidebar-1'] = 0;
		$widths['sidebar-2'] = 0;
		$widths['sidebar-container'] = 0;
		$widths['tabbed'] = 0;
		$widths['wrapper'] = $main_col_width;
	}
	else if ($suf_sidebar_count == 1) {
		$widths['main-col'] = $main_col_width;
		$widths['sidebar-1'] = $sb_1_width;
		$widths['sidebar-2'] = 0;
		$widths['sidebar-container'] = $sb_1_width + 15;
		$widths['tabbed'] = $sb_1_width;
		$widths['wrapper'] = $main_col_width + $sb_1_width + 15;
	}
	else if ($suf_sidebar_count == 2) {
		$widths['main-col'] = $main_col_width;
		$widths['sidebar-1'] = $sb_1_width;
		$widths['sidebar-2'] = $sb_2_width;

		if ($suf_sidebar_alignment == $suf_sidebar_2_alignment) {
			$widths['sidebar-container'] = $widths['sidebar-1'] + $widths['sidebar-2'] + 30;
			$widths['tabbed'] = $widths['sidebar-container'] - 17; // -17 because 2px are added by borders of widgets
		}
		else {
			if ($suf_sbtab_alignment == $suf_sidebar_alignment) {
				$widths['sidebar-container'] = $widths['sidebar-1'] + 15;
			}
			else if ($suf_sbtab_alignment == $suf_sidebar_2_alignment) {
				$widths['sidebar-container'] = $widths['sidebar-2'] + 15;
			}
			$widths['tabbed'] = $widths['sidebar-container'] - 15;
		}
		$widths['wrapper'] = $main_col_width + $sb_1_width + $sb_2_width + 30;
	}

	$widths['title'] = $widths['main-col'] - 90;
	$widths['category'] = $widths['main-col'] - 275;
	$widths['tags'] = $widths['main-col'] - 275;
	$widths['calendar-side-padding'] = 4;

//	if ($suf_mag_sidebars_enabled == 'show') {
		$widths['mag-headlines'] = $widths['main-col'] - 2;
//	}
//	else {
//		$widths['mag-headlines'] = $widths['wrapper'] - 2;
//	}
	$mag_hl_photos = get_size_from_field($suf_mag_headline_image_container_width, "250px");
	$widths['mag-headline-photos'] = (int)(substr($mag_hl_photos, 0, strlen($mag_hl_photos) - 2));
	$widths['mag-headline-block'] = $widths['mag-headlines'] - $widths['mag-headline-photos'] - 34;

	return $widths;
}

if ($suf_size_options == "custom") {
	if (isset($suf_wrapper_margin)) {
		$wrapper_margin = "50px";
		$wrapper_margin = get_size_from_field($suf_wrapper_margin, "50px");
?>
#wrapper {
	margin: <?php echo $wrapper_margin;?> auto;
}
<?php
	}
	if (($suf_wrapper_width_preset != "custom") && ($suf_wrapper_width_preset != "custom-components")) {
		$widths = suf_get_widths($suf_wrapper_width_preset);
	}
	else if ($suf_wrapper_width_preset == "custom") {
		$wrapper_width = get_size_from_field($suf_wrapper_width, "1000px");
		$widths = suf_get_widths((int)(substr($wrapper_width, 0, strlen($wrapper_width) - 2)));
	}
	else {
		$main_col_width = get_size_from_field($suf_main_col_width, "725px");
		$sb_1_width = get_size_from_field($suf_sb_1_width, "260px");
		$sb_2_width = get_size_from_field($suf_sb_2_width, "260px");
		$component_widths = array('main-col' => (int)(substr($main_col_width, 0, strlen($main_col_width) - 2)), 
							'sidebar-1' => (int)(substr($sb_1_width, 0, strlen($sb_1_width) - 2)), 
							'sidebar-2' => (int)(substr($sb_2_width, 0, strlen($sb_2_width) - 2)));
		$widths = suf_get_widths_from_components($component_widths);
	}
?>
<?php
	if (isset($suf_header_height)) {
		$header_height = get_size_from_field($suf_header_height, "55px");
?>
#header {
	height: <?php echo $header_height;?>;
}
<?php
	}
}
else {
	// We still need to get the array of widths for the sidebars.
	$widths = suf_get_widths(1000);
}

// Now we will print the generated widths
?>
#wrapper {
	width: <?php echo $widths['wrapper'];?>px;
}

#page #wrapper #container #single-col {
	width: <?php echo $widths['wrapper'];?>px;
}

#page #wrapper #container #main-col {
	width: <?php echo $widths['main-col'];?>px;
}

* html #page #wrapper #container #main-col {
	w\idth: <?php echo ($widths['main-col'] - 15);?>px;
}

* html .post {
<?php 
if (!is_page_template('no-sidebars.php')) {
?>
	w\idth: <?php echo ($widths['main-col'] - 48);?>px;
<?php
}
else {
?>
	w\idth: <?php echo ($widths['single-col'] - 48);?>px;
<?php
}
?>
}

.post .title {
	width: <?php echo $widths['title'];?>px;
}

.postdata .category{
	width: <?php echo $widths['category'];?>px;
}

.tags {
	width: <?php echo $widths['tags'];?>px;
}

#sidebar {
	width: <?php echo $widths['sidebar-1'];?>px;
}

#sidebar-2 {
	width: <?php echo $widths['sidebar-2'];?>px;
}

#sidebar-container {
	width: <?php echo $widths['sidebar-container'];?>px;
}

* html #sidebar {
	w\idth: <?php echo ($widths['sidebar-1'] - 5);?>px;
}

* html #sidebar-2 {
	w\idth: <?php echo ($widths['sidebar-2'] - 5);?>px;
}

* html #sidebar-container {
	w\idth: <?php echo ($widths['sidebar-container'] - 10);?>px;
}

.tab-box {
	width: <?php echo $widths['tabbed'];?>px;
}

#commentform textarea {
	width: <?php echo ($widths['main-col'] - 50);?>px;
}

#calendar td, .widget_calendar td {
	padding:0 <?php echo $widths['calendar-side-padding'];?>px;
}

.suf-mag-headlines {
	width: <?php echo $widths['mag-headlines'];?>px;
}

* html .suf-mag-headlines {
	w\idth: <?php echo ($widths['mag-headlines'] - 15);?>px;
}

* html table.suf-mag-excerpts, 
* html table.suf-mag-categories {
	w\idth: <?php echo ($widths['mag-headlines'] - 25);?>px;
}

.suf-mag-headline-photo-box {
	width: <?php echo $widths['mag-headline-photos']; ?>px;
}

.suf-mag-headline-block {
	width: <?php echo $widths['mag-headline-block']; ?>px;
}

* html .suf-mag-headline-block {
	w\idth: <?php echo ($widths['mag-headline-block'] - 20); ?>px;
}

<?php
if ($suf_header_style_setting == "custom") {
	if ($suf_header_image_type == "image") {
		if (isset($suf_header_background_image)) {
			$header_bg_url = " url($suf_header_background_image) ";
?>
#header-container {
	background-image: <?php echo $header_bg_url;?>;
	background-repeat: <?php echo $suf_header_background_repeat;?>;
	background-position: <?php echo $suf_header_background_position;?>;
	height: <?php echo $suf_header_section_height;?>;
}
<?php
		}
	}
	else if ($suf_header_image_type == "gradient") {
		$header_bg_url = " url(".get_stylesheet_directory_uri()."/gradient.php?start=$suf_header_gradient_start_color&amp;finish=$suf_header_gradient_end_color&amp;direction=$suf_header_gradient_style&amp;height=121)";
		if ($suf_header_gradient_style == "top-down" || $suf_header_gradient_style == "down-top") {
			$header_bg_repeat = "repeat-x";
		}
		else if ($suf_header_gradient_style == "left-right" || $suf_header_gradient_style == "right-left") {
			$header_bg_repeat = "repeat-y";
		}
		if ($suf_header_gradient_style == "top-down" || $suf_header_gradient_style == "left-right") {
			$header_bg_color = $suf_header_gradient_end_color;
		}
		else if ($suf_header_gradient_style == "down-top" || $suf_header_gradient_style == "right-left") {
			$header_bg_color = $suf_header_gradient_start_color;
		}
?>
#header-container {
	background-image: <?php echo $header_bg_url;?>;
	background-repeat: <?php echo $header_bg_repeat;?>;
	background-color: #<?php echo $header_bg_color; ?>;
}
<?php
	}
?>
h1.blogtitle a {
	color: #<?php echo $suf_blog_title_color;?>;
	text-decoration: <?php echo $suf_blog_title_style;?>;
}

h1.blogtitle a:hover {
	color: #<?php echo $suf_blog_title_hover_color;?>;
	text-decoration: <?php echo $suf_blog_title_hover_style;?>;
}

.description {
	color: #<?php echo $suf_blog_description_color;?>;
}

<?php
	if ($suf_sub_header_vertical_alignment == "above" || $suf_sub_header_vertical_alignment == "below") {
?>
.description {
	display: block;
	width: 100%;
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
}

h1.blogtitle {
	width: 100%;
}
<?php
	}
?>

h1.blogtitle {
<?php
	if ($suf_header_alignment == "right") {
?>
	float: right;
	text-align: right;
<?php
	}
	else if ($suf_header_alignment == "left") {
?>
	float: left;
	text-align: left;
<?php
	}
	else if ($suf_header_alignment == "center") {
?>
	float: none;
	margin-left: auto;
	margin-right: auto;
<?php
	}
	else if ($suf_header_alignment == "hidden") {
?>
	display: none;
	visibility: hidden;
<?php
	}
?>
}

#header {
<?php
	if ($suf_header_alignment == "center") {
?>
	text-align: center;
<?php
	}
?>
}

.description {
<?php
	if ($suf_sub_header_alignment == "right") {
?>
	float: right;
	text-align: right;
<?php
	}
	else if ($suf_sub_header_alignment == "left") {
?>
	float: left;
	text-align: left;
<?php
	}
	else if ($suf_sub_header_alignment == "center") {
?>
	float: none;
	margin-left: auto;
	margin-right: auto;
	margin-top: 0px;
<?php
	}
	else if ($suf_sub_header_alignment == "hidden") {
?>
	display: none;
	visibility: hidden;
<?php
	}
?>
}

<?php
}

if ($suf_nav_text_transform != "uppercase") {
?>
#nav ul {
	text-transform: <?php echo $suf_nav_text_transform?>;
}
<?php
}

if ($suf_sidebar_header == "plain-borderless") {
?>
#sidebar .dbx-handle,
#sidebar-2 .dbx-handle {
	border-bottom: none;
}

<?php
}

if ($suf_sb_font_style_setting == "custom") {
?>
#sidebar,
#sidebar-2,
#sidebar-container {
	color:  #<?php echo $suf_sb_font_color;?>;
}

#sidebar a,
#sidebar-2 a,
#sidebar-container a {
	color:  #<?php echo $suf_sb_link_color;?>;
	text-decoration: <?php echo $suf_sb_link_style;?>;
}


#sidebar a:visited,
#sidebar-2 a:visited,
#sidebar-container a:visited {
	color:  #<?php echo $suf_sb_visited_link_color;?>;
	text-decoration: <?php echo $suf_sb_visited_link_style;?>;
}

#sidebar a:hover,
#sidebar-2 a:hover,
#sidebar-container a:hover {
	color:  #<?php echo $suf_sb_link_hover_color;?>;
	text-decoration: <?php echo $suf_sb_link_hover_style;?>;
}

<?php
}

function get_column_width($num_columns) {
	$col_width = "100%";
	switch ($num_columns) {
	case 1:
		$col_width = "100%";
		break;
	case 2:
		$col_width = "49%";
		break;
	case 3:
		$col_width = "32%";
		break;
	case 4:
		$col_width = "24%";
		break;
	case 5:
		$col_width = "19%";
		break;
	default:
		$col_width = "100%";
		break;
	}
	return $col_width;
}

function get_margin($num_columns) {
	$margin = "5px";
	switch ($num_columns) {
	case 1:
		$margin = "5px 0px 5px 0px";
		break;
	case 2:
		$margin = "5px 4px 5px 4px";
		break;
	case 3:
		$margin = "5px 5px 5px 5px";
		break;
	case 4:
		$margin = "5px 4px 5px 4px";
		break;
	case 5:
		$margin = "5px 4px 5px 4px";
		break;
	default:
		$margin = "5px 5px 5px 5px";
		break;
	}
	return $margin;
}

function get_ie6_margin($num_columns) {
	$margin = "5px";
	switch ($num_columns) {
	case 1:
		$margin = "5px 0px 5px 0px";
		break;
	case 2:
		$margin = "5px 3px 5px 3px";
		break;
	case 3:
		$margin = "5px 5px 5px 4px";
		break;
	case 4:
		$margin = "5px 3px 5px 3px";
		break;
	case 5:
		$margin = "5px 2px 5px 2px";
		break;
	default:
		$margin = "5px 0px 5px 0px";
		break;
	}
	return $margin;
}

if ($suf_widget_area_below_header_enabled == "enabled") {
	$bw1_columns = intval($suf_widget_area_below_header_columns);
	$bw1_width = get_column_width($bw1_columns);
	$bw1_margin = get_margin($bw1_columns);
	$bw1_ie_margin = get_ie6_margin($bw1_columns);
?>
#horizontal-outer-widgets-1 .suf-horizontal-widget {
	width: <?php echo $bw1_width;?>;
	display: inline-block;
	margin: <?php echo $bw1_margin;?>;
}

* html #horizontal-outer-widgets-1 .suf-horizontal-widget {
	ma\rgin: <?php echo $bw1_ie_margin;?>;
}
<?php
	if ($suf_header_for_widgets_below_header == "plain-borderless") {
?>

#horizontal-outer-widgets-1 .dbx-handle {
	border-bottom: none;
}

<?php
	}
	if ($suf_wabh_font_style_setting == "custom") {
?>
#horizontal-outer-widgets-1 {
	color:  #<?php echo $suf_wabh_font_color;?>;
}

#horizontal-outer-widgets-1 a {
	color:  #<?php echo $suf_wabh_link_color;?>;
	text-decoration: <?php echo $suf_wabh_link_style;?>;
}

#horizontal-outer-widgets-1 a:visited {
	color:  #<?php echo $suf_wabh_visited_link_color;?>;
	text-decoration: <?php echo $suf_wabh_visited_link_style;?>;
}

#horizontal-outer-widgets-1 a:hover {
	color:  #<?php echo $suf_wabh_link_hover_color;?>;
	text-decoration: <?php echo $suf_wabh_link_hover_style;?>;
}
<?php
	}
}

if ($suf_widget_area_above_footer_enabled == "enabled") {
	$bw2_columns = intval($suf_widget_area_above_footer_columns);
	$bw2_width = get_column_width($bw2_columns);
	$bw2_margin = get_margin($bw2_columns);
	$bw2_ie_margin = get_ie6_margin($bw2_columns);
?>
#horizontal-outer-widgets-2 .suf-horizontal-widget {
	width: <?php echo $bw2_width;?>;
	display: inline-block;
	margin: <?php echo $bw2_margin;?>;
}

* html #horizontal-outer-widgets-2 .suf-horizontal-widget {
	ma\rgin: <?php echo $bw2_ie_margin;?>;
}
<?php
	if ($suf_header_for_widgets_above_footer == "plain-borderless") {
?>

#horizontal-outer-widgets-2 .dbx-handle {
	border-bottom: none;
}

<?php
	}
	if ($suf_waaf_font_style_setting == "custom") {
?>
#horizontal-outer-widgets-2 {
	color:  #<?php echo $suf_waaf_font_color;?>;
}

#horizontal-outer-widgets-2 a {
	color:  #<?php echo $suf_waaf_link_color;?>;
	text-decoration: <?php echo $suf_waaf_link_style;?>;
}

#horizontal-outer-widgets-2 a:visited {
	color:  #<?php echo $suf_waaf_visited_link_color;?>;
	text-decoration: <?php echo $suf_waaf_visited_link_style;?>;
}

#horizontal-outer-widgets-2 a:hover {
	color:  #<?php echo $suf_waaf_link_hover_color;?>;
	text-decoration: <?php echo $suf_waaf_link_hover_style;?>;
}
<?php
	}
}

if ((is_category() && $suf_featured_category_view == "enabled") ||
	(is_tag() && $suf_featured_tag_view == "enabled") ||
	(is_search() && $suf_featured_search_view == "enabled") ||
	(is_author() && $suf_featured_author_view == "enabled") ||
	((is_date() || is_year() || is_month() || is_day() || is_time()) && $suf_featured_time_view == "enabled") ||
	$suf_featured_index_view == "enabled") {
		
	$featured_height = get_size_from_field($suf_featured_height, "250px");
	$featured_excerpt_width = get_size_from_field($suf_featured_excerpt_width, "250px");
?>
#slider, #sliderContent {
	height: <?php echo $featured_height; ?>; /* important to be same as image height */
}

#featured-posts .left, #featured-posts .right {
	height: <?php echo $featured_height; ?>;
}

.sliderImage {
	height: <?php echo $featured_height; ?>;
}

#featured-posts .left {
	width: <?php echo $featured_excerpt_width; ?> !important;
}

#featured-posts .right {
	width: <?php echo $featured_excerpt_width; ?> !important;
}

.sliderImage div {
	background-color: #<?php echo $suf_featured_excerpt_bg_color;?>;
	color: #<?php echo $suf_featured_excerpt_font_color;?>;
}

.sliderImage div a {
	color: #<?php echo $suf_featured_excerpt_link_color;?>;
}

<?php 
	if ($suf_featured_show_border == "show") {
?>
#featured-posts {
	border-width: 1px;
	border-style: solid;
}
<?php 
	}
}

if ($suf_emphasis_customization == 'custom') {
?>

.download {
	color: #<?php echo $suf_download_font_color;?>;
	background-color: #<?php echo $suf_download_background_color;?>;
	border-color: #<?php echo $suf_download_border_color;?>;
}

.announcement {
	color: #<?php echo $suf_announcement_font_color;?>;
	background-color: #<?php echo $suf_announcement_background_color;?>;
	border-color: #<?php echo $suf_announcement_border_color;?>;
}

.note {
	color: #<?php echo $suf_note_font_color;?>;
	background-color: #<?php echo $suf_note_background_color;?>;
	border-color: #<?php echo $suf_note_border_color;?>;
}

.warning {
	color: #<?php echo $suf_warning_font_color;?>;
	background-color: #<?php echo $suf_warning_background_color;?>;
	border-color: #<?php echo $suf_warning_border_color;?>;
}

<?php
}
?>
.suf-mag-headlines {
	height: <?php echo get_size_from_field($suf_mag_headlines_height, "250px"); ?>;
}

col.suf-mag-excerpt {
<?php
$mag_excerpt_td_width = floor(100/(int)$suf_mag_excerpts_per_row);
?>
	width: <?php echo $mag_excerpt_td_width; ?>%;
}

.suf-mag-excerpt-image {
<?php
$mag_excerpt_td_img_width = floor($widths['main-col']/(int)$suf_mag_excerpts_per_row) - 20;
?>
	width: <?php echo $mag_excerpt_td_img_width; ?>px;
	height: <?php echo get_size_from_field($suf_mag_excerpts_image_box_height, "100px"); ?>;
}

* html .suf-mag-excerpt-image {
<?php
$mag_excerpt_td_img_width = floor($widths['main-col']/(int)$suf_mag_excerpts_per_row) - 20 - (int)$suf_mag_excerpts_per_row;
?>
	w\idth: <?php echo $mag_excerpt_td_img_width; ?>px;
}

col.suf-mag-category {
<?php
$mag_category_td_width = floor(100/(int)$suf_mag_catblocks_per_row);
?>
	width: <?php echo $mag_category_td_width; ?>%;
}

.suf-mag-category-image {
<?php
$mag_category_td_img_width = floor($widths['main-col']/(int)$suf_mag_catblocks_per_row) - 20;
?>
	width: <?php echo $mag_category_td_img_width; ?>px;
	height: <?php echo get_size_from_field($suf_mag_catblocks_image_box_height, "100px"); ?>;
}

* html .suf-mag-category-image {
<?php
$mag_category_td_img_width = floor($widths['main-col']/(int)$suf_mag_catblocks_per_row) - 20 - (int)$suf_mag_catblocks_per_row;
?>
	w\idth: <?php echo $mag_category_td_img_width; ?>px;
}

h2.suf-mag-category-title {
	text-align: <?php echo $suf_mag_catblocks_title_alignment; ?>;
}

.suf-mag-categories th {
	text-align: <?php echo $suf_mag_catblocks_main_title_alignment; ?>;
}

.suf-mag-excerpts th {
	text-align: <?php echo $suf_mag_excerpts_main_title_alignment; ?>;
}

h2.suf-mag-excerpt-title {
	text-align: <?php echo $suf_mag_excerpt_title_alignment; ?>;
}

h2.suf-mag-headlines-title {
	text-align: <?php echo $suf_mag_headline_main_title_alignment; ?>;
}

