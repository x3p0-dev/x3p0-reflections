<?php
/**
 * Bootstraps the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

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
        'BlockPatterns',
        'BlockStyles',
        'BlockTemplates',
        'ImageSizes',
	'functions-helpers'
] );

# ------------------------------------------------------------------------------
# Bootstrap theme.
# ------------------------------------------------------------------------------
#
# Just runs a small bootstrapping routine.

theme();
