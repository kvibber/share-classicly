<?php
/*
 Plugin Name: Share Classicly
 Plugin URI: https://codeberg.org/kvibber/share-classicly
 Description: TODO
 Version: 0.1pre
 Requires at least: 3.0
 Requires CP: 1.0
 Requires PHP: 7.0
 Author: Kelson Vibber
 Author URI: https://kvibber.com
 License: GPLv2 or later  
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// ini_set('display_errors', '1'); ini_set('error_reporting', E_ALL);



function ktv_share_classicly_styles() {
	echo <<<END
	<style>
	.ktv-share-classicly {font-size: 0.8em}
	</style>
END;
}
add_action('wp_head','ktv_share_classicly_styles');


function ktv_share_classicly( $post_id ) {
	load_plugin_textdomain('ktv-share-classicly');
	
	// TODO: optionally use the excerpt along with/instead of the title.
	$queryParams = array(
		'url'  => get_permalink($post_id),
		'text' => get_post($post_id)->post_title
	);
	$shareLink = "https://shareopenly.org/share/?" . http_build_query($queryParams);

	// TODO optional pop-up instead of just opening in another tab.
	// TODO better phrasing, 
	$return = <<<EOT
		<div class="ktv-share-classicly">
		<a href="$shareLink" target="shareopenly" title="Share via ShareOpenly">Share this post on social media</a>.
		</div>
EOT;
	return $return;
}

// Add share link to single pages and posts unless it's password-protected and hasn't been opened.
function ktv_share_classicly_add_link( $content ) {
	if ( is_singular() && !post_password_required() ) {
		$content .= ktv_share_classicly( get_the_ID() );
	}
	return $content;
}

add_filter( 'the_content', 'ktv_share_classicly_add_link' );
?>
