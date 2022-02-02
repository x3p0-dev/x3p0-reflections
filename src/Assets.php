<?php
/**
 * Template handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

namespace X3P0\Profile;

use X3P0\Profile\Contracts\Bootable;

class Assets implements Bootable {

        /**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {

                // Enqueue block-specific styles.
                add_action( 'init', [ $this, 'enqueueBlockStyles' ] );

                // Front-end only.
                add_action( 'wp_enqueue_scripts', [ $this, 'enqueueAssets'] );

                // Front-end and editor.
                add_action( 'enqueue_block_assets', [ $this, 'enqueueBlockAssets' ] );

                // Editor only.
                add_action( 'admin_init', [ $this, 'addEditorStyles' ] );
        }

        /**
	 * Returns the Google fonts URL.
         *
         * @todo Eventually, we'll move to the Web Fonts API.
         * @link https://github.com/WordPress/gutenberg/pull/36394
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        protected function fontsUrl() {
                return 'https://fonts.googleapis.com/css2?%sfamily=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Fuzzy+Bubbles:wght@400;700&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&default=swap';
        }

        /**
         * Enqueues block-specific styles so that they only load when the block
         * is in use. Block styles are stored under `/public/css/blocks`, and
	 * each file is named `{$block_namespace}-{$block_slug}.css`.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueueBlockStyles() {

		// Gets all the block stylesheets.
                $files = glob( get_parent_theme_file_path( 'public/css/blocks/*.css' ) );

                foreach ( $files as $file ) {

			// Gets the filename without the path or extension.
                        $name = str_replace( [
                                get_parent_theme_file_path( 'public/css/blocks/' ),
                                '.css'
                        ], '', $file );

			// Converts the filename to its associated block name.
                        $block = str_replace( 'core-', 'core/', $name );

			// Register the block style.
                        wp_enqueue_block_style( $block, [
                                'handle' => "x3p0-profile-block-{$name}",
                                'src'    => get_theme_file_uri( "public/css/blocks/{$name}.css?v=" . rand() ),
                                'path'   => get_theme_file_path( "public/css/blocks/{$name}.css" )
                        ] );
                }
        }

        /**
	 * Enqueue scripts/styles for the front end.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function enqueueAssets() {
                wp_enqueue_style( 'x3p0-profile-fonts', $this->fontsUrl(), null, null );
                wp_enqueue_style( 'x3p0-profile-screen', get_stylesheet_uri(), null, null );
        }

        /**
	 * Unregisters the core block editor assets on the front end and admin.
	 *
	 * @link   https://github.com/WordPress/gutenberg/issues/15007
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function enqueueBlockAssets() {

                // Unregister core theme styles.
                wp_deregister_style( 'wp-block-library-theme' );

                // Re-register core theme styles with an empty string. This is
                // necessary to get styles set up correctly.
                wp_register_style( 'wp-block-library-theme', '' );
        }

        /**
	 * Add editor stylesheets.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function addEditorStyles() {
                add_editor_style( [
                        get_stylesheet_uri(),
                        $this->fontsUrl(),
                ] );
        }
}
