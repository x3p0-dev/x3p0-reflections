<?php
/**
 * Block styles handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

namespace X3P0\Reflections;

use Hybrid\Contracts\Bootable;

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

		// Gets all the block stylesheets.
                $files = glob( get_parent_theme_file_path( 'src/block-styles/*.php' ) );

                foreach ( $files as $file ) {
			include $file;
		}
        }
}
