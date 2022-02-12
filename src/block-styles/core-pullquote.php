<?php
/**
 * Registers pullquote block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

register_block_style( 'core/pullquote', [
	'name' => 'mark-double',
	'label' => __( 'Mark: Double', 'x3p0-reflections' )
] );

register_block_style( 'core/pullquote', [
	'name' => 'mark-top',
	'label' => __( 'Mark: Top', 'x3p0-reflections' )
] );
