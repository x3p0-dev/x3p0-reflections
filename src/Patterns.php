<?php

namespace X3P0\Profile;

class Patterns {

        public function boot() {
                add_action( 'init', [ $this, 'register' ] );
        }

        public function register() {
                register_block_pattern_category( 'x3p0-profile', [
                        'label' => __( 'X3P0 - Profile', 'x3p0-profile' )
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

        protected function pattern( string $slug = 'default' ) {
                ob_start();
                include( get_theme_file_path( "patterns/{$slug}.php" ) );
                $pattern = ob_get_contents();
                ob_end_clean();

                return $pattern;
        }

        protected function add( string $slug, array $args = [] ) {
                $content = $args['content'] ?? $this->pattern( $slug );
                register_block_pattern(
                        "x3p0-profile/{$slug}",
                        wp_parse_args( $args, [
                                'categories'    => [ 'x3p0-profile' ],
                                'blockTypes'    => [ 'core/template-part' ],
                                'viewportWidth' => 1366,
                                'content'       => $content
                        ] )
                );
        }
}
