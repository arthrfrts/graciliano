<?php
/*
		FEATURED WIDGETS SIDEBAR
    Shown between the Featured Content area and the posts in front page, or before the footer in single posts and pages.
*/
?>
<div class="featured-sidebar">
  <div class="widget-area wrapper">
    <?php if( is_active_sidebar( 'featured-widgets' ) ): ?>
      <?php dynamic_sidebar( 'featured-widgets' ); ?>
    <?php else: ?>
      <?php the_widget(
        'WP_Widget_Tag_Cloud',
        array(
          'title'         =>  esc_html__( 'All Topics', 'graciliano' )
        ),
        array(
          'before_widget' =>  '<section class="widget %1$s">',
          'after_widget'  =>  '</section>',
          'before_title'  =>  '<h3 class="widget-title">',
          'after_title'   =>  '</h3>'
        )
      ); ?>
    <?php endif; ?>
  </div>
</div>
