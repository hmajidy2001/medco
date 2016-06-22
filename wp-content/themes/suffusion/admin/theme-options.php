<?php
$font_faces = array (
	"Arial, Helvetica, sans-serif" => "<font face=\"Arial, Helvetica, sans-serif\">Arial, <span class='mac'>Arial, Helvetica,</span> <i>sans-serif</i></font>",
	"'Arial Black', Gadget, sans-serif" => "<font face=\"'Arial Black', Gadget, sans-serif\">Arial Black, <span class='mac'>Arial Black, Gadget,</span> <i>sans-serif</i></font>",
	"'Comic Sans MS', cursive" => "<font face=\"'Comic Sans MS', cursive\">Comic Sans MS, <span class='mac'>Comic Sans MS,</span> <i>cursive</i></font>",
	"'Courier New', Courier, monospace " => "<font face=\"'Courier New', Courier, monospace\">Courier New, <span class='mac'>Courier New, Courier,</span> <i>monospace</i></font>",
	"Georgia, serif" => "<font face=\"Georgia, serif\">Georgia, <span class='mac'>Georgia,</span> <i>serif</i></font>",
	"Impact, Charcoal, sans-serif" => "<font face=\"Impact, Charcoal, sans-serif\">Impact, <span class='mac'>Impact, Charcoal,</span> <i>sans-serif</i></font>",
	"'Lucida Console', Monaco, monospace" => "<font face=\"'Lucida Console', Monaco, monospace\">Lucida Console, <span class='mac'>Monaco,</span> <i>monospace</i></font>",
	"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "<font face=\"'Lucida Sans Unicode', 'Lucida Grande', sans-serif\">Lucida Sans Unicode, <span class='mac'>Lucida Grande,</span> <i>sans-serif</i></font>",
	"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "<font face=\"'Palatino Linotype', 'Book Antiqua', Palatino, serif\">Palatino Linotype, Book Antiqua, <span class='mac'>Palatino,</span> <i>serif</i></font>",
	"Tahoma, Geneva, sans-serif" => "<font face=\"Tahoma, Geneva, sans-serif\">Tahoma, <span class='mac'>Geneva,</span> <i>sans-serif</i></font>",
	"'Times New Roman', Times, serif" => "<font face=\"'Times New Roman', Times, serif\">Times New Roman, <span class='mac'>Times,</span> <i>serif</i></font>",
	"'Trebuchet MS', Helvetica, sans-serif" => "<font face=\"'Trebuchet MS', Helvetica, sans-serif\">Trebuchet MS, <span class='mac'>Helvetica,</span> <i>sans-serif</i></font>",
	"Verdana, Geneva, sans-serif" => "<font face=\"Verdana, Geneva, sans-serif\">Verdana, <span class='mac'>Verdana, Geneva,</span> <i>sans-serif</i></font>",
	"Symbol" => "<font face=\"Symbol\">Symbol, <span class='mac'>Symbol</span></font> (\"Symbol\" works in IE and Chrome on Windows and in Safari on Mac)",
	"Webdings" => "<font face=\"Webdings\">Webdings, <span class='mac'>Webdings</span></font> (\"Webdings\" works in IE and Chrome on Windows and in Safari on Mac)",
	"Wingdings, 'Zapf Dingbats'" => "<font face=\"Wingdings, 'Zapf Dingbats'\">Wingdings, <span class='mac'>Zapf Dingbats</span></font> (\"Wingdings\" works in IE and Chrome on Windows and in Safari on Mac)",
	"'MS Sans Serif', Geneva, sans-serif" => "<font face=\"'MS Sans Serif', Geneva, sans-serif\">MS Sans Serif, <span class='mac'>Geneva,</span> <i>sans-serif</i></font>",
	"'MS Serif', 'New York', serif" => "<font face=\"'MS Serif', 'New York', serif\">MS Serif, <span class='mac'>New York,</span> <i>serif</i></font>",
);

global $category_array, $sidebar_tabs;

