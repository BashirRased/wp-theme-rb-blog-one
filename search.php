<?php get_header(); ?>

	<!-- Breadcrumbs Area Strat Here -->
	<div class="rb-breadcrumbs-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="rb-breadcrumbs">
						<ul>
							<li><i class="fas fa-home"></i> <a href="<?php echo home_url('/'); ?>">Home</a></li>
							<li><i class="fas fa-long-arrow-alt-right"></i></li>
							<li>Search Results For: "<?php the_search_query(); ?>"</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumbs Area End Here -->
	
	<!-- Content Area Strat Here -->
	<section class="rb-content-area">
		<div class="container">
			<div class="row">
				
				<!-- Blog Area Strat Here -->
				<div class="col-lg-8">
					<article <?php post_class(array('rb-blog-area')); ?> >
						<?php
							if(have_posts()) : 
								while(have_posts()) : the_post();
							get_template_part('template-parts/main-content');
								endwhile;
							else:
								echo 'No Posts Found';
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