<?php
/**
 * Bootable interface.
 *
 * Defines the contract that bootable classes should utilize. Bootable classes
 * should have a `boot()` method with the singular purpose of "booting" the
 * action and filter hooks for that class. This keeps action/filter calls out of
 * the class constructor. Most bootable classes are meant to be single-instance
 * classes that get loaded once per page request.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

namespace X3P0\Profile\Contracts;

/**
 * Bootable interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Bootable {

	/**
	 * Boots the class by running `add_action()` and `add_filter()` calls.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot();
}
