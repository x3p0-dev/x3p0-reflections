<?php
/**
 * Registers quote block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

register_block_style( 'core/quote', [
	'name' => 'line-classic',
	'label' => __('Line: Classic', 'x3p0-reflections' )
] );

register_block_style( 'core/quote', [
	'name' => 'line-mark',
	'label' => __('Line: Mark', 'x3p0-reflections' )
] );

register_block_style( 'core/quote', [
	'name' => 'mark-background',
	'label' => __( 'Mark: Background', 'x3p0-reflections' )
] );
