<?php get_header(); ?><?php if (have_posts()): while (have_posts()): the_post(); ?>
<article id="page-<?php the_ID(); ?>" <?php post_class('post'); ?>><h1><?php the_title(); ?></h1>
<?php if (has_post_thumbnail()): ?><div class="thumb-wrap"><?php the_post_thumbnail('featured-16x9',['loading'=>'lazy']); ?></div><?php endif; ?>
<div class="content entry-content"><?php the_content(); ?></div></article><?php endwhile; endif; ?><?php get_footer(); ?>
