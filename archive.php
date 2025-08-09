<?php get_header(); ?>

<header class="hero">
  <div class="logo"><?php the_archive_title(); ?></div>
  <p class="meta"><?php the_archive_description(); ?></p>
</header>

<?php if ( have_posts() ) : ?>
  <section class="list">
    <?php while ( have_posts() ) : the_post(); ?>
      <article class="card">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="thumb-wrap"><?php the_post_thumbnail( 'card-thumb', [ 'loading' => 'lazy', 'decoding' => 'async' ] ); ?></div>
        <?php endif; ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="meta"><?php printf( esc_html__( 'Published %s', 'minimal-gstyle' ), get_the_date( 'M j, Y' ) ); ?></div>
        <p><?php echo esc_html( mgstyle_trim_excerpt() ); ?></p>
        <a class="btn btn-cta" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read', 'minimal-gstyle' ); ?></a>
      </article>
    <?php endwhile; ?>
  </section>
  <?php mgstyle_pagination(); ?>
<?php else : ?>
  <p class="meta"><?php esc_html_e( 'No posts found.', 'minimal-gstyle' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
