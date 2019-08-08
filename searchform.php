<?php
/*
    SEARCH FORM
    This template only loads the search form.
*/
?>
<form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
  <input type="search" class="search-field" id="search-terms" placeholder="<?php esc_attr_e( 'Search &hellip;', 'graciliano' ); ?>" name="s" value="<?php the_search_query(); ?>" />
  <button class="search-button" type="submit">
    <?php graciliano_icon( 'search' ); ?>
    <span class="assistive-text"><?php esc_html_e( 'Search', 'graciliano' ); ?></span>
  </button>
</form>
