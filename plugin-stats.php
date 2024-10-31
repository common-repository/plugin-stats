<?php

/**
 * -----------------------------------------------------------------------------
 * Plugin Name: Plugin Stats
 * Description: Provides plugin developers a simple hub from which they can keep track of the stats on their own (or other developers') plugins.
 * Version: 2.0
 * Author: John Alarcon
 * Author URI: https://johnalarcon.com
 * Text Domain: plugin-stats
 * Domain Path: /languages
 * -----------------------------------------------------------------------------
 * This is free software released under the terms of the General Public License,
 * version 2, or later. It is distributed WITHOUT ANY WARRANTY; without even the
 * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. Full
 * text of the license is available at https://www.gnu.org/licenses/gpl-2.0.txt.
 * -----------------------------------------------------------------------------
 * A special thanks to Edward Dale (scompt.com) who graciously changed ownership
 * of this plugin at the WordPress plugin repository, so it could be redeveloped
 * into a new plugin.
 * -----------------------------------------------------------------------------
 * Copyright © 2018 - John Alarcon
 * -----------------------------------------------------------------------------
 */

/**
 * The primary plugin class.
 *
 * @author John Alarcon
 *
 */
class PluginStats {

	/**
	 * Object instance.
	 *
	 * @var null|object Current or new instance of the object.
	 *
	 * @since 2.0.0
	 */
	private static $instance = null;

	/**
	 * Simple constructor.
	 *
	 * @author John Alarcon
	 *
	 * @since 2.0.0
	 */
	private function __construct() {

		$this->init();

	}

	/**
	 * Setup filters and actions.
	 *
	 * @author John Alarcon
	 *
	 * @since 2.0.0
	 */
	public function init() {

		// Add a notice to the dashboard.
		add_action('admin_notices', [$this, 'print_admin_notice']);

	}

	/**
	 * Print admin notice.
	 *
	 *
	 * @author John Alarcon
	 *
	 * @since 2.0.0
	 */
	public function print_admin_notice() {

		// Check if user has already been notified.
		$notified = get_option('plugin_stats_notified', false);

		// Already notified? Don't be a nag.
		if ($notified) {
			return;
		}

		// Contain and print the message.
		echo '<div class="notice notice-error is-dismissible"><p>The <strong>Plugin Stats</strong> plugin is under redevelopment and will be re-released soon!</p><p>If you want to use the previous version, you can download it <a href="https://plugins.trac.wordpress.org/browser/plugin-stats/tags/1.1">here</a> – be sure not to update it afterward or you will be right back here!</p><p>This message will not be shown again.</p></div>';

		// Indicate user has been notified.
		update_option('plugin_stats_notified', 1);

	}

	/**
	 * Get current instance of this object, or create and return a new instance.
	 *
	 * @author John Alarcon
	 *
	 * @since 0.1.0
	 *
	 * @return object The current instance of the object.
	 */
	public final static function get_instance() {

		// Get current instance or create a new one.
		if (self::$instance===null) {
			self::$instance = new PluginStats;
		}

		// Return the instance.
		return self::$instance;

	}

}

PluginStats::get_instance();