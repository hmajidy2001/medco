<?php
/**
 * Template Name: Magazine
 * 
 * Creates a page with a magazine-style layout. If you have a magazine-themed 
 * blog you should can use this to define your front page.
 *
 * @package Suffusion
 * @subpackage Templates
 */

get_header();

global $options, $spawned_options, $post;
$mag_posts = get_posts(array('numberposts' => -1));

foreach ($options as $value) {
    if (get_option($value['id']) === FALSE) {
    	$$value['id'] = $value['std'];
    }
    else {
    	$$value['id'] = get_option( $value['id'] );
    }
}

function suffusion_get_headlines() {
	global $post, $mag_posts;
	$headlines = array();
	$solos = array();
	foreach ($mag_posts as $post) {
		$is_headline = get_post_meta($post->ID, 'suf_magazine_headline', true);
		if ($is_headline) {
			$headlines[count($headlines)] = $post;
			$solos[count($solos)] = $post->ID;
		}
	}
	$headline_categories = suf_get_allowed_categories('suf_mag_headline_categories');
	if (is_array($headline_categories) && count($headline_categories) > 0) {
		$query_cats = array();
		foreach ($headline_categories as $headline_category) {
			$query_cats[count($query_cats)] = $headline_category->cat_ID;
		}
		$query_posts = implode(",", array_values($query_cats));
		$cat_query = new WP_query(array('cat' => $query_posts, 'post__not_in' => $solos));
	}

	if (isset($cat_query->posts) && is_array($cat_query->posts)) {
		while ($cat_query->have_posts()) {
			$cat_query->the_post();
			$headlines[count($headlines)] = $post;
		}
	}
	return $headlines;
}

function suffusion_get_mag_section_queries($args = array()) {
	global $post, $mag_posts;
	$meta_check_field = $args['meta_check_field'];
	$solos = array();
	$queries = array();

	if ($meta_check_field) {
		foreach ($mag_posts as $post) {
			$is_meta = get_post_meta($post->ID, $meta_check_field, true);
			if ($is_meta) {
				$solos[count($solos)] = $post->ID;
			}
		}
	}
	$solo_query = new WP_query(array('post__in' => $solos, 'caller_get_posts' => 1));
	$queries[count($queries)] = $solo_query;

	$category_prefix = $args['category_prefix'];
	if ($category_prefix) {
		$categories = suf_get_allowed_categories($category_prefix);
		if (is_array($categories) && count($categories) > 0) {
			$query_cats = array();
			foreach ($categories as $category) {
				$query_cats[count($query_cats)] = $category->cat_ID;
			}
			$query_posts = implode(",", array_values($query_cats));
			$cat_query = new WP_query(array('cat' => $query_posts, 'post__not_in' => $solos, 'posts_per_page' => -1));
			$queries[count($queries)] = $cat_query;
		}
	}
	return $queries;
}

function suffusion_show_mag_excerpts_table($queries, $total) {
	global $post, $suf_mag_excerpts_per_row, $suf_mag_excerpts_title;
	$ret = "";
	$ret .= "<table class='suf-mag-excerpts'>\n";
	for ($i = 0; $i < (int)$suf_mag_excerpts_per_row - 1; $i++) {
		$ret .= "\t<col class='suf-mag-excerpt'/>\n";
	}
	$ret .= "\t<col/>\n";
	if (trim($suf_mag_excerpts_title) != '') {
		$ret .= "\t<tr>\n";
		$ret .= "\t\t<th colspan='$suf_mag_excerpts_per_row'>$suf_mag_excerpts_title</th>\n";
		$ret .= "\t</tr>\n";
	}
	$ret .= suffusion_show_mag_excerpts($queries, $total);
	$ret .= "</table>\n";
	return $ret;
}

function suffusion_show_mag_excerpts($queries, $total) {
	global $post, $suf_mag_excerpts_per_row;
	$ctr = 0;
	$ret = "";
	foreach ($queries as $query) {
		if (isset($query->posts) && is_array($query->posts)) {
			while ($query->have_posts()) {
				$query->the_post();
				if ($ctr%$suf_mag_excerpts_per_row == 0) {
					$ret .= "<tr>\n";
				}
				$ret .= suffusion_show_mag_single_excerpt();
				if ($ctr == $total - 1 || $ctr%$suf_mag_excerpts_per_row == $suf_mag_excerpts_per_row - 1) {
					$ret .= "</tr>\n";
				}
				$ctr++;
			}
		}
	}
	return $ret;
}

