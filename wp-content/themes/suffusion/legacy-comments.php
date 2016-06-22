<?php
/**
 * Comments where threading is not supported
 *
 * @package Suffusion
 * @subpackage Templates
 */

// Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "suf_theme");?><p>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number(__('No Comments', "suf_theme"), __('One Comment', "suf_theme"), __('% Comments', "suf_theme") );?> to &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 48); ?>
			
			<cite><?php comment_author_link() ?></cite> Says:
			<?php if ($comment->comment_approved == '0') : ?>
			<br/><em>(<?php _e("Your comment is awaiting moderation", "suf_theme");?>)</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>

			<?php comment_text() ?>
			<br /><br />
		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e("Comments are closed", "suf_theme"); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

	<h3 id="respond"><?php _e("Leave a Reply", "suf_theme"); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e("You must be logged in to post a comment", "suf_theme"); ?></a></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php 
		if ( $user_ID ) : 
			$logged_in_url = "<a href=\"".get_option('siteurl')."/wp-admin/profile.php\">".$user_identity."</a>";
?>

<p><?php printf(__('Logged in as %s. ', 'suf_theme'), $logged_in_url); ?>
<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account"><?php _e("Log out","suf_theme");?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><strong><?php _e('Name', 'suf_theme'); ?></strong> <?php if ($req) _e('(required)', 'suf_theme'); ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><strong><?php _e('Mail', 'suf_theme'); ?></strong> (<?php _e('will not be published', 'suf_theme'); ?>) <?php if ($req) _e('(required)', 'suf_theme'); ?></label></p>

<!--<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><strong>Website</strong></label></p>-->

<p><input type="text" name="openid_identifier" id="openid_identifier" size="22" tabindex="4"  />
<label for="openid_identifier"><strong><?php _e('Website (OpenID supported)', 'suf_theme'); ?></strong></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

	<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'suf_theme'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; ?>
