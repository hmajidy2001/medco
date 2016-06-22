<?php
/**
 * Used when you are looking at all posts in a category.
 *
 * @package Suffusion
 * @subpackage Templates
 */

get_header();
?>

    <div id="main-col">
<?php suffusion_before_begin_content(); ?>
      <div id="content">
	<?php suffusion_after_begin_content(); ?>
	<?php if (have_posts()) : ?>

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

	<?php else : ?>
        <div class="post fix">
			<h2><?php _e("Not Found", "suf_theme"); ?></h2>
			<hr/>
			<p><?php _e("Sorry, but you are looking for something that isn't here", "suf_theme"); ?></p>
        </div><!--post -->

	<?php endif; ?>
      </div><!-- content -->
    </div><!-- main col -->
	<?php get_footer(); ?>
