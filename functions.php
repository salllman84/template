<?php
function mgstyle_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  add_theme_support('custom-logo', ['height'=>80,'width'=>240,'flex-height'=>true,'flex-width'=>true]);
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
  register_nav_menus(['primary'=>__('Primary Menu','minimal-gstyle'),'bottom'=>__('Bottom Nav (mobile)','minimal-gstyle')]);
  add_image_size('featured-16x9', 1280, 720, true);
  add_image_size('card-thumb', 1200, 630, true);
}
add_action('after_setup_theme','mgstyle_setup');

function mgstyle_scripts(){
  wp_enqueue_style('mgstyle-style', get_stylesheet_uri(), [], '1.5.0');
  wp_enqueue_script('mgstyle-main', get_template_directory_uri().'/assets/js/main.js', [], '1.5.0', true);
  wp_localize_script('mgstyle-main','MG',['rest'=>esc_url_raw(rest_url()),'site'=>esc_url_raw(home_url('/')),'is_single'=>is_single()]);
}
add_action('wp_enqueue_scripts','mgstyle_scripts');

function mgstyle_customize_register($wp_customize){
  $wp_customize->add_panel('mgstyle_panel',['title'=>__('Minimal G-Style — Advanced UI','minimal-gstyle'),'priority'=>30]);
  // Global
  $wp_customize->add_section('mg_global',['title'=>__('Global','minimal-gstyle'),'panel'=>'mgstyle_panel']);
  foreach ([['mg_accent','#7ad321','Accent color 1'],['mg_accent2','#ff2d8d','Accent color 2']] as $c){
    $wp_customize->add_setting($c[0],['default'=>$c[1],'transport'=>'refresh','sanitize_callback'=>'sanitize_hex_color']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,$c[0],['label'=>__($c[2],'minimal-gstyle'),'section'=>'mg_global']));
  }
  $wp_customize->add_setting('mg_round',['default'=>16,'transport'=>'refresh','sanitize_callback'=>'absint']);
  $wp_customize->add_control('mg_round',['type'=>'range','section'=>'mg_global','label'=>__('Corner radius (px)','minimal-gstyle'),'input_attrs'=>['min'=>8,'max'=>24,'step'=>1]]);
  foreach (['sticky_header'=>'Sticky header','show_toc'=>'Show left Table of Contents (desktop/tablet)','show_breadcrumb'=>'Show category breadcrumb (desktop)','home_grid'=>'Use grid layout on Home','show_bottom_nav'=>'Show mobile bottom navigation','bottom_labels'=>'Mobile bottom nav: show labels'] as $k=>$label){
    $wp_customize->add_setting('mg_'.$k,['default'=>true,'transport'=>'refresh','sanitize_callback'=>'wp_validate_boolean']);
    $wp_customize->add_control('mg_'.$k,['type'=>'checkbox','section'=>'mg_global','label'=>__($label,'minimal-gstyle')]);
  }
  $wp_customize->add_setting('mg_thumb_ratio',['default'=>'16/9','transport'=>'refresh','sanitize_callback'=>'sanitize_text_field']);
  $wp_customize->add_control('mg_thumb_ratio',['type'=>'select','section'=>'mg_global','label'=>__('Card thumbnail ratio','minimal-gstyle'),'choices'=>['1/1'=>'1:1 square','4/3'=>'4:3 classic','16/9'=>'16:9 wide']]);

  foreach (['mobile'=>['w'=>680,'cols'=>1,'brand'=>20,'search'=>44,'feat'=>0],'tablet'=>['w'=>880,'cols'=>2,'brand'=>22,'search'=>46,'feat'=>0],'desktop'=>['w'=>1000,'cols'=>3,'brand'=>24,'search'=>48,'feat'=>0]] as $slug=>$d){
    $wp_customize->add_section('mg_'.$slug,['title'=>ucfirst($slug),'panel'=>'mgstyle_panel']);
    $wp_customize->add_setting('mg_'.$slug.'_maxw',['default'=>$d['w'],'transport'=>'refresh','sanitize_callback'=>'absint']);
    $wp_customize->add_control('mg_'.$slug.'_maxw',['type'=>'range','section'=>'mg_'.$slug,'label'=>__('Container width (px)','minimal-gstyle'),'input_attrs'=>['min'=>620,'max'=>1200,'step'=>10]]);
    $wp_customize->add_setting('mg_'.$slug.'_cols',['default'=>$d['cols'],'transport'=>'refresh','sanitize_callback'=>'absint']);
    $wp_customize->add_control('mg_'.$slug.'_cols',['type'=>'range','section'=>'mg_'.$slug,'label'=>__('Home grid columns','minimal-gstyle'),'input_attrs'=>['min'=>1,'max'=>4,'step'=>1]]);
    $wp_customize->add_setting('mg_'.$slug.'_brand',['default'=>$d['brand'],'transport'=>'refresh','sanitize_callback'=>'absint']);
    $wp_customize->add_control('mg_'.$slug.'_brand',['type'=>'range','section'=>'mg_'.$slug,'label'=>__('Brand text size (px)','minimal-gstyle'),'input_attrs'=>['min'=>16,'max'=>28,'step'=>1]]);
    $wp_customize->add_setting('mg_'.$slug.'_search',['default'=>$d['search'],'transport'=>'refresh','sanitize_callback'=>'absint']);
    $wp_customize->add_control('mg_'.$slug.'_search',['type'=>'range','section'=>'mg_'.$slug,'label'=>__('Search field height (px)','minimal-gstyle'),'input_attrs'=>['min'=>40,'max'=>56,'step'=>1]]);
    $wp_customize->add_setting('mg_'.$slug.'_feature_max',['default'=>$d['feat'],'transport'=>'refresh','sanitize_callback'=>'absint']);
    $wp_customize->add_control('mg_'.$slug.'_feature_max',['type'=>'range','section'=>'mg_'.$slug,'label'=>__('Single featured image max-height (px, 0 = auto)','minimal-gstyle'),'input_attrs'=>['min'=>0,'max'=>800,'step'=>20]]);
  }
}
add_action('customize_register','mgstyle_customize_register');

