<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
*
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 * 
 * @package RB Free Theme
 * @subpackage RB Blog One
 * @version RB Blog One 1.1.5
 * @since RB Blog One 1.1.4
 */
?>

<form action="<?php echo esc_url(home_url('/'));?>" method="get">
   <div class="rb-blog-one-search-form">
	   <input type="text" name="s" value="<?php the_search_query(); ?>" />
	   <button type="submit" class="rb-blog-one-search-btn"><i class="fas fa-search"></i></button>
   </div>
</form>
