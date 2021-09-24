<?php get_header(); ?>
	
	<!-- Content Area Strat Here -->
	<section class="rb-content-area">
		<div class="container">
			<div class="row">
				
				<!-- Blog Area Strat Here -->
				<div class="col-lg-8">
					<article id="post-<?php the_ID(); ?>" <?php post_class(array('rb-blog-area')); ?> >
						<?php
							if(have_posts()) : 
								while(have_posts()) : the_post();
							get_template_part('template-parts/main-content');
								endwhile;
							else:
								echo "esc_html __('No Posts Found','rb-blog-one')";
							endif;
						?>
						<div class="rb-home-blog-pagination">
							<?php the_posts_pagination( array(
									'prev_text' => __( '<i class="fas fa-long-arrow-alt-left"></i>', 'rb-blog-one' ),
									'next_text' => __( '<i class="fas fa-long-arrow-alt-right"></i>', 'rb-blog-one' ),
									'mid_size' => 2
							) ); ?>
						</div>
					</article>
				</div>
				<!-- Blog Area End Here -->
				
				<?php get_sidebar(); ?>
				
			</div>
		</div>
	</section>
	<!-- Content Area End Here -->
	
<?php get_footer(); ?>