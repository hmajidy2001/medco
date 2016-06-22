<?php

add_action("widgets_init", "load_suffusion_widgets");

function load_suffusion_widgets() {
	register_widget("Suffusion_Search");
	register_widget("Suffusion_Text");
	register_widget("Suffusion_Meta");
	register_widget("Suffusion_Follow_Twitter");
}

class Suffusion_Search extends WP_Widget {
	function Suffusion_Search() {
		$widget_options = array(
			"classname" => "search",
			"description" => __("A search form for your blog", "suf_theme"),
		);

		$control_options = array(
			"id_base" => "search"
		);

		$this->WP_Widget("search", __("Search", "suf_theme"), $widget_options, $control_options);
	}

	function widget($args, $instance) {
		extract($args);

		$title = apply_filters("widget_title", $instance["title"]);
		echo $before_widget;
		if (trim($before_title) != "" || trim($after_title) != "") {
			echo $before_title.$title.$after_title;
		}
		include (TEMPLATEPATH . '/searchform.php');
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance["title"] = strip_tags($new_instance["title"]);

		return $instance;
	}

	function form($instance) {
		$defaults = array("title" => __("Search", "suf_theme"));
		$instance = wp_parse_args((array)$instance, $defaults);
?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'suf_theme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

<?php
	}
}

/* The WP_Widget_Text class needed to be overridden because of empty titles. 
 * With Docking Boxes the "before_title" and "after_title" were not being invoked in case of empty titles, wrecking the layout. Only the "widget" function is overloaded
 */
