<?php
/*
		THE SINGLE SIDEBAR
		Shown in single posts and pages.
*/
?>
<aside class="widget-area" role="complementary">
  <?php if( is_single() && (false == get_post_format()) && !(is_attachment()) ) : ?>
    <div class="author-widget">
      <?php graciliano_author_bio(); ?>
    </div>
  <?php endif; ?>
  <?php dynamic_sidebar( 'single' ); ?>
</aside>
