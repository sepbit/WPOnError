/* global jQuery, wponerror */
/**
 * @licstart  The following is the entire license notice for the
 * JavaScript code in this page.
 *
  * WPOnError - Register GlobalEventHandlers.onerror in WordPress post type
 * Copyright (C) 2021  Sepbit
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
 * @licend  The above is the entire license notice
 * for the JavaScript code in this page.
 */

window.onerror = function (message, source, lineno, colno, error) {
  jQuery.post(
    wponerror.ajaxurl,
    {
      action: 'wponerror',
      nonce: wponerror.nonce,
      message: message,
      source: source,
      line: lineno,
      column: colno,
      error: error
    },
    function (response) {
      console.log(response)
    })
}
