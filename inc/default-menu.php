<?php

function default_header_menu(){
	echo '<ul>';
	if(is_user_logged_in()){
		?><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>/wp-admin/nav-menus.php">create a menu</a></li><?php
	}else{
		?><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>';<?php
	}	
	echo '</ul>';
}