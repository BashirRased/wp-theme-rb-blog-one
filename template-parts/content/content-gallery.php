<?php
/**
 * Blog Content Parts - Gallery.
 *
 * @package RB_Themes
 * @subpackage RB_Blog_One
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_meta_list_blog = '';
$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single' );

$gallery_img_1 = '';
if ( function_exists( 'get_field' ) && get_field( 'rbth_post_gallery_img_1' ) ) {
	$gallery_img_1 = get_field( 'rbth_post_gallery_img_1' );
}

$gallery_img_2 = '';
if ( function_exists( 'get_field' ) && get_field( 'rbth_post_gallery_img_2' ) ) {
	$gallery_img_2 = get_field( 'rbth_post_gallery_img_2' );
}

$gallery_img_3 = '';
if ( function_exists( 'get_field' ) && get_field( 'rbth_post_gallery_img_3' ) ) {
	$gallery_img_3 = get_field( 'rbth_post_gallery_img_3' );
}

$gallery_img_4 = '';
if ( function_exists( 'get_field' ) && get_field( 'rbth_post_gallery_img_4' ) ) {
	$gallery_img_4 = get_field( 'rbth_post_gallery_img_4' );
}

$gallery_img_5 = '';
if ( function_exists( 'get_field' ) && get_field( 'rbth_post_gallery_img_5' ) ) {
	$gallery_img_5 = get_field( 'rbth_post_gallery_img_5' );
}

if ( $gallery_img_1 || $gallery_img_2 || $gallery_img_3 || $gallery_img_4 || $gallery_img_5 ) {
	$gallery_img = '1';
} else {
	$gallery_img = '0';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single-item' ); ?>>

	<!-- Post Meta Top -->
	<?php if ( true === get_theme_mod( 'rbth_post_meta_blog_top' ) ) : ?>
		<div class="post-meta-top">
			<?php do_action( 'rb_blog_one_post_meta_top' ); ?>
		</div>
	<?php endif; ?>

	<!-- Post Thumbnail -->
	<?php
	if ( has_post_thumbnail() ) {
		do_action( 'rb_blog_one_post_thumbnail' );
	}
	?>

	<!-- Post Title -->
	<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

	<!-- Enable/Disable Post Meta -->
	<?php
	if ( true == get_theme_mod( 'rbth_post_meta_single' ) ) :

		// Post Meta List
		$post_meta_list_blog = get_theme_mod( 'rbth_post_meta_list_single_post' );
		if ( $post_meta_list_blog ) :
			?>
	<div class="post-meta">
			<?php
			foreach ( $post_meta_list_blog as $post_meta_item_blog ) {
				if ( $post_meta_item_blog == 'author-meta' ) {
					do_action( 'rb_blog_one_author_meta' );
				}
				if ( $post_meta_item_blog == 'date-meta' ) {
					do_action( 'rb_blog_one_date_meta' );
				}
				if ( $post_meta_item_blog == 'comments-meta' ) {
					do_action( 'rb_blog_one_comments_meta' );
				}
				if ( $post_meta_item_blog == 'edit-meta' && is_user_logged_in() && current_user_can( 'edit_posts' ) ) {
					do_action( 'rb_blog_one_edit_meta' );
				}
			}
			?>
	</div>
		<?php endif; else : ?>
	<div class="post-meta">
			<?php
			do_action( 'rb_blog_one_author_meta' );
			do_action( 'rb_blog_one_date_meta' );
			do_action( 'rb_blog_one_comments_meta' );
			do_action( 'rb_blog_one_edit_meta' );
			?>
	</div>
	<?php endif; ?>

	<!-- Post Content -->
	<?php if ( get_the_content() ) : ?>
		<div class="post-content">
			<?php if ( $gallery_img == '1' ) : ?>
			<div class="swiper post-img-gallery">
				<div class="swiper-wrapper">
					<!-- Gallery Image 01 -->
					<?php if ( ! empty( $gallery_img_1 ) ) : ?>
						<figure class="swiper-slide">
							<img src="<?php echo esc_url( $gallery_img_1['url'] ); ?>">
						</figure>
					<?php endif; ?>

					<!-- Gallery Image 02 -->
					<?php if ( ! empty( $gallery_img_2 ) ) : ?>
						<figure class="swiper-slide">
							<img src="<?php echo esc_url( $gallery_img_2['url'] ); ?>">
						</figure>
					<?php endif; ?>

					<!-- Gallery Image 03 -->
					<?php if ( ! empty( $gallery_img_3 ) ) : ?>
						<figure class="swiper-slide">
							<img src="<?php echo esc_url( $gallery_img_3['url'] ); ?>">
						</figure>
					<?php endif; ?>

					<!-- Gallery Image 04 -->
					<?php if ( ! empty( $gallery_img_4 ) ) : ?>
						<figure class="swiper-slide">
							<img src="<?php echo esc_url( $gallery_img_4['url'] ); ?>">
						</figure>
					<?php endif; ?>   
					
					<!-- Gallery Image 05 -->
					<?php if ( ! empty( $gallery_img_5 ) ) : ?>
						<figure class="swiper-slide">
							<img src="<?php echo esc_url( $gallery_img_5['url'] ); ?>">
						</figure>
					<?php endif; ?>
				</div>

				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
				<?php
			endif;
			the_content();
			?>
		</div>
	<?php endif; ?>

	<!-- Post Page List -->
	<?php
	do_action( 'rb_blog_one_single_page_pagination' );
	?>

</article>

<?php if ( has_tag() ) : ?>
<!-- Post Meta Bottom -->
<div class="post-meta-bottom">
	<?php do_action( 'rb_blog_one_post_meta_bottom' ); ?>
</div>
<?php endif; ?>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>