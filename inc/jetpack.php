<?php
/*
    JETPACK
    This file adds compatibility to certain Jetpack-powered features.
*/
function graciliano_jetpack_setup() {
  // Add support for Infinite Scroll.
  add_theme_support( 'infinite-scroll', array(
    'container' =>  'content-area',
    'type'    =>  'click',
    'render'  =>  'graciliano_infinite_scroll_render'
  ) );

  // Add support for Jetpack Responsive Videos.
  add_theme_support( 'responsive-videos' );

  // Add support for featured content.
  add_theme_support( 'featured-content', array(
    'filter'      =>  'graciliano_get_featured_posts',
    'max_posts'   =>  5,
    'post_types'  =>  'post'
  ) );
}
add_action( 'after_setup_theme', 'graciliano_jetpack_setup' );

// Custom render for Infinite Scroll.
function graciliano_infinite_scroll_render() {
  while( have_posts() ) : the_post();

    // This partial defines how the index (and search and archive) pages shows a post.
    get_template_part( 'template-parts/archives/archive', get_post_format() );

  endwhile;
}

// Featured posts handlers.
function graciliano_has_multiple_featured_posts() {
	$featured_posts = apply_filters( 'graciliano_get_featured_posts', array() );
	if ( is_array( $featured_posts ) && 1 < count( $featured_posts ) ) {
		return true;
	}
	return false;
}

function graciliano_get_featured_posts() {
	return apply_filters( 'graciliano_get_featured_posts', false );
}
?>
