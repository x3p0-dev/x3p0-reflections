<?php

namespace X3P0\Profile;

class Templates {

        public function boot() {

                add_filter( 'default_template_types', [ $this, 'templateTypes'] );

                add_filter( 'default_wp_template_part_areas', [ $this, 'templatePartAreas' ] );
        }

        public function templateTypes( $types ) {
                $types = [
                        'index' => [
                                'title'       => __( 'Site', 'x3p0-profile' ),
                                'description' => __( 'The single template for editing the entire site.', 'x3p0-profile' )
                        ]
                ];

                return $types;
        }

        public function templatePartAreas( $areas ) {
                $areas = [
                        [
                                'area'        => 'content',
                                'label'       => __( 'Content', 'x3p0-profile' ),
                                'description' => __( 'Site content.', 'x3p0-profile' ),
                                'icon'        => 'layout',
                                'area_tag'    => 'div'
                        ]
                ];

                return $areas;
        }
}
