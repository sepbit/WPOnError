<?php
/**
 * WpOnError - Register GlobalEventHandlers.onerror in WordPress post type
 * Copyright (C) 2021-2022 Vitor Guia
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @package WpOnError
 */

namespace Sepbit\WPOnError\Controllers;

/**
 * PostTypeController
 */
class PostTypeController {
	/**
	 * Post type
	 */
	public static function post_type() {
		$labels = array(
			'name'          => __( 'WPOnError', 'wponerror' ),
			'singular_name' => __( 'WPOnError', 'wponerror' ),
		);

		$args = array(
			'label'                 => __( 'WPOnError', 'wponerror' ),
			'labels'                => $labels,
			'description'           => '',
			'public'                => false,
			'publicly_queryable'    => false,
			'show_ui'               => true,
			'show_in_rest'          => false,
			'rest_base'             => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => false,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'wponerror',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'rewrite'               => array(
				'slug'       => 'wponerror',
				'with_front' => true,
			),
			'query_var'             => true,
			'menu_icon'             => 'dashicons-megaphone',
			'supports'              => array( 'title' ),
			'show_in_graphql'       => false,
		);

		register_post_type( 'wponerror', $args );
	}

	/**
	 * Custom Fields
	 */
	public static function custom_fields() {
		$cmb = new_cmb2_box(
			array(
				'id'           => 'wponerror',
				'title'        => __( 'WPOnError', 'wponerror' ),
				'object_types' => array( 'wponerror' ),
			)
		);
		$cmb->add_field(
			array(
				'name'       => __( 'Message', 'wponerror' ),
				'id'         => SEPBIT_WPONERROR_PRE . '_message',
				'type'       => 'text',
				'desc'       => 'Error message',
				'attributes' => array(
					'required' => 'required',
				),
			)
		);
		$cmb->add_field(
			array(
				'name'       => __( 'Source', 'wponerror' ),
				'id'         => SEPBIT_WPONERROR_PRE . '_source',
				'type'       => 'text',
				'desc'       => 'URL of the script where the error was raised',
				'attributes' => array(
					'required' => 'required',
				),
				'column'     => array(
					'position' => 2,
				),
			)
		);
		$cmb->add_field(
			array(
				'name'       => __( 'Line', 'wponerror' ),
				'id'         => SEPBIT_WPONERROR_PRE . '_line',
				'type'       => 'text',
				'desc'       => 'Line number where error was raised',
				'attributes' => array(
					'required' => 'required',
					'type'     => 'number',
				),
				'column'     => array(
					'position' => 3,
				),
			)
		);
		$cmb->add_field(
			array(
				'name'       => __( 'Column', 'wponerror' ),
				'id'         => SEPBIT_WPONERROR_PRE . '_column',
				'type'       => 'text',
				'desc'       => 'Column number for the line where the error occurred',
				'attributes' => array(
					'required' => 'required',
					'type'     => 'number',
				),
				'column'     => array(
					'position' => 4,
				),
			)
		);
		$cmb->add_field(
			array(
				'name'       => __( 'Error', 'wponerror' ),
				'id'         => SEPBIT_WPONERROR_PRE . '_error',
				'type'       => 'textarea',
				'desc'       => 'Error Object',
				'attributes' => array(
					'required' => 'required',
				),
			)
		);
	}
}
