<?php
/**
 * Registers post title block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

register_block_style( 'core/post-title', [
	'name' => 'bg-clip-text',
	'label' => __( 'Background Clip Text', 'x3p0-reflections' )
] );

register_block_style( 'core/post-title', [
	'name' => 'text-shadow-sm',
	'label' => __( 'Shadow: Small', 'x3p0-reflections' )
] );

register_block_style( 'core/post-title', [
	'name' => 'text-shadow-md',
	'label' => __( 'Shadow: Medium', 'x3p0-reflections' )
] );

register_block_style( 'core/post-title', [
	'name' => 'text-shadow-lg',
	'label' => __( 'Shadow: Large', 'x3p0-reflections' )
] );
