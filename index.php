<?php get_header(); ?>
<section class="hero">
  <div class="logo"><?php bloginfo('name'); ?></div>
  <?php if (is_home() && get_bloginfo('description')): ?><p class="meta"><?php bloginfo('description'); ?></p><?php endif; ?>
</section>
<?php if (have_posts()): ?><section class="list">
<?php while (have_posts()): the_post(); ?><article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
<?php if (has_post_thumbnail()): ?><div class="thumb-wrap"><?php the_post_thumbnail('card-thumb',['loading'=>'lazy','decoding'=>'async','sizes'=>'(max-width:600px) 100vw, 50vw']); ?></div><?php endif; ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="meta"><?php echo get_the_date('M j, Y'); ?><?php $cats=get_the_category(); if($cats){ echo ' • <span class="badge">'.esc_html($cats[0]->name).'</span>'; } ?></div>
<p><?php echo esc_html( mgstyle_trim_excerpt() ); ?></p><a class="btn btn-cta" href="<?php the_permalink(); ?>">Read</a></article>
<?php endwhile; ?></section><?php mgstyle_pagination(); else: ?><p class="meta">No posts yet.</p><?php endif; ?><?php get_footer(); ?>
