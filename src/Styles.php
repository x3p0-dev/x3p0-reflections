<?php

namespace X3P0\Profile;

class Styles {

        public function boot() {
                add_action( 'init', [ $this, 'register'] );
        }

        public function register() {

                register_block_style( 'core/list', [
                        'name' => 'padded',
                        'label' => __( 'Padded', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'circle-outline',
                        'label' => __( 'Circle Outline', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'rectangle',
                        'label' => __( 'Rectangle', 'x3p0-profile' )
                ] );

                register_block_style( 'core/social-links', [
                        'name'  => 'rectangle-outline',
                        'label' => __( 'Rectangle Outline', 'x3p0-profile' )
                ] );
        }
}
