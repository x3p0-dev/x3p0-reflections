<?php
/**
 * Block styles handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

namespace X3P0\Profile;

use X3P0\Profile\Contracts\Bootable;

class BlockStyles implements Bootable {

        /**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {
                add_action( 'init', [ $this, 'register'] );
        }

        /**
	 * Registers custom block styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function register() {

		register_block_style( 'core/image', [
			'name' => 'polaroid',
			'label' => __( 'Polaroid', 'x3p0-profile' )
		] );

		register_block_style( 'core/image', [
			'name' => 'polaroid-tilt-left',
			'label' => __( 'Polaroid: Tilt Left', 'x3p0-profile' )
		] );

		register_block_style( 'core/image', [
			'name' => 'polaroid-tilt-right',
			'label' => __( 'Polaroid: Tilt Right', 'x3p0-profile' )
		] );

                register_block_style( 'core/list', [
                        'name' => 'padded',
                        'label' => __( 'Padded', 'x3p0-profile' )
                ] );

		// Social Links.

		register_block_style( 'core/social-links', [
		        'name'  => 'round',
		        'label' => __( 'Round', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
		        'name'  => 'round-width-50',
		        'label' => __( 'Round: 50% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
		        'name'  => 'round-width-100',
		        'label' => __( 'Round: 100% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
		        'name'  => 'round-outline',
		        'label' => __( 'Round Outline', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
		        'name'  => 'round-outline-width-50',
		        'label' => __( 'Round Outline: 50% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
		        'name'  => 'round-outline-width-100',
		        'label' => __( 'Round Outline: 100% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square',
			'label' => __( 'Square', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square-width-50',
			'label' => __( 'Square: 50% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square-width-100',
			'label' => __( 'Square: 100% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square-outline',
			'label' => __( 'Square Outline', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square-outline-width-50',
			'label' => __( 'Square Outline: 50% Width', 'x3p0-profile' )
		] );

		register_block_style( 'core/social-links', [
			'name'  => 'square-outline-width-100',
			'label' => __( 'Square Outline: 100% Width', 'x3p0-profile' )
		] );
        }
}
