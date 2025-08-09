</main>
<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — <?php bloginfo('description'); ?></div>
    <?php if (is_active_sidebar('footer-1')): ?><div class="widget-area"><?php dynamic_sidebar('footer-1'); ?></div><?php endif; ?>
  </div>
</footer>
<?php if ( get_theme_mod('mg_show_bottom_nav', true) ) : ?>
<nav class="bottom-nav" aria-label="<?php esc_attr_e('Mobile bottom navigation','minimal-gstyle'); ?>">
  <div class="wrap">
      <?php if ( has_nav_menu( 'bottom' ) ) {
        $locs = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locs['bottom'] );
        $items = wp_get_nav_menu_items( $menu->term_id );
        foreach ( (array) $items as $it ) {
          $title = esc_html( $it->title );
          $url   = esc_url( $it->url );
          $map   = strtolower( $title );
          $icon  = mgstyle_icon( in_array( $map, [ 'home', 'search', 'categories', 'profile', 'user', 'list', 'tags' ] ) ? $map : 'list' );
          echo '<a href="' . $url . '">' . $icon . '<span>' . $title . '</span></a>';
        }
      } else {
        echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . mgstyle_icon( 'home' ) . '<span>' . esc_html__( 'Home', 'minimal-gstyle' ) . '</span></a>';
        echo '<a href="' . esc_url( get_post_type_archive_link( 'post' ) ) . '">' . mgstyle_icon( 'list' ) . '<span>' . esc_html__( 'Posts', 'minimal-gstyle' ) . '</span></a>';
        echo '<a href="' . esc_url( get_search_link() ) . '">' . mgstyle_icon( 'search' ) . '<span>' . esc_html__( 'Search', 'minimal-gstyle' ) . '</span></a>';
        echo '<a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . mgstyle_icon( 'tag' ) . '<span>' . esc_html__( 'Topics', 'minimal-gstyle' ) . '</span></a>';
        echo '<a href="' . esc_url( wp_login_url() ) . '">' . mgstyle_icon( 'user' ) . '<span>' . esc_html__( 'Profile', 'minimal-gstyle' ) . '</span></a>';
      } ?>
    </div>
  </nav>
  <?php endif; ?>
  <button id="toTop" title="<?php esc_attr_e( 'Back to top', 'minimal-gstyle' ); ?>">↑</button>
  <?php wp_footer(); ?></body></html>
