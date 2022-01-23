<?php

namespace X3P0\Profile;

// @todo - Clean up all these anonymous functions. :)

add_action( 'enqueue_block_assets', function() {

        // Unregister core theme styles.
        wp_deregister_style( 'wp-block-library-theme' );

        // Re-register core theme styles with an empty string. This is
        // necessary to get styles set up correctly.
        wp_register_style( 'wp-block-library-theme', '' );
} );

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
                'title' => __( 'Default', 'x3p0-profile' )
        ] );

        add_pattern( 'gamer-girl', [
                'title' => __( 'Gamer Girl', 'x3p0-profile' )
        ] );

        add_pattern( 'notes', [
                'title' => __( 'Notes', 'x3p0-profile' )
        ] );
} );

add_action( 'init', function() {

        register_block_style( 'core/list', [
                'name' => 'padded',
                'label' => __( 'Padded', 'x3p0-profile' ),
                'inline_style' => '
                        ul.is-style-padded li + li,
                        ol.is-style-padded li + li {
                                margin-top: var( --wp--custom--spacing--2 );
                        }'
        ] );
} );

add_filter( 'default_template_types', function( $types ) {
        $types = [
                'index' => [
                        'title'       => __( 'Site', 'x3p0-profile' ),
                        'description' => __( 'The single template for editing the entire site.', 'x3p0-profile' )
                ]
        ];

        return $types;
} );

add_filter( 'default_wp_template_part_areas', function( $areas ) {
        $areas = [
                [
                        'area'        => 'content',
                        'label'       => __( 'Content', 'x3p0-profile' ),
                        'description' => __( 'Site content.', 'x3p0-profile' ),
                        'icon'        => 'layout',
                        'area_tag'    => 'div'
                ]
        ];

        return $areas;
} );

function fonts_url() {
        return 'https://fonts.googleapis.com/css2?%sfamily=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Mali&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&default=swap';
}

function pattern( string $slug = 'default' ) {
        ob_start();
        include( get_theme_file_path( "patterns/{$slug}.php" ) );
        $pattern = ob_get_contents();
        ob_end_clean();

        return $pattern;
}

function add_pattern( string $slug, array $args = [] ) {
        $content = $args['content'] ?? pattern( $slug );
        register_block_pattern(
                "x3p0-profile/{$slug}",
                wp_parse_args( $args, [
                        'categories'    => [ 'x3p0-profile' ],
                	'viewportWidth' => 1520,
                        'blockTypes'    => [ 'core/template-part' ],
                        'content'       => $content
                ] )
        );
}
