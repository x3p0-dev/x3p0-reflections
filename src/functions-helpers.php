<?php

namespace X3P0\Profile;

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
function theme( $abstract = '' ) {
	static $bindings = null;

	if ( is_null( $bindings ) ) {
		$bindings = [
			Assets::class    => new Assets(),
			Images::class    => new Images(),
			Patterns::class  => new Patterns(),
			Styles::class    => new Styles(),
			Templates::class => new Templates()
		];

		foreach ( $bindings as $binding ) {
			$binding->boot();
		}
	}

	return $abstract ? $bindings[ $abstract ] : $bindings;
}
