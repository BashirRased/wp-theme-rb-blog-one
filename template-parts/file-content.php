<div class="rb-single-attachment-blog">
						
	<div class="rb-home-post-title">
		<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>		   
	</div>
	
	<div class="rb-home-post-thumbnail">
		<?php echo wp_get_attachment_image( get_the_ID(),"", "","" );  ?>
	</div>
							
	<div class="rb-home-post-content">
		<?php the_content();?>
	</div>
							
</div>