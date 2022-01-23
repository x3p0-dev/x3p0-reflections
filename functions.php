<?php

namespace X3P0\Profile;

// @todo - Clean up all these anonymous functions. :)

add_action( 'wp_enqueue_scripts', function() {
        wp_enqueue_style( 'x3p0-profile-fonts', fonts_url(), null, null );
        wp_enqueue_style( 'x3p0-profile-screen', get_stylesheet_uri(), null, null );
} );

add_action( 'admin_init', function() {
        add_editor_style( [
                get_stylesheet_uri(),
                fonts_url(),
        ] );
} );

add_action( 'init', function() {
        register_block_pattern_category( 'x3p0-profile', [
                'label' => __( 'X3P0 - Profile', 'x3p0-profile' )
        ] );

        add_pattern( 'default', [
                'title'   => __( 'Default', 'x3p0-profile' ),
                'content' => pattern( 'default' )
        ] );
} );

function fonts_url() {
        return 'https://fonts.googleapis.com/css2?%sfamily=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Mali&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&default=swap';
}

function pattern( string $slug = 'default' ) {
        return file_get_contents(
                get_theme_file_path( "patterns/{$slug}.php" )
        );
}

function add_pattern( string $slug, array $args = [] ) {
        register_block_pattern(
                "x3p0-profile/{$slug}",
                wp_parse_args( $args, [
                        'categories'    => [ 'x3p0-profile' ],
                	'viewportWidth' => 1520,
                        'blockTypes'    => [],
                        'content'       => ''
                ] )
        );
}
