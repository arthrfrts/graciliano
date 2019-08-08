<?php
/*
    THE INDEX
    The most basic template file from this theme. The index defines what it's showing and sets which partial template file will handle this type of content.

    But first, we will get the header.
*/
?>

<?php get_header(); ?>

<?php if( is_home() ) : ?>
  <div id="featured-content" class="featured-container wrapper">
    <?php get_template_part( 'template-parts/features/archive', 'featured' ); ?>
  </div>
  <div class="featured-container wrapper">
    <?php get_sidebar( 'featured-widgets' ); ?>
  </div>
<?php endif; ?>

<main id="content" class="site-content wrapper">

  <div class="content-area post-list" role="content" id="content-area">
    <?php if( have_posts() ) : ?>

      <?php if( is_home() && !( is_front_page() ) ) : ?>
        <header class="page-header">
          <h1 class="page-title assistive-text"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>

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