function mgstyle_custom_css(){
  $c1=get_theme_mod('mg_accent','#7ad321'); $c2=get_theme_mod('mg_accent2','#ff2d8d'); $round=absint(get_theme_mod('mg_round',16));
  $sticky=get_theme_mod('mg_sticky_header',true); $toc=get_theme_mod('mg_show_toc',true); $breadcrumb=get_theme_mod('mg_show_breadcrumb',true);
  $ratio=get_theme_mod('mg_thumb_ratio','16/9');
  $mods=['mobile','tablet','desktop']; $v=[];
  foreach($mods as $m){
    $v[$m]=[
      'maxw'=>absint(get_theme_mod("mg_{$m}_maxw", $m==='desktop'?1000:($m==='tablet'?880:680))),
      'cols'=>max(1,absint(get_theme_mod("mg_{$m}_cols", $m==='desktop'?3:($m==='tablet'?2:1)))),
      'brand'=>absint(get_theme_mod("mg_{$m}_brand", $m==='desktop'?24:($m==='tablet'?22:20))),
      'search'=>absint(get_theme_mod("mg_{$m}_search", $m==='desktop'?48:($m==='tablet'?46:44))),
      'feature'=>absint(get_theme_mod("mg_{$m}_feature_max",0)),
    ];
  }
  echo '<style id="mgstyle-vars">';
  echo ':root{--accent:'.esc_attr($c1).';--accent2:'.esc_attr($c2).';--round:'.esc_attr($round).'px;--thumb-ratio:'.esc_attr($ratio).';}';
  echo ':root{--maxw:'.$v['mobile']['maxw'].'px;--cols:'.$v['mobile']['cols'].';--brand-size:'.$v['mobile']['brand'].'px;--search-h:'.$v['mobile']['search'].'px;--feature-max:'.($v['mobile']['feature']?$v['mobile']['feature'].'px':'none').';}';
  echo '@media (min-width:680px){:root{--maxw:'.$v['tablet']['maxw'].'px;--cols:'.$v['tablet']['cols'].';--brand-size:'.$v['tablet']['brand'].'px;--search-h:'.$v['tablet']['search'].'px;--feature-max:'.($v['tablet']['feature']?$v['tablet']['feature'].'px':'none').';}}';
  echo '@media (min-width:1024px){:root{--maxw:'.$v['desktop']['maxw'].'px;--cols:'.$v['desktop']['cols'].';--brand-size:'.$v['desktop']['brand'].'px;--search-h:'.$v['desktop']['search'].'px;--feature-max:'.($v['desktop']['feature']?$v['desktop']['feature'].'px':'none').';}}';
  if(!$sticky) echo '.site-header{position:static} html{scroll-padding-top:0}';
  if(!$toc) echo '@media (min-width:900px){.toc{display:none!important}.post-layout{display:block}}';
  if(!$breadcrumb) echo '.cat-breadcrumb{display:none!important}';
  if(!get_theme_mod('mg_bottom_labels',true)) echo '.bottom-nav span{display:none} .bottom-nav a{padding:10px}';
  if(!get_theme_mod('mg_show_bottom_nav',true)) echo '.bottom-nav{display:none!important}';
  if(!get_theme_mod('mg_home_grid',true)) echo '.list{grid-template-columns:1fr!important}';
  echo '</style>';
}
add_action('wp_head','mgstyle_custom_css');

