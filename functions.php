<?php
/**
 * Bootstraps the theme.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

namespace X3P0\Reflections;

# ------------------------------------------------------------------------------
# Autoload.
# ------------------------------------------------------------------------------
#
# Auto-load classes and files via the Composer autoloader.

if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( 'vendor/autoload.php' );
}

# ------------------------------------------------------------------------------
# Bootstrap theme.
# ------------------------------------------------------------------------------
#
# Just runs a small bootstrapping routine.

do_action( 'x3p0/reflections/booted', theme() );
