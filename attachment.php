<?php
/*
    THE ATTACHMENT
    This templeta handle how a post attachment is displayed.
*/
?>

<?php get_header(); ?>

<main class="wrapper site-content <?php if( get_post_format() ) : ?>content-container<?php endif; ?>">
  <?php
    // This theme shows posts with specific formats in a different way. So let's handle that with partials.
    if( have_posts() ):

      while( have_posts() ) : the_post(); ?>

      <figure class="post-featured-image">
        <?php the_attachment_link( get_the_ID(), true ); ?>
      </figure>

      <div class="content-area">
        <article class="<?php post_class(); ?>">
          <header class="page-header">
            <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

            <p class="page-meta">
              <?php
              if ( wp_attachment_is_image() ) {
								$metadata = wp_get_attachment_metadata();
								printf( esc_html__( 'Full size is %s pixels', 'graciliano' ),
									sprintf( '<a href="%1$s" title="%2$s">%3$s &times; %4$s</a>',
										esc_url( wp_get_attachment_url() ),
										esc_attr( esc_html__( 'Link to full-size image', 'graciliano' ) ),
										$metadata['width'],
										$metadata['height']
									)
								);
              }
              ?>
            </p>
          </header>

          <div class="page-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array(
              'before' => '<nav class="page-links">' .  esc_html__( 'Pages:', 'graciliano' ),
              'after'  => '</nav>',
            ) ); ?>
          </div>

          <footer class="page-footer">
            <?php graciliano_entry_footer(); ?>
          </footer>
        </article>

        <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
        ?>
      </div>

      <?php endwhile;

    else:

      get_template_part( 'template/parts/single/content', 'none' );

    endif;
  ?>

  <?php get_sidebar( 'single' ); ?>
</main>

<?php get_footer(); ?>
