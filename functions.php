<?php

namespace X3P0\Profile;

# ------------------------------------------------------------------------------
# Loading theme classes and files.
# ------------------------------------------------------------------------------
#
# Trying to keep this simple for now. May move to Composer later.

array_map( function( $file ) {
	require_once( get_parent_theme_file_path( "src/{$file}.php" ) );
}, [
        'Assets',
        'Images',
        'Patterns',
        'Styles',
        'Templates',
	'functions-helpers'
] );

# ------------------------------------------------------------------------------
# Bootstrap theme.
# ------------------------------------------------------------------------------
#
# Just runs a small bootstrapping routine.

theme();
