<?php
/**
 * Plugin Name: No Browser Nag
 * Version:     1.3.6
 * Plugin URI:  https://coffee2code.com/wp-plugins/no-browser-nag/
 * Author:      Scott Reilly
 * Author URI:  https://coffee2code.com
 * Text Domain: no-browser-nag
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Removes the browser update nag that appears in the admin dashboard when using a less-than-current web browser.
 *
 * NOTE: I don't condone using an out-of-date browser. Such a browser puts your
 * computer and data at potential risk. However, there are situations where you
 * cannot upgrade in a timely fashion, or you are intentionally holding off on
 * upgrading (e.g. as you wait for a bugfix release, or for browser plugins to
 * update their compatibility).
 *
 * Compatible with WordPress 3.4+ through 6.3+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/plugins/no-browser-nag/
 *
 * @package No_Browser_Nag
 * @author  Scott Reilly
 * @version 1.3.6
 */

/*
	Copyright (c) 2011-2023 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

if ( ! function_exists( 'c2c_no_browser_nag' ) ) :

	/**
	 * Disables the WordPress browser nag.
	 *
	 * This works by filtering the value of the site transient for the hashed
	 * user agent string prior to fetching its actual value. By returning null
	 * (a falsey non-"false" value), `wp_check_browser_version()` is short-
	 * circuited to not make the request to the Browse Happy API, thus no
	 * browser nag.
	 *
	 * @since 1.0
	 */
	function c2c_no_browser_nag() {
		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			return;
		}

		// This is cribbed from wp_check_browser_version()
		$key = md5( $_SERVER['HTTP_USER_AGENT'] );

		add_filter( 'pre_site_transient_browser_' . $key, '__return_null', 100 );
	}

endif;

add_action( 'admin_init', 'c2c_no_browser_nag' );
