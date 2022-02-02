<?php
/**
 * Image size handling.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2022 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-profile
 */

namespace X3P0\Profile;

use X3P0\Profile\Contracts\Bootable;

class ImageSizes implements Bootable {

        /**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function boot() {
                add_action( 'init', [ $this, 'addImageSizes' ] );
                add_filter( 'image_size_names_choose', [ $this, 'imageSizeNamesChoose' ] );
        }

        /**
	 * Registers custom image sizes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
        public function addImageSizes() {

		// 16:9 - Landscape.
		add_image_size( 'x3p0-profile-16x9-md',  640,  360, true );
		add_image_size( 'x3p0-profile-16x9-lg', 1024,  576, true );
		add_image_size( 'x3p0-profile-16x9-xl', 2048, 1152, true );

		// 21:9 - Landscape.
		add_image_size( 'x3p0-profile-21x9-md',  640, 274, true );
		add_image_size( 'x3p0-profile-21x9-lg', 1024, 432, true );
		add_image_size( 'x3p0-profile-21x9-xl', 2048, 864, true );

		// 9:16 - Portrait.
                add_image_size( 'x3p0-profile-9x16-md',  640, 1138, true );
                add_image_size( 'x3p0-profile-9x16-lg', 1024, 1820, true );
                add_image_size( 'x3p0-profile-9x16-xl', 2048, 3641, true );

		// 2:3 - Portrait.
                add_image_size( 'x3p0-profile-2x3-lg',   640,  960, true );
                add_image_size( 'x3p0-profile-2x3-lg',  1024, 1536, true );
                add_image_size( 'x3p0-profile-2x3-lg',  2048, 3072, true );

		// Square.
                add_image_size( 'x3p0-profile-1x1-md',  640,  640, true );
                add_image_size( 'x3p0-profile-1x1-lg', 1024, 1024, true );
                add_image_size( 'x3p0-profile-1x1-xl', 2048, 2048, true );
        }

        /**
	 * Filters the image size dropdown in the editor so our custom sizes
         * appear for selection.
	 *
	 * @since  1.0.0
	 * @access public
         * @param  array  $sizes
	 * @return array
	 */
        public function imageSizeNamesChoose( $sizes ) {

		// 16:9 - Landscape.
                $sizes[ 'x3p0-profile-16x9-md'] = __( '16:9 (Landscape) - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-16x9-lg'] = __( '16:9 (Landscape) - Large',  'x3p0-profile' );
                $sizes[ 'x3p0-profile-16x9-xl'] = __( '16:9 (Landscape) - XL',     'x3p0-profile' );

		// 21:9 - Landscape.
                $sizes[ 'x3p0-profile-21x9-md'] = __( '21:9 (Landscape) - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-21x9-lg'] = __( '21:9 (Landscape) - Large',  'x3p0-profile' );
                $sizes[ 'x3p0-profile-21x9-xl'] = __( '21:9 (Landscape) - XL',     'x3p0-profile' );

		// 9:16 - Portrait
                $sizes[ 'x3p0-profile-9x16-md'] = __( '9:16 (Portrait) - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-9x16-lg'] = __( '9:16 (Portrait) - Large',  'x3p0-profile' );
                $sizes[ 'x3p0-profile-9x16-xl'] = __( '9:16 (Portrait) - XL',     'x3p0-profile' );

		// 2:3 - Portrait
                $sizes[ 'x3p0-profile-2x3-md'] = __( '2:3 (Portrait) - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-2x3-lg'] = __( '2:3 (Portrait) - Large',  'x3p0-profile' );
                $sizes[ 'x3p0-profile-2x3-xl'] = __( '2:3 (Portrait) - XL',     'x3p0-profile' );

		// Square.
		$sizes[ 'x3p0-profile-1x1-md'] = __( '1:1 (Square) - Medium', 'x3p0-profile' );
		$sizes[ 'x3p0-profile-1x1-lg'] = __( '1:1 (Square) - Large',  'x3p0-profile' );
		$sizes[ 'x3p0-profile-1x1-xl'] = __( '1:1 (Square) - XL',     'x3p0-profile' );

                return $sizes;
        }
}