function mgstyle_icon($name='home'){
  $icons=[
    'home'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>',
    'search'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>',
    'list'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M8 6h13M8 12h13M8 18h13"/><circle cx="3.5" cy="6" r="1.5"/><circle cx="3.5" cy="12" r="1.5"/><circle cx="3.5" cy="18" r="1.5"/></svg>',
    'user'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="7" r="4"/><path d="M4 21c1.5-4 6-6 8-6s6.5 2 8 6"/></svg>',
    'tag'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M21 13 11 3H4v7l10 10 7-7Z"/><path d="M7.5 7.5h.01"/></svg>',
  ]; return $icons[$name] ?? $icons['home'];
}

function mgstyle_widgets_init(){ register_sidebar(['name'=>__('Footer Widgets','minimal-gstyle'),'id'=>'footer-1','before_widget'=>'<div class="widget">','after_widget'=>'</div>','before_title'=>'<h3 class="widget-title">','after_title'=>'</h3>']); }
add_action('widgets_init','mgstyle_widgets_init');

function mgstyle_trim_excerpt($text=''){ if($text==='') $text=get_the_excerpt(); $text=wp_strip_all_tags($text); return mb_strimwidth($text,0,180,'…'); }
function mgstyle_meta_description($post_id=null){ $post_id=$post_id?:get_the_ID(); $rm=get_post_meta($post_id,'rank_math_description',true); if($rm) return wp_strip_all_tags($rm); $yo=get_post_meta($post_id,'_yoast_wpseo_metadesc',true); if($yo) return wp_strip_all_tags($yo); return mgstyle_trim_excerpt(get_the_excerpt($post_id)); }
function mgstyle_primary_category($post_id=null){ $post_id=$post_id?:get_the_ID(); if(class_exists('WPSEO_Primary_Term')){ $pt=new WPSEO_Primary_Term('category',$post_id); $pid=$pt->get_primary_term(); if($pid&&!is_wp_error($pid)){ $term=get_term($pid); if($term&&!is_wp_error($term)) return $term; } } $cats=get_the_category($post_id); return $cats?$cats[0]:null; }
function mgstyle_category_trail($post_id=null){ $post_id=$post_id?:get_the_ID(); $primary=mgstyle_primary_category($post_id); if(!$primary) return []; $trail=[]; $t=$primary; while($t&&!is_wp_error($t)){ $trail[]=$t; if(!$t->parent) break; $t=get_term($t->parent,'category'); } return array_reverse($trail); }

function mgstyle_pagination(){ global $wp_query; $big=999999999; $links=paginate_links(['base'=>str_replace($big,'%#%',esc_url(get_pagenum_link($big))),'format'=>'?paged=%#%','current'=>max(1,get_query_var('paged')),'total'=>$wp_query->max_num_pages,'type'=>'array','prev_text'=>'«','next_text'=>'»']); if($links){ echo '<nav class="pagination" role="navigation" aria-label="'.esc_attr__( 'Posts Pagination', 'minimal-gstyle' ).'">'; foreach($links as $l) echo $l; echo '</nav>'; } }