$options = array (
	// Main Header - this has no options directly associated with it
	array("name" => "Configuration Options",
			"type" => "title",
			"category" => "root"
	),

	// Main category for Look and Feel settings
	array("name" => "Visual Effects",
			"type" => "sub-section-2",
			"category" => "visual-effects",
			"parent" => "root"
		),

	array("name" => "Theme selection",
			"type" => "sub-section-3",
			"category" => "theme-selection",
			"parent" => "visual-effects"
		),

	array("name" => "Color Scheme",
			"desc" => "Choose from one of the pre-defined color schemes. You can customize the colors further, if you wish.",
			"id" => $color_scheme,
			"parent" => "theme-selection",
			"type" => "radio",
			"options" => array(
							"light-theme-green" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-green.jpg' alt='Green on a light theme'/><p>Green on a light theme</p></div>",
							"dark-theme-green" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-green.jpg' alt='Green on a dark theme'/><p>Green on a dark theme (Default)</p></div>",
							"light-theme-pale-blue" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-pale-blue.jpg' alt='Pale Blue on a light theme'/><p>Pale Blue on a light theme</p></div>",
							"dark-theme-pale-blue" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-pale-blue.jpg' alt='Pale Blue on a dark theme'/><p>Pale Blue on a dark theme</p></div>",
							"light-theme-royal-blue" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-royal-blue.jpg' alt='Royal Blue on a light theme'/><p>Royal Blue on a light theme</p></div>",
							"dark-theme-royal-blue" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-royal-blue.jpg' alt='Royal Blue on a dark theme'/><p>Royal Blue on a dark theme</p></div>",
							"light-theme-gray-1" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-gray-1.jpg' alt='Gray Shade 1 on a light theme'/><p>Gray Shade 1 on a light theme</p></div>",
							"dark-theme-gray-1" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-gray-1.jpg' alt='Gray Shade 1 on a dark theme'/><p>Gray Shade 1 on a dark theme</p></div>",
							"light-theme-gray-2" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-gray-2.jpg' alt='Gray Shade 2 on a light theme'/><p>Gray Shade 2 on a light theme</p></div>",
							"dark-theme-gray-2" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-gray-2.jpg' alt='Gray Shade 2 on a dark theme'/><p>Gray Shade 2 on a dark theme</p></div>",
							"light-theme-red" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-red.jpg' alt='Red on a light theme'/><p>Red on a light theme</p></div>",
							"dark-theme-red" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-red.jpg' alt='Red on a dark theme'/><p>Red on a dark theme</p></div>",
							"light-theme-orange" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-orange.jpg' alt='Orange on a light theme'/><p>Orange on a light theme</p></div>",
							"dark-theme-orange" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-orange.jpg' alt='Orange on a dark theme'/><p>Orange on a dark theme</p></div>",
							"light-theme-purple" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Light-theme-purple.jpg' alt='Purple on a light theme'/><p>Purple on a light theme</p></div>",
							"dark-theme-purple" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/Dark-theme-purple.jpg' alt='Purple on a dark theme'/><p>Purple on a dark theme</p></div>",
						),
			"std" => "dark-theme-green"),

	array("name" => "Header Customization",
			"type" => "sub-section-3",
			"category" => "header-styles",
			"parent" => "visual-effects"
	),

	array("name" => "Default styles or custom styles for header?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using for the header, or choose your own. ".
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $header_style_setting,
			"parent" => "header-styles",
			"type" => "radio",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the header.",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Header Background Image Type",
			"desc" => "You can set an image to use for the header. You can either use a predefined image (default) or a custom gradient or nothing at all.",
			"id" => $shortname."_header_image_type",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("image" => "Use a predefined image (default)",
							"gradient" => "Use a custom gradient",
							"none" => "No image"),
			"std" => "image"),

	array("name" => "Header Background Image",
			"desc" => "Set the image to use for the header background. If this makes the header text unreadble you can try changing the header color. ".
				"If you have chosen default styles above or a gradient then this setting will be ignored.",
			"id" => $shortname."_header_background_image",
			"parent" => "header-styles",
			"type" => "text",
			"hint" => "Enter the full URL here (including http://)",
			"std" => ""),

	array("name" => "Header Background Image Tiling",
			"desc" => "Set how the predefined header background image should be tiled. This will define how the image will repeat on the background. ".
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
			"id" => $shortname."_header_background_repeat",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("repeat" => "Repeat both horizontally and vertically (default)",
							"repeat-x" => "Repeat horizontally only",
							"repeat-y" => "Repeat vertically only",
							"no-repeat" => "Do not repeat - show background once only"),
			"std" => "repeat"),

	array("name" => "Header Background Image Position",
			"desc" => "Set the position of the predefined header background image. ".
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
			"id" => $shortname."_header_background_position",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("top left" => "Top left (default)",
							"top center" => "Top center",
							"top right" => "Top right",
							"center left" => "Center left",
							"center center" => "Middle of the page",
							"center right" => "Center right",
							"bottom left" => "Bottom left",
							"bottom center" => "Bottom center",
							"bottom right" => "Bottom right"),
			"std" => "top left"),

	array("name" => "Header Background Gradient Style",
			"desc" => "Choose the style to use for the header gradient. This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked.",
			"id" => $shortname."_header_gradient_style",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array(
							"top-down" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/gradient-t2d.jpg' alt='Top to Bottom'/><br/><p>Top to Bottom</p></div>",
							"down-top" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/gradient-d2t.jpg' alt='Bottom to Top'/><br/><p>Bottom to Top</p></div>",
							"left-right" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/gradient-l2r.jpg' alt='Left to Right'/><br/><p>Left to Right</p></div>",
							"right-left" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/gradient-r2l.jpg' alt='Right to Left'/><br/><p>Right to Left</p></div>",
						),
			"std" => "top-down"),

	array("name" => "Header Background Gradient Start Color",
			"desc" => "Set the starting color for the gradient. The gradient goes from the Start color to the End color. ".
				"This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked. ",
			"id" => $shortname."_header_gradient_start_color",
			"parent" => "header-styles",
			"type" => "color-picker",
			"std" => "FFFFFF"),

	array("name" => "Header Background Gradient End Color",
			"desc" => "Set the ending color for the gradient. The gradient goes from the Start color to the End color. ".
				"This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked. ",
			"id" => $shortname."_header_gradient_end_color",
			"parent" => "header-styles",
			"type" => "color-picker",
			"std" => "000000"),

	array("name" => "Header Foreground Image Type",
			"desc" => "You might want to use a logo or simply have text in your header:",
			"id" => $shortname."_header_fg_image_type",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("image" => "Use a predefined image or logo",
							"text" => "Use text (default)"),
			"std" => "text"),

	array("name" => "Header Foreground Image",
			"desc" => "Set the image to use for the header. This could be a logo or a stylized header using your own fonts and graphics. ".
				"If you have chosen default styles above or a text header then this setting will be ignored.",
			"id" => $shortname."_header_fg_image",
			"parent" => "header-styles",
			"type" => "text",
			"hint" => "Enter the full URL here (including http://)",
			"std" => ""),

	array("name" => "Blog Title / Header Color",
			"desc" => "Set the color of the blog title / header. You can leave the default values in if you don't have a header image. ".
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. ".
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
			"id" => $shortname."_blog_title_color",
			"parent" => "header-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_blog_title_color", $theme_name)),

	array("name" => "Blog Title / Header Decoration",
			"desc" => "Set the effects of the blog title / header. ".
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
			"id" => $shortname."_blog_title_style",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Blog Title / Header Hover Color",
			"desc" => "Set the color of the blog title / header when you hover over it. You can leave the default values in if you don't have a header image. ".
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. ".
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
			"id" => $shortname."_blog_title_hover_color",
			"parent" => "header-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_blog_title_hover_color", $theme_name)),

	array("name" => "Blog Title / Header Hover Decoration",
			"desc" => "Set the effects to show when you hover over the blog title / header. ".
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
			"id" => $shortname."_blog_title_hover_style",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Blog Description / Sub-header Color",
			"desc" => "Set the color of the blog description / sub-header. You can leave the default values in if you don't have a header image or a header background. ".
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. ".
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
			"id" => $shortname."_blog_description_color",
			"parent" => "header-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_blog_description_color", $theme_name)),

	array("name" => "Blog Title / Header Alignment",
			"desc" => "Which side would you like your header?",
			"id" => $shortname."_header_alignment",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("left" => "Left", "right" => "Right", "center" => "Center", "hidden" => "Hidden"),
			"std" => "left"),

	array("name" => "Description / Sub-Header Alignment",
			"desc" => "Which side would you like your sub-header?",
			"id" => $shortname."_sub_header_alignment",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("left" => "Left", "right" => "Right", "center" => "Center", "hidden" => "Hidden"),
			"std" => "right"),

	array("name" => "Description / Sub-Header Vertical Alignment, relative to header",
			"desc" => "Which line would you like your sub-header relative to the header?",
			"id" => $shortname."_sub_header_vertical_alignment",
			"parent" => "header-styles",
			"type" => "radio",
			"options" => array("above" => "Above the header text", "below" => "Below the header text", "same-line" => "Same line as the header"),
			"std" => "same-line"),

	array("name" => "Body Background Settings",
			"type" => "sub-section-3",
			"category" => "body-styles",
			"parent" => "visual-effects"
		),

	array("name" => "Default or custom backgrounds for main body?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. ".
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $body_style_setting,
			"parent" => "body-styles",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the body.",
			"type" => "radio",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Body Background Color",
			"desc" => "Set the color of the background on which the page is. ".
				"Note that you can have a dark theme on a white background - the colors of the main content window are unaffected by this. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_body_background_color",
			"parent" => "body-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_body_background_color", $theme_name)),

	array("name" => "Body Background Image",
			"desc" => "Set the image to use for the background. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_body_background_image",
			"parent" => "body-styles",
			"type" => "text",
			"hint" => "Enter the full URL here (including http://)",
			"std" => ""),

	array("name" => "Body Background Image Tiling",
			"desc" => "Set how the background image should be tiled. This will define how the image will repeat on the background. ".
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
			"id" => $shortname."_body_background_repeat",
			"parent" => "body-styles",
			"type" => "radio",
			"options" => array("repeat" => "Repeat both horizontally and vertically (default)",
							"repeat-x" => "Repeat horizontally only",
							"repeat-y" => "Repeat vertically only",
							"no-repeat" => "Do not repeat - show background once only"),
			"std" => "repeat"),

	array("name" => "Background Image Scrolling",
			"desc" => "You can define your background image to either scroll with the rest of your content or stay fixed. ".
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
			"id" => $shortname."_body_background_attachment",
			"parent" => "body-styles",
			"type" => "radio",
			"options" => array("scroll" => "Let the background sroll with the rest of the page (default)",
							"fixed" => "Keep the background fixed"),
			"std" => "scroll"),

	array("name" => "Background Image Position",
			"desc" => "Set the position of the background image. ".
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
			"id" => $shortname."_body_background_position",
			"parent" => "body-styles",
			"type" => "radio",
			"options" => array("top left" => "Top left (default)",
							"top center" => "Top center",
							"top right" => "Top right",
							"center left" => "Center left",
							"center center" => "Middle of the page",
							"center right" => "Center right",
							"bottom left" => "Bottom left",
							"bottom center" => "Bottom center",
							"bottom right" => "Bottom right"),
			"std" => "top left"),

	array("name" => "Main Wrapper Background Color",
			"desc" => "Set the color of the main container in your page. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wrapper_background_color",
			"parent" => "body-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_wrapper_background_color", $theme_name)),

	array("name" => "Show Shadows",
			"desc" => "You can choose to drop a shadow for your page. Shadows look cool on light backgrounds and not so much on dark backgrounds.",
			"id" => $show_shadows,
			"parent" => "body-styles",
			"type" => "radio",
			"options" => array("hide" => "Don't show a shadow", "show" => "Show shadow of the main window"),
			"std" => "hide"),

	array("name" => "Body Font Settings",
			"type" => "sub-section-3",
			"category" => "body-font-styles",
			"parent" => "visual-effects"
		),

	array("name" => "Default or custom font styles?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. ".
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $body_font_style_setting,
			"parent" => "body-font-styles",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the fonts.",
			"type" => "radio",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Font Face",
			"desc" => "You can choose the fonts that you want to use. If the font you pick cannot be rendered by the browser / OS, ".
				"the default sequence of fonts is attempted (Trebuchet, Trebuchet MS, Tahoma, Lucida Grande, Lucida Sans Unicode, Arial, Verdana, sans-serif). ".
				"The following is a list of \"browser-safe\" fonts, <a href='http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html'>from here</a>.".
				"The fonts in <span class='mac'>blue</span> are the Mac equivalents of the Windows fonts. The <i>italicized</i> text represents the generic font family. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_body_font_family",
			"parent" => "body-font-styles",
			"note" => "Note that the fonts may not render correctly in the following, depending on your OS / browser.",
			"type" => "radio",
			"options" => $font_faces,
			"std" => "'Trebuchet MS', Helvetica, sans-serif"),

	array("name" => "Font Color",
			"desc" => "Set the color of the fonts being used. ".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_font_color",
			"parent" => "body-font-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_font_color", $theme_name)),

	array("name" => "Link Color",
			"desc" => "Set the color of the links in the main content. Font colors in the sidebar are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_link_color",
			"parent" => "body-font-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_link_color", $theme_name)),

	array("name" => "Link Decoration",
			"desc" => "Set the effects for the link text. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_link_style",
			"parent" => "body-font-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Visited Link Color",
			"desc" => "Set the color of the visited links in the main content. Font colors in the sidebar are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_visited_link_color",
			"parent" => "body-font-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_visited_link_color", $theme_name)),

	array("name" => "Visited Link Decoration",
			"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_visited_link_style",
			"parent" => "body-font-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Link Hover Color",
			"desc" => "Set the color that the links should become when you hover over them in the main content. Font colors in the sidebar are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_link_hover_color",
			"parent" => "body-font-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_link_hover_color", $theme_name)),

	array("name" => "Link Hover Decoration",
			"desc" => "Set the effects for the link text on which you are hovering. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_link_hover_style",
			"parent" => "body-font-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "underline"),

	// Category - a, a:hover, a:visited
	// Author - "Posted By", a, a:hover, a:visited
	// Tag - a, a:hover, a:visited
	// Header
	// edit link, comment link

	array("name" => "Navigation Bar Setup",
			"type" => "sub-section-3",
			"category" => "nav-setup",
			"parent" => "visual-effects"
	),

	array("name" => "Set up the Navigation Bar",
			"desc" => "You can define what you want to show in your navigation bar. If you prefer having pages and categories listed in the sidebar, select \"Hidden\".",
			"id" => $shortname."_nav_contents",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("pages" => "Drop-down menus (Default)", "hide" => "Hidden"),
			"std" => "pages"),

	array("name" => "Show \"Home\" page?",
			"desc" => "You can show a link to your blog's home page. This could either be an icon or a text link. This setting is ignored if you are hiding your navigation bar.",
			"id" => $shortname."_show_home",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("none" => "Don't show a home link (default)", "text" => "Show a text link", "icon" => "Show an icon"),
			"std" => "none"),

	array("name" => "\"Home\" page text",
			"desc" => "If you have opted to show a text link above, you can set the text to show. The default is \"Home\". 
				This setting is ignored if you are hiding your navigation bar or if you have chosen to not show a home link or to show a home icon.",
			"id" => $shortname."_home_text",
			"parent" => "nav-setup",
			"type" => "text",
			"std" => "Home"),

	array("name" => "Page listing style in Navigation Bar",
			"desc" => "You can choose how to show pages in your navigation bar. By default the top-level pages you choose to show are laid out horizontally in the navigation bar.",
			"id" => $shortname."_nav_pages_style",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("flattened" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/nav-page-flat.jpg' alt='Flattened'/><p>Show the top level pages in the navigation bar and their sub-pages in drop-downs (default)</p></div>",
				"rolled-up" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/nav-page-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Pages\" (or whatever you want to call it) and build a drop-down under it</p></div>"),
			"std" => "flattened"),

	array("name" => "\"Pages\" tab title",
			"desc" => "In the above option if you have chosen to show a single tab for pages and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
			"id" => $shortname."_nav_page_tab_title",
			"parent" => "nav-setup",
			"type" => "text",
			"std" => "Pages"),

	array("name" => "\"Pages\" tab link",
			"desc" => "If you have a specific page that you want to go to upon clicking the Pages tab, set the full URL here. 
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
			"id" => $shortname."_nav_page_tab_link",
			"parent" => "nav-setup",
			"type" => "text",
			"hint" => "Enter the full URL, including http://",
			"std" => ""),

	array("name" => "Pages to show in Navigation Bar",
			"desc" => "If you have too many pages on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored. Also if you select a page whose parent is not selected, the child will NOT be displayed. All pages are excluded by default",
			"id" => $shortname."_nav_pages",
			"parent" => "nav-setup",
			"type" => "multi-select",
			"options" => suf_get_formatted_page_array($shortname."_nav_pages"),
			"std" => "all"),

	array("name" => "Excluded pages in breadcrumb",
			"desc" => "Pages excluded in the drop down menu are not shown in the breadcrumb. You might want to change this setting if you want all pages to be available for navigation:",
			"id" => $shortname."_nav_exclude_in_breadcrumb",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("hide" => "Hide excluded pages", "show" => "Show excluded pages"),
			"std" => "hide"),

	array("name" => "Breadcrumb Navigation for Pages",
			"desc" => "For every page that you visit you see all siblings of the page, its parent and all siblings of the parent below the navigation bar. 
				This is okay if you have a small number of pages at each level, but cumbersome if you have many siblings (it messes up the display). You can change this setting:",
			"id" => $shortname."_nav_breadcrumb",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("all" => "Show all siblings, and all siblings of parent (default)", 
				"breadcrumb" => "Don't show siblings, but show entire path to the page (traditional \"breadcrumb\" display)", 
				"none" => "Hide the breadcrumb view altogether"),
			"std" => "all"),

	array("name" => "Breadcrumb Separator",
			"desc" => "This is the symbol that appears as a separator between levels in your breadcrumb.
				If you have selected the \"breadcrumb\" display above then the setting you make here takes effect. Otherwise this is ignored:",
			"id" => $shortname."_breadcrumb_separator",
			"parent" => "nav-setup",
			"type" => "text",
			"hint" => "Use &amp;bull; for &bull;, &amp;gt; for &gt; and &amp;raquo; for &raquo;",
			"std" => "&raquo;"),

	array("name" => "Category listing style in Navigation Bar",
			"desc" => "You can choose how to show categories in your navigation bar. By default a single tab for categories is shown in the navigation bar.",
			"id" => $shortname."_nav_cat_style",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("flattened" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/nav-cat-flat.jpg' alt='Flattened'/><p>Show the top level categories in the navigation bar and their sub-pages in drop-downs</p></div>",
				"rolled-up" => "<div class='picture'><img src='". get_stylesheet_directory_uri(). "/admin/images/nav-cat-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Categories\" (or whatever you want to call it) and build a drop-down under it (default)</p></div>"),
			"std" => "rolled-up"),

	array("name" => "\"Categories\" tab title",
			"desc" => "In the above option if you have chosen to show a single tab for categories and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
			"id" => $shortname."_nav_cat_tab_title",
			"parent" => "nav-setup",
			"type" => "text",
			"std" => "Categories"),

	array("name" => "\"Categories\" tab link",
			"desc" => "If you have a specific page that you want to go to upon clicking the Categories tab, set the full URL here. 
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
			"id" => $shortname."_nav_cat_tab_link",
			"parent" => "nav-setup",
			"type" => "text",
			"hint" => "Enter the full URL, including http://",
			"std" => ""),

	array("name" => "Categories to show in Navigation Bar",
			"desc" => "If you have too many categories on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored. Also if you select a page whose parent is not selected, the child will NOT be displayed. 
				The exclusion is hierarchical, so if you exclude a parent category but include its child, neither the parent nor the child will show up in the dropdown. All categories are excluded by default. ",
			"id" => $shortname."_nav_cats",
			"parent" => "nav-setup",
			"type" => "multi-select",
			"options" => suf_get_formatted_category_array($shortname."_nav_cats")),

	array("name" => "Text Transformation for Navigation Bar",
			"desc" => "By default all your page names are displayed with the first letter of each word capitalized in the navigation bar (except in IE 6, where it is unstyled). You can change this setting:",
			"id" => $shortname."_nav_text_transform",
			"parent" => "nav-setup",
			"type" => "radio",
			"options" => array("uppercase" => "ALL UPPERCASE", "lowercase" => "all lowercase", 
				"capitalize" => "Capitalize First Letter Of Each Word (default)", "none" => "No transformation"),
			"std" => "capitalize"),

	array("name" => "Sidebars and Widget Areas",
			"type" => "sub-section-3",
			"category" => "sidebar-setup",
			"parent" => "visual-effects"
	),

	array("name" => "Sidebar Layout",
	"desc" => "Suffusion comes with five widget areas where you can add widgets. You may choose to not use some of these widget areas depending on your requirements.
				By default Sidebar 1 and Header Widgets are enabled.<br/?
				<center><img src='".get_bloginfo("stylesheet_directory")."/admin/images/widgets.jpg' alt='Widgets'/></center>",
			"parent" => "sidebar-setup",
			"type" => "blurb",
			),

	array("name" => "Use JQuery to fix widget layout issues?",
			"desc" => "For some third-party widgets the theme's layout breaks because of a mismatch of &lt;div&gt; tags. You can address this by using JQuery to put in a fix.
				Note that the JQuery library is large ( &gt; 50KB), so this will increase the size of your page. 
				On the other hand, if you are already using featured posts or tabbed sidebars, you are loading JQuery, so setting this option doesn't matter.",
			"id" => $shortname."_sidebar_jq_fix",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("use" => "Use JQuery to fix layout", "dont-use" => "Don't use JQuery (if you aren't facing widget layout issues you can keep this option selected)"),
			"std" => "dont-use"),

	array("name" => "Enable Widget Area on right side of navigation bar?",
			"desc" => "This widget area is shown next to the navigation bar and has the search field by default. You can disable this if you wish.",
			"id" => $shortname."_right_header_widgets_enabled",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "enabled"),

	array("name" => "Show Search in Widget Area on right side of header",
			"desc" => "By default the search field is shown in the navigation bar. If you prefer having the search in your sidebar instead, you can disable this.
				Note that even if you choose to hide the search field here, if you add a search widget through the widget administration to this widget area. 
				This option has been left in for backward compatibility.",
			"id" => $shortname."_show_search",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("show" => "Show search with navigation (default)", 
				"hide" => "Hide the search (You can add a widget for the Search, if you wish)"),
			"std" => "show"),

	array("name" => "How Many Sidebars?",
			"desc" => "The theme is setup with one sidebar (a two-column theme) by default. You could choose to have two sidebars (a three-column theme) or none if you want.",
			"id" => $shortname."_sidebar_count",
			"parent" => "sidebar-setup",
			"note" => "If you have selected 0 or 1 below, 2 sidebars will still show up in the \"Widgets\" page, but only the selected number will be visible on your blog",
			"type" => "radio",
			"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)"),
			"std" => "1"),

	array("name" => "Position of First Sidebar",
			"desc" => "Which side would you like your first sidebar? ".
				"If you have two sidebars enabled and both are positioned on the same side, this sidebar will be the outer one. ".
				"If you have only one sidebar enabled, this will control the position of that sidebar.",
			"id" => $shortname."_sidebar_alignment",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("left" => "Left", "right" => "Right"),
			"std" => "right"),

	array("name" => "Position of Second Sidebar",
			"desc" => "Which side would you like your second sidebar? ".
				"If you have two sidebars enabled and both are positioned on the same side, this sidebar will be the inner one. ".
				"If you have only one sidebar enabled, this setting will be ignored.",
			"id" => $shortname."_sidebar_2_alignment",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("left" => "Left", "right" => "Right"),
			"std" => "right"),

	array("name" => "Default widgets for first sidebar",
			"desc" => "If you have not added any widgets to the first sidebar in the widget administration section of your control panel, Suffusion shows a set of default widgets. You can disable this if you please: ",
			"id" => $shortname."_sidebar_1_def_widgets",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("show" => "Show default widgets if nothing is added in the widget control panel (default)", 
				"hide" => "Hide default widgets if nothing is added in the widget control panel"),
			"std" => "show"),

	array("name" => "Drag-and-Drop for First Sidebar",
			"desc" => "By default drag-and-drop is enabled for the widgets in the first sidebar. You can turn it off, if you please.",
			"id" => $shortname."_sidebar_1_dnd",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enable drag-and-drop (default)", "disabled" => "Disable drag-and-drop (this will also disable the collapsibility of of the widgets)"),
			"std" => "enabled"),

	array("name" => "Drag-and-Drop for Second Sidebar",
			"desc" => "By default drag-and-drop is enabled for the second sidebar. You can turn it off, if you please. Note that this setting is ignored if you enable only one sidebar",
			"id" => $shortname."_sidebar_2_dnd",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enable drag-and-drop (default)", "disabled" => "Disable drag-and-drop (this will also disable the collapsibility of of the widgets)"),
			"std" => "enabled"),

	array("name" => "Expand / Collapse for First Sidebar Widgets",
			"desc" => "By default expand/collapse is enabled for the widgets in the first sidebar. You can turn it off, if you please. ".
					"This setting is ignored if you have disabled drag-and-drop for the first sidebar.",
			"id" => $shortname."_sidebar_1_expcoll",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enable expand / collapse (default)", "disabled" => "Disable expand / collapse"),
			"std" => "enabled"),

	array("name" => "Expand / Collapse for Second Sidebar Widgets",
			"desc" => "By default drag-and-drop is enabled for the widgets in the second sidebar. You can turn it off, if you please. ".
					"Note that this setting is ignored if you enable only one sidebar, or if you have disabled drag-and-drop for the second sidebar.",
			"id" => $shortname."_sidebar_2_expcoll",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enable expand / collapse (default)", "disabled" => "Disable expand / collapse"),
			"std" => "enabled"),

	array("name" => "Enable Widget Area Below Header?",
			"desc" => "This widget area spans the width of the blog page and can be positioned just below the header. Do you want it enabled? 
				You can use this widget area for banner advertisements, if you wish. These widgets cannot be moved around in the manner that the sidebar widgets can.
				Note that even if you don't enable it you will see this in the widget administration menu.",
			"id" => $shortname."_widget_area_below_header_enabled",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Columns in Widget Area Below Header",
			"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one. If you are removing the sidebars then you might want to set a value like 3 or 4.",
			"id" => $shortname."_widget_area_below_header_columns",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
			"std" => "1"),

	array("name" => "Enable Widget Area Above Footer?",
			"desc" => "This widget area spans the width of the blog page and can be positioned just above the footer. Do you want it enabled? 
				Note that even if you don't enable it you will see this in the widget administration menu.",
			"id" => $shortname."_widget_area_above_footer_enabled",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Columns in Widget Area Above Footer",
			"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one. If you are removing the sidebars then you might want to set a value like 3 or 4.",
			"id" => $shortname."_widget_area_above_footer_columns",
			"parent" => "sidebar-setup",
			"type" => "radio",
			"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
			"std" => "1"),

	array("name" => "Widget Styles",
			"type" => "sub-section-3",
			"category" => "widget-styles",
			"parent" => "visual-effects"
	),

	array("name" => "Sidebar Widgets Titles",
			"desc" => "You can choose a plain style for the headers of the sidebar widgets, or something that goes with the color scheme. Note that text widgets without a title will not display a header.",
			"id" => $sidebar_header,
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("plain" => "Plain sidebar header with lower border (unstyled - white for the light themes and black for the dark themes) - Default", 
							"plain-borderless" => "Plain sidebar header without lower border (unstyled - white for the light themes and black for the dark themes)",
							"scheme" => "Theme-based sidebar header (green, gray, blue, red, orange or purple, depending on the selected theme)"),
			"std" => "plain"),

	array("name" => "Default or custom font styles for sidebar?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. ".
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $shortname."_sb_font_style_setting",
			"parent" => "widget-styles",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the sidebar fonts.",
			"type" => "radio",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Sidebar Font Color",
			"desc" => "Set the color of the fonts being used. ".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_font_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_sb_font_color", $theme_name)),

	array("name" => "Sidebar Link Color",
			"desc" => "Set the color of the links in the sidebar. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_sb_link_color", $theme_name)),

	array("name" => "Sidebar Link Decoration",
			"desc" => "Set the effects for the link text in the sidebar. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Sidebar Visited Link Color",
			"desc" => "Set the color of the visited links in the sidebar. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_visited_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_sb_visited_link_color", $theme_name)),

	array("name" => "Sidebar Visited Link Decoration",
			"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_visited_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Sidebar Link Hover Color",
			"desc" => "Set the color that the links should become when you hover over them in the sidebar. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_link_hover_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_sb_link_hover_color", $theme_name)),

	array("name" => "Sidebar Link Hover Decoration",
			"desc" => "Set the effects for the link text on which you are hovering. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_sb_link_hover_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "underline"),

	array("name" => "Title styling for widgets below header",
			"desc" => "You can choose a plain style for the titles of the widgets below the header, or something that goes with the color scheme. Note that text widgets without a title will not be affected by this.",
			"id" => $shortname."_header_for_widgets_below_header",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("plain" => "Plain title with lower border (unstyled - white for the light themes and black for the dark themes) - Default", 
							"plain-borderless" => "Plain title without lower border (unstyled - white for the light themes and black for the dark themes)",
							"scheme" => "Theme-based title (green, gray, blue, red, orange or purple, depending on the selected theme)"),
			"std" => "plain"),

	array("name" => "Default or custom font styles for widget area below header?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. ".
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $shortname."_wabh_font_style_setting",
			"parent" => "widget-styles",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the fonts in the widget area below the header.",
			"type" => "radio",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Font Color for Widget Area Below Header",
			"desc" => "Set the color of the fonts being used. ".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_font_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_wabh_font_color", $theme_name)),

	array("name" => "Link Color for Widget Area Below Header",
			"desc" => "Set the color of the links in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_wabh_link_color", $theme_name)),

	array("name" => "Link Decoration for Widget Area Below Header",
			"desc" => "Set the effects for the link text in the widgets. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Visited Link Color for Widget Area Below Header",
			"desc" => "Set the color of the visited links in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_visited_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_wabh_visited_link_color", $theme_name)),

	array("name" => "Visited Link Decoration for Widget Area Below Header",
			"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_visited_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Link Hover Color for Widget Area Below Header",
			"desc" => "Set the color that the links should become when you hover over them in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_link_hover_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_wabh_link_hover_color", $theme_name)),

	array("name" => "Link Hover Decoration for Widget Area Below Header",
			"desc" => "Set the effects for the link text on which you are hovering. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wabh_link_hover_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "underline"),

	array("name" => "Title styling for widgets above footer",
			"desc" => "You can choose a plain style for the titles of the widgets above the footer, or something that goes with the color scheme. Note that text widgets without a title will not be affected by this.",
			"id" => $shortname."_header_for_widgets_above_footer",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("plain" => "Plain title with lower border (unstyled - white for the light themes and black for the dark themes) - Default", 
							"plain-borderless" => "Plain title without lower border (unstyled - white for the light themes and black for the dark themes)",
							"scheme" => "Theme-based title (green, gray, blue, red, orange or purple, depending on the selected theme)"),
			"std" => "plain"),

	array("name" => "Default or custom font styles for widget area above footer?",
			"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. ".
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $shortname."_waaf_font_style_setting",
			"parent" => "widget-styles",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the widget area above the footer.",
			"type" => "radio",
			"options" => array("theme" => "Theme styles (default)",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Font Color for Widget Area Above Footer",
			"desc" => "Set the color of the fonts being used. ".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_font_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_waaf_font_color", $theme_name)),

	array("name" => "Link Color for Widget Area Above Footer",
			"desc" => "Set the color of the links in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_waaf_link_color", $theme_name)),

	array("name" => "Link Decoration for Widget Area Above Footer",
			"desc" => "Set the effects for the link text in the widgets. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Visited Link Color for Widget Area Above Footer",
			"desc" => "Set the color of the visited links in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_visited_link_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_waaf_visited_link_color", $theme_name)),

	array("name" => "Visited Link Decoration for Widget Area Above Footer",
			"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_visited_link_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "none"),

	array("name" => "Link Hover Color for Widget Area Above Footer",
			"desc" => "Set the color that the links should become when you hover over them in the widgets. Font colors in the main content are unaffected".
				"Make sure that your font color goes well enough with the theme. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_link_hover_color",
			"parent" => "widget-styles",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_waaf_link_hover_color", $theme_name)),

	array("name" => "Link Hover Decoration for Widget Area Above Footer",
			"desc" => "Set the effects for the link text on which you are hovering. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_waaf_link_hover_style",
			"parent" => "widget-styles",
			"type" => "radio",
			"options" => array("underline" => "Underlined", "none" => "None"),
			"std" => "underline"),

	array("name" => "Footer Customziation",
			"type" => "sub-section-3",
			"category" => "footer-customization",
			"parent" => "visual-effects"
	),

	array("name" => "Text in left part of footer",
			"desc" => "Enter the text to put in the left section of the footer. HTML is permitted. For the &copy; symbol use &amp;#169; .",
			"id" => $shortname."_footer_left",
			"parent" => "footer-customization",
			"type" => "textarea",
			"hint" => "Enter the text here.",
			"note" => "If you have any text here, it will be included with your pages (even if structurally incorrect!!).",
			"std" => "&#169; ".date('Y')." <a href='".get_bloginfo('url')."'>".get_bloginfo('name')."</a>"),

	array("name" => "Text in central part of footer",
			"desc" => "Enter the text to put in the central section of the footer. HTML is permitted. For the &copy; symbol use &amp;#169; .",
			"id" => $shortname."_footer_center",
			"parent" => "footer-customization",
			"type" => "textarea",
			"hint" => "Enter the text here.",
			"note" => "If you have any text here, it will be included with your pages (even if structurally incorrect!!).",
			"std" => ""),
 
	array("name" => "Sizes and Margins",
			"type" => "sub-section-3",
			"category" => "size-options",
			"parent" => "visual-effects"
	),

	array("name" => "Default sizes / margins for page elements?",
			"desc" => "You can decide to go with the sizes and margins (gaps) defined with the theme for different page elements or pick your own. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $shortname."_size_options",
			"parent" => "size-options",
			"type" => "radio",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the header.",
			"options" => array("theme" => "Theme sizes and margins",
							"custom" => "Custom sizes and margins (Default)"),
			"std" => "custom"),

	array("name" => "Overall Page Width",
			"desc" => "Suffusion comes with 3 preset page width options: 800px, 1000px and 1200px. You can also define a custom width if you please, or allow the width of the page to be determined by the width of its main components like the sidebars and the main content column. 
				Due to difficulties with fitting things on the page, the minimum size allowed is 600px. If you enter something less than 600, it is considered to be 600.",
			"id" => $shortname."_wrapper_width_preset",
			"parent" => "size-options",
			"type" => "radio",
			"options" => array("800" => "800px", "1000" => "1000px (Default)", "1200" => "1200px", 
							"custom" => "Custom width (defined below)", "custom-components" => "Custom width, but constructed from individual components (defined below)"),
			"std" => "1000"),

	array("name" => "Custom value for page width",
			"desc" => "If you have selected \"Custom width\" above, you can set the width here. Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 600 will be treated as 600. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"80%\" as the width. 
				Also note that if you are setting a width over here with the \"Custom width\" selection in place, the widths of the individual components like the main column, the sidebars etc. are auto-calculated",
			"id" => $shortname."_wrapper_width",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 1000",
			"std" => "1000"),

	array("name" => "Custom component width - Custom value for main column width",
			"desc" => "If you have selected \"Custom width, but constructed from individual components\" above, you can set the width here for the main column. 
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 380 will be treated as 380. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"80%\" as the width. ",
			"id" => $shortname."_main_col_width",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 725",
			"std" => "725"),

	array("name" => "Custom component width - Custom value for width of first sidebar",
			"desc" => "If you have selected \"Custom width, but constructed from individual components\" above, you can set the width here for the first sidebar. 
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 95 will be treated as 95. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"10%\" as the width. ",
			"id" => $shortname."_sb_1_width",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 260",
			"std" => "260"),

	array("name" => "Custom component width - Custom value for width of second sidebar",
			"desc" => "If you have selected \"Custom width, but constructed from individual components\" above, you can set the width here for the second sidebar. 
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 95 will be treated as 95. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"10%\" as the width. ",
			"id" => $shortname."_sb_2_width",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 260",
			"std" => "260"),

	array("name" => "Empty Space Between Top of Page and Header",
			"desc" => "There is a gap of 50px between the top of the page and the header. You can change it here. ".
				"If you have chosen default styles above then this setting will be ignored.",
			"id" => $shortname."_wrapper_margin",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "50"),

	array("name" => "Height of the Header image",
			"desc" => "The header is 55px high by default. You can change this setting if you have a header image needs to fit. 
				Note that both above and below the header is 15px of padding, making the effective height of the header 85px.",
			"id" => $shortname."_header_height",
			"parent" => "size-options",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "55"),

	array("name" => "Custom Emphasis Elements",
			"type" => "sub-section-3",
			"category" => "emphasis-setup",
			"parent" => "visual-effects"
	),

	array("name" => "Custom elements to enhance page appearance",
			"desc" => "Suffusion comes with predefined elements that you can use for emphasizing sections of your blog. There are four types defined
				<ul style='list-style-type: disc; margin-left: 20px;'>
					<li>Download - class='download'</li>
					<li>Announcement - class='announcement'</li>
					<li>Note - class='note'</li>
					<li>Warning - class='warning'</li>
				</ul>
				To use any of these elements you can enclose text on your blog within &lt;p&gt; and &lt;/p&gt; tags or &lt;div&gt; and &lt;/div&gt; tags with the class name:
			   	 
				<ul style='list-style-type: disc; margin-left: 20px;'>
					<li>&lt;p class='download'&gt; Some stuff to download &lt;/p&gt; or &lt;div class='download'&gt;Some other stuff to download&lt;/div&gt;</li>
					<li>&lt;p class='announcement'&gt; Some announcements &lt;/p&gt; or &lt;div class='announcement'&gt;Some more announcements&lt;/div&gt;</li>
					<li>&lt;p class='note'&gt; Notes &lt;/p&gt; or &lt;div class='announcement'&gt;More notes&lt;/div&gt;</li>
					<li>&lt;p class='warning'&gt; Warnings &lt;/p&gt; or &lt;div class='warning'&gt;Other warnings&lt;/div&gt;</li>
				</ul>",
			"parent" => "emphasis-setup",
			"type" => "blurb",
			),

	array("name" => "Default styles for emphasis elements?",
			"desc" => "You can decide to go with the emphasis styles defined with the theme or pick your own. ".
				"If you choose custom styles then the settings you make here will override the theme's settings.",
			"id" => $shortname."_emphasis_customization",
			"parent" => "emphasis-setup",
			"type" => "radio",
			"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the emphasis eelements.",
			"options" => array("theme" => "Theme styles",
							"custom" => "Custom styles"),
			"std" => "theme"),

	array("name" => "Download Block Font Color",
			"desc" => "Set the font color for text within a \"download\" block. ",
			"id" => $shortname."_download_font_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_download_font_color", $theme_name)),

	array("name" => "Download Block Background Color",
			"desc" => "Set the background color for a \"download\" block. ",
			"id" => $shortname."_download_background_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_download_background_color", $theme_name)),

	array("name" => "Download Block Border Color",
			"desc" => "Set the border color for a \"download\" block. ",
			"id" => $shortname."_download_border_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_download_border_color", $theme_name)),

	array("name" => "Announcement Block Font Color",
			"desc" => "Set the font color for text within a \"announcement\" block. ",
			"id" => $shortname."_announcement_font_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_announcement_font_color", $theme_name)),

	array("name" => "Announcement Block Background Color",
			"desc" => "Set the background color for a \"announcement\" block. ",
			"id" => $shortname."_announcement_background_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_announcement_background_color", $theme_name)),

	array("name" => "Announcement Block Border Color",
			"desc" => "Set the border color for a \"announcement\" block. ",
			"id" => $shortname."_announcement_border_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_announcement_border_color", $theme_name)),

	array("name" => "Note Block Font Color",
			"desc" => "Set the font color for text within a \"note\" block. ",
			"id" => $shortname."_note_font_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_note_font_color", $theme_name)),

	array("name" => "Note Block Background Color",
			"desc" => "Set the background color for a \"note\" block. ",
			"id" => $shortname."_note_background_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_note_background_color", $theme_name)),

	array("name" => "Note Block Border Color",
			"desc" => "Set the border color for a \"note\" block. ",
			"id" => $shortname."_note_border_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_note_border_color", $theme_name)),

	array("name" => "Warning Block Font Color",
			"desc" => "Set the font color for text within a \"warning\" block. ",
			"id" => $shortname."_warning_font_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_warning_font_color", $theme_name)),

	array("name" => "Warning Block Background Color",
			"desc" => "Set the background color for a \"warning\" block. ",
			"id" => $shortname."_warning_background_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_warning_background_color", $theme_name)),

	array("name" => "Warning Block Border Color",
			"desc" => "Set the border color for a \"warning\" block. ",
			"id" => $shortname."_warning_border_color",
			"parent" => "emphasis-setup",
			"type" => "color-picker",
			"std" => suf_evaluate_style($shortname."_warning_border_color", $theme_name)),

	array("name" => "Blog Features",
			"type" => "sub-section-2",
			"category" => "blog-features",
			"parent" => "root"
	),

	array("name" => "Posts and Pages",
			"type" => "sub-section-3",
			"category" => "post-settings",
			"parent" => "blog-features"
	),

	array("name" => "Show Categories for posts?",
			"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
			"id" => $shortname."_post_show_cats",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Categories", "hide" => "Hide Categories"),
			"std" => "show"),

	array("name" => "Show Comments link for Posts?",
			"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
			"id" => $shortname."_post_show_comment",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Comments link", "hide" => "Hide Comments link"),
			"std" => "show"),

	array("name" => "Show Comments link for Pages?",
			"desc" => "A link for comments shows up under the title for all pages on the right side. Do you want to hide it?",
			"id" => $shortname."_page_show_comment",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Comments link", "hide" => "Hide Comments link"),
			"std" => "show"),

	array("name" => "Show \"Posted By\" for Posts?",
			"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
			"id" => $shortname."_post_show_posted_by",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Posted By", "hide" => "Hide Posted By"),
			"std" => "show"),

	array("name" => "Show \"Posted By\" for Pages?",
			"desc" => "Information about the poster shows up near the footer for all pages on the left side. Do you want to hide it?",
			"id" => $shortname."_page_show_posted_by",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Posted By", "hide" => "Hide Posted By"),
			"std" => "show"),

	array("name" => "Show Tags for posts?",
			"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
			"id" => $shortname."_post_show_tags",
			"parent" => "post-settings",
			"type" => "radio",
			"options" => array("show" => "Show Tags", "hide" => "Hide Tags"),
			"std" => "show"),

	array("name" => "Excerpts / Full Contents",
			"type" => "sub-section-3",
			"category" => "excerpt-settings",
			"parent" => "blog-features"
	),

	array("name" => "Excerpt Settings for the Front Page",
			"desc" => "By default for all posts on the front page, the complete contents are displayed. You can choose to show only the excerpts if you wish. ",
			"id" => $shortname."_index_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Excerpt Settings for Categories",
			"desc" => "If you select a category, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
			"id" => $shortname."_category_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Excerpt Settings for Date-based Archives",
			"desc" => "If you select a month or a year, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
			"id" => $shortname."_archive_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Excerpt Settings for Tags",
			"desc" => "If you select a tag, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
			"id" => $shortname."_tag_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Excerpt Settings for Search Results",
			"desc" => "When you perform a search the complete contents of the matching posts are displayed. You can change this to show only the excerpts. ",
			"id" => $shortname."_search_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Excerpt Settings for the Author Page",
			"desc" => "When you pull up the posts for an author the complete contents of the posts are displayed. You can change this to show only the excerpts. ",
			"id" => $shortname."_author_excerpt",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("content" => "Display full content", "excerpt" => "Display excerpt"),
			"std" => "content"),

	array("name" => "Show thumbnails for excerpts",
			"desc" => "If you are retrieving an excerpt, you can display a thumbnail for it. 
				By default the thumbnail is picked up from the URL provided in the \"Thumbnail\" setting of a post or a page:",
			"id" => $shortname."_show_excerpt_thumbnail",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("show" => "Display Thumbnail, if available", "hide" => "Hide Thumbnail"),
			"std" => "show"),

	array("name" => "Thumbnail alignment in excerpts",
			"desc" => "You can set the thumbnail (if present) to appear either on the left or on the right of the excerpt:",
			"id" => $shortname."_excerpt_thumbnail_alignment",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("left" => "Show thumbnail on the left of the excerpt", "right" => "Show thumbnail on the right of the excerpt"),
			"std" => "left"),

	array("name" => "Thumbnail size in excerpts",
			"desc" => "You can set the size of the thumbnail (if present). This is the size of the thumbnail in the excerpt:",
			"id" => $shortname."_excerpt_thumbnail_size",
			"parent" => "excerpt-settings",
			"type" => "radio",
			"options" => array("thumbnail" => "Thumbnail size, as defined in Settings -&gt; Media", 
				"medium" => "Medium size, as defined in Settings -&gt; Media",
				"large" => "Large size, as defined in Settings -&gt; Media",
				"full" => "Full size of the image",
				"custom" => "Custom size defined below"),
			"std" => "thumbnail"),

	array("name" => "Custom width of thumbnail",
			"desc" => "If you have chosen to define a custom size above, please enter the width in pixels:",
			"id" => $shortname."_excerpt_thumbnail_custom_width",
			"parent" => "excerpt-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Custom height of thumbnail",
			"desc" => "If you have chosen to define a custom size above, please enter the height in pixels:",
			"id" => $shortname."_excerpt_thumbnail_custom_height",
			"parent" => "excerpt-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Comment Settings",
			"type" => "sub-section-3",
			"category" => "comment-settings",
			"parent" => "blog-features"
	),

	array("name" => "Hide \"Comment form closed\" Message on Pages",
			"desc" => "If you disable comments on a page, by default a  \"Comment form closed\" message shows up. ".
				"You can choose to hide this message for selected pages, if you thing it makes your page look too \"blog-like\". ".
				"If you select a page from the list below it will not show the \"Comment form closed\" message. ".
				"Note that if comments are <b>enabled</b> for a page, selecting it here will not make a difference. ",
			"id" => $shortname."_comments_disabled",
			"parent" => "comment-settings",
			"type" => "multi-select",
			"options" => suf_get_formatted_page_array($shortname."_comments_disabled"),
			"std" => "none"),

	array("name" => "Show Trackbacks and Pingbacks?",
			"desc" => "By default Trackbacks and Pingbacks to your blog posts show up along with other comments. ",
			"id" => $shortname."_show_track_ping",
			"parent" => "comment-settings",
			"type" => "radio",
			"options" => array("show" => "Show all Trackbacks and Pingbacks with comments", "hide" => "Don't show Trackbacks and Pingbacks", 
				"separate" => "Show Trackbacks and Pingbacks, but separate them from the comments"),
			"std" => "show"),

	array("name" => "Allow Replies for Trackbacks and Pingbacks?",
			"desc" => "For comments that are trackbacks or pingbacks you might want to hide the \"Reply\" link: ",
			"id" => $shortname."_show_hide_reply_link_for_pings",
			"parent" => "comment-settings",
			"type" => "radio",
			"options" => array("allow" => "Allow replies to Trackbacks and Pingbacks", "disallow" => "Don't allow replies to Trackbacks and Pingbacks"),
			"std" => "disallow"),

	array("name" => "Comment form labels styles",
			"desc" => "You can choose to have theme-based styles for labels in your comment form, or leave them unstyled. The theme-based style is more colorful (which you may or may not prefer): ",
			"id" => $shortname."_comment_label_styles",
			"parent" => "comment-settings",
			"type" => "radio",
			"options" => array("plain" => "Plain (unstyled, default)", "theme" => "Theme-based style"),
			"std" => "plain"),

    array("name" => "Featured Content",
        "type" => "sub-section-3",
        "category" => "featured-settings",
        "parent" => "blog-features"
    ),

	array("name" => "Showing Featured Posts",
			"desc" => "Featured posts help bring certain posts to the top of your blog. Suffusion supports Featured Posts in 2 different ways: 
				<ul style='list-style-type: disc; margin-left: 20px;'>
					<li>Sticky Posts</li>
					<li>Selected Categories</li>
				</ul>
				Suffusion uses the excellent <a href='http://www.malsup.com/jquery/cycle/'>JQuery Cycle</a> to create a Featured section above your posts.
				Additionally you can define a \"Featured Image\" (preferably as wide as your blog posts). If you don't associate a featured image, the thumbnail will be picked. 
				And if you don't provide a thumbnail, the first attached image will be used. Note, though, that not having a featured image will generate thumbnail size images, displaying a lot of blank space. 
				Good practices:
				<ul style='list-style-type: disc; margin-left: 20px;'>
					<li>Use featured images for every post that you want to show in your featured section.</li>
					<li>Define featured images that are at least as wide as your posts.</li>
					<li>Don't use too many featured posts. Remember that this section should have useful information, not all information. Having too many posts will make your script sluggish.</li>
				</ul>
				",
			"parent" => "featured-settings",
			"type" => "blurb"),

	array("name" => "Enable Featured Posts on main (default) page",
			"desc" => "You can enable the Featured Posts slider on your main page. This is also the default page: ",
			"id" => $shortname."_featured_index_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Enable Featured Posts on the Category view",
			"desc" => "You can enable the Featured Posts slider for your category view. This way you will see the featured section whenever you are looking at posts in a particular category: ",
			"id" => $shortname."_featured_category_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Enable Featured Posts on the Tag view",
			"desc" => "You can enable the Featured Posts slider for your tag view. This way you will see the featured section whenever you are looking at posts with a particular tag: ",
			"id" => $shortname."_featured_tag_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Enable Featured Posts on the Author view",
			"desc" => "You can enable the Featured Posts slider for your author view. This way you will see the featured section whenever you are looking at an author page: ",
			"id" => $shortname."_featured_author_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Enable Featured Posts on the Search view",
			"desc" => "You can enable the Featured Posts slider for your search view. This way you will see the featured section whenever you are looking at search results: ",
			"id" => $shortname."_featured_search_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Enable Featured Posts on the Time archive view",
			"desc" => "You can enable the Featured Posts slider for your tiem archive (time / date / day / month / year) view. This way you will see the featured section whenever you are looking at time-based archives: ",
			"id" => $shortname."_featured_time_view",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "disabled"),

	array("name" => "Featured Posts - Number of Posts",
			"desc" => "You can decide how many posts you want to show on your blog. By default this is limited to the number of posts you allow per page: ",
			"id" => $shortname."_featured_num_posts",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the number here. Please enter positive numeric values only",
			"std" => get_option('posts_per_page')),

	array("name" => "Featured Posts - Show Sticky Posts",
			"desc" => "You can include sticky posts in the featured posts slider. 
				To make a post \"sticky\" go to the \"Edit Posts\" menu, then click on the \"Visibility\" option in the publish section and 
				select \"Stick this post to the front page\": ",
			"id" => $shortname."_featured_allow_sticky",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("show" => "Show sticky posts", "hide" => "Hide sticky posts"),
			"std" => "show"),

	array("name" => "Featured Posts - Select Categories",
			"desc" => "In addition to sticky posts you can include posts from selected categories in the featured posts slider. 
				By default no category is selected: ",
			"id" => $shortname."_featured_selected_categories",
			"parent" => "featured-settings",
			"type" => "multi-select",
			"options" => suf_get_formatted_category_array($shortname."_featured_selected_categories")),

	array("name" => "Featured Posts - Select Pages",
			"desc" => "You can also include static pages in the featured posts slider. Note that the inclusion is NOT hierarchical here. By default no page is selected: ",
			"id" => $shortname."_featured_selected_pages",
			"parent" => "featured-settings",
			"type" => "multi-select",
			"options" => suf_get_formatted_page_array($shortname."_featured_selected_pages")),

	array("name" => "Featured Posts - Transition Effects",
			"desc" => "You can pick the effect you want to use for your featured posts' transitions. These are effects provided by the JQuery Cycle script. 
				Note that not all effects will look good on your blog. You should pick the one that best suits your needs: ",
			"id" => $shortname."_featured_fx",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("fade" => "Fade In", "scrollUp" => "Scroll Up", "scrollDown" => "Scroll Down", "scrollLeft" => "Scroll Left", "scrollRight" => "Scroll Right", 
				"scrollHorz" => "Scroll Horizontally", "scrollVert" => "Scroll Vertically", 
				"slideX" => "Slide in and back horizontally", "slideY" => "Slide in and back vertically",
				"turnUp" => "Turn Upwards", "turnDown" => "Turn Downwards", "turnLeft" => "Turn Leftwards", "turnRight" => "Turn Rightwards",
				"zoom" => "Zoom", "fadeZoom" => "Zoom and Fade", "blindX" => "Vertical Blinds", "blindY" => "Horizontal Blinds", "blindZ" => "Diagonal Blinds",
				"growX" => "Grow horizontally from center", "growY" => "Grow vertically from center",
				"curtainX" => "Squeeze in both edges horizontally", "curtainY" => "Squeeze in both edges vertically", 
				"cover" => "Current post is covered by next post", "uncover" => "Current post moves off next post", "wipe" => "Wipe",
			),
			"std" => "fade"),

	array("name" => "Featured Posts - Time for each post display",
			"desc" => "The posts in the Featured Posts are each displayed for 4000 milliseconds (4 seconds). You can change this interval: ",
			"id" => $shortname."_featured_interval",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the time in milliseconds (don't enter \"ms\"!)",
			"std" => "4000"),

	array("name" => "Featured Posts - Transition speed for post",
			"desc" => "Depending on the transition effect you have chosen you may want to speed up or slow down your transition. Set the duration of the transition effect here: ",
			"id" => $shortname."_featured_transition_speed",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the time in milliseconds (don't enter \"ms\"!)",
			"std" => "1000"),

	array("name" => "Height of the Featured Posts section",
			"desc" => "The Featured Posts section is 250px high by default. You can change this setting depending on the size of your featuerd images.",
			"id" => $shortname."_featured_height",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "250"),

	array("name" => "Featured Posts - Show Border",
			"desc" => "You can opt to show a border for your featured posts section: ",
			"id" => $shortname."_featured_show_border",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("show" => "Show border", "hide" => "Hide border"),
			"std" => "show"),

	array("name" => "Image size in featured content",
			"desc" => "You can set the size of the featured image (if present):",
			"id" => $shortname."_featured_image_size",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("full" => "Full size of the image",
				"custom" => "Custom size defined below"),
			"std" => "full"),

	array("name" => "Custom width of featured image",
			"desc" => "If you have chosen to define a custom size above, please enter the width in pixels:",
			"id" => $shortname."_featured_image_custom_width",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Custom height of featured image",
			"desc" => "If you have chosen to define a custom size above, please enter the height in pixels:",
			"id" => $shortname."_featured_image_custom_height",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),
 
	array("name" => "Featured Posts - Display Text",
			"desc" => "You can decide what you want to include in your text display for the featured content. This text is laid over the featured image: ",
			"id" => $shortname."_featured_excerpt_type",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("title-excerpt" => "Show post title and excerpt (default)", "title" => "Show post title only (no excerpt)", 
				"excerpt" => "Show excerpt only (no title)", "none" => "Don't show any text (useful if your images have text included)"),
			"std" => "title-excerpt"),

	array("name" => "Featured Posts - Position of Text",
			"desc" => "You can decide where you want your excerpt to appear on the featured posts section: ",
			"id" => $shortname."_featured_excerpt_position",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("top" => "Top", "bottom" => "Bottom", "right" => "Right", "left" => "Left", 
				"alttb" => "Alternate excerpt between top and bottom", "altlr" => "Alternate excerpt between left and right",
				"rotate" => "Rotate between the four positions"),
			"std" => "rotate"),

	array("name" => "Width of Text",
			"desc" => "You can define the width to use for excerpts. Note that this is relevant only if your excerpt is at the right or at the left of your featured posts.",
			"id" => $shortname."_featured_excerpt_width",
			"parent" => "featured-settings",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "250"),

	array("name" => "Featured Posts - Text background color",
			"desc" => "Depending on the color of your featured images, you might want to choose a different background color for your excerpt in your featured posts. ",
			"id" => $shortname."_featured_excerpt_bg_color",
			"parent" => "featured-settings",
			"type" => "color-picker",
			"std" => "222222"),

	array("name" => "Featured Posts - Text font color",
			"desc" => "Depending on the color of your featured images, you might want to choose a different font color for your excerpt in your featured posts. ",
			"id" => $shortname."_featured_excerpt_font_color",
			"parent" => "featured-settings",
			"type" => "color-picker",
			"std" => "FFFFFF"),

	array("name" => "Featured Posts - Link font color",
			"desc" => "Depending on the color of your featured images, you might want to choose a different link font color in your excerpt in your featured posts. ",
			"id" => $shortname."_featured_excerpt_link_color",
			"parent" => "featured-settings",
			"type" => "color-picker",
			"std" => "FFFFFF"),

	array("name" => "Featured Posts - Post Index",
			"desc" => "You can show a numbered listing of posts for your Featured Posts: ",
			"id" => $shortname."_featured_pager",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("show" => "Show Post Index", "hide" => "Hide Post Index"),
			"std" => "show"),

	array("name" => "Featured Posts - Pause, Previous and Next Controls",
			"desc" => "In addition to the numbered listing of posts you can display a controller for showing links to \"Previous Post\", \"Pause\" and \"Next Post\": ",
			"id" => $shortname."_featured_controller",
			"parent" => "featured-settings",
			"type" => "radio",
			"options" => array("show" => "Show Pause, Previous and Next Controls", "hide" => "Hide Pause, Previous and Next Controls"),
			"std" => "hide"),

    array("name" => "Tabbed Sidebar",
        "type" => "sub-section-3",
        "category" => "sbtab-settings",
        "parent" => "blog-features"
    ),

	array("name" => "Enable Tabbed Sidebar?",
			"desc" => "Tabbed Sidebars, a.k.a. Tabbed Widgets are used to represent multiple widgets in a single tabbed window. Suffusion lets you set up your tabbed sidebar.
				Do you want to enable it? ",
			"id" => $shortname."_sbtab_enabled",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"note" => "If you have chosen to have 0 sidebars in your \"Sidebars and Widget Areas\" setup, this setting is irrelevant.",
			"options" => array("enabled" => "Enable Tabbed Sidebar", "disabled" => "Do not enable the Tabbed Sidebar"),
			"std" => "disabled"),

	array("name" => "Alignment of Tabbed Sidebar",
			"desc" => "Which side do you want your tabbed sidebar? Note that you need to have at least one sidebar enabled on the side that you are selecting here, or the other side might be used. ",
			"id" => $shortname."_sbtab_alignment",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("right" => "Right", "left" => "Left"),
			"std" => "right"),

	array("name" => "Contents of Tabbed Sidebar",
			"desc" => "You can pick what you want to show in the tabbed sidebar: ",
			"id" => $shortname."_sbtab_widgets",
			"parent" => "sbtab-settings",
			"type" => "multi-select",
			"options" => suffusion_get_formatted_sbtab_array('suf_sbtab_widgets', true)),
/*
	array("name" => "Order of tabs in Tabbed Sidebar",
			"desc" => "You can define the order of the tabs in the tabbed sidebar: ",
			"id" => $shortname."_sbtab_widget_order",
			"parent" => "sbtab-settings",
			"type" => "sortable-list",
			"std" => array_keys($sidebar_tabs)),
 */
	array("name" => "Tabbed Sidebar - Categories Title",
			"desc" => "If you have opted to display the Categories tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_categories_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['categories']['title']),

	array("name" => "Tabbed Sidebar - List categories hierarchically?",
			"desc" => "You can decide if you want to list your categories in a hierarchical manner: ",
			"id" => $shortname."_sbtab_categories_hierarchical",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("hierarchical" => "Categories listed hierarchically",
							"flat" => "Categories listed flat"),
			"std" => "hierarchical"),

	array("name" => "Tabbed Sidebar - Show post count for each category?",
			"desc" => "You can display the number of posts in each category. Categories with 0 posts are excluded: ",
			"id" => $shortname."_sbtab_categories_post_count",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("show" => "Show Post Count",
							"hide" => "Hide Post Count"),
			"std" => "hide"),

	array("name" => "Tabbed Sidebar - Archives Title",
			"desc" => "If you have opted to display the Archives tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_archives_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['archives']['title']),

	array("name" => "Tabbed Sidebar - Archive grouping",
			"desc" => "What kind of grouping do you want to display for your archives? ",
			"id" => $shortname."_sbtab_archives_type",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("yearly" => "Yearly", "monthly" => "Monthly", "weekly" => "Weekly","daily" => "Daily", "postbypost" => "Posts ordered by post date",
							"alpha" => "Posts ordered by post title"),
			"std" => "monthly"),

	array("name" => "Tabbed Sidebar - Archive list type",
			"desc" => "What kind of listing do you want for your archives? ",
			"id" => $shortname."_sbtab_archives_list_type",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("html" => "A bullet list", "option" => "A dropdown list"),
			"std" => "html"),

	array("name" => "Tabbed Sidebar - Show post count for each archive?",
			"desc" => "You can display the number of posts in each archive. Archives with 0 posts are excluded: ",
			"id" => $shortname."_sbtab_archives_post_count",
			"parent" => "sbtab-settings",
			"type" => "radio",
			"options" => array("show" => "Show Post Count",
							"hide" => "Hide Post Count"),
			"std" => "hide"),

	array("name" => "Tabbed Sidebar - Links Title",
			"desc" => "If you have opted to display the Links tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_Links_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['links']['title']),

	array("name" => "Tabbed Sidebar - Meta Title",
			"desc" => "If you have opted to display the Meta tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_meta_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['meta']['title']),

	array("name" => "Tabbed Sidebar - Pages Title",
			"desc" => "If you have opted to display the Pages tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_pages_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['pages']['title']),

	array("name" => "Tabbed Sidebar - Recent Comments Title",
			"desc" => "If you have opted to display the Recent Comments tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_recent_comments_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['recent_comments']['title']),

	array("name" => "Tabbed Sidebar - Recent Posts Title",
			"desc" => "If you have opted to display the Recent Posts tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_recent_posts_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['recent_posts']['title']),

	array("name" => "Tabbed Sidebar - Search Title",
			"desc" => "If you have opted to display the Search tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_search_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['search']['title']),

	array("name" => "Tabbed Sidebar - Tag Cloud Title",
			"desc" => "If you have opted to display the Tag Cloud tab in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_tag_cloud_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['tag_cloud']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 1 Title",
			"desc" => "If you have opted to display the Custom Tab 1 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_1_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_1']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 1 Contents",
			"desc" => "If you have opted to display the Custom Tab 1 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_1_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 2 Title",
			"desc" => "If you have opted to display the Custom Tab 2 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_2_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_2']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 2 Contents",
			"desc" => "If you have opted to display the Custom Tab 2 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_2_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 3 Title",
			"desc" => "If you have opted to display the Custom Tab 3 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_3_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_3']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 3 Contents",
			"desc" => "If you have opted to display the Custom Tab 3 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_3_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 4 Title",
			"desc" => "If you have opted to display the Custom Tab 4 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_4_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_4']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 4 Contents",
			"desc" => "If you have opted to display the Custom Tab 4 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_4_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 5 Title",
			"desc" => "If you have opted to display the Custom Tab 5 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_5_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_5']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 5 Contents",
			"desc" => "If you have opted to display the Custom Tab 5 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_5_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 6 Title",
			"desc" => "If you have opted to display the Custom Tab 6 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_6_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_6']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 6 Contents",
			"desc" => "If you have opted to display the Custom Tab 6 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_6_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 7 Title",
			"desc" => "If you have opted to display the Custom Tab 7 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_7_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_7']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 7 Contents",
			"desc" => "If you have opted to display the Custom Tab 7 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_7_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 8 Title",
			"desc" => "If you have opted to display the Custom Tab 8 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_8_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_8']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 8 Contents",
			"desc" => "If you have opted to display the Custom Tab 8 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_8_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 9 Title",
			"desc" => "If you have opted to display the Custom Tab 9 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_9_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_9']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 9 Contents",
			"desc" => "If you have opted to display the Custom Tab 9 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_9_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

	array("name" => "Tabbed Sidebar - Custom Tab 10 Title",
			"desc" => "If you have opted to display the Custom Tab 10 in the tabbed sidebar, you can set its title here: ",
			"id" => $shortname."_sbtab_custom_tab_10_title",
			"parent" => "sbtab-settings",
			"type" => "text",
			"std" => $sidebar_tabs['custom_tab_10']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 10 Contents",
			"desc" => "If you have opted to display the Custom Tab 10 in the tabbed sidebar, you can set its contents here: ",
			"id" => $shortname."_sbtab_custom_tab_10_contents",
			"parent" => "sbtab-settings",
			"type" => "textarea",
			"std" => ""),

    array("name" => "Page Navigation",
        "type" => "sub-section-3",
        "category" => "pagination-settings",
        "parent" => "blog-features"
    ),

	array("name" => "Options for paged navigation of posts",
			"desc" => "Suffusion lets you select your own type of page navigation. And if you don't like Suffusion's page navigation styles, you can always use WP-PageNavi. 
				If you use WP-PageNavi then the selection here is ignored. ",
			"id" => $shortname."_pagination_type",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("old-new" => "Simple navigation, showing links to a page with older posts and a page with newer posts", 
				"numbered" => "A numbered listing of pages"),
			"std" => "old-new"),

	array("name" => "Numbered Listing - Page x of y",
			"desc" => "If you have chosen to display a numbered listing of pages, you can choose to show prefix the page list that will highlight which page you are on. 
				It will put in a text saying \"Page x of y\". If you use WP-PageNavi then the selection here is ignored.",
			"id" => $shortname."_pagination_index",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("show" => "Show \"Page x of y\"", 
				"hide" => "Don't show \"Page x of y\""),
			"std" => "show"),

	array("name" => "Numbered Listing - Previous and Next links",
			"desc" => "If you have chosen to display a numbered listing of pages, you can choose to additionally show links for \"Older Entries\" and \"Newer Entries\". 
				If you use WP-PageNavi then the selection here is ignored.",
			"id" => $shortname."_pagination_prev_next",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("show" => "Show links for \"Older Entries\" and \"Newer Entries\"", 
				"hide" => "Don't show links for \"Older Entries\" and \"Newer Entries\""),
			"std" => "show"),

	array("name" => "Numbered Listing - Show all pages in listing",
			"desc" => "If you have chosen to display a numbered listing of pages, you can choose to display all the pages in the list or replace it with dots as appropriate. 
				In case of a large number of pages you might prefer to use dots. If you use WP-PageNavi then the selection here is ignored.",
			"id" => $shortname."_pagination_show_all",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("all" => "Show all pages in the list", 
				"dots" => "Replace pages in the middle with dots"),
			"std" => "dots"),

	array("name" => "Options for paged navigation of comments",
			"desc" => "Here you can decide if you want paged navigation for your comments: ",
			"id" => $shortname."_cpagination_type",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("old-new" => "Simple navigation, showing links to a page with older comments and a page with newer comments", 
				"numbered" => "A numbered listing of pages for the comments"),
			"std" => "old-new"),

	array("name" => "Numbered Listing of Comments - Page x of y",
			"desc" => "If you have chosen to display a numbered listing of pages for comments, you can choose to show prefix the page list that will highlight which page you are on. 
				It will put in a text saying \"Page x of y\".",
			"id" => $shortname."_cpagination_index",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("show" => "Show \"Page x of y\"", 
				"hide" => "Don't show \"Page x of y\""),
			"std" => "show"),

	array("name" => "Numbered Listing of Comments - Previous and Next links",
			"desc" => "If you have chosen to display a numbered listing of pages for comments, you can choose to additionally show links for \"Older Comments\" and \"Newer Comments\"",
			"id" => $shortname."_cpagination_prev_next",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("show" => "Show links for \"Older Comments\" and \"Newer Comments\"", 
				"hide" => "Don't show links for \"Older Comments\" and \"Newer Comments\""),
			"std" => "show"),

	array("name" => "Numbered Listing of Comments - Show all comment pages in listing",
			"desc" => "If you have chosen to display a numbered listing of comment pages, you can choose to display all the pages in the list or replace it with dots as appropriate. 
				In case of a large number of pages you might prefer to use dots.",
			"id" => $shortname."_cpagination_show_all",
			"parent" => "pagination-settings",
			"type" => "radio",
			"options" => array("all" => "Show all pages in the list", 
				"dots" => "Replace pages in the middle with dots"),
			"std" => "dots"),

    array("name" => "Analytics",
			"type" => "sub-section-3",
			"category" => "analytics",
			"parent" => "blog-features"
	),

	array("name" => "Enable Analytics?",
			"desc" => "If you have a Google Analytics acccount you can add your tracking code through this section. ".
				"Note that if you are using a separate plugin for analytics you can ignore this section (i.e., don't enable Analytics).",
			"id" => $shortname."_analytics_enabled",
			"parent" => "analytics",
			"type" => "radio",
			"note" => "Please set this option to \"Analytics enabled\" if you want to override the theme's settings for Analytics.",
			"options" => array("not-enabled" => "Analytics not enabled(default)",
							"enabled" => "Analytics enabled"),
			"std" => "not-enabled"),

	array("name" => "Custom Google Analytics Tracking Code",
			"desc" => "Enter your tracking code here for Google Analytics (with the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags). Note that you can skip this if you are using a plugin for analytics",
			"id" => $shortname."_custom_analytics_code",
			"parent" => "analytics",
			"type" => "textarea",
			"hint" => "Enter the tracking code here",
			"note" => "If you have any text here, it will be included with your pages (even if incorrect!!). Note that if your analytics are not enabled then this will be ignored.",
			"std" => ""),

	array("name" => "OpenID Setup",
			"type" => "sub-section-3",
			"category" => "openid-setup",
			"parent" => "blog-features"
	),

	array("name" => "Enable OpenID support?",
			"desc" => "If you have set up your blog as an <a href=\"http://openid.net/\">OpenID</a> server, you will need to populate the OpenID server and delegate here.".
				"This theme currently does not help set your blog up as an OpenID provider. It only supports your blog if you have OpenID enabled. If you want to set your blog as a server see <a href=\"http://intertwingly.net/blog/2007/01/03/OpenID-for-non-SuperUsers\">here</a>.",
			"id" => $shortname."_openid_enabled",
			"parent" => "openid-setup",
			"type" => "radio",
			"note" => "Please set this option to \"OpenID enabled\" if you want to override the theme's settings for OpenID.",
			"options" => array("not-enabled" => "OpenID not enabled(default)",
							"enabled" => "OpenID enabled"),
			"std" => "not-enabled"),

	array("name" => "OpenID Server",
			"desc" => "Set the location of your OpenID server. ".
				"If you have chosen \"OpenID not enabled\" above then this setting will be ignored.",
			"id" => $shortname."_openid_server",
			"parent" => "openid-setup",
			"type" => "text",
			"hint" => "Enter the full URL here (including http://)",
			"std" => ""),

	array("name" => "OpenID Delegate",
			"desc" => "Set the location of your OpenID delegate. ".
				"If you have chosen \"OpenID not enabled\" above then this setting will be ignored.",
			"id" => $shortname."_openid_delegate",
			"parent" => "openid-setup",
			"type" => "text",
			"hint" => "Enter the full URL here (including http://)",
			"std" => ""),

	array("name" => "Custom CSS, JavaScript &amp; RSS",
			"type" => "sub-section-3",
			"category" => "custom-additions",
			"parent" => "blog-features"
	),

	array("name" => "Don't like the default styles? Add your own...",
			"desc" => "If you are really picky about how your blog should look and the bundled styles don't make you happy, feel free to add your own styles here.
				You can either add externally defined stylesheets or define the CSS here. 
				These are called up at the end of all other stylesheet invocations (unless of course you have a plugin that adds something after this!), so what you define here will pretty much override everything else.",
			"parent" => "custom-additions",
			"type" => "blurb",
			),

	array("name" => "First Additional Stylesheet link",
			"desc" => "If you want to define any additional stylesheets, include the entire link here for the first sheet. An example would be a plugin with a separate stylesheet.",
			"id" => $shortname."_custom_css_link_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the stylesheet here, including http://",
			"std" => ""),

	array("name" => "Second Additional Stylesheet link",
			"desc" => "If you want to define any additional stylesheets, include the entire link here for the second sheet. An example would be a plugin with a separate stylesheet.",
			"id" => $shortname."_custom_css_link_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the stylesheet here, including http://",
			"std" => ""),

	array("name" => "Third Additional Stylesheet link",
			"desc" => "If you want to define any additional stylesheets, include the entire link here for the third sheet. An example would be a plugin with a separate stylesheet.",
			"id" => $shortname."_custom_css_link_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the stylesheet here, including http://",
			"std" => ""),

	array("name" => "Custom Styles",
			"desc" => "If you want to define any custom styles, include the CSS code here. These styles will override all other styles that you have defined / set. 
				Don't include the <code>&lt;style&gt;</code> and <code>&lt;/style&gt;</code> tags.",
			"id" => $shortname."_custom_css_code",
			"parent" => "custom-additions",
			"type" => "textarea",
			"hint" => "Enter the CSS styles here",
			"note" => "If you have any text here, it will be included in the header of your pages (even if incorrect!!).",
			"std" => ""),

	array("name" => "Got JavaScript?",
			"desc" => "Here you can add custom JavaScript. This is a feature that will normally not be used, since you will rely on plugins to automatically add JavaScript.",
			"parent" => "custom-additions",
			"type" => "blurb",
			),

	array("name" => "First External JavaScript file",
			"desc" => "If you want to define any additional JavaScript files, include the entire link here for the first file. 
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
			"id" => $shortname."_custom_js_file_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the JavaScript file path here, including http://",
			"std" => ""),

	array("name" => "Second External JavaScript file",
			"desc" => "If you want to define any additional JavaScript files, include the entire link here for the second file. 
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
			"id" => $shortname."_custom_js_file_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the JavaScript file path here, including http://",
			"std" => ""),

	array("name" => "Third External JavaScript file",
			"desc" => "If you want to define any additional JavaScript files, include the entire link here for the third file. 
				Note that you have to ensure the JavaScript file's variables and definitions don't conflict with other JS variables and definitions. ",
			"id" => $shortname."_custom_js_file_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the JavaScript file path here, including http://",
			"std" => ""),

	array("name" => "Custom Header JavaScript",
			"desc" => "If you want to add some custom JavaScript to your header you can do so here. 
				This could include affiliate code or anything else that you want to add. 
				Do not include the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags.",
			"id" => $shortname."_custom_header_js",
			"parent" => "custom-additions",
			"type" => "textarea",
			"hint" => "Enter the JavaScript here",
			"note" => "If you have any text here, it will be included in the header of your pages (even if incorrect!!).",
			"std" => ""),

	array("name" => "Custom Footer JavaScript",
			"desc" => "If you want to add some custom JavaScript to your footer you can do so here. 
				This could include affiliate code or anything else that you want to add. 
				Do not include the <code>&lt;script&gt;</code> and <code>&lt;/script&gt;</code> tags.",
			"id" => $shortname."_custom_footer_js",
			"parent" => "custom-additions",
			"type" => "textarea",
			"hint" => "Enter the JavaScript here",
			"note" => "If you have any text here, it will be included in the footer of your pages (even if incorrect!!).",
			"std" => ""),

	array("name" => "Additional Auto-discovery RSS / Atom feeds",
			"desc" => "You might want to set up additional RSS / Atom feeds for your blog, like a \"Post of the Day\" etc. You can add those feeds here.
				Note that this section is for <b>auto-discovery</b> of feeds only. It will make your feed show up in the address bar of browsers like FireFox.",
			"parent" => "custom-additions",
			"type" => "blurb",
			),

	array("name" => "Address of First Additional RSS Feed",
			"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the first feed.",
			"id" => $shortname."_custom_rss_feed_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of First Additional RSS Feed",
			"desc" => "What should the first feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_rss_title_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Address of Second Additional RSS Feed",
			"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the second feed.",
			"id" => $shortname."_custom_rss_feed_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of Second Additional RSS Feed",
			"desc" => "What should the second feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_rss_title_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Address of Third Additional RSS Feed",
			"desc" => "If you want to define any additional RSS Feeds, include the entire link here for the third feed.",
			"id" => $shortname."_custom_rss_feed_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of Third Additional RSS Feed",
			"desc" => "What should the third feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_rss_title_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Address of First Additional Atom Feed",
			"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the first feed.",
			"id" => $shortname."_custom_atom_feed_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of First Additional Atom Feed",
			"desc" => "What should the first feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_atom_title_1",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Address of Second Additional Atom Feed",
			"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the second feed.",
			"id" => $shortname."_custom_atom_feed_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of Second Additional Atom Feed",
			"desc" => "What should the second feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_atom_title_2",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Address of Third Additional Atom Feed",
			"desc" => "If you want to define any additional Atom Feeds, include the entire link here for the third feed.",
			"id" => $shortname."_custom_atom_feed_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed URL here, including http://",
			"std" => ""),

	array("name" => "Title of Third Additional Atom Feed",
			"desc" => "What should the third feed be called? E.g. Post of the day. This will be ignored if the preceding field is blank.",
			"id" => $shortname."_custom_atom_title_3",
			"parent" => "custom-additions",
			"type" => "text",
			"hint" => "Enter the feed title here",
			"std" => ""),
 
	array("name" => "Templates",
			"type" => "sub-section-2",
			"category" => "templates",
			"parent" => "root"
	),

	array("name" => "Magazine",
			"type" => "sub-section-3",
			"category" => "magazine-template",
			"parent" => "templates"
	),
 
	array("name" => "The \"Magazine\" template",
			"desc" => "The magazine template can be used as the landing page for magazine-style blogs. It displays featured content, headlines, excerpts and categories.
				Suffusion natively supports the <a href='http://wordpress.org/extend/plugins/category-icons/'>\"Category Icons\" plugin by Brahim Machkouri</a>.
				So if you have the plugin installed, the icon for the category will be automatically displayed for the categories in the magazine view. ",
			"parent" => "magazine-template",
			"type" => "blurb"
		),
/* 
	array("name" => "Show sidebars in magazine template?",
			"desc" => "You can hide the sidebars in the magazine template. If you have no sidebars in your overall settings, this setting has no effect.: ",
			"id" => $shortname."_mag_sidebars_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show sidebars", "hide" => "Hide sidebars"),
			"std" => "show"),
 */
	array("name" => "Enable Featured Posts on magazine template",
			"desc" => "You can enable the Featured Posts slider on your magazine template: ",
			"id" => $shortname."_mag_featured_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
			"std" => "enabled"),
 
	array("name" => "Show main page content for the magazine template",
			"desc" => "You can show the content of the page on the magazine template. You can use this as an introduction to the page. By default it is hidden: ",
			"id" => $shortname."_mag_content_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show", "hide" => "Hide"),
			"std" => "hide"),
 
	array("name" => "Show headlines for the magazine template",
			"desc" => "You can show a section for headlines on the magazine template. Headlines can be displayed for all posts in a selected category by selecting from the list below. 
				Additionally you can set individual posts up as headlines from the addtional options below each post: ",
			"id" => $shortname."_mag_headlines_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show headlines", "hide" => "Hide headlines"),
			"std" => "show"),
 
	array("name" => "Magazine Template - Main Title for headlines section",
			"desc" => "You can set the main title of the headline section: ",
			"id" => $shortname."_mag_headline_title",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the title here (leave blank if you don't want a title).",
			"std" => 'Headlines'),

	array("name" => "Magazine Template - Main title alignment for headlines section",
			"desc" => "Where do you want your main title for the headlines section positioned? ",
			"id" => $shortname."_mag_headline_main_title_alignment",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("left" => "Left", "center" => "Center", "right" => "Right"),
			"std" => "left"),

	array("name" => "Magazine template - Height of headline section",
			"desc" => "You can set the height of the headline section here. Choose a larger number if you have more headlines: ",
			"id" => $shortname."_mag_headlines_height",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "250"),

	array("name" => "Magazine template - Width of headline image box",
			"desc" => "You can set the width of the headline image section here. The image will be put inside a container of this width: ",
			"id" => $shortname."_mag_headline_image_container_width",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "250"),

	array("name" => "Magazine template - Headline image scaling",
			"desc" => "Your can set a custom size for your headline images, or let the size be the same as that of the excerpt images: ",
			"id" => $shortname."_mag_headline_image_size",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("excerpt" => "Same size as excerpt images", "custom" => "Custom size (defined below)"),
			"std" => "excerpt"),

	array("name" => "Magazine template - Custom Height of headline image",
			"desc" => "If you have picked a custom size for the headline images above, you can set the height here: ",
			"id" => $shortname."_mag_headline_image_custom_height",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Magazine template - Custom Width of headline image",
			"desc" => "If you have picked a custom size for the headline images above, you can set the width here: ",
			"id" => $shortname."_mag_headline_image_custom_width",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Magazine template - Select categories for headlines",
			"desc" => "You can pick categories to include in the headlines section. All posts in the selected categories will be shown. 
				By default no category is selected: ",
			"id" => $shortname."_mag_headline_categories",
			"parent" => "magazine-template",
			"type" => "multi-select",
			"options" => suf_get_formatted_category_array($shortname."_mag_headline_categories")),

	array("name" => "Show an excerpts section for the magazine template",
			"desc" => "You can show a section with specific excerpts: ",
			"id" => $shortname."_mag_excerpts_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show excerpts", "hide" => "Hide excerpts"),
			"std" => "show"),
 
	array("name" => "Magazine Template - Main Title for excerpts section",
			"desc" => "You can set the main title of the excerpts section: ",
			"id" => $shortname."_mag_excerpts_title",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the title here (leave blank if you don't want a title).",
			"std" => 'Other Big Stories'),

	array("name" => "Magazine Template - Main title alignment for excerpts section",
			"desc" => "Where do you want your main title for the excerpts section positioned? ",
			"id" => $shortname."_mag_excerpts_main_title_alignment",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("left" => "Left", "center" => "Center", "right" => "Right"),
			"std" => "left"),

	array("name" => "Magazine Template - Maximum Number of excerpts per row",
			"desc" => "You can define how many excerpts you want to show per row: ",
			"id" => $shortname."_mag_excerpts_per_row",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)", "5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", 
				"8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
			"std" => "3"),

	array("name" => "Magazine template - Select categories for excerpts",
			"desc" => "You can pick categories to include in the headlines section. All posts in the selected categories will be shown. 
				By default no category is selected: ",
			"id" => $shortname."_mag_excerpt_categories",
			"parent" => "magazine-template",
			"type" => "multi-select",
			"options" => suf_get_formatted_category_array($shortname."_mag_excerpt_categories")),

	array("name" => "Magazine Template - Thumbnail container for excerpts",
			"desc" => "You can show thumbnails for excerpts in the magazine template: ",
			"id" => $shortname."_mag_excerpts_images_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Always show Thumbnail container", "hide" => "Always hide Thumbnail container", 
				"hide-empty" => "Hide Thumbnail container if there is no thumbnail"),
			"std" => "show"),

	array("name" => "Magazine Template - Thumbnail container height for excerpts",
			"desc" => "For the purposes of visual consistency you can set the height of the box in which the thumbnail will be placed. Your thumbnail will be \"cropped\" to this height: ",
			"id" => $shortname."_mag_excerpts_image_box_height",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "100"),
 
	array("name" => "Magazine template - Excerpt thumbnail image scaling",
			"desc" => "You can set a custom size for your excerpt thumbnail images, or let the size be the same as that of the regular excerpt images: ",
			"id" => $shortname."_mag_excerpt_image_size",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("excerpt" => "Same size as excerpt images", "custom" => "Custom size (defined below)"),
			"std" => "excerpt"),

	array("name" => "Magazine template - Custom height of thumbnail image in excerpts",
			"desc" => "If you have picked a custom size for the excerpt thumbnail images above, you can set the height here: ",
			"id" => $shortname."_mag_excerpt_image_custom_height",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Magazine template - Custom width of thumbnail image in excerpts",
			"desc" => "If you have picked a custom size for the excerpt thumbnail images above, you can set the width here: ",
			"id" => $shortname."_mag_excerpt_image_custom_width",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "200"),

	array("name" => "Magazine template - Alignment of post title in Excerpts",
			"desc" => "You can set the alignment for the post title in the excerpts: ",
			"id" => $shortname."_mag_excerpt_title_alignment",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("left" => "Left", "center" => "Center", "right" => "Right"),
			"std" => "left"),

	array("name" => "Magazine Template - Text for \"Full story\" in excerpts",
			"desc" => "You can set the text to show for the \"Full story\" link in excerpts: ",
			"id" => $shortname."_mag_excerpt_full_story_text",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the text here (leave blank for no link)",
			"std" => 'Full Story'),
	
	array("name" => "Show a categories section for the magazine template",
			"desc" => "You can show a section with lists of posts from specific categories: ",
			"id" => $shortname."_mag_categories_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show categories", "hide" => "Hide categories"),
			"std" => "show"),
 
	array("name" => "Magazine Template - Main Title for categories section",
			"desc" => "You can set the main title for the categories section here: ",
			"id" => $shortname."_mag_catblocks_title",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the title here (leave blank if you don't want a title).",
			"std" => 'Other Stories'),

	array("name" => "Magazine Template - Main title alignment for categories section",
			"desc" => "Where do you want your main title for the categories section positioned? ",
			"id" => $shortname."_mag_catblocks_main_title_alignment",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("left" => "Left", "center" => "Center", "right" => "Right"),
			"std" => "left"),

	array("name" => "Magazine template - Select category blocks to show",
			"desc" => "You can also show specific catagory blocks on the magazine template. A category block can include a category icon, the category description and some post titles. 
				By default no category is selected: ",
			"id" => $shortname."_mag_catblock_categories",
			"parent" => "magazine-template",
			"type" => "multi-select",
			"options" => suf_get_formatted_category_array($shortname."_mag_catblock_categories")),

	array("name" => "Magazine Template - Maximum Number of category blocks per row",
			"desc" => "You can define how many category blocks you want to show per row: ",
			"id" => $shortname."_mag_catblocks_per_row",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)", "5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", 
				"8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
			"std" => "3"),

	array("name" => "Magazine Template - Category title alignment for each Category Block",
			"desc" => "Where do you want your category title positioned for each category block? ",
			"id" => $shortname."_mag_catblocks_title_alignment",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("left" => "Left", "center" => "Center", "right" => "Right"),
			"std" => "left"),

	array("name" => "Magazine Template - Images for category blocks",
			"desc" => "If  you have the <a href='http://wordpress.org/extend/plugins/category-icons/'>\"Category Icons\" plugin by Brahim Machkouri</a> you can include an image at the top of each category block: ",
			"id" => $shortname."_mag_catblocks_images_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Always show Category Icons container", "hide" => "Always hide Category Icons container", 
				"hide-empty" => "Hide Category Icons container if there is no icon"),
			"std" => "hide"),

	array("name" => "Magazine Template - Image container height for category blocks",
			"desc" => "For the purposes of visual consistency you can set the height of the box in which the category image will be placed. Your icon will be \"cropped\" to this height: ",
			"id" => $shortname."_mag_catblocks_image_box_height",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
			"std" => "100"),
 
	array("name" => "Magazine Template - Description for category blocks",
			"desc" => "You can show your category's description in each category block: ",
			"id" => $shortname."_mag_catblocks_desc_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show Description", "hide" => "Hide Description"),
			"std" => "hide"),
 
	array("name" => "Magazine Template - Latest posts in category blocks",
			"desc" => "You can show your category's latest posts in each category block: ",
			"id" => $shortname."_mag_catblocks_posts_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show Posts", "hide" => "Hide Posts"),
			"std" => "show"),
 
	array("name" => "Magazine Template - Maximum Number of posts in category blocks",
			"desc" => "You can the number of posts you want listed in each category block. By default this is set to 5: ",
			"id" => $shortname."_mag_catblocks_num_posts",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the number here. Enter -1 to show all posts.",
			"std" => '5'),

	array("name" => "Magazine Template - Text for \"See all posts\" in category blocks",
			"desc" => "You can set the text to show for the \"See all posts\" link in category blocks: ",
			"id" => $shortname."_mag_catblocks_see_all_text",
			"parent" => "magazine-template",
			"type" => "text",
			"hint" => "Enter the text here (leave blank for no link)",
			"std" => 'See all posts'),
/*
	array("name" => "Magazine Template - Subscription link in Category Blocks",
			"desc" => "You can show an RSS link for each category block: ",
			"id" => $shortname."_mag_catblocks_rss_enabled",
			"parent" => "magazine-template",
			"type" => "radio",
			"options" => array("show" => "Show subscription link", "hide" => "Hide subscription link"),
			"std" => "show"),
 */ 
 
	array("name" => "Single Category",
			"type" => "sub-section-3",
			"category" => "category-template",
			"parent" => "templates"
	),

	array("name" => "The \"Category\" template",
			"desc" => "The category template is applied whenever you open a category. It displays all posts associated with a category. 
				Suffusion natively supports the <a href='http://wordpress.org/extend/plugins/category-icons/'>\"Category Icons\" plugin by Brahim Machkouri</a>.
				So if you have the plugin installed, the icon for the category will be automatically displayed. ",
			"parent" => "category-template",
			"type" => "blurb"
		),
 
	array("name" => "Enable Category Introduction?",
			"desc" => "By default the name of the category and its description are not shown on a category page. You can change it: ",
			"id" => $shortname."_cat_info_enabled",
			"parent" => "category-template",
			"type" => "radio",
			"options" => array("enabled" => "Category Information enabled",
							"not-enabled" => "Category Information not enabled (default)"),
			"std" => "not-enabled"),

	array("name" => "All Categories",
			"type" => "sub-section-3",
			"category" => "categories-template",
			"parent" => "templates"
	),

	array("name" => "The \"All Categories\" template",
			"desc" => "The \"All Categories\" template can be used if you want to list out all your categories on a single page. 
				You can additionally decide to show the categories hierarchically, or show the RSS feed for each category or the number of posts in each category.",
			"parent" => "categories-template",
			"type" => "blurb"
		),
 
	array("name" => "List categories hierarchically?",
			"desc" => "You can decide if you want to list your categories in a hierarchical manner: ",
			"id" => $shortname."_temp_cats_hierarchical",
			"parent" => "categories-template",
			"type" => "radio",
			"options" => array("hierarchical" => "Categories listed hierarchically",
							"flat" => "Categories listed flat"),
			"std" => "hierarchical"),
/*
	array("name" => "Category Listing Style",
			"desc" => "Select the listing style for your categories: ",
			"id" => $shortname."_temp_cats_list_style",
			"parent" => "categories-template",
			"type" => "radio",
			"options" => array("ordered" => "Ordered listing (numbered)",
							"unordered" => "Unordered listing (bullets)"),
			"std" => "unordered"),
 */
	array("name" => "Show RSS feeds for each category?",
			"desc" => "You can display a link to an RSS feed for each category: ",
			"id" => $shortname."_temp_cats_rss",
			"parent" => "categories-template",
			"type" => "radio",
			"options" => array("show" => "Show RSS feed",
							"hide" => "Hide RSS feed"),
			"std" => "show"),

	array("name" => "Show post count for each category?",
			"desc" => "You can display the number of posts in each category. Categories with 0 posts are excluded: ",
			"id" => $shortname."_temp_cats_post_count",
			"parent" => "categories-template",
			"type" => "radio",
			"options" => array("show" => "Show Post Count",
							"hide" => "Hide Post Count"),
			"std" => "hide"),

	array("name" => "Single Author",
			"type" => "sub-section-3",
			"category" => "author-template",
			"parent" => "templates"
	),

	array("name" => "The single \"Author\" template",
			"desc" => "The author template is applied whenever you open an author page. It displays all posts associated with a category.",
			"parent" => "author-template",
			"type" => "blurb"
		),
 
	array("name" => "Enable Author Introduction?",
			"desc" => "By default the name of the author and a the description are shown on an author page. You can change it: ",
			"id" => $shortname."_author_info_enabled",
			"parent" => "author-template",
			"type" => "radio",
			"options" => array("enabled" => "Author Information enabled (default)",
							"not-enabled" => "Author Information not enabled"),
			"std" => "enabled"),

	array("name" => "No Sidebars",
			"type" => "sub-section-3",
			"category" => "no-sidebars",
			"parent" => "templates"
	),

	array("name" => "The \"No Sidebars\" template",
			"desc" => "You can use the \"No Sidebars\" template if you have a page where you don't want sidebars to show up, but the rest of your blog has sidebars enabled. 
				To set up pages with this template, select the \"No Sidebars\" template while creating or updating a page.",
			"parent" => "no-sidebars",
			"type" => "blurb"
		),
 
	array("name" => "Enable Widget Area Below Header?",
			"desc" => "By default the \"Widget Area Below Header\" is enabled in the \"No Sidebars\" template. You can change it: ",
			"id" => $shortname."_ns_wabh_enabled",
			"parent" => "no-sidebars",
			"type" => "radio",
			"options" => array("enabled" => "Widget Area below Header enabled (default)",
							"not-enabled" => "Widget Area below Header not enabled"),
			"std" => "enabled"),

	array("name" => "Enable Widget Area Above Footer?",
			"desc" => "By default the \"Widget Area Above Footer\" is enabled in the \"No Sidebars\" template. You can change it: ",
			"id" => $shortname."_ns_waaf_enabled",
			"parent" => "no-sidebars",
			"type" => "radio",
			"options" => array("enabled" => "Widget Area above Footer enabled (default)",
							"not-enabled" => "Widget Area above Footer not enabled"),
			"std" => "enabled"),

	array("name" => "Help",
			"type" => "sub-section-2",
			"category" => "help-pages",
			"parent" => "root"
	),

	array("name" => "FAQs",
			"type" => "sub-section-3",
			"category" => "help-faqs",
			"buttons" => 'no-buttons',
			"parent" => "help-pages"
	),

	array("name" => "Answers to some frequently asked questions",
			"type" => "blurb",
			"parent" => "help-faqs",
			"desc" => "<ol class='faq-list'>
			<li><b>Where do I start with customizations?</b><br/>
			Open the section for \"Theme Selection\". If you see a color combination that you like, select it and you are set.</li>
			<li><b>What if I don't like any of the default color combinations?</b><br/>
			You can perform customizations within certain limits:
			<ul>
			<li>To modify things like the overall background color and the background image, look at \"Body Background Settings\".</li>
			<li>For font colors used, colors of hyperlinks etc. look at \"Body Font Settings\".</li>
			<li>To customize the colors used for the blog title and blog description see \"Header Customization\".</li>
			<li>For the sidebar widgets you can select styled or unstyled headers in the \"Sidebar Setup\" section.</li>
			</ul>
			<li><b>Can I use my own background image for the page?</b><br/>
			Absolutely! You can use any image that you like, tile/repeat it, align it, make it fixed etc. See the \"Body Background Settings\" section.</li>
			<li><b>Can I use a custom header image?</b><br/>
			Yes. See the \"Header Customization\" section.</li>
			<li><b>Can I switch the sidebar to the left?</b><br/>
			Of course. See the \"Sidebar Setup\" section.</li>
			<li><b>Can I define more sidebars?</b><br/>
			Yes. See the \"Sidebar Setup\" section. You can define 2 sidebars and have them positioned either on the same side or on opposite sides of the content.</li>
			<li><b>The theme's screenshots show navigation menus at the top. Why don't I see any navigation menu?</b><br/>
			There are two possible reasons. First, in the \"Navigation Bar Setup\" section, you may have chosen \"Hidden\" for displaying the navigation bar.
			Second, by default no pages are selected for display. So even if you have not chosen to hide the navigation bar, you will have to manually select the pages to display.</li>
			<li><b>Can I define what should show up on the drop-down menus at the top?</b><br/>
			Yes. See the \"Navigation Bar Setup\" section. Only pages that you include there will be shown. New pages that you create will have to be manually added.</li>
			<li><b>What other features are enabled?</b><br/>
			You can hook up your Google Analytics account to your blog. If you have your blog set up with OpenID, the requisite tags will be added to the header</li>
			<li><b>Are there any plans to enhance any features?</b><br/>
			Yes. Features that are in consideration are - more default themes and better control over the colors in a post. 
			I have de-scoped some features, like advertising support and support for custom feeds. This is because of the availability of plugins to do these tasks.</li>
			<li><b>Where can I report bugs or request for features?</b><br/>
			You can visit the <a href='http://www.aquoid.com/news/themes/suffusion/'>theme's page</a> and leave a comment, or you could drop a comment on
		   	<a href='http://mynethome.net/blog/contact'>the author's contact page</a>.</li>
			</ol>"
		),
	);

function create_title($value) {
	echo '<h2 class="suf-header-1">'.$value['name']."</h2>\n";
}

function create_suf_header_2($value) {
	echo '<h3 class="suf-header-2">'.$value['name']."</h3>\n";
}

function create_suf_header_3($value) {
	echo '<h3 class="suf-header-3">'.$value['name']."</h3>\n";
}

function create_opening_tag($value) {
	echo '<div class="suf-section">'."\n";
	echo "<h3>".$value['name']."</h3>\n";
	echo $value['desc']."<br/>";
	if (isset($value['note'])) {
		echo "<span class=\"note\">".$value['note']."</span><br/>";
	}
}

function create_closing_tag() {
	echo "</div><!-- suf-section -->\n";
}

function create_section_for_text($value) {
	create_opening_tag($value);
	$text = "";
	if (get_option($value['id']) === FALSE) {
		$text = $value['std'];
	}
	else {
		$text = get_option($value['id']);
	}

	echo '<input type="text" id="'.$value['id'].'" name="'.$value['id'].'" value="'.$text.'" />'."\n";
	if ($value['hint'] != null) {
		echo " &laquo; ".$value['hint']."<br/>\n";
	}
	create_closing_tag();
}

function create_section_for_textarea($value) {
	create_opening_tag($value);
	echo '<textarea name="'.$value['id'].'" type="textarea" cols="" rows="">'."\n";
	if ( get_option( $value['id'] ) != "") {
		echo stripslashes(get_option($value['id']));
	}
	else {
		echo $value['std'];
	}
	echo '</textarea>';
	if ($value['hint'] != null) {
		echo " &laquo; ".$value['hint']."<br/>\n";
	}
	create_closing_tag();
}

function create_section_for_select($value) {
	create_opening_tag($value);
	echo '<select name="'.$value['id'].'" id="'.$value['id'].'">'."\n";
	foreach ($value['options'] as $option_value => $option_list) {
		echo "<option ";
		if (get_option($value['id']) == $option_value) {
			echo ' selected="selected"';
		}
		elseif (get_option($value['id']) === FALSE && $option_value == $value['std']) {
			echo ' selected="selected"';
		}
		echo " value='$option_value' >".$option_list['title']."</option>\n";
	}
	echo "</select>\n";
	create_closing_tag();
}

function create_section_for_multi_select($value) {
	create_opening_tag($value);
	echo '<ul class="suf-checklist" id="'.$value['id'].'-chk" >'."\n";
	$consolidated_value = get_option($value['id']);
	$consolidated_value = trim($consolidated_value);
	if ($consolidated_value != '') {
		$exploded = explode(',', $consolidated_value);
	}
	foreach ($value['options'] as $option_value => $option_list) {
		$checked = " ";
		if ($consolidated_value != '') {
			foreach ($exploded as $idx => $checked_value) {
				if ($checked_value == $option_value) {
					$checked = " checked='checked' ";
					break;
				}
			}
		}
		else if (get_option($value['id']."_".$option_value)) {
			$checked = " checked='checked' ";
		}
		echo "<li>\n";
		echo '<input type="checkbox" name="'.$value['id']."_".$option_value.'" value="true" '.$checked.' class="depth-'.($option_list['depth']+1).'" />'.$option_list['title']."\n";
		echo "</li>\n";
	}
	echo "</ul>\n";
	echo '<input type="hidden" name="'.$value['id'].'" id="'.$value['id'].'" value="'.get_option($value['id']).'"/>'."\n";
	create_closing_tag();
}

function create_section_for_radio($value) {
	create_opening_tag($value);
	foreach ($value['options'] as $option_value => $option_text) {
		$checked = ' ';
		if (get_option($value['id']) == $option_value) {
			$checked = ' checked="checked" ';
		}
		else if (get_option($value['id']) === FALSE && $value['std'] == $option_value){
			$checked = ' checked="checked" ';
		}
		else {
			$checked = ' ';
		}
		echo '<div class="suf-radio"><input type="radio" name="'.$value['id'].'" value="'.$option_value.'" '.$checked."/>".$option_text."</div>\n";
	}
	create_closing_tag();
}

function create_section_for_checkbox($value) {
	create_opening_tag($value);
	if(get_option($value['id'])) {
		$checked = "checked=\"checked\"";
	}
	else {
		$checked = "";
	}
	echo '<input type="checkbox" name="'.$value['id'].'" id="'.$value['id'].'" value="true" '.$checked."/>\n";
	create_closing_tag();
}

function create_section_for_color_picker($value) {
	create_opening_tag($value);
	$color_value = "";
	if (get_option($value['id']) === FALSE) {
		$color_value = $value['std'];
	}
	else {
		$color_value = get_option($value['id']);
	}

	echo '<div class="color-picker">'."\n";
	echo '<input type="text" id="'.$value['id'].'" name="'.$value['id'].'" value="'.$color_value.'" class="color" /> &laquo; Click to select color<br/>'."\n";
	echo "<strong>Default: <font color='".$value['std']."'> ".$value['std']."</font></strong> (You can copy and paste this into the box above)\n";
	echo "</div>\n";
	create_closing_tag();
}

function create_section_for_sortable_list($value) {
	create_opening_tag($value);
?>
	<script type="text/javascript">
	$j = jQuery.noConflict();
	$j(function() {
		$j("#<?php echo $value['id']; ?>").sortable();
		$j("#<?php echo $value['id']; ?>").disableSelection();
	});
	</script>
<?php
	echo "<ul id='".$value['id']."-ui' name='".$value['id']."-ui' class='suf-sort-list'>\n";
	foreach ($value['std'] as $key) {
		echo "<li class='suf-sort-list-item'>$key</li>";
	}
	echo "</ul>\n";
	echo "<input id='".$value['id']."' name='".$value['id']."' type='hidden' />";
/*	if (get_option($value['id']) === FALSE) {
		$color_value = $value['std'];
	}
	else {
		$color_value = get_option($value['id']);
	}

	echo '<div class="color-picker">'."\n";
	echo '<input type="text" id="'.$value['id'].'" name="'.$value['id'].'" value="'.$color_value.'" class="color" /> &laquo; Click to select color<br/>'."\n";
	echo "<strong>Default: <font color='".$value['std']."'> ".$value['std']."</font></strong> (You can copy and paste this into the box above)\n";
	echo "</div>\n";
 */	create_closing_tag();
}

function create_section_for_blurb($value) {
	create_opening_tag($value);
	create_closing_tag();
}

function get_option_structure($options) {
	$option_structure = array();
	foreach ($options as $value) {
		switch ($value['type']) {
			case "title":
				$option_structure[$value['category']] = array();
				$option_structure[$value['category']]['slug'] = $value['category'];
				$option_structure[$value['category']]['name'] = $value['name'];
				$option_structure[$value['category']]['children'] = array();
				$option_structure[$value['category']]['parent'] = null;
				break;
			case "sub-section-2":
			case "sub-section-3":
				$option_structure[$value['parent']]['children'][$value['category']] = $value['name'];

				$option_structure[$value['category']] = array();
				$option_structure[$value['category']]['slug'] = $value['category'];
				$option_structure[$value['category']]['name'] = $value['name'];
				$option_structure[$value['category']]['children'] = array();
				$option_structure[$value['category']]['parent'] = $value['parent'];
				$option_structure[$value['category']]['buttons'] = $value['buttons'];
				break;
			default:
				$option_structure[$value['parent']]['children'][$value['name']] = $value['name'];
		}
	}
	return $option_structure;
}

function get_options_html($option_structure, $selected = "theme-selection", $echo = false) {
	$ret = "<ul class='tabs'>";
	foreach ($option_structure as $l1) {
		if ($l1['parent'] == null) {
			//$ret .= "<li class='level-1'>".$l1['name']."</li>\n";
			foreach ($l1['children'] as $l2slug => $l2name) {
				$ret .= "<li class='level-2'>".$l2name."</li>\n";
				foreach ($option_structure[$l2slug]['children'] as $l3slug => $l3name) {
					$ret .= "<li class='$l3slug'><a class=\"$l3slug level-3\">".$l3name."</a></li>\n";
				}
			}
		}
	}
	$ret .= "</ul>";
	return $ret;
}

function get_options_for_category($options, $category) {
	$ret = array();
	if ($category == "all") {
		return $options;
	}
	foreach ($options as $value) {
		if ($value['parent'] == $category) {
			$ret[count($ret)] = $value;
		}
	}
	return $ret;
}

function get_spawned_options_for_category($options, $spawned_options, $category) {
	$ret = array();
	if ($category == "all") {
		return $spawned_options;
	}
	foreach ($options as $optionvalue) {
		if ($optionvalue['parent'] == $category) {
			foreach ($spawned_options as $value) {
				if ($value['parent'] == $optionvalue['id']) {
					if (!in_array($value, $ret)) {
						$ret[count($ret)] = $value;
					}
				}
			}
		}
	}
	return $ret;
}

function create_form($themename, $shortname, $options, $spawned_options, $theme_name, $suf_theme_definitions, $category = "all") {
	$filtered_options = get_options_for_category($options, $category);
	echo "<div class=\"$category main-content\" id='$category'>\n";
	$option_structure = get_option_structure($options);
	echo '<h3 class="suf-header-2">'.$option_structure[$category]['name']."</h3>\n";
	echo "<form method=\"post\" name=\"form-$category\">\n";
	foreach ($filtered_options as $value) {
		switch ( $value['type'] ) {
			case "title":
				create_title($value);
				break;

			case "sub-section-2":
				create_suf_header_2($value);
				break;

			case "sub-section-3":
				create_suf_header_3($value);
				break;

			case "text";
				create_section_for_text($value);
				break;

			case "textarea":
				create_section_for_textarea($value);
				break;

			case "select":
				create_section_for_select($value);
				break;

			case "multi-select":
				create_section_for_multi_select($value);
				break;

			case "radio":
				create_section_for_radio($value);
				break;

			case "checkbox":
				create_section_for_checkbox($value);
				break;

			case "color-picker":
				create_section_for_color_picker($value);
				break;

			case "sortable-list":
				create_section_for_sortable_list($value);
				break;

			case "blurb":
				create_section_for_blurb($value);
				break;

		}
	}

	if ($option_structure[$category]['buttons'] != 'no-buttons') {
		echo "<div class=\"suf-button-bar\">\n";
		echo "<input name=\"save\" type=\"button\" value=\"Save changes\" class=\"button\" onclick=\"submit_form(this, document.forms['form-$category'])\" />\n";
		echo "<input name=\"reset\" type=\"button\" value=\"Reset page to default options\" class=\"button\" onclick=\"submit_form(this, document.forms['form-$category'])\" />\n";
		echo "<input name=\"reset_all\" type=\"button\" value=\"Reset options in all pages to default values\" class=\"button\" onclick=\"submit_form(this, document.forms['form-$category'])\" />\n";
		echo "<input type=\"hidden\" name=\"formaction\" value=\"default\" />\n";
		echo "<input type=\"hidden\" name=\"formcategory\" value=\"$category\" />\n";
		echo "</div><!-- suf-button-bar -->\n";
	}
	echo "</form>\n";

	echo "</div><!-- main content -->\n";
}
?>
