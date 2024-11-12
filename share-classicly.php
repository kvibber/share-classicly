<?php
/*
 Plugin Name: Share Classicly
 Plugin URI: https://codeberg.org/kvibber/share-classicly
 Description: Adds a link to the Share Openly service at the end of each post, connecting it to Mastodon, Bluesky, Threads and so forth.
 Version: 0.2
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
	
	$queryParams = array(
		'url'  => get_permalink($post_id),
		'text' => get_post($post_id)->post_title
	);
	$shareLink = "https://shareopenly.org/share/?" . http_build_query($queryParams);

	// TODO better phrasing
	$linkText  = __( 'Share this post on social media', 'ktv-share-classicly' );
	$linkTitle = __( 'Share via ShareOpenly', 'ktv-share-classicly' );

	$return = <<<EOT
		<div class="ktv-share-classicly">
		<a href="$shareLink" target="shareopenly" title="$linkTitle">$linkText</a>.
		</div>
EOT;
	return $return;
}



// Add share link to single pages and posts unless it's password-protected and hasn't been opened.
function ktv_share_classicly_add_link( $content ) {
	// TODO option to only show on posts and not pages or vice versa.
	if ( is_singular() && !post_password_required() ) {
		$content .= ktv_share_classicly( get_the_ID() );
	}
	return $content;
}

add_filter( 'the_content', 'ktv_share_classicly_add_link' );
?>
