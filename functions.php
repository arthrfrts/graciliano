<?php
/*
    THEME FUNCTIONS
    Let's make this theme work, right?
*/
if( !function_exists( 'graciliano_setup' ) ) :

  // Registers support for WordPress theme features and sets up the theme defaults.
  function graciliano_setup() {
    // Graciliano i18n.
    load_theme_textdomain( 'graciliano', get_template_directory() . '/languages' );

    // RSS links in the head.
    add_theme_support( 'automatic-feed-links' );

    // WordPress-generated <title> tag.
    add_theme_support( 'title-tag' );

    // Featured Images.
    add_theme_support( 'post-thumbnails' );

    // Custom Image Sizes.
    add_image_size( 'graciliano-featured-image', 970, 595, true );
    add_image_size( 'graciliano-post-thumbnail', 300, 186, true );

    // Custom Menus.
    register_nav_menus( array(
      'primary-navigation'    =>  esc_html__( 'Primary Navigation', 'graciliano' ),
      'secondary-navigation'  =>  esc_html__( 'Top Menu', 'graciliano' )
    ) );

    // Custom Site Logo.
    add_theme_support( 'custom-logo', array(
      'height'      =>  125,
      'width'       =>  470,
      'flex-width'  =>  true,
      'flex-height'	=>	false,
      'header-text' =>  array( 'site-title', 'site-description
    ' )
    ) );

    // HTML5 overwrite of core markup.
    add_theme_support( 'html5', array(
      'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    // Post Formats.
    add_theme_support( 'post-formats', array(
      'aside', 'video', 'link', 'gallery'
    ) );
  }
endif;
add_action( 'after_setup_theme', 'graciliano_setup' );

// Content Width.
function graciliano_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'graciliano_content_width', 635 );
}
add_action( 'after_setup_theme', 'graciliano_content_width', 0 );

// Removes prepend text on Archive titles.
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  }
  return $title;

});

// Widget Areas
function graciliano_widgets_init() {

  // Main Sidebar
  register_sidebar( array(
    'name'          =>  esc_html__( 'Sidebar', 'graciliano' ),
    'id'            =>  'sidebar',
    'description'   =>  esc_html__( 'This sidebar appears on the side of the post listings (blog pages, archives and search results).', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  // Featured Sidebar
  register_sidebar( array(
    'name'          =>  esc_html__( 'Featured Widgets', 'graciliano' ),
    'id'            =>  'featured-widgets',
    'description'   =>  esc_html__( 'This widget area appears between the Featured Content and the posts in the home page, or in the footer in single pages.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  // Single-view Sidebar
  register_sidebar( array(
    'name'          =>  esc_html__( 'Single View Sidebar', 'graciliano' ),
    'id'            =>  'single',
    'description'   =>  esc_html__( 'Appears on the side of the posts.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  // Footer Widget Areas
  register_sidebar( array(
    'name'          =>  esc_html__( 'Footer Area #1', 'graciliano' ),
    'id'            =>  'footer-large-1',
    'description'   =>  esc_html__( 'The first, large, widget area on footer.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  register_sidebar( array(
    'name'          =>  esc_html__( 'Footer Area #2', 'graciliano' ),
    'id'            =>  'footer-narrow-2',
    'description'   =>  esc_html__( 'The second, narrow, widget area on footer.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  register_sidebar( array(
    'name'          =>  esc_html__( 'Footer Area #3', 'graciliano' ),
    'id'            =>  'footer-narrow-3',
    'description'   =>  esc_html__( 'The third, narrow, widget area on footer.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );

  register_sidebar( array(
    'name'          =>  esc_html__( 'Footer Area #4', 'graciliano' ),
    'id'            =>  'footer-large-4',
    'description'   =>  esc_html__( 'The fourth, large, widget area on footer.', 'graciliano' ),
    'before_widget' =>  '<section id="%1$s" class="widget %2$s">',
    'after_widget'  =>  '</section>',
    'before_title'  =>  '<h3 class="widget-title">',
    'after_title'   =>  '</h3>'
  ) );
}
add_action( 'widgets_init', 'graciliano_widgets_init' );

// Enqueue scripts and styles.
function graciliano_scripts() {
  // Load style.css
  wp_enqueue_style( 'graciliano-style', get_stylesheet_uri() );

  // Load theme scripts
  wp_enqueue_script( 'graciliano-compatibility', get_template_directory_uri() . '/assets/js/compatibility.js', array(), '20170404', true );

  if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'graciliano_scripts' );

// Custom Template Tags.
require get_template_directory() . '/inc/template-tags.php';

// Customizer functions.
require get_template_directory() . '/inc/customizer.php';

// Jetpack support.
require get_template_directory() . '/inc/jetpack.php';
?>
