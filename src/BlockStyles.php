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

class BlockStyles {

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

                register_block_style( 'core/list', [
                        'name' => 'padded',
                        'label' => __( 'Padded', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'circle-outline',
                        'label' => __( 'Circle Outline', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'rectangle',
                        'label' => __( 'Rectangle', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'rectangle-outline',
                        'label' => __( 'Rectangle Outline', 'x3p0-profile' )
                ] );
        }
}
