<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content">Skip to content</a>
<div class="progress" id="progress"></div>
<header class="site-header" role="banner">
  <div class="container header-inner">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
      <?php if (function_exists('the_custom_logo') && has_custom_logo()) { the_custom_logo(); } ?>
      <span><?php bloginfo('name'); ?></span>
    </a>
    <nav class="primary-nav" aria-label="<?php esc_attr_e('Primary Menu','minimal-gstyle'); ?>">
      <?php wp_nav_menu([ 'theme_location' => 'primary', 'menu_class' => 'menu', 'container' => false ]); ?>
    </nav>
    <div class="suggest searchbar">
      <?php get_search_form(); ?><div id="mg-suggest" class="suggest-list" style="display:none"></div>
    </div>
    <div class="hamb"><button id="menuToggle" aria-expanded="false" aria-controls="mobileNav" aria-label="<?php esc_attr_e('Toggle navigation','minimal-gstyle'); ?>">☰</button></div>
  </div>
  <div id="mobileNav" class="mobile-panel" hidden>
    <div class="inner">
      <?php wp_nav_menu([ 'theme_location' => 'primary', 'container' => false, 'menu_class'=>'menu' ]); ?>
      <?php get_search_form(); ?>
    </div>
  </div>
  <div id="menuOverlay" class="menu-overlay" hidden></div>
</header>
<main id="content" class="container" role="main">
