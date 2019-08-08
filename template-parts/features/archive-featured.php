<?php
/*
    FEATURES HANDLER
    Display featured posts on the front-page.
*/

$featured_posts = graciliano_get_featured_posts();
if( empty( $featured_posts ) ) {
  return;
}

foreach( $featured_posts as $post ) :
  setup_postdata( $post );

  // Now we show the featured posts with this template.
  get_template_part( 'template-parts/features/content', 'featured' );
endforeach;
wp_reset_postdata();
?>
