<?php
/*
    THE SINGLE
    This templeta handle single posts. If there's a post format set, we'll show the post accordingly; if not, let's show a great post.

    But first, we'll need the header.
*/
?>

<?php get_header(); ?>

<main class="wrapper site-content <?php if( get_post_format() ) : ?>content-container<?php endif; ?>">
  <?php
    // This theme shows posts with specific formats in a different way. So let's handle that with partials.
    if( have_posts() ):

      while( have_posts() ) : the_post();

        get_template_part( 'template-parts/single/content', get_post_format() );

      endwhile;

    else:

      get_template_part( 'template/parts/single/content', 'none' );

    endif;
  ?>

  <?php get_sidebar( 'single' ); ?>
</main>

<?php get_footer(); ?>
