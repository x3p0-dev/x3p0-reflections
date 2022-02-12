<?php
/**
 * Registers paragraph block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

register_block_style( 'core/paragraph', [
	'name' => 'handwriting',
	'label' => __( 'Handwriting', 'x3p0-reflections' )
] );

register_block_style( 'core/paragraph', [
	'name' => 'indent',
	'label' => __( 'Indent', 'x3p0-reflections' )
] );

register_block_style( 'core/paragraph', [
	'name' => 'first-line-bold',
	'label' => __( 'First Line: Bold', 'x3p0-reflections' )
] );

register_block_style( 'core/paragraph', [
	'name' => 'first-line-small-caps',
	'label' => __( 'First Line: Small Caps', 'x3p0-reflections' )
] );
