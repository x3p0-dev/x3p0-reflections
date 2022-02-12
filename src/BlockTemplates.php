<?php
/**
 * Template handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-reflections
 */

namespace X3P0\Reflections;

use Hybrid\Contracts\Bootable;

class BlockTemplates implements Bootable {

        /**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {
                add_filter( 'default_wp_template_part_areas', [ $this, 'templatePartAreas' ] );
        }

        /**
	 * Adds custom template part areas.
	 *
	 * @since  1.0.0
	 * @access public
         * @param  array  $areas
	 * @return array
	 */
        public function templatePartAreas( $areas ) {
                $areas[] = [
                        'area'        => 'content',
                        'label'       => __( 'Content', 'x3p0-reflections' ),
                        'description' => __( 'The Content template defines a page area that contains the site content.', 'x3p0-reflections' ),
                        'icon'        => 'layout',
                        'area_tag'    => 'div'
                ];

                return $areas;
        }
}
