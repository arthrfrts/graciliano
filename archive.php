<?php
/*
    THE ARCHIVE
    The template that shows author, category, tag or date categories.
*/
?>

<?php get_header(); ?>

<main id="content" class="site-content wrapper">

  <div class="content-area post-list" role="content" id="content-area">

    <?php if( have_posts() ) : ?>

        <header class="page-header">
  				<?php
  					the_archive_title( '<h1 class="page-title">', '</h1>' );
  					the_archive_description( '<div class="taxonomy-description">', '</div>' );
  				?>
  			</header>

      <?php
        // Now, the loop.
        while( have_posts() ) : the_post();

          // This partial defines how the index (and search and archive) pages shows a post.
          get_template_part( 'template-parts/archives/archive', get_post_format() );

        endwhile;

        // And now, the post navigation.
        the_posts_navigation();
      ?>

    <?php else : ?>

      <?php
        // No posts, show a message about it.
        get_template_part( 'template-parts/archives/archive', 'none' );
      ?>

    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
