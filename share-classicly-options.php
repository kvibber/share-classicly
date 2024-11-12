<?php

add_action( 'admin_init', 'share_classicly_settings_init' );

function share_classicly_settings_init(  ) { 
	load_plugin_textdomain('ktv-share-classicly');
	register_setting( 'reading', 'share_classicly_settings', 'share_classicly_settings_validate' );
	// todo use activation hook
	if( false === get_option( 'share_classicly_settings' ) ) { 
		add_option( 'share_classicly_settings' , array(
			'show_on_posts' => 'true',
			'show_on_pages' => 'true'
			)
		);
	}
	// todo update settings on upgrade/install

	add_settings_section(
		'share_classicly_settings', 
		__( 'Share Classicly', 'ktv-share-classicly' ), 
		'share_classicly_settings_section_callback', 
		'reading'
	);

	add_settings_field( 
		'share_text_setting_id', 
		__( 'Show share link on', 'ktv-share-classicly' ), 
		'share_classicly_text_selection_render', 
		'reading', 
		'share_classicly_settings' 
	);
}

// Merge current options with defaults
function share_classicly_get_options() {
	$options = get_option( 'share_classicly_settings', array());
	$defaults = array(
		'show_on_posts' => 'true',
		'show_on_pages' => 'true'
	);
	return array_merge( $defaults, $options );
}

// If the value is allowed, keep it
function share_classicly_settings_validate($input) {
	if ($input == null) {
		$input = array();
	}
	if ( (!array_key_exists('show_on_posts', $input) ) || $input['show_on_posts'] != 'true')
		$input['show_on_posts'] = 'false';
	if ( (!array_key_exists('show_on_pages', $input) ) || $input['show_on_pages'] != 'true')
		$input['show_on_pages'] = 'false';
	return $input;
}

function share_classicly_text_selection_render(  ) { 

	$options = share_classicly_get_options();
	?>
	<label><input type='checkbox' name='share_classicly_settings[show_on_posts]' <?php checked( $options['show_on_posts'] == 'true'); ?> value='true'><?php echo __('posts', 'ktv-share-classicly'); ?></label><br/>
	<label><input type='checkbox' name='share_classicly_settings[show_on_pages]' <?php checked( $options['show_on_pages'] == 'true'); ?> value='true'><?php echo __('pages', 'ktv-share-classicly'); ?></label><br/>
	<?php

}


function share_classicly_settings_section_callback(  ) { 
	//echo __( 'How should we prefill the share?', 'ktv-share-classicly' );
}



?>
