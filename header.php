<?php
/*
  THE HEADER
  This template calls the scripts and styles of the theme, and builds the header section of the site.
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="page" class="site-container">
      <a class="skip-link assistive-text" href="#content"><?php esc_html_e( 'Skip to content', 'graciliano' ); ?></a>

      <header class="site-header">
        <?php get_template_part( 'template-parts/header/navigation', 'top' ); ?>

        <div class="site-branding wrapper" role="banner">
          <?php if( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
          <?php endif; ?>

          <p><a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

          <?php $description = get_bloginfo( 'description', 'display' );
          if( $description || is_customize_preview() ) : ?>
          <span class="site-description"><?php echo $description; ?></span>
          <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/header/navigation', 'primary' ); ?>
      </header>