function suffusion_show_mag_single_excerpt() {
	global $post, $suf_mag_excerpt_full_story_text;
	$ret = "";
	$ret .= "<td>\n";
	$ret .= "\t<div class='suf-mag-excerpt'>\n";
	$ret .= "\t\t<div class='suf-mag-excerpt-image'>".suffusion_get_image(array('mag-excerpt' => true))."</div>\n";
	$ret .= "\t\t<h2  class='suf-mag-excerpt-title'><a href='".get_permalink($post->ID)."'>".get_the_title($post->ID)."</a></h2>\n";
	$ret .= "\t\t<div class='suf-mag-excerpt-text'>\n";
	$excerpt = get_the_excerpt();
	$ret .= apply_filters('the_excerpt', $excerpt); 
	$ret .= "\t\t</div>\n";
	if (trim($suf_mag_excerpt_full_story_text)) {
		$ret .= "\t\t<a href='".get_permalink($post->ID)."' class='suf-mag-excerpt-full-story'>$suf_mag_excerpt_full_story_text</a>";
	}

	$ret .= "\t</div>\n";
	$ret .= "</td>\n";
	return $ret;
}

function suffusion_show_mag_catblocks_table($categories, $total) {
	global $post, $suf_mag_catblocks_per_row, $suf_mag_catblocks_title;
	$ret = "";
	$ret .= "<table class='suf-mag-categories'>\n";
	for ($i = 0; $i < (int)$suf_mag_catblocks_per_row - 1; $i++) {
		$ret .= "\t<col class='suf-mag-category'/>\n";
	}
	$ret .= "\t<col/>\n";
	if (trim($suf_mag_catblocks_title) != '') {
		$ret .= "\t<tr>\n";
		$ret .= "\t\t<th colspan='$suf_mag_catblocks_per_row'>$suf_mag_catblocks_title</th>\n";
		$ret .= "\t</tr>\n";
	}
	$ret .= suffusion_show_mag_catblocks($categories, $total);
	$ret .= "</table>\n";
	return $ret;
}

function suffusion_show_mag_catblocks($categories, $total) {
	global $post, $suf_mag_catblocks_per_row, $category;
	$ctr = 0;
	$ret = "";
	if (is_array($categories)) {
		foreach ($categories as $category) {
			if ($ctr%$suf_mag_catblocks_per_row == 0) {
				$ret .= "<tr>\n";
			}
			
			$ret .= suffusion_show_mag_single_catblock();
			if ($ctr == $total - 1 || $ctr%$suf_mag_catblocks_per_row == $suf_mag_catblocks_per_row - 1) {
				$ret .= "</tr>\n";
			}
			$ctr++;
		}
	}
	return $ret;
}

function suffusion_show_mag_single_catblock() {
	global $post, $category, $suf_mag_catblocks_images_enabled, $suf_mag_catblocks_desc_enabled, $suf_mag_catblocks_posts_enabled, $suf_mag_catblocks_num_posts;
	global $suf_mag_catblocks_see_all_text;
	$ret = "";
	$ret .= "<td>\n";
	$ret .= "\t<h2 class='suf-mag-category-title'>".$category->cat_name;
	//$rss_url = get_bloginfo('rss2_url');
	//$cat_rss = add_query_arg('cat', $category->cat_ID, $rss_url);
	//$ret .= " <a href='".$cat_rss."'>Subscribe</a>";
	$ret .= "</h2>";

	$ret .= "\t<div class='suf-mag-category'>\n";
	if ($suf_mag_catblocks_images_enabled != 'hide') {
		if (function_exists('get_cat_icon')) {
			$cat_icon = get_cat_icon('echo=false&cat='.$category->cat_ID);
			if (($suf_mag_catblocks_images_enabled == 'hide-empty' && trim($cat_icon) != '') || $suf_mag_catblocks_images_enabled == 'show') {
				$ret .= "\t\t<div class='suf-mag-category-image'>";
				$ret .= $cat_icon;
				$ret .= "</div>\n";
			}
		}
	}
	if ($suf_mag_catblocks_desc_enabled == 'show') {
		$ret .= $category->category_description;
	}
	if ($suf_mag_catblocks_posts_enabled == 'show') {
		$query = new WP_query(array('cat' => $category->cat_ID, 'posts_per_page' => $suf_mag_catblocks_num_posts));
		if (isset($query->posts) && is_array($query->posts) && count($query->posts) > 0) {
			$ret .= "<ul class='suf-mag-catblock-posts'>\n";
			while ($query->have_posts())  {
				$query->the_post();
				$ret .= "<li class='suf-mag-catblock-post'><a href='".get_permalink()."' class='suf-mag-catblock-post'>".get_the_title()."</a></li>\n";
			}
			$ret .= "</ul>";
		}
	}
	if (trim($suf_mag_catblocks_see_all_text)) {
		$ret .= "\t<div class='suf-mag-category-footer'>\n";
		$ret .= "\t\t<a href='".get_category_link($category->cat_ID)."' class='suf-mag-category-all-posts'>$suf_mag_catblocks_see_all_text</a>";
		$ret .= "\t</div>\n";
	}

	$ret .= "\t</div>\n";
	$ret .= "</td>\n";
	return $ret;
}

