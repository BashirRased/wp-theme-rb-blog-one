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
							<li>404</li>
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
					<article class="rb-blog-area">
						<div class="error-page">
							<h1>404</h1>
							<h4>Page Not Found</h4>
							<a href="<?php echo home_url('/'); ?>">Go Home Page</a>
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