<?php 
/*Plugin Name: Brankic Icons Widget
Description: Show Awesome icons with link in the sidebar.
Version: 1.2
Author: Brankic1979
Author URI: http://brankic1979.com
License: GPLv2
*/
?>

<?php
// some functions

function bra_plugin_icons_enqueue_style() {
	wp_enqueue_style("font-awesome", plugins_url('css/font-awesome.css', __FILE__), false); 
	wp_enqueue_style("socialize-bookmarks", plugins_url("css/socialize-bookmarks.css", __FILE__), false);
}

add_action( 'wp_enqueue_scripts', 'bra_plugin_icons_enqueue_style' );


class Brankic_Icons_Widget extends WP_Widget {
     
    function __construct() {
     
        parent::__construct(
             
            // base ID of the widget
            'brankic_icons_widget',
             
            // name of the widget
            __('Brankic Icons Widget', 'brankic1979' ),
             
            // widget options
            array (
                'description' => __( 'Showing the list of icons with URLs. Can be used for list of social networks, or something else', 'brankic1979' )
            )
             
        );
         
    }
     
    function form( $instance ) {
     
        $defaults = array(
            'title' => '',
			'layout' => '',
			'icon_1' => '',
			'url_1' => '',
			'icon_2' => '',
			'url_2' => '',
			'icon_3' => '',
			'url_3' => '',
			'icon_4' => '',
			'url_4' => '',
			'icon_5' => '',
			'url_5' => '',
			'icon_6' => '',
			'url_6' => '',
			'icon_7' => '',
			'url_7' => '',
			'icon_8' => '',
			'url_8' => '',
			'icon_9' => '',
			'url_9' => ''
        );
        $title = $instance[ 'title' ];
		$layout = $instance[ 'layout' ];		
		$icon_1 = $instance[ 'icon_1' ];
		$url_1 = $instance[ 'url_1' ];
		$icon_2 = $instance[ 'icon_2' ];
		$url_2 = $instance[ 'url_2' ];
		$icon_3 = $instance[ 'icon_3' ];
		$url_3 = $instance[ 'url_3' ];
		$icon_4 = $instance[ 'icon_4' ];
		$url_4 = $instance[ 'url_4' ];
		$icon_5 = $instance[ 'icon_5' ];
		$url_5 = $instance[ 'url_5' ];
		$icon_6 = $instance[ 'icon_6' ];
		$url_6 = $instance[ 'url_6' ];
		$icon_7 = $instance[ 'icon_7' ];
		$url_7 = $instance[ 'url_7' ];
		$icon_8 = $instance[ 'icon_8' ];
		$url_8 = $instance[ 'url_8' ];
		$icon_9 = $instance[ 'icon_9' ];
		$url_9 = $instance[ 'url_9' ];

		$awesome_icons_array = array("fa-stack-1x", "fa-glass", "fa-music", "fa-search", "fa-envelope-o", "fa-heart", "fa-star", "fa-star-o", "fa-user", "fa-film", "fa-th-large", "fa-th", "fa-th-list", "fa-check", "fa-remove", "fa-close", "fa-times", "fa-search-plus", "fa-search-minus", "fa-power-off", "fa-signal", "fa-gear", "fa-cog", "fa-trash-o", "fa-home", "fa-file-o", "fa-clock-o", "fa-road", "fa-download", "fa-arrow-circle-o-down", "fa-arrow-circle-o-up", "fa-inbox", "fa-play-circle-o", "fa-rotate-right", "fa-repeat", "fa-refresh", "fa-list-alt", "fa-lock", "fa-flag", "fa-headphones", "fa-volume-off", "fa-volume-down", "fa-volume-up", "fa-qrcode", "fa-barcode", "fa-tag", "fa-tags", "fa-book", "fa-bookmark", "fa-print", "fa-camera", "fa-font", "fa-bold", "fa-italic", "fa-text-height", "fa-text-width", "fa-align-left", "fa-align-center", "fa-align-right", "fa-align-justify", "fa-list", "fa-dedent", "fa-outdent", "fa-indent", "fa-video-camera", "fa-photo", "fa-image", "fa-picture-o", "fa-pencil", "fa-map-marker", "fa-adjust", "fa-tint", "fa-edit", "fa-pencil-square-o", "fa-share-square-o", "fa-check-square-o", "fa-arrows", "fa-step-backward", "fa-fast-backward", "fa-backward", "fa-play", "fa-pause", "fa-stop", "fa-forward", "fa-fast-forward", "fa-step-forward", "fa-eject", "fa-chevron-left", "fa-chevron-right", "fa-plus-circle", "fa-minus-circle", "fa-times-circle", "fa-check-circle", "fa-question-circle", "fa-info-circle", "fa-crosshairs", "fa-times-circle-o", "fa-check-circle-o", "fa-ban", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrow-down", "fa-mail-forward", "fa-share", "fa-expand", "fa-compress", "fa-plus", "fa-minus", "fa-asterisk", "fa-exclamation-circle", "fa-gift", "fa-leaf", "fa-fire", "fa-eye", "fa-eye-slash", "fa-warning", "fa-exclamation-triangle", "fa-plane", "fa-calendar", "fa-random", "fa-comment", "fa-magnet", "fa-chevron-up", "fa-chevron-down", "fa-retweet", "fa-shopping-cart", "fa-folder", "fa-folder-open", "fa-arrows-v", "fa-arrows-h", "fa-bar-chart-o", "fa-bar-chart", "fa-twitter-square", "fa-facebook-square", "fa-camera-retro", "fa-key", "fa-gears", "fa-cogs", "fa-comments", "fa-thumbs-o-up", "fa-thumbs-o-down", "fa-star-half", "fa-heart-o", "fa-sign-out", "fa-linkedin-square", "fa-thumb-tack", "fa-external-link", "fa-sign-in", "fa-trophy", "fa-github-square", "fa-upload", "fa-lemon-o", "fa-phone", "fa-square-o", "fa-bookmark-o", "fa-phone-square", "fa-twitter", "fa-facebook-f", "fa-facebook", "fa-github", "fa-unlock", "fa-credit-card", "fa-feed", "fa-rss", "fa-hdd-o", "fa-bullhorn", "fa-bell", "fa-certificate", "fa-hand-o-right", "fa-hand-o-left", "fa-hand-o-up", "fa-hand-o-down", "fa-arrow-circle-left", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-circle-down", "fa-globe", "fa-wrench", "fa-tasks", "fa-filter", "fa-briefcase", "fa-arrows-alt", "fa-group", "fa-users", "fa-chain", "fa-link", "fa-cloud", "fa-flask", "fa-cut", "fa-scissors", "fa-copy", "fa-files-o", "fa-paperclip", "fa-save", "fa-floppy-o", "fa-square", "fa-navicon", "fa-reorder", "fa-bars", "fa-list-ul", "fa-list-ol", "fa-strikethrough", "fa-underline", "fa-table", "fa-magic", "fa-truck", "fa-pinterest", "fa-pinterest-square", "fa-google-plus-square", "fa-google-plus", "fa-money", "fa-caret-down", "fa-caret-up", "fa-caret-left", "fa-caret-right", "fa-columns", "fa-unsorted", "fa-sort", "fa-sort-down", "fa-sort-desc", "fa-sort-up", "fa-sort-asc", "fa-envelope", "fa-linkedin", "fa-rotate-left", "fa-undo", "fa-legal", "fa-gavel", "fa-dashboard", "fa-tachometer", "fa-comment-o", "fa-comments-o", "fa-flash", "fa-bolt", "fa-sitemap", "fa-umbrella", "fa-paste", "fa-clipboard", "fa-lightbulb-o", "fa-exchange", "fa-cloud-download", "fa-cloud-upload", "fa-user-md", "fa-stethoscope", "fa-suitcase", "fa-bell-o", "fa-coffee", "fa-cutlery", "fa-file-text-o", "fa-building-o", "fa-hospital-o", "fa-ambulance", "fa-medkit", "fa-fighter-jet", "fa-beer", "fa-h-square", "fa-plus-square", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-double-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-angle-down", "fa-desktop", "fa-laptop", "fa-tablet", "fa-mobile-phone", "fa-mobile", "fa-circle-o", "fa-quote-left", "fa-quote-right", "fa-spinner", "fa-circle", "fa-mail-reply", "fa-reply", "fa-github-alt", "fa-folder-o", "fa-folder-open-o", "fa-smile-o", "fa-frown-o", "fa-meh-o", "fa-gamepad", "fa-keyboard-o", "fa-flag-o", "fa-flag-checkered", "fa-terminal", "fa-code", "fa-mail-reply-all", "fa-reply-all", "fa-star-half-empty", "fa-star-half-full", "fa-star-half-o", "fa-location-arrow", "fa-crop", "fa-code-fork", "fa-unlink", "fa-chain-broken", "fa-question", "fa-info", "fa-exclamation", "fa-superscript", "fa-subscript", "fa-eraser", "fa-puzzle-piece", "fa-microphone", "fa-microphone-slash", "fa-shield", "fa-calendar-o", "fa-fire-extinguisher", "fa-rocket", "fa-maxcdn", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-circle-down", "fa-html5", "fa-css3", "fa-anchor", "fa-unlock-alt", "fa-bullseye", "fa-ellipsis-h", "fa-ellipsis-v", "fa-rss-square", "fa-play-circle", "fa-ticket", "fa-minus-square", "fa-minus-square-o", "fa-level-up", "fa-level-down", "fa-check-square", "fa-pencil-square", "fa-external-link-square", "fa-share-square", "fa-compass", "fa-toggle-down", "fa-caret-square-o-down", "fa-toggle-up", "fa-caret-square-o-up", "fa-toggle-right", "fa-caret-square-o-right", "fa-euro", "fa-eur", "fa-gbp", "fa-dollar", "fa-usd", "fa-rupee", "fa-inr", "fa-cny", "fa-rmb", "fa-yen", "fa-jpy", "fa-ruble", "fa-rouble", "fa-rub", "fa-won", "fa-krw", "fa-bitcoin", "fa-btc", "fa-file", "fa-file-text", "fa-sort-alpha-asc", "fa-sort-alpha-desc", "fa-sort-amount-asc", "fa-sort-amount-desc", "fa-sort-numeric-asc", "fa-sort-numeric-desc", "fa-thumbs-up", "fa-thumbs-down", "fa-youtube-square", "fa-youtube", "fa-xing", "fa-xing-square", "fa-youtube-play", "fa-dropbox", "fa-stack-overflow", "fa-instagram", "fa-flickr", "fa-adn", "fa-bitbucket", "fa-bitbucket-square", "fa-tumblr", "fa-tumblr-square", "fa-long-arrow-down", "fa-long-arrow-up", "fa-long-arrow-left", "fa-long-arrow-right", "fa-apple", "fa-windows", "fa-android", "fa-linux", "fa-dribbble", "fa-skype", "fa-foursquare", "fa-trello", "fa-female", "fa-male", "fa-gittip", "fa-gratipay", "fa-sun-o", "fa-moon-o", "fa-archive", "fa-bug", "fa-vk", "fa-weibo", "fa-renren", "fa-pagelines", "fa-stack-exchange", "fa-arrow-circle-o-right", "fa-arrow-circle-o-left", "fa-toggle-left", "fa-caret-square-o-left", "fa-dot-circle-o", "fa-wheelchair", "fa-vimeo-square", "fa-turkish-lira", "fa-try", "fa-plus-square-o", "fa-space-shuttle", "fa-slack", "fa-envelope-square", "fa-wordpress", "fa-openid", "fa-institution", "fa-bank", "fa-university", "fa-mortar-board", "fa-graduation-cap", "fa-yahoo", "fa-google", "fa-reddit", "fa-reddit-square", "fa-stumbleupon-circle", "fa-stumbleupon", "fa-delicious", "fa-digg", "fa-pied-piper", "fa-pied-piper-alt", "fa-drupal", "fa-joomla", "fa-language", "fa-fax", "fa-building", "fa-child", "fa-paw", "fa-spoon", "fa-cube", "fa-cubes", "fa-behance", "fa-behance-square", "fa-steam", "fa-steam-square", "fa-recycle", "fa-automobile", "fa-car", "fa-cab", "fa-taxi", "fa-tree", "fa-spotify", "fa-deviantart", "fa-soundcloud", "fa-database", "fa-file-pdf-o", "fa-file-word-o", "fa-file-excel-o", "fa-file-powerpoint-o", "fa-file-photo-o", "fa-file-picture-o", "fa-file-image-o", "fa-file-zip-o", "fa-file-archive-o", "fa-file-sound-o", "fa-file-audio-o", "fa-file-movie-o", "fa-file-video-o", "fa-file-code-o", "fa-vine", "fa-codepen", "fa-jsfiddle", "fa-life-bouy", "fa-life-buoy", "fa-life-saver", "fa-support", "fa-life-ring", "fa-circle-o-notch", "fa-ra", "fa-rebel", "fa-ge", "fa-empire", "fa-git-square", "fa-git", "fa-y-combinator-square", "fa-yc-square", "fa-hacker-news", "fa-tencent-weibo", "fa-qq", "fa-wechat", "fa-weixin", "fa-send", "fa-paper-plane", "fa-send-o", "fa-paper-plane-o", "fa-history", "fa-circle-thin", "fa-header", "fa-paragraph", "fa-sliders", "fa-share-alt", "fa-share-alt-square", "fa-bomb", "fa-soccer-ball-o", "fa-futbol-o", "fa-tty", "fa-binoculars", "fa-plug", "fa-slideshare", "fa-twitch", "fa-yelp", "fa-newspaper-o", "fa-wifi", "fa-calculator", "fa-paypal", "fa-google-wallet", "fa-cc-visa", "fa-cc-mastercard", "fa-cc-discover", "fa-cc-amex", "fa-cc-paypal", "fa-cc-stripe", "fa-bell-slash", "fa-bell-slash-o", "fa-trash", "fa-copyright", "fa-at", "fa-eyedropper", "fa-paint-brush", "fa-birthday-cake", "fa-area-chart", "fa-pie-chart", "fa-line-chart", "fa-lastfm", "fa-lastfm-square", "fa-toggle-off", "fa-toggle-on", "fa-bicycle", "fa-bus", "fa-ioxhost", "fa-angellist", "fa-cc", "fa-shekel", "fa-sheqel", "fa-ils", "fa-meanpath", "fa-buysellads", "fa-connectdevelop", "fa-dashcube", "fa-forumbee", "fa-leanpub", "fa-sellsy", "fa-shirtsinbulk", "fa-simplybuilt", "fa-skyatlas", "fa-cart-plus", "fa-cart-arrow-down", "fa-diamond", "fa-ship", "fa-user-secret", "fa-motorcycle", "fa-street-view", "fa-heartbeat", "fa-venus", "fa-mars", "fa-mercury", "fa-intersex", "fa-transgender", "fa-transgender-alt", "fa-venus-double", "fa-mars-double", "fa-venus-mars", "fa-mars-stroke", "fa-mars-stroke-v", "fa-mars-stroke-h", "fa-neuter", "fa-genderless", "fa-facebook-official", "fa-pinterest-p", "fa-whatsapp", "fa-server", "fa-user-plus", "fa-user-times", "fa-hotel", "fa-bed", "fa-viacoin", "fa-train", "fa-subway", "fa-medium", "fa-yc", "fa-y-combinator", "fa-optin-monster", "fa-opencart", "fa-expeditedssl", "fa-battery-4", "fa-battery-full", "fa-battery-3", "fa-battery-three-quarters", "fa-battery-2", "fa-battery-half", "fa-battery-1", "fa-battery-quarter", "fa-battery-0", "fa-battery-empty", "fa-mouse-pointer", "fa-i-cursor", "fa-object-group", "fa-object-ungroup", "fa-sticky-note", "fa-sticky-note-o", "fa-cc-jcb", "fa-cc-diners-club", "fa-clone", "fa-balance-scale", "fa-hourglass-o", "fa-hourglass-1", "fa-hourglass-start", "fa-hourglass-2", "fa-hourglass-half", "fa-hourglass-3", "fa-hourglass-end", "fa-hourglass", "fa-hand-grab-o", "fa-hand-rock-o", "fa-hand-stop-o", "fa-hand-paper-o", "fa-hand-scissors-o", "fa-hand-lizard-o", "fa-hand-spock-o", "fa-hand-pointer-o", "fa-hand-peace-o", "fa-trademark", "fa-registered", "fa-creative-commons", "fa-gg", "fa-gg-circle", "fa-tripadvisor", "fa-odnoklassniki", "fa-odnoklassniki-square", "fa-get-pocket", "fa-wikipedia-w", "fa-safari", "fa-chrome", "fa-firefox", "fa-opera", "fa-internet-explorer", "fa-tv", "fa-television", "fa-contao", "fa-500px", "fa-amazon", "fa-calendar-plus-o", "fa-calendar-minus-o", "fa-calendar-times-o", "fa-calendar-check-o", "fa-industry", "fa-map-pin", "fa-map-signs", "fa-map-o", "fa-map", "fa-commenting", "fa-commenting-o", "fa-houzz", "fa-vimeo", "fa-black-tie", "fa-fonticons");

		sort($awesome_icons_array);
         
        // markup for form ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget title</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>">
			Layout:
			  <select name="<?php echo $this->get_field_name( 'layout' ); ?>" 
					  id="<?php echo $this->get_field_id( 'layout' ); ?>"
					class="widefat">
					<?php $array_layouts = array("circle transparent full-color-hover", 
												"diamond transparent full-color-hover", 
												"rectangle transparent full-color-hover", 
												"default circle", 
												"default diamond", 
												"default rectangle", 
												"circle transparent outlined", 
												"diamond transparent outlined", 
												"rectangle transparent outlined", 
												"circle outlined", 
												"diamond outlined", 
												"rectangle outlined", 
												"transparent border", 
												"transparent none", 
												"text monochrome", 
												"icon-text"); 
					foreach ($array_layouts as $list_layout) {
					?>
					<option <?php if ($instance[ 'layout' ] == $list_layout) echo 'selected="selected"' ?> value="<?php echo $list_layout; ?>"><?php echo $list_layout; ?></option>
					<?php } ?>

			  </select> 
			</label>
        </p>
		
		<?php
		for ($i = 1 ; $i < 10 ; $i++)
		{
			$icon = "icon_" . $i;
			$url = "url_" . $i;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'icon_' . $i ); ?>">
			Icon <?php echo $i; ?>:
			  <select name="<?php echo $this->get_field_name( 'icon_' . $i ); ?>" 
					  id="<?php echo $this->get_field_id( 'icon_' . $i ); ?>"
					class="widefat">
					<option value="">Select Icon</option>
			  <?php
				foreach($awesome_icons_array as $icon)
				{
					$icon_full = $icon;
					$icon = trim($icon);
					$icon = substr($icon, 3);
				?>
					<option <?php if ($instance[ 'icon_' . $i ] == $icon) echo 'selected="selected"' ?> value="<?php echo $icon; ?>"><?php echo $icon; ?></option>
				<?php
				}
				?>

			  </select> 
			</label>
        </p>
		
		<p>
            <label for="<?php echo $this->get_field_id( 'url_' . $i ); ?>">URL <?php echo $i; ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'url_' . $i ); ?>" name="<?php echo $this->get_field_name( 'url_' . $i ); ?>" value="<?php echo esc_attr( $$url ); ?>">
        </p>
		<?php
		}
		?>
                 
    <?php
    }
     
    function update( $new_instance, $old_instance ) {
     
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'layout' ] = strip_tags( $new_instance[ 'layout' ] );
 		for ($i = 1 ; $i < 10 ; $i++)
		{
			$instance[ 'icon_' . $i ] = strip_tags( $new_instance[ 'icon_' . $i ] );
			$instance[ 'url_' . $i ] = strip_tags( $new_instance[ 'url_' . $i ] );
		} 
        return $instance;
         
    }
     
    function widget( $args, $instance ) {
         
        // kick things off
        extract( $args );
        echo $before_widget;
		
		if ($instance['title'] != "") echo $before_title . $instance[ 'title' ] . $after_title;     
         
		?>
		<ul class="brankic-icons <?php echo $instance['layout']; ?>">	
		<?php 
			for ($i = 1 ; $i < 10 ; $i++) { 
			if ($instance[ 'icon_' . $i] != "") {
			if ($instance[ 'url_' . $i] == "") $instance[ 'url_' . $i] = "javascript:void()";
			if ($instance['layout'] != "text monochrome" && $instance['layout'] != "icon-text") {
			?>
				<li><a href="<?php echo $instance[ 'url_' . $i]; ?>" class=""><i class="fa fa-<?php echo $instance[ 'icon_' . $i]; ?>"></i></a></li>
			<?php 
			}
			else {
				if ($instance['layout'] == 'text monochrome'){
			?>
				<li><a href="<?php echo $instance[ 'url_' . $i]; ?>" class=""><?php echo $instance[ 'icon_' . $i]; ?></a></li>
			<?php			
				}
					
				if ($instance['layout'] == "icon-text"){
			?>
				<li><a href="<?php echo $instance[ 'url_' . $i]; ?>" class=""><i class="fa fa-<?php echo $instance[ 'icon_' . $i]; ?>"></i><span><?php echo $instance[ 'icon_' . $i]; ?></span></a></li>
			<?php
				}
				
			}
			}
			} 
		?>
		</ul>
		<?php
		echo $after_widget;  		
    }
     
}
?>
<?php
/*******************************************************************************
function brankic_register_icons_widget() - registers the widget.
*******************************************************************************/
?>
<?php
function brankic_register_icons_widget() {
 
    register_widget( 'Brankic_Icons_Widget' );
 
}
add_action( 'widgets_init', 'brankic_register_icons_widget' );
?>