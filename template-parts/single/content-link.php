<?php if( has_post_thumbnail() ): ?>
  <figure class="post-featured-image">
    <?php the_post_thumbnail(); ?>
  </figure>
<?php endif; ?>

<div class="content-area">
  <article class="<?php post_class(); ?>">

    <header class="page-header">
      <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

      <p class="page-meta"><?php graciliano_byline(); ?> &middot; <?php graciliano_posted_on(); ?></p>
    </header>

    <div class="page-content">
      <?php the_content( esc_html__( 'Continue reading&hellip;', 'graciliano' ) ); ?>

      <?php wp_link_pages( array(
        'before' => '<nav class="page-links">' .  esc_html__( 'Pages:', 'graciliano' ),
        'after'  => '</nav>',
      ) ); ?>
    </div>

    <footer class="page-footer">
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
