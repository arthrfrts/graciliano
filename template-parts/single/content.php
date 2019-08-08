<header class="page-header">
  <p class="page-meta"><?php graciliano_posted_on(); ?></p>
  <?php the_post_thumbnail( 'graciliano-featured-image' ); ?>
  <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
</header>

<div class="content-area">
  <article <?php post_class() ?>>
      <div class="page-content">
        <?php the_content( esc_html__( 'Continue reading&hellip;', 'graciliano' ) ); ?>

        <?php wp_link_pages( array(
          'before' => '<nav class="page-links">' .  esc_html__( 'Pages:', 'graciliano' ),
          'after'  => '</nav>',
        ) ); ?>
      </div>

      <footer class="page-footer">
        <div class="author-widget">
          <?php graciliano_author_bio(); ?>
        </div>
        <?php graciliano_entry_footer(); ?>
      </footer>
  </article>

  <?php the_post_navigation(); ?>

  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  ?>
</div>
