<?php
/**
 * Block patterns handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

namespace X3P0\Profile;

use X3P0\Profile\Contracts\Bootable;

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
                $label = __( 'X3P0: %s', 'x3p0-profile' );

                if ( function_exists( 'register_block_pattern_category_type' ) ) {
                        $label = '%s';
                        register_block_pattern_category_type( 'x3p0-profile', [
                                'label' => __( 'X3P0', 'x3p0-profile' )
                        ] );
                }

                register_block_pattern_category( 'x3p0-profile-cards', [
                        'label'         => sprintf( $label, __( 'Cards', 'x3p0-profile' ) ),
                        'categoryTypes' => [ 'x3p0-profile' ]
                ] );

                $this->add( 'artist', [
                        'title' => __( 'Artist', 'x3p0-profile' ),
                        'viewportWidth' => 672
                ] );

                $this->add( 'chiemsee', [
                        'title' => __( 'Chiemsee', 'x3p0-profile' ),
                        'viewportWidth' => 672
                ] );

                $this->add( 'felix', [
                        'title' => __( 'Felix', 'x3p0-profile' ),
                        'viewportWidth' => 1056
                ] );

                $this->add( 'gamer', [
                        'title' => __( 'Gamer', 'x3p0-profile' ),
                        'viewportWidth' => 672
                ] );

                $this->add( 'notes-in-the-void', [
                        'title' => __( 'Notes in the Void', 'x3p0-profile' ),
                        'viewportWidth' => 672
                ] );

                $this->add( 'reflections', [
                        'title' => __( 'Reflections', 'x3p0-profile' ),
                        'viewportWidth' => 672
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

                $content = $args['content'] ?? $this->patternContent( $slug );

                register_block_pattern(
                        "x3p0-profile/{$slug}",
                        wp_parse_args( $args, [
                                'categories'    => [ 'x3p0-profile-cards' ],
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
