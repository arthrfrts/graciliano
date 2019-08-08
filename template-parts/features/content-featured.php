<?php
/*
    FEATURES TEMPLATE
    This template shows posts with special styling on front page.
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-article' ); ?>>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>">
    <?php
      if( has_post_thumbnail() ) :
        the_post_thumbnail();
      endif;
    ?>
  </a>

  <header class="post-header">
    <?php graciliano_posted_on(); ?>
    <?php the_title( '<h1 class="post-title"><a href="' . esc_url(get_the_permalink()) .  '">', '</a></h1>' ); ?>
    <?php graciliano_byline(); ?>
  </header>
</article>
