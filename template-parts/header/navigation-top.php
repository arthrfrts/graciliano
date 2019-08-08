<div class="top-bar">
  <div class="wrapper">
    <nav class="secondary-navigation" role="navigation">
      <?php wp_nav_menu( array(
        'theme_location'  =>  'secondary-navigation',
        'menu_class'      =>  'top-menu'
      ) ); ?>
    </nav>

    <?php graciliano_social_menu(); ?>
  </div>
</div>
