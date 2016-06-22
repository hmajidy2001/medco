<?php
/**
 * Default template for a page
 *
 * @package Suffusion
 * @subpackage Templates
 */

get_header();
?>

    <div id="main-col">
<?php
suffusion_page_navigation();
?>

  <div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post fix" id="post-<?php the_ID(); ?>">
<?php suffusion_after_begin_post(); ?>

          <div class="entry fix">
			<?php suffusion_content(); ?>
		</div><!--/entry -->
		<?php suffusion_before_end_post(); ?>
	<?php comments_template(); ?>

	</div><!--/post -->

	<?php endwhile; endif; ?>
</div></div>
	<?php get_footer(); ?>