class Suffusion_Text extends WP_Widget_Text {
	function Suffusion_Text() {
		$widget_ops = array('classname' => 'widget_text', 'description' => __('Arbitrary text or HTML', 'suf_theme'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('text', __('Text', 'suf_theme'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$text = apply_filters( 'widget_text', $instance['text'] );
		if ( !empty( $title ) ) { 
			echo $before_widget;
			echo $before_title . $title . $after_title; 
?>
			<div class="textwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
<?php
			echo $after_widget;
		}
		else {
?>
			<div class="textwidget suf-horizontal-widget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
<?php
		}
	}
}

class Suffusion_Meta extends WP_Widget_Meta {
	function Suffusion_Meta() {
		$widget_ops = array('classname' => 'widget_meta', 'description' => __( "Log in/out, admin, feed and WordPress links", "suf_theme") );
		$this->WP_Widget('meta', __('Meta', 'suf_theme'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Meta', 'suf_theme') : $instance['title']);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
?>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0', 'suf_theme')); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>', 'suf_theme'); ?></a></li>
			<li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php echo esc_attr(__('The latest comments to all posts in RSS', 'suf_theme')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>', 'suf_theme'); ?></a></li>
			<?php wp_meta(); ?>
			</ul>
<?php
		echo $after_widget;
	}
}

class Suffusion_Follow_Twitter extends WP_Widget {
	function Suffusion_Follow_Twitter() {
		$widget_ops = array('classname' => 'widget-suf-follow-twitter', 'description' => __("A widget to enable people to follow you on Twitter", "suf_theme"));
		$control_ops = array('width' => 840, 'height' => 350);

		$this->WP_Widget("suf-follow-twitter", __("Twitter", "suf_theme"), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$user = $instance['user'];
		$show_outer_border = $instance['show_outer_border'];
		$show_title = $instance['show_title'];
		$show_icon = $instance['show_icon'];
		$show_tagline = $instance['show_tagline'];
		$show_tweets = $instance['show_tweets'];
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$tagline = $instance['tagline'];
		$icon = $instance['icon'];
		$icon_height = $instance['icon_height'];
		$num_tweets = $instance['num_tweets'];

		if ($show_outer_border) {
?>
	<div class="dbx-box suf-widget suf-horizontal-widget widget-suf-twitter-boxed">
<?php
			if ($show_title) {
				if (trim($before_title) != "") {
					echo $before_title.$title."</h3>";
				}
			}
?>
		<div class="dbx-content">
<?php
		}
		else {
?>
	<div class="suf-horizontal-widget widget-suf-twitter">
<?php 
		}
		if ($show_icon || $show_tagline) {
?>
<center>
	<a href="http://twitter.com/<?php echo $user; ?>" class="twitter-icon-and-tag" title="<?php echo $tagline;?>">
<?php
			if ($show_icon) {
?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter/<?php echo $icon;?>-big.png" alt="Twitter" height="<?php echo $icon_height;?>" width="<?php echo $icon_height;?>"/>
<?php 
			}

			if ($show_tagline) {
				echo $tagline;
			}
		}
?>
	</a>
</center>
<?php

		if ($show_tweets) {
			$feed_url = "http://search.twitter.com/search.atom?q=from:" . $user . "&rpp=" . $num_tweets;

			//Using cURL because of problems with some web hosts like DreamHost
			$ch = curl_init();
			$timeout = 5; // set to zero for no timeout
			curl_setopt ($ch, CURLOPT_URL, $feed_url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$feed = curl_exec($ch);
			curl_close($ch);
	
			$feed = str_replace("&lt;", "<", $feed);
			$feed = str_replace("&gt;", ">", $feed);
			$feed = str_replace("&apos;", "'", $feed);
			$feed = str_replace("&quot;", '"', $feed);
			$feed = str_replace("&amp;", '&', $feed);
			$clean = explode("<content type=\"html\">", $feed);
		
			$amount = count($clean) - 1;
		
			echo "<ul>";
			for ($i = 1; $i <= $amount; $i++) {
				$cleaner = explode("</content>", $clean[$i]);
				echo "<li>".$cleaner[0]."</li>";
			}
			echo "</ul>";
		}
		
		if ($show_outer_border) {
?>
		</div>
	</div>
<?php
		}
		else {
?>
	</div>
<?php
		}
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance["user"] = strip_tags($new_instance["user"]);
		$instance["show_outer_border"] = $new_instance["show_outer_border"];
		$instance["show_title"] = $new_instance["show_title"];
		$instance["show_icon"] = $new_instance["show_icon"];
		$instance["show_tagline"] = $new_instance["show_tagline"];
		$instance["show_tweets"] = $new_instance["show_tweets"];
		$instance["title"] = strip_tags($new_instance["title"]);
		$instance["tagline"] = strip_tags($new_instance["tagline"]);
		$instance["icon"] = $new_instance["icon"];
		$instance["icon_height"] = $new_instance["icon_height"];
		$instance["num_tweets"] = $new_instance["num_tweets"];

		return $instance;
	}

	function form($instance) {
		$defaults = array("user" => __("your-user-name", "suf_theme"),
			"title" => __("My Tweets", "suf_theme"), 
			"tagline" => __("Follow me on Twitter", "suf_theme"), 
			"show_icon" => true, 
			"show_tagline" => true, 
			"icon_height" => "32px",
			"num_tweets" => 5,
		);
		$instance = wp_parse_args((array)$instance, $defaults);
		$icon = $instance['icon'];
		if (!$icon) {
			$icon = "twitter-00";
		}
?>
<div style='display: inline-block; clear: both;'>
	<div style='float: left; width: 32%; margin-right: 10px;'>
<?php 
		_e("<p>This widget lets you set up a link to allow people to follow you on Twitter. You can additionally show your latest feeds.</p>", "suf_theme"); 
		printf("<p>%s</p>", __("Recommended settings:","suf_theme"));
		echo "<ul class='twitter-desc'>\n";
		printf("<li>%s\n", __("If you are placing this widget in the \"Right Header Widgets\":", "suf_theme"));
		echo "<ul>\n";
		printf("<li>%s</li>\n", __("Don't show outer border", "suf_theme"));
		printf("<li>%s</li>\n", __("Don't show title", "suf_theme"));
		printf("<li>%s</li>\n", __("Show icon", "suf_theme"));
		printf("<li>%s</li>\n", __("Don't show tagline", "suf_theme"));
		printf("<li>%s</li>\n", __("Don't show feeds", "suf_theme"));
		echo "</ul>\n";
		echo "</li>\n";

		printf("<li>%s\n", __("If you are placing this widget in the sidebars or in \"Widget Area below Header\" or \"Widget Area below Footer\":", "suf_theme"));
		echo "<ul>\n";
		printf("<li>%s</li>\n", __("Show outer border", "suf_theme"));
		printf("<li>%s</li>\n", __("Show title", "suf_theme"));
		printf("<li>%s</li>\n", __("Show icon", "suf_theme"));
		printf("<li>%s</li>\n", __("Show tagline", "suf_theme"));
		printf("<li>%s</li>\n", __("Show feeds", "suf_theme"));
		echo "</ul>\n";
		echo "</li>\n";
			
		echo "</ul>\n"; ?>
	</div>
	<div style='float: left; width: 32%; margin-right: 10px;'>
		<p>
			<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e('User:', 'suf_theme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo $instance['user']; ?>" class="widefat" />
			<i><?php _e("This is the user who will be followed", "suf_theme"); ?></i>
		</p>

		<p>
			
			<input id="<?php echo $this->get_field_id( 'show_outer_border' ); ?>" name="<?php echo $this->get_field_name( 'show_outer_border' ); ?>" type="checkbox" <?php checked( $instance['show_outer_border'], true ); ?>  class="checkbox" />
			<label for="<?php echo $this->get_field_id( 'show_outer_border' ); ?>"><?php _e('Show Outer Border', 'suf_theme'); ?></label>
			<i><?php _e("Creates a border around the widget", "suf_theme"); ?></i>
			
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" type="checkbox" <?php checked( $instance['show_title'], true ); ?>  class="checkbox" />
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e('Show Title', 'suf_theme'); ?></label>
			<i><?php _e("Shows the title of the widget", "suf_theme"); ?></i>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_icon' ); ?>" name="<?php echo $this->get_field_name( 'show_icon' ); ?>" type="checkbox" <?php checked( $instance['show_icon'], true ); ?>  class="checkbox" />
			<label for="<?php echo $this->get_field_id( 'show_icon' ); ?>"><?php _e('Show Twitter Icon', 'suf_theme'); ?></label>
			<i><?php _e("Will show the selected Twitter icon", "suf_theme"); ?></i>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_tagline' ); ?>" name="<?php echo $this->get_field_name( 'show_tagline' ); ?>" type="checkbox" <?php checked( $instance['show_tagline'], true ); ?>  class="checkbox" />
			<label for="<?php echo $this->get_field_id( 'show_tagline' ); ?>"><?php _e('Show a Tagline', 'suf_theme'); ?></label>
			<i><?php _e("Will show up near the Twitter icon", "suf_theme"); ?></i>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_tweets' ); ?>" name="<?php echo $this->get_field_name( 'show_tweets' ); ?>" type="checkbox" <?php checked( $instance['show_tweets'], true ); ?>  class="checkbox" />
			<label for="<?php echo $this->get_field_id( 'show_tweets' ); ?>"><?php _e('Show my Tweets', 'suf_theme'); ?></label>
			<i><?php _e("Will show your latest tweets", "suf_theme"); ?></i>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'suf_theme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tagline' ); ?>"><?php _e('Tagline:', 'suf_theme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tagline' ); ?>" name="<?php echo $this->get_field_name( 'tagline' ); ?>" value="<?php echo $instance['tagline']; ?>" class="widefat" />
		</p>
	</div>

	<div style='float: left; width: 32%;'>
		<p class="twitter-icons">
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e('Select your Twitter icon:', 'suf_theme'); ?></label><br/>
<?php
		for ($i = 0; $i < 10; $i++) {
?>
			<span><input type="radio" name="<?php echo $this->get_field_name('icon'); ?>" value="twitter-0<?php echo $i; ?>" <?php if ("twitter-0$i" == $icon) { echo  ' checked="checked" '; } ?>/><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter/twitter-0<?php echo $i; ?>.png" alt="Twitter 0<?php echo $i; ?>"/></span>
<?php
		}
?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon_height' ); ?>"><?php _e('Set the height for the Twitter icon:', 'suf_theme'); ?></label>
			<input id="<?php echo $this->get_field_id( 'icon_height' ); ?>" name="<?php echo $this->get_field_name( 'icon_height' ); ?>" 
				value="<?php echo $instance['icon_height']; ?>"/>
			<br/>
			<i><?php _e("Recommended sizes: 32px if the widget is being added to the \"Right Header Widgets\" area, whatever you like otherwise. Note that making the image too large will cause loss of picture quality.", "suf_theme"); ?></i>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'num_tweets' ); ?>"><?php _e('Number of Tweets to display:', 'suf_theme'); ?></label>
			<select id="<?php echo $this->get_field_id( 'num_tweets' ); ?>" name="<?php echo $this->get_field_name( 'num_tweets' ); ?>">
<?php
		for ($i = 1; $i <= 20; $i++) {
?>
				<option <?php if ( $i == $instance['num_tweets'] ) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
<?php
		}
?>
			</select>
		</p>
	</div>
</div>
<?php
	}
}

?>
