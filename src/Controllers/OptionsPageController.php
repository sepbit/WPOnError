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
 * OptionsPageController
 */
class OptionsPageController {
	/**
	 * Options page
	 */
	public static function options_page() {
		$cmb = new_cmb2_box(
			array(
				'id'           => 'wponerror_options_page',
				'title'        => __( 'Settings', 'wponerror' ),
				'object_types' => array( 'options-page' ),
				'option_key'   => 'wponerror',
				'parent_slug'  => 'edit.php?post_type=wponerror',
			)
		);
		$cmb->add_field(
			array(
				'name' => __( 'Disable', 'wponerror' ),
				'id'   => SEPBIT_WPONERROR_PRE . '_disable',
				'type' => 'checkbox',
				'desc' => 'I want to pause error logging',
			)
		);
		$cmb->add_field(
			array(
				'name' => __( 'Email sending', 'wponerror' ),
				'id'   => SEPBIT_WPONERROR_PRE . '_mail',
				'type' => 'checkbox',
				'desc' => 'I want to receive email when an error is logged',
			)
		);
	}
}
