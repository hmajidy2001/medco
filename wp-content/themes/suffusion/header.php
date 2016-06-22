<?php
/**
 * Core header file, invoked by the get_header() function
 *
 * @package Suffusion
 * @subpackage Templates
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php if(is_home()) { echo get_bloginfo('name'); } else { echo get_bloginfo('name')." &raquo; "; wp_title(''); } ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
suffusion_document_header();
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}
wp_head();
?>
</head>
<body>
	<div id="page" class="fix">
		<div id="wrapper" class="fix">
			<div id="header-container" class="fix">
				<?php
					suffusion_page_header();
				?>
			</div><!-- //#header-container -->
			<div id="container" class="fix">
				<?php
					suffusion_after_begin_container();
				?>
