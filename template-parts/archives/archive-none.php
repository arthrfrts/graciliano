<?php
/*
    THERE'S NOTHING IN HERE
    (The Template Part)
    For search results and archives that result in a nothingness.
*/
?>
<article class="page hentry no-results not-found">
  <header class="page-header">
    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'graciliano' ); ?></h1>
  </header>
  <div class="page-content">
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

      <p><?php printf( wp_kses( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'graciliano' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

    <?php else: ?>
      <?php if( is_search() ): ?>

        <p><?php  esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'graciliano' ); ?></p>

      <?php else: ?>

        <p><?php  esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'graciliano' ); ?></p>

      <?php endif; ?>

      <?php get_search_form(); ?>
    <?php endif; ?>
  </div>
</article>
