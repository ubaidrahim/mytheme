<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
