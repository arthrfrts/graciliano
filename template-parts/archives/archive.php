<?php
/*
  THE ARCHIVE PARTIAL
  How the posts are listed on index, archive and search pages.
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="archive-container">
    <figure class="post-thumbnail">
      <a href="<?php the_permalink(); ?>" class="post-link">
        <?php if( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>
      </a>
    </figure>
    <header class="post-header">
      <?php graciliano_posted_on(); ?>

      <?php if( 'link' == get_post_format() ): ?>
        <?php the_title( '<h1 class="post-title"><a href="' . esc_url( graciliano_post_link() ) . '">', '</a></h1>' ); ?>
      <?php else: ?>
        <?php the_title( '<h1 class="post-title"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h1>' ); ?>
      <?php endif; ?>

      <?php graciliano_byline(); ?>
    </header>
  </div>
</article>
