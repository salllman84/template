<?php get_header(); ?>

<section class="hero">
  <div class="logo">404</div>
  <p class="meta"><?php esc_html_e( 'Sorry, that page could not be found.', 'minimal-gstyle' ); ?></p>
  <p>
    <a class="btn btn-cta" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'minimal-gstyle' ); ?></a>
  </p>
</section>

<?php get_footer(); ?>

