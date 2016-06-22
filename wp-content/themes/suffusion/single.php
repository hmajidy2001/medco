<?php
get_header();
?>
    <div id="main-col">
  	<div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <?php if (suffusion_post_count() > 1) : 
  ?>
   <div class="post-nav"> <span class="previous"><?php previous_post_link('%link', '%title') ?></span> <span class="next"><?php next_post_link('%link', '%title') ?></span></div>
  <?php endif;
  ?>

        <div class="post fix" id="post-<?php the_ID(); ?>">
<?php suffusion_after_begin_post(); ?>
          <div class="entry fix">
            <?php the_content(__('Continue reading', 'suf_theme').' &raquo;'); ?>
          </div><!--/entry -->
		<?php suffusion_before_end_post(); ?>

		<?php comments_template(); ?>
		</div><!--/post -->

			<?php endwhile; else: ?>
        <div class="post fix">
		<p><?php _e('Sorry, no posts matched your criteria.', 'suf_theme'); ?></p>
        </div><!--post -->

<?php endif; ?>
      </div><!-- content -->
    </div><!-- main col -->
<?php get_footer(); ?>
