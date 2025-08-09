<?php if ( post_password_required() ) return; if ( have_comments() ) : ?>
<section id="comments" class="container"><h3><?php comments_number('No Comments','1 Comment','% Comments'); ?></h3><ol class="commentlist"><?php wp_list_comments(); ?></ol><div class="pagination"><?php paginate_comments_links(); ?></div></section>
<?php endif; comment_form(); ?>
