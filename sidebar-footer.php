<?php
/*
		NARROW SIDEBAR
    The first, narrow, sidebar in footer.
*/
$widget_options = array(
  'before_widget' =>  '<section class="widget %1$s">',
  'after_widget'  =>  '</section>',
  'before_title'  =>  '<h3 class="widget-title">',
  'after_title'   =>  '</h3>'
);
?>
<aside class="footer-sidebar-large widget-area">
  <?php if( is_active_sidebar( 'footer-large-1' ) ): ?>
    <?php dynamic_sidebar( 'footer-large-1' ); ?>
  <?php else: ?>
    <section class="widget widget_categories">
      <?php the_widget(
        'WP_Widget_Categories',
        array(
          'title'         =>  esc_html__( 'Categories', 'graciliano' ),
          'count'         =>  true,
          'hierarchical'  => true
        ),
        $widget_options
      ); ?>
    </section>
  <?php endif; ?>
</aside>

<aside class="footer-sidebar-narrow widget-area">
    <?php if( is_active_sidebar( 'footer-narrow-2' ) ): ?>
      <?php dynamic_sidebar( 'footer-narrow-2' ); ?>
    <?php else: ?>
      <?php the_widget(
        'WP_Widget_Recent_Posts',
        array(
          'title'   =>  esc_html__( 'Recent Posts', 'graciliano' ),
          'number'  =>  5
        ),
        $widget_options
      ); ?>
    <?php endif; ?>
</aside>

<aside class="footer-sidebar-narrow widget-area">
    <?php if( is_active_sidebar( 'footer-narrow-3' ) ): ?>
      <?php dynamic_sidebar( 'footer-narrow-3' ); ?>
    <?php else: ?>
      <?php the_widget(
        'WP_Widget_Archives',
        array(
          'title'   =>  esc_html__( 'Archives', 'graciliano' ),
          'count'  =>  true
        ),
        $widget_options
      ); ?>
    <?php endif; ?>
</aside>

<aside class="footer-sidebar-large widget-area">

    <?php if( is_active_sidebar( 'footer-large-4' ) ): ?>
      <?php dynamic_sidebar( 'footer-large-4' ); ?>
    <?php else: ?>
      <?php the_widget(
        'WP_Widget_Recent_Comments',
        array(
          'title'   =>  esc_html__( 'Recent Comments', 'graciliano' ),
          'number'  =>  5
        ),
        $widget_options
      ); ?>
    <?php endif; ?>
</aside>
