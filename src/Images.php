<?php

namespace X3P0\Profile;

class Images {

        public function boot() {
                add_action( 'init', [ $this, 'addImageSizes' ] );
                add_filter( 'image_size_names_choose', [ $this, 'imageSizeNamesChoose' ] );
        }

        public function addImageSizes() {
                add_image_size( 'exhale-2x3-lg', 1024, 1536, true );
        }

        public function imageSizeNamesChoose( $sizes ) {
                $sizes[ 'exhale-2x3-lg'] = __( '2:3 - Large', 'x3p0-profile' );
                return $sizes;
        }
}
