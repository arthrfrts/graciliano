<?php
/*
    THEME CUSTOMIZER
*/

// Add postMessage support for site title and description for the Theme Customizer.
function graciliano_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  $wp_customize->add_section( 'social_links', array(
    'title'         => esc_html__('Social Links', 'graciliano'),
    'description'   => esc_html__('Show social links in the top bar of your site. Always prefix your links with &ldquo;http://&rdquo; or &ldquo;https://&rdquo;.', 'graciliano'),
    'capability'    => 'edit_theme_options'
  ) );

  // Social links
  $wp_customize->add_setting( 'rss_url',  array( 'type' => 'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'facebook_url', array( 'type' => 'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'twitter_url', array( 'type' => 'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'tumblr_url', array( 'type' => 'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'medium_url', array( 'type' => 'theme_mod',  'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'instagram_url', array( 'type' => 'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'flickr_url', array( 'type' =>  'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'youtube_url', array( 'type' =>  'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );
  $wp_customize->add_setting( 'vimeo_url', array( 'type' =>  'theme_mod', 'sanitize_callback' => 'esc_url_raw' ) );

  $wp_customize->add_control( 'rss_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Feed URL', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  esc_html__( 'URL from this site feed, or FeedBurner', 'graciliano' ),
    )
  ) );

  $wp_customize->add_control( 'facebook_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Facebook', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://www.facebook.com/',
    )
  ) );

  $wp_customize->add_control( 'twitter_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Twitter', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://twitter.com/',
    )
  ) );

  $wp_customize->add_control( 'tumblr_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Tumblr', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://www.tumblr.com/',
    )
  ) );

  $wp_customize->add_control( 'medium_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Medium', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://medium.com/',
    )
  ) );

  $wp_customize->add_control( 'instagram_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Instagram', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://www.instagram.com/',
    )
  ) );

  $wp_customize->add_control( 'flickr_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Flickr', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://www.flickr.com/',
    )
  ) );

  $wp_customize->add_control( 'youtube_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'YouTube', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://youtube.com/',
    )
  ) );

  $wp_customize->add_control( 'vimeo_url', array(
    'type'          =>  'text',
    'priority'      =>  10, // Within the section.
    'section'       =>  'social_links', // Required, core or custom.
    'label'         =>  esc_html__( 'Vimeo', 'graciliano' ),
    'input_attrs'   =>  array(
      'placeholder' =>  'https://vimeo.com/',
    )
  ) );
}
add_action( 'customize_register', 'graciliano_customize_register' );

 // Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
function graciliano_customize_preview_js() {
	wp_enqueue_script( 'graciliano_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'graciliano_customize_preview_js' );
