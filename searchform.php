<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @package RB Blog
 * @subpackage RB Blog One
 * @since RB Blog 1.0.4
 */
?>

<form action="<?php echo esc_url(home_url('/'));?>" method="get">
   <div class="rb-search-form">
	   <input type="text" name="s" placeholder="<?php echo esc_attr(the_search_query());?>" />
	   <button type="submit" class="rb-search-btn"><i class="fas fa-search"></i></button>
   </div>
</form>