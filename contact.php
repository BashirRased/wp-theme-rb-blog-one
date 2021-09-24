<?php
/*
Template Name: Contact Page
*/
?>

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
				
				<div class="col-lg-6 contact-left">
					<h3>Get in touch</h3>
					<form action="#">
						<input type="text" placeholder="Enter Your Full Name" required />
						<input type="email" placeholder="Enter Your Email Address" required />
						<input type="text" placeholder="Subject" />
						<textarea placeholder="Enter Your Message" rows="7" required></textarea>
						<button type="submit">Send Message</button>
					</form>
				</div>
				
				<div class="col-lg-6 contact-right">
					<h3>Contact Me</h3>
					<div class="contact-phone">
						<strong>Phone:</strong><br />
						<div><?php echo get_theme_mod('phone_1'); ?></div>
						<div><?php echo get_theme_mod('phone_2'); ?></div>
					</div>
					
					<div class="contact-email">
						<strong>Email:</strong><br />
						<div><?php echo get_theme_mod('email_address_1'); ?></div>
						<div><?php echo get_theme_mod('email_address_2'); ?></div>
					</div>
					
					<div class="contact-address">
						<strong>Address:</strong><br />
						<div><?php echo get_theme_mod('address_line_1'); ?><br /><?php echo get_theme_mod('address_line_2'); ?></div>
					</div>
					
				</div>
				
				<!-- Blog Area End Here -->
				
			</div>
		</div>
	</section>
	<!-- Content Area End Here -->
	
<?php get_footer(); ?>