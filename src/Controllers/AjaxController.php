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
 * AjaxController
 */
class AjaxController {

	/**
	 * Ajax
	 */
	public static function ajax() {
		$wponerror = get_option( 'wponerror' );
		if ( isset( $wponerror['_wponerror_disable'] ) && 'on' === $wponerror['_wponerror_disable'] ) {
			wp_die();
		}

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'wponerror' ) ) {
			wp_die();
		}
		if ( ! isset( $_POST['message'] ) || ! isset( $_POST['source'] ) || ! isset( $_POST['line'] ) || ! isset( $_POST['column'] ) || ! isset( $_POST['error'] ) ) {
			wp_die();
		}

		$message = sanitize_text_field( wp_unslash( $_POST['message'] ) );
		$source  = sanitize_text_field( wp_unslash( $_POST['source'] ) );
		$line    = sanitize_text_field( wp_unslash( $_POST['line'] ) );
		$column  = sanitize_text_field( wp_unslash( $_POST['column'] ) );
		$error   = sanitize_text_field( wp_unslash( $_POST['error'] ) );

		$post_id = wp_insert_post(
			array(
				'post_title'  => $message,
				'post_status' => 'publish',
				'post_type'   => 'wponerror',
			)
		);
		update_post_meta( $post_id, SEPBIT_WPONERROR_PRE . '_message', $message );
		update_post_meta( $post_id, SEPBIT_WPONERROR_PRE . '_source', $source );
		update_post_meta( $post_id, SEPBIT_WPONERROR_PRE . '_line', $line );
		update_post_meta( $post_id, SEPBIT_WPONERROR_PRE . '_column', $column );
		update_post_meta( $post_id, SEPBIT_WPONERROR_PRE . '_error', $error );

		if ( isset( $wponerror['_wponerror_mail'] ) && 'on' === $wponerror['_wponerror_mail'] ) {
			wp_mail(
				get_option( 'admin_email' ),
				$message,
				$message . '; ' . $source . '; ' . $line . '; ' . $column . '; ' . $error,
			);
		}

		echo wp_json_encode( 'Error recorded' );
		wp_die();
	}

	/**
	 * JavaScript
	 */
	public static function script() {
		wp_enqueue_script(
			'wponerror',
			SEPBIT_WPONERROR_URL . 'assets/js/wponerror.js',
			array( 'jquery' ),
			SEPBIT_WPONERROR_VER,
			false
		);
		wp_localize_script(
			'wponerror',
			'wponerror',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'wponerror' ),
			)
		);
	}
}
