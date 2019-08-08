<?php
/*
    FOOTER
    This template shows everything that is located after the content and main sidebar area.
*/
?>
    <footer class="site-footer">
      <?php if( !is_home() ): ?>
        <?php get_sidebar( 'featured-widgets' ); ?>
      <?php endif;?>

      <div class="footer-sidebars wrapper">
        <?php get_sidebar( 'footer' ); ?>
      </div>

      <div class="site-credits wrapper">
        <span class="platform-credits">
          <?php printf( esc_html__( 'Proudly powered by %s', 'graciliano' ), '<a href="https://wordpress.org" title="'. esc_html__( 'Blog tool, publishing platform, and CMS', 'graciliano' ) .'">' . esc_html__( 'WordPress', 'graciliano' ) . '</a>', 'graciliano' ); ?>
        </span>
        <span class="sep">/</span>
        <span class="designer-credits"><?php printf( esc_html__( 'Feito por %s.', 'graciliano' ), '<a rel="designer" title="'. esc_html__( 'Desenvolvedor front-end e consultor WordPress.', 'graciliano' ) .'" href="https://arthr.me/">Arthur</a>', 'graciliano' ); ?></span>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
