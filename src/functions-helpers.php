<?php
/**
 * Helper functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

namespace X3P0\Reflections;

use Hybrid\Mix\Mix;

/**
 * Mini container.  This allows us to set up single instances of our objects
 * without using the singleton pattern and gives third-party devs easy access to
 * the objects if they need to unhook actions/filters added by the classes.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $abstract
 * @return mixed
 */
function theme( string $abstract = '' ) {
	static $bindings = null;

	if ( is_null( $bindings ) ) {
		$bindings = [
			Assets::class => new Assets(
				new Mix(
					get_parent_theme_file_path( 'public' ),
					get_parent_theme_file_uri( 'public' )
				)
			),
			BlockPatterns::class  => new BlockPatterns(),
			BlockStyles::class    => new BlockStyles(),
			BlockTemplates::class => new BlockTemplates(),
			ImageSizes::class     => new ImageSizes()
		];

		foreach ( $bindings as $binding ) {
			$binding->boot();
		}
	}

	return $abstract ? $bindings[ $abstract ] : $bindings;
}
