<?php get_header(); ?>

	<!-- Breadcrumbs Area Strat Here -->
	<div class="rb-breadcrumbs-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="rb-breadcrumbs">
						<ul>
							<li><i class="fas fa-home"></i> <a href<?php echo esc_url( home_url( '/' ) ); ?>Home</a></li>
							<li><i class="fas fa-long-arrow-alt-right"></i></li>
							<li><?php wp_title(''); ?></li>
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
					<article id="post-<?php the_ID(); ?>" <?php post_class(array('rb-blog-area')); ?> >
						<?php
							if(have_posts()) : 
								while(have_posts()) : the_post();
							get_template_part('template-parts/unsupported-file-content');
								endwhile;
							else:
								echo "esc_html __('No Posts Found','rb-blog-one')";
							endif;
						?>
					</article>
				</div>
				<!-- Blog Area End Here -->
				
				<?php get_sidebar(); ?>
				
			</div>
		</div>
	</section>
	<!-- Content Area End Here -->
	
<?php get_footer(); ?>