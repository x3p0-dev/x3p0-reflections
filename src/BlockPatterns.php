<?php
/**
 * Block patterns handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

namespace X3P0\Reflections;

use Hybrid\Contracts\Bootable;

class BlockPatterns implements Bootable {

        /**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {
                add_action( 'init', [ $this, 'register' ] );
        }

        /**
	 * Registers custom block patterns and categories.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function register() {
		// Translators: %s is pattern category name.
                $label = __( 'X3P0: %s', 'x3p0-reflections' );

		// Registers a block pattern category type.
                if ( function_exists( 'register_block_pattern_category_type' ) ) {
                        $label = '%s';
                        register_block_pattern_category_type( 'x3p0', [
                                'label' => __( 'X3P0', 'x3p0-reflections' )
                        ] );
                }

		// Register block pattern categories.
                register_block_pattern_category( 'x3p0-reflections-cards', [
                        'label'         => sprintf( $label, __( 'Profile Cards', 'x3p0-reflections' ) ),
                        'categoryTypes' => [ 'x3p0' ]
                ] );

		// Register block patterns.
                $this->add( 'artist', [
                        'title' => __( 'Artist', 'x3p0-reflections' )
                ] );

                $this->add( 'chiemsee', [
                        'title' => __( 'Chiemsee', 'x3p0-reflections' )
                ] );

                $this->add( 'felix', [
                        'title' => __( 'Felix', 'x3p0-reflections' ),
                        'viewportWidth' => 1056
                ] );

                $this->add( 'gamer', [
                        'title' => __( 'Gamer', 'x3p0-reflections' )
                ] );

                $this->add( 'mondays', [
                        'title' => __( 'Mondays', 'x3p0-reflections' ),
                        'viewportWidth' => 1056
                ] );

                $this->add( 'mountain-field', [
                        'title' => __( 'Mountain Field', 'x3p0-reflections' )
                ] );

                $this->add( 'night-sky', [
                        'title' => __( 'Night Sky', 'x3p0-reflections' )
                ] );

                $this->add( 'notes-in-the-void', [
                        'title' => __( 'Notes in the Void', 'x3p0-reflections' )
                ] );

                $this->add( 'reeds', [
                        'title' => __( 'Reeds', 'x3p0-reflections' ),
                        'viewportWidth' => 1376
                ] );

                $this->add( 'reflections', [
                        'title' => __( 'Reflections', 'x3p0-reflections' )
                ] );
        }

        /**
         * Registers a block pattern.
         *
         * @since  1.0.0
         * @access public
         * @param  string  $slug
         * @param  array   $args
         * @return void
         */
        protected function add( string $slug, array $args = [] ) {

		// If no content is passed in, assume there is a corresponding
		// `/patterns/{$slug}.php` file and pull the content from there.
                $content = $args['content'] ?? $this->patternContent( $slug );

                register_block_pattern(
                        "x3p0-reflections/{$slug}",
                        wp_parse_args( $args, [
                                'categories'    => [ 'x3p0-reflections-cards' ],
                                'blockTypes'    => [ 'core/template-part/content' ],
                                'viewportWidth' => 672,
                                'content'       => $content
                        ] )
                );
        }

        /**
	 * Returns a pattern file's content.
	 *
	 * @since  1.0.0
	 * @access public
         * @param  string  $slug
	 * @return void
	 */
        protected function patternContent( string $slug ) {
                ob_start();
                include get_theme_file_path( "patterns/{$slug}.php" );
                return ob_get_clean();
        }
}
