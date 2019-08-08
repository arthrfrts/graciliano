<nav class="main-navigation" role="navigation">
  <a class="menu-toggle" href="#">
    <?php graciliano_icon( 'menu' );?> <span class="assistive-text"><?php esc_html_e( 'Menu', 'graciliano' ); ?></span>
  </a>

  <?php wp_nav_menu( array(
    'theme_location'  =>  'primary-navigation',
    'menu_class'      =>  'main-menu',
    'after'           =>  '<span class="expand-toggle">' . graciliano_get_icon( 'expand' ) . '</span>'
  ) ); ?>
</nav>
