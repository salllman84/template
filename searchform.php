<form role="search" method="get" class="searchbar" action="<?php echo esc_url( home_url('/') ); ?>">
  <label class="screen-reader-text" for="mg-search"><?php _e('Search for:','minimal-gstyle'); ?></label>
  <input id="mg-search" type="search" class="search-field" placeholder="<?php esc_attr_e('Search posts…','minimal-gstyle'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  <button type="submit"><?php _e('Search','minimal-gstyle'); ?></button>
</form>
