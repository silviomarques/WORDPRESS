<?php
	/**
	 * A unique identifier is defined to store the options in the database and reference them from the theme.
	 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
	 * If the identifier changes, it'll appear as if the options have been reset.
	*/
	function optionsframework_option_name() {

		// This gets the theme name from the stylesheet
		$themename = wp_get_theme();
		$themename = preg_replace("/\W/", "_", strtolower($themename) );

		$optionsframework_settings = get_option( 'optionsframework' );
		$optionsframework_settings['id'] = $themename;
		update_option( 'optionsframework', $optionsframework_settings );
	}

	
	/**
    * This is optional, Theme Customizer
	*/

	
	function countdown_customizer_live_preview()
	{
		wp_enqueue_script('countdown-themecustomizer',get_template_directory_uri().'/js/wp-live-css.js', array( 'jquery','customize-preview' ),'',true);
	}
	add_action( 'customize_preview_init', 'countdown_customizer_live_preview' );

	
	add_action( 'customize_register', 'countdown_customize_register' );
	function countdown_customize_register($wp_customize)
	{
		global $bgStyle;
		global $animationEasing;

		$wp_customize->add_section('countdown_logo', array(
			'title'    => __('Site logo', 'countdown'),
			'priority' => 1,
		)); 
		
		$wp_customize->add_setting('countdown[show_logo]', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
			'transport'   => 'postMessage', 
		));
		
	 	$wp_customize->add_control('countdown_show_logo', array(
			'settings' => 'countdown[show_logo]',
			'label'    => __('Show logo','countdown'),
			'section'  => 'countdown_logo',
			'type'     => 'checkbox',
			'std' => '0',
		));

		$wp_customize->add_setting('countdown[upload_logo]', array(
			'default'           => get_template_directory_uri().'/images/logo.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 	));
		
	 	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_logo', array(
			'label'    => __('Logo', 'countdown'),
			'section'  => 'countdown_logo',
			'settings' => 'countdown[upload_logo]',
		)));
		
		$wp_customize->add_setting('countdown[countdown_fav]', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 	));
		
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_fav', array(
			'label'    => __('Favicon', 'countdown'),
			'section'  => 'countdown_fav',
			'settings' => 'countdown[upload_fav]',
		)));
		
		$wp_customize->add_setting('countdown[background_start]', array(
			'default'           => '3CEAEE',
			'sanitize_callback' => '',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'background_start', array(
			'label'    => __('Background start', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[background_start]',
		)));
		
		$wp_customize->add_setting('countdown[wrap_background_start]', array(
			'default'           => 'ffffff',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrap_background_start', array(
			'label'    => __('Container Bckground Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[wrap_background_start]',
		)));
		
		$wp_customize->add_setting('countdown[wrap_text_color]', array(
			'default'           => '111111',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrap_text_color', array(
			'label'    => __('Text Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[wrap_text_color]',
		)));
	
		$wp_customize->add_setting('countdown[wrap_link_color]', array(
			'default'           => '2BA6CB',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrap_link_color', array(
			'label'    => __('Link Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[wrap_link_color]',
		)));
		
		$wp_customize->add_setting('countdown[wrap_link_hover_color]', array(
			'default'           => '222222',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrap_link_hover_color', array(
			'label'    => __('Link Hover Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[wrap_link_hover_color]',
		)));
		
		$wp_customize->add_setting('countdown[countdown_wrap_color]', array(
			'default'           => '222222',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'countdown_wrap_color', array(
			'label'    => __('Countdown Template Container Bg Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[countdown_wrap_color]',
		)));
		
		
		$wp_customize->add_setting('countdown[countdown_wrap_content_color]', array(
			'default'           => '3CEAEE',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
			'transport'   => 'postMessage',
	 
		));
		
	 	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'countdown_wrap_content_color', array(
			'label'    => __('Countdown Template Content Color', 'countdown'),
			'section'  => 'colors',
			'settings' => 'countdown[countdown_wrap_content_color]',
		)));
	
	}



	/**
	 * Defines an array of options that will be used to generate the settings page and be saved in the database.
	 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
	 *
	 * If you are making your theme translatable, you should replace 'options_framework_theme'
	 * with the actual text domain for your theme.  Read more:
	 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	*/
	$socialIcons = array(
		'twitter','google','skype','vimeo','facebook','flickr','youtube','dribbble','linkedin','pinterest','github'
	);

	function optionsframework_options() {
		
		global $socialIcons;
		global $bgStyle;
		global $animationEasing;


		// If using image radio buttons, define a directory path
		$imagepath =  get_template_directory_uri() . '/images/';
		$upload_dir = wp_upload_dir();

		$options = array();

		$options[] = array(
			'name' => __('Basic Settings', 'countdown'),
			'type' => 'heading'
		);
		
		$options[] = array(
			'name' => __('Site logo', 'countdown'),
			'desc' => __('Show / Hide site logo', 'countdown'),
			'id' => 'show_logo',
			'std' => '0',
			'type' => 'checkbox'
		);
		

		$options[] = array(
			'name' => __('Upload logo', 'countdown'),
			'id' => 'upload_logo',
			'std' => '',
			'type' => 'upload'
		);
		
		$options[] = array(
			'name' => __('Upload Favicon', 'countdown'),
			'id' => 'upload_fav',
			'std' => '',
			'type' => 'upload'
		);
		
		$options[] = array('type' => 'spacer');

		$options[] = array(
			'name' => __('Date', 'countdown'),
			'desc' => __('Set the date at which the countdown expires (format: mm/dd/yyyy)', 'countdown'),
			'id' => 'date_count',
			'std' => '01/01/2018',
			'class' => 'mini',
			'type' => 'text'
		);
		
		$options[] = array(
			'name' => __('Time', 'countdown'),
			'desc' => __('Set the time at which the countdown expires (format: hh:mm)', 'countdown'),
			'id' => 'time_count',
			'std' => '00:00',
			'class' => 'mini',
			'type' => 'text'
		);
		
		$options[] = array(
			'name' =>  __('Countdown Template Container Bg Color', 'countdown'),
			'id' => 'countdown_wrap_color',
			'std' => '#222222',
			'type' => 'color' 
		);	
		
		$options[] = array(
			'name' =>  __('Countdown Template Content Color', 'countdown'),
			'id' => 'countdown_wrap_content_color',
			'std' => '#3CEAEE',
			'type' => 'color' 
		);	

		

		$options[] = array('type' => 'spacer');
		
		
		$options[] = array(
			'name' => __('Light text', 'countdown'),
			'id' => 'light_text',
			'std' => get_bloginfo('name'),
			'type' => 'text'
		);
		
		$options[] = array(
			'name' => __('Dark text', 'countdown'),
			'id' => 'dark_text',
			'std' => __('COMING SOON', 'countdown'),
			'type' => 'text'
		);
		
		$options[] = array(
			'name' => __('Description', 'countdown'),
			'id' => 'desc_text',
			'std' => __('Very soon, our site will be open to visitors, we hope for your patience and understanding.', 'countdown'),
			'type' => 'textarea'
		);
		
		$options[] = array(
			'name' => __('Copyright text', 'countdown'),
			'id' => 'copyright_text',
			'std' => '&copy; Copyright 2014',
			'type' => 'text'
		);		
	 
		$options[] = array('type' => 'spacer');
		
		$options[] = array(
			'name' =>  __('Background Color', 'countdown'),
			'id' => 'background_start',
			'std' => '#3CEAEE',
			'type' => 'color' 
		);	

 
		$options[] = array('type' => 'spacer');
			
		$options[] = array(
			'name' =>  __('Container Bckground Color', 'countdown'),
			'id' => 'wrap_background_start',
			'std' => '#ffffff',
			'type' => 'color' 
		);	

		$options[] = array('type' => 'spacer');

		$options[] = array(
			'name' =>  __('Text Color', 'countdown'),
			'id' => 'wrap_text_color',
			'std' => '#111111',
			'type' => 'color' 
		);	
		
		$options[] = array('type' => 'spacer');
		
		$options[] = array(
			'name' =>  __('Link Color', 'countdown'),
			'id' => 'wrap_link_color',
			'std' => '#2BA6CB',
			'type' => 'color' 
		);	
		
		$options[] = array('type' => 'spacer');
		
		$options[] = array(
			'name' =>  __('Link Hover Color', 'countdown'),
			'id' => 'wrap_link_hover_color',
			'std' => '#222222',
			'type' => 'color' 
		);
		

		
		$options[] = array('type' => 'spacer');

		/* Social icon */
		$options[] = array(
			'name' => __('Social icon', 'countdown'),
			'type' => 'heading'
		);

		
		foreach ($socialIcons as $icon){	
		
			$options[] = array(
				'name' => '<span class="fa fa-'.$icon.'"></span>'.ucfirst($icon),
				'desc' => __('Set your url', 'countdown').' '.ucfirst($icon),
				'id'=> 'social_icon_'.$icon,
				'std' => '',
				'type' => 'text'
			);	
		}
		
		
		return $options;
	}