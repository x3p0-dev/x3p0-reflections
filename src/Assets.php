<?php

namespace X3P0\Profile;

class Assets {

        public function boot() {

                add_action( 'init', [ $this, 'enqueueBlockStyles' ] );

                add_action( 'wp_enqueue_scripts', [ $this, 'enqueueAssets'] );

                add_action( 'enqueue_block_assets', [ $this, 'enqueueBlockAssets' ] );

                add_action( 'admin_init', [ $this, 'addEditorStyles' ] );
        }

        protected function fontsUrl() {
                return 'https://fonts.googleapis.com/css2?%sfamily=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Mali&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&default=swap';
        }

        /**
         * Enqueues block-specific styles so that they only load when the block
         * is in use.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueueBlockStyles() {

                $blocks = include get_parent_theme_file_path( 'src/config-block-styles.php' );

                foreach ( $blocks as $name ) {
                        $slug = str_replace( '/', '-', $name );

                        wp_enqueue_block_style( $name, [
                                'handle' => "x3p0-profile-block-{$slug}",
                                'src'    => get_theme_file_uri( "public/css/blocks/{$slug}.css" ),
                                'path'   => get_theme_file_path( "public/css/blocks/{$slug}.css" )
                        ] );
                }
        }

        public function enqueueAssets() {
                wp_enqueue_style( 'x3p0-profile-fonts', $this->fontsUrl(), null, null );
                wp_enqueue_style( 'x3p0-profile-screen', get_stylesheet_uri(), null, null );
        }

        public function enqueueBlockAssets() {

                // Unregister core theme styles.
                wp_deregister_style( 'wp-block-library-theme' );

                // Re-register core theme styles with an empty string. This is
                // necessary to get styles set up correctly.
                wp_register_style( 'wp-block-library-theme', '' );
        }

        public function addEditorStyles() {
                add_editor_style( [
                        get_stylesheet_uri(),
                        $this->fontsUrl(),
                ] );
        }
}
