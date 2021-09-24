<div class="rb-single-home-blog">
						
	<div class="rb-home-post-thumbnail">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('',array('class' => 'img-fluid', 'alt' => 'the_title();'));
			} else { ?>
			<img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/assets/img/noimage.png" alt="<?php the_title(); ?>" />
		<?php } ?>
	</div>
														
	<div class="rb-home-post-meta">
								
		<div class="rb-meta-categories">
			<span class="rb-post-meta-icon"><i class="fas fa-folder-open"></i></span>
			<span class="rb-post-meta-text"><?php the_category( ', ' ); ?></span>
		</div>
								
		<div class="rb-meta-author">
			<span class="rb-post-meta-icon"><i class="fas fa-user"></i></span>
			<span class="rb-post-meta-text"><a href="<?php echo esc_attr(  get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
		</div>
								
		<div class="rb-meta-date">
			<span class="rb-post-meta-icon"><i class="fas fa-clock"></i></span>
			<span class="rb-post-meta-text">
				<?php 
					$rb_archive_year  = get_the_time('Y'); 
					$rb_archive_month = get_the_time('m'); 
					$rb_archive_day   = get_the_time('d'); 
				?>
				<a href="<?php echo get_day_link( $rb_archive_year, $rb_archive_month, $rb_archive_day); ?>"><?php echo get_the_date('j F Y'); ?></a>			
			</span>
		</div>
								
		<div class="rb-meta-comments">
			<span class="rb-post-meta-icon"><i class="fas fa-comment"></i></span>
			<span class="rb-post-meta-text"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></span>
		</div>
		
		<?php
			if ( is_user_logged_in() ) {
		?>
			<div class="rb-meta-post-edit">
				<span class="rb-post-meta-icon"><i class="fas fa-pencil-alt"></i></span>
				<span class="rb-post-meta-text"><?php echo esc_url( edit_post_link('Edit This Post') ); ?></span>			
			</div>
		<?php
			}
		?>
								
	</div>							
							
	<div class="rb-home-post-title">
		<h2><a href="<?php esc_attr( the_permalink() );?>"><?php the_title();?></a></h2>		   
	</div>
							
	<div class="rb-home-post-content">
		<?php the_content();?>
	</div>
							
	<div class="rb-home-post-tags">
		Tags: <?php the_tags('', ''); ?>
	</div>
							
</div>