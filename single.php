<?php get_header(); ?><?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="post-layout"><aside class="toc" aria-label="<?php esc_attr_e('Table of contents','minimal-gstyle'); ?>">
  <div class="toc-box"><h3><?php _e('On this page','minimal-gstyle'); ?></h3><ul id="toc-list"></ul></div></aside>
  <article id="post-<?php the_ID(); ?>" <?php post_class('post js-post'); ?>>
    <h1><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()): ?><?php the_post_thumbnail('featured-16x9',['class'=>'feature','loading'=>'lazy','decoding'=>'async','sizes'=>'(max-width:1000px) 100vw, 1000px']); ?><?php endif; ?>
    <?php $md = mgstyle_meta_description(get_the_ID()); if ($md): ?><div class="meta-desc"><?php echo esc_html($md); ?></div><?php endif; ?>
    <?php $trail = mgstyle_category_trail(get_the_ID()); if ($trail): ?><nav class="cat-breadcrumb hide-mobile" aria-label="<?php esc_attr_e('Breadcrumb','minimal-gstyle'); ?>"><span class="crumb">Blog</span>
      <?php foreach ($trail as $term): ?><span class="sep">→</span><a class="crumb" href="<?php echo esc_url(get_category_link($term->term_id)); ?>"><?php echo esc_html($term->name); ?></a><?php endforeach; ?></nav><?php endif; ?>
    <div class="content entry-content"><?php the_content(); ?></div>
    <div class="post-footer"><div><?php the_tags('<span class="badge">','</span> <span class="badge">','</span>'); ?></div><div><button id="copyLink" class="btn" data-url="<?php echo esc_url(get_permalink()); ?>"><?php _e('Copy Link','minimal-gstyle'); ?></button></div></div>
    <nav class="post-nav pagination" aria-label="<?php esc_attr_e('Post','minimal-gstyle'); ?>"><div><?php previous_post_link('%link','« '.__('Previous','minimal-gstyle')); ?></div><div><?php next_post_link('%link',__('Next','minimal-gstyle').' »'); ?></div></nav>
    <?php comments_template(); ?>
  </article></div><?php endwhile; endif; ?><?php get_footer(); ?>
