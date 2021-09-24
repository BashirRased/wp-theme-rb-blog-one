<div class="rb-single-page-blog">
						
	<div class="rb-home-post-thumbnail">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('',array('class' => 'img-fluid', 'alt' => 'the_title();'));
			} ?>
	</div>					
							
	<div class="rb-home-post-title">
		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>		   
	</div>
							
	<div class="rb-home-post-content">
		<?php the_content();?>
	</div>
	
	<div><?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?></div>
	
</div>