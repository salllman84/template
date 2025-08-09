<?php
/* Front Page */
get_header();
?>
<section class="home-hero">
<?php
$hero_q = new WP_Query(['posts_per_page'=>1]);
if($hero_q->have_posts()):
  while($hero_q->have_posts()): $hero_q->the_post(); ?>
    <h1 class="hero-title"><?php the_title(); ?></h1>
    <?php if(has_post_thumbnail()): ?><div class="thumb-wrap hero-thumb"><?php the_post_thumbnail('featured-16x9',['loading'=>'lazy','decoding'=>'async']); ?></div><?php endif; ?>
    <p class="meta"><?php echo esc_html( mgstyle_trim_excerpt() ); ?></p>
    <a class="btn btn-cta" href="<?php the_permalink(); ?>"><?php _e('Read latest','minimal-gstyle'); ?></a>
<?php
  endwhile;
  wp_reset_postdata();
endif; ?>
</section>
<section class="list">
<?php
$posts_q = new WP_Query(['posts_per_page'=>6, 'offset'=>1]);
if($posts_q->have_posts()):
  while($posts_q->have_posts()): $posts_q->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
      <?php if(has_post_thumbnail()): ?><div class="thumb-wrap"><?php the_post_thumbnail('card-thumb',['loading'=>'lazy','decoding'=>'async','sizes'=>'(max-width:600px) 100vw, 50vw']); ?></div><?php endif; ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="meta"><?php echo get_the_date('M j, Y'); ?><?php $cats=get_the_category(); if($cats){ echo ' • <span class="badge">'.esc_html($cats[0]->name).'</span>'; } ?></div>
      <p><?php echo esc_html( mgstyle_trim_excerpt() ); ?></p>
      <a class="btn btn-cta" href="<?php the_permalink(); ?>"><?php _e('Read','minimal-gstyle'); ?></a>
    </article>
<?php
  endwhile;
  wp_reset_postdata();
else: ?>
  <p class="meta"><?php _e('No posts yet','minimal-gstyle'); ?></p>
<?php endif; ?>
</section>
<section class="category-grid">
  <h2><?php _e('Browse Categories','minimal-gstyle'); ?></h2>
  <div class="chips">
  <?php
    $cats=get_categories(['number'=>6]);
    foreach($cats as $cat){
      echo '<a class="chip" href="'.esc_url(get_category_link($cat->term_id)).'">'.esc_html($cat->name).'</a> ';
    }
  ?>
  </div>
</section>
<?php get_footer(); ?>
