<?php
/*
    TEMPLATE TAGS
    Custom tags that extends WordPress templates.
*/

if ( !function_exists( 'graciliano_posted_on' ) ) :
  // Shows post date and category.
  function graciliano_posted_on() {
    $posted_on = '';

    if ( is_sticky() ) :
      $sticky = '<span class="sticky-post">' . esc_html__( 'Pinned', 'graciliano' ) . '</span> &middot;';

      $posted_on .= $sticky;
    endif;

    $time_string = '<time class="post-date" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() )
    );

    $posted_on .= '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

    $categories_list = get_the_category_list( ' / ' );

    if( $categories_list && graciliano_categorized_blog() ) :
      $posted_on .= ' &middot; <span class="categories-list">' . $categories_list . '</span>';
    endif;

    echo '<span class="posted-on">' . $posted_on . '</span>';
  }
endif;

if( !function_exists( 'graciliano_byline' ) ) :
  // Shows the author byline.
  function graciliano_byline() {
    $author_link = '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>';

    $byline = sprintf( esc_html__( 'by %s', 'graciliano' ), $author_link );

    echo '<span class="byline">' . $byline . '</span>';
  }
endif;

if( !function_exists( 'graciliano_author_bio' ) ) :
  // Shows author bio in single posts.
  function graciliano_author_bio() {
    $author_link = '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>';
    $author_gravatar = get_avatar(
      get_the_author_meta( 'ID' ), // retrieve ID for author
      64, // the avatar size
      null, // we woun't use a placeholder image, use “mistery person” instead
      sprintf( esc_html__( 'Avatar for %s', 'graciliano' ), get_the_author() ),
      array( 'class'  =>  'author-avatar' )
    );

    $byline = sprintf( esc_html__( 'by %s', 'graciliano' ), $author_link );

    echo '<dl class="author-info">';
    echo '<dt class="author-byline">' . $byline . $author_gravatar . '</dt>';
    if( get_the_author_meta( 'description' ) ) {
      echo '<dd class="author-bio">' . get_the_author_meta( 'description' ) . '</dd>';
    }
    echo '</dl>';
  }
endif;

if( !function_exists( 'graciliano_entry_footer' ) ) :
  // Show tags and comments.
  function graciliano_entry_footer() {
    // Hide tags for pages.
    if( 'post' == get_post_type() ) :
      $tags_list = get_the_tag_list( esc_html_x( 'Tags: ', 'There is a space at the end of this string', 'graciliano'), esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'graciliano' ) );

      if( $tags_list ) :
        echo '<span class="tag-links">' . $tags_list . '</span>';
      endif;
    endif;

    if( comments_open() || get_comments_number() ) :
      echo '<span class="comments-count">';
      comments_popup_link(
        esc_html__( 'Leave a comment', 'graciliano' ),
        esc_html__( '1 Comment', 'graciliano' ),
        esc_html__( '%s Comments', 'graciliano' )
      );
      echo '</span>';
    endif;
  }
endif;

// The blog uses categories?
function graciliano_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'graciliano_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,
      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'graciliano_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so graciliano_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so graciliano_categorized_blog should return false.
    return false;
  }
}

// Cleaning the mess of the graciliano_categorized_blog().
function graciliano_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'graciliano_categories' );
}
add_action( 'edit_category', 'graciliano_category_transient_flusher' );
add_action( 'save_post',     'graciliano_category_transient_flusher' );

// Grab the first URI on a post.
function graciliano_post_link() {
  if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) ) :
    return get_permalink();
  else :
    return $matches[1];
  endif;
}

// Show a Genericon.
function graciliano_icon( $genericon_name ) {
  $genericon_name .= '.svg';
  $genericon_url = get_stylesheet_directory_uri() . '/assets/svg/' . $genericon_name;
  echo wp_remote_retrieve_body( wp_remote_get($genericon_url) );
}

function graciliano_get_icon( $genericon_name ) {
  $genericon_name .= '.svg';
  $genericon_url = get_stylesheet_directory_uri() . '/assets/svg/' . $genericon_name;
  return wp_remote_retrieve_body( wp_remote_get($genericon_url) );
}

// Social Menu
function graciliano_social_menu() { ?>
  <nav class="social-menu">
    <ul class="social-links">
      <?php if( get_theme_mod( 'rss_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'rss_url' )); ?>">
            <?php graciliano_icon( 'rss' ); ?> <span class="assistive-text"><?php esc_html_e( 'RSS Feed', 'graciliano' ); ?></span>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'facebook_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'facebook_url' )); ?>">
            <?php graciliano_icon( 'facebook' ); ?> <span class="assistive-text"><?php esc_html_e( 'Facebook', 'graciliano' ); ?></span>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'twitter_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'twitter_url' )); ?>">
            <?php graciliano_icon( 'twitter' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Twitter', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'tumblr_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'tumblr_url' )); ?>">
            <?php graciliano_icon( 'tumblr' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Tumblr', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'medium_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'medium_url' )); ?>">
            <?php graciliano_icon( 'medium' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Medium', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'instagram_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'instagram_url' )); ?>">
            <?php graciliano_icon( 'instagram' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Instagram', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'flickr_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'flickr_url' )); ?>">
            <?php graciliano_icon( 'flickr' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Flickr', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'youtube_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'youtube_url' )); ?>">
            <?php graciliano_icon( 'youtube' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'YouTube', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
      <?php if( get_theme_mod( 'vimeo_url' ) ) : ?>
        <li class="menu-item social-item">
          <a href="<?php echo esc_url( get_theme_mod( 'vimeo_url' )); ?>">
            <?php graciliano_icon( 'vimeo' ); ?>
            <span class="assistive-text"><?php esc_html_e( 'Vimeo', 'graciliano' ); ?>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
<?php
}

// Get the first video embed.
function graciliano_embedded_media() {
  global $post;

  $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
  $embeds = get_media_embedded_in_content( $content );

  if( !empty($embeds) ) {
    //return first embed
    return $embeds[0];
  } else {
    //No embeds found
    return false;
  }
}
?>