?>

    <div id="main-col">
<?php suffusion_before_begin_content(); ?>
      <div id="content">
	<?php suffusion_after_begin_content(); ?>
	<?php if (have_posts() && $suf_mag_content_enabled == "show") : ?>

		<?php while (have_posts()) : the_post(); ?>

        <div class="post fix" id="post-<?php the_ID(); ?>">
<?php suffusion_after_begin_post(); ?>

          <div class="entry fix">
			<?php suffusion_content(); ?>
          </div><!--entry -->
		<?php suffusion_before_end_post(); ?>
		</div><!--post -->
		<?php endwhile; ?>
		<?php suffusion_before_end_content(); ?>
	<?php endif; ?>

<?php
if ($suf_mag_headlines_enabled == 'show') {
	if (trim($suf_mag_headline_title)) {
?>
	<h2 class='suf-mag-headlines-title fix'><?php echo $suf_mag_headline_title; ?></h2>
<?php
	}
?>
<div class='suf-mag-headlines fix'>
	<div class='suf-mag-headline-photo-box'>
<?php
	$headlines = suffusion_get_headlines();
	$headline_ctr = 0;
	foreach ($headlines as $post) {
		$headline_ctr++;
		if ($headline_ctr == 1) {
			$first_class = 'suf-mag-headline-photo-first';
		}
		else {
			$first_class = '';
		}
?>
		<div class='suf-mag-headline-photo-<?php echo $post->ID?> suf-mag-headline-photo <?php echo $first_class;?>'>
<?php
		echo suffusion_get_image(array('mag-headline' => true));
?>
		</div>
<?php
	}
?>
	</div>
	<div class='suf-mag-headline-block'>
<?php
	if (count($headlines) > 0) {
?>
		<ul class='mag-headlines'>
<?php
		$headline_ctr = 0;
		foreach ($headlines as $post) {
			$headline_ctr++;
			if ($headline_ctr == 1) {
				$first_class = 'suf-mag-headline-first';
			}
			else {
				$first_class = '';
			}
?>
			<li class='suf-mag-headline-<?php echo $post->ID?> suf-mag-headline <?php echo $first_class; ?>'>
				<a href="<?php echo get_permalink($post->ID); ?>" class='suf-mag-headline-<?php echo $post->ID?> suf-mag-headline'><?php echo get_the_title($post->ID); ?></a>
			</li>
<?php
		}
?>
		</ul>
<?php
	}
?>
	</div>
</div>
<?php
}

if ($suf_mag_excerpts_enabled == 'show') {
	$queries = suffusion_get_mag_section_queries(array('meta_check_field' => 'suf_magazine_excerpt', 'category_prefix' => 'suf_mag_excerpt_categories'));
	$total = 0;
	foreach ($queries as $query) {
		if (isset($query->posts) && is_array($query->posts)) {
			$total += count($query->posts);
		}
	}
	if ($total > 0) {
		echo suffusion_show_mag_excerpts_table($queries, $total);
	}
}

if ($suf_mag_categories_enabled == 'show') {
	$categories = suf_get_allowed_categories('suf_mag_catblock_categories');
	if ($categories != null && is_array($categories) && count($categories) > 0) {
		$total = count($categories);
		echo suffusion_show_mag_catblocks_table($categories, $total);
	}
}
?>
      </div><!-- content -->
    </div><!-- main col -->
	<?php get_footer(); ?>
