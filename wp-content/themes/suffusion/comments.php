<?php
/**
 * Threaded comments
 *
 * @package Suffusion
 * @subpackage Templates
 */
?>
<div id="comments">
<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", "suf_theme");?></p>
	<?php
		return;
	}

	global $options;
	foreach ($options as $value) {
		if (get_option($value['id']) === FALSE) {
			$$value['id'] = $value['std'];
	    }
		else {
			$$value['id'] = get_option( $value['id'] );
	    }
	}

?>

<?php // Begin Comments & Trackbacks ?>
<?php if ( have_comments() ) : ?>
<h3 class="comments">
	<?php comments_number(__('No Responses', "suf_theme"), __('One Response', "suf_theme"), __('% Responses', "suf_theme") ); ?> to &#8220;<?php the_title(); ?>&#8221;
</h3>
<?php 
	suffusion_split_comments();
//	suffusion_comment_navigation(); // Cannot have comment navigation before listing the comments, because at this point we don't know if we are getting all comments or if we are separating out pingbacks and trackbacks
	suffusion_list_comments();
	suffusion_comment_navigation();
	// End Comments 
endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3 class="respond"><?php comment_form_title( __('Leave a Reply', "suf_theme"), __('Leave a Reply to %s', "suf_theme") ); ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("You must be logged in to post a comment.", "suf_theme");?></a></p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : 
	$logged_in_url = "<a href=\"".get_option('siteurl')."/wp-admin/profile.php\">".$user_identity."</a>";
	?>

<!--<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>-->
<p><?php printf(__('Logged in as %s. ', 'suf_theme'), $logged_in_url); ?>
<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out","suf_theme");?> &raquo;</a></p>

<?php 
	else : 
		$label_style = $suf_comment_label_styles == "plain" ? "" : " fancy ";
?>

	<p>
	<label for="author" class="<?php echo $label_style; ?>"><?php _e('Name', "suf_theme"); ?></label> 
	<input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	<?php if ($req) _e('(required)', "suf_theme"); ?>
	</p>

	<p>
	<label for="email" class="<?php echo $label_style; ?>"><?php _e('E-mail', "suf_theme"); ?></label> 
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" class="textarea" />
	<?php if ($req) _e('(required)', "suf_theme"); ?>
	</p>

	<p>
	<label for="url" class="<?php echo $label_style; ?>"><?php _e('<acronym title="Uniform Resource Identifier">URI</acronym>', "suf_theme"); ?></label>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" class="textarea" />
	</p>

	<?php endif; ?>

	<p>
	<label for="comment" class="textarea <?php echo $label_style; ?>"><?php _e('Your Comment', "suf_theme"); ?></label>
	<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="textarea"></textarea>
	</p>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

	<p>
	<?php comment_id_fields(); ?>
	<input name="submit" id="submit" type="submit" tabindex="5" value="<?php _e('Submit Comment', "suf_theme"); ?>" class="Cbutton" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>
<?php else : // Comments are closed 
		if (get_option('suf_comments_disabled_'.$post->ID) == true) {
		}
		else {
?>
<p><?php _e('Sorry, the comment form is closed at this time.', "suf_theme"); ?></p>
<?php
		}
?>
<?php endif; ?>
</div>
