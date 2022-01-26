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

class ImageSizes {

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
                add_image_size( 'x3p0-profile-1x1-md',  640,  640, true );
                add_image_size( 'x3p0-profile-1x1-lg', 1024, 1024, true );
                add_image_size( 'x3p0-profile-1x1-xl', 2048, 2048, true );

                add_image_size( 'x3p0-profile-9x16-md',  640, 1138, true );
                add_image_size( 'x3p0-profile-9x16-lg', 1024, 1820, true );
                add_image_size( 'x3p0-profile-9x16-xl', 2048, 3641, true );

                add_image_size( 'x3p0-profile-2x3-lg',   640,  960, true );
                add_image_size( 'x3p0-profile-2x3-lg',  1024, 1536, true );
                add_image_size( 'x3p0-profile-2x3-lg',  2048, 3072, true );

                add_image_size( 'x3p0-profile-16x9-md',  640,  360,   true );
                add_image_size( 'x3p0-profile-16x9-lg', 1024,  576,  true );
                add_image_size( 'x3p0-profile-16x9-xl', 2048, 1152, true );

                add_image_size( 'x3p0-profile-21x9-md',  640, 274,  true );
                add_image_size( 'x3p0-profile-21x9-lg', 1024, 432,  true );
                add_image_size( 'x3p0-profile-21x9-xl', 2048, 864,  true );

                add_image_size( 'x3p0-profile-18x5-md', 640,  178,  true );
                add_image_size( 'x3p0-profile-18x5-lg', 1024, 284,  true );
                add_image_size( 'x3p0-profile-18x5-xl', 2048, 569,  true );
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
                $sizes[ 'x3p0-profile-1x1-md'] = __( 'Square - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-1x1-lg'] = __( 'Square - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-1x1-xl'] = __( 'Square - XL', 'x3p0-profile' );

                $sizes[ 'x3p0-profile-16x9-md'] = __( '16:9 - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-16x9-lg'] = __( '16:9 - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-16x9-xl'] = __( '16:9 - XL', 'x3p0-profile' );

                $sizes[ 'x3p0-profile-21x9-md'] = __( '21:9 - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-21x9-lg'] = __( '21:9 - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-21x9-xl'] = __( '21:9 - XL', 'x3p0-profile' );

                $sizes[ 'x3p0-profile-18x5-md'] = __( '18:5 - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-18x5-lg'] = __( '18:5 - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-18x5-xl'] = __( '18:5 - XL', 'x3p0-profile' );

                $sizes[ 'x3p0-profile-9x16-md'] = __( '9:16 - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-9x16-lg'] = __( '9:16 - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-9x16-xl'] = __( '9:16 - XL', 'x3p0-profile' );

                $sizes[ 'x3p0-profile-2x3-md'] = __( '2:3 - Medium', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-2x3-lg'] = __( '2:3 - Large', 'x3p0-profile' );
                $sizes[ 'x3p0-profile-2x3-xl'] = __( '2:3 - XL', 'x3p0-profile' );

                return $sizes;
        }
}
