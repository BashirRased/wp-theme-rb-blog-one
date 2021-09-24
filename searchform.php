<form action="<?php echo home_url('/'); ?>" method="get">
   <div class="rb-search-form">
	   <input type="text" name="s" value="<?php the_search_query(); ?>" />
	   <button type="submit"><i class="fas fa-search"></i></button>
   </div>
</form>