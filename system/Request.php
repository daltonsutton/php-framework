<?php namespace System;

/**
 * PHP Framework
 *
 * Lightweight PHP Framework
 *
 * @package		php-framework
 * @link		https://dalton.sutton.io
 * @copyright	https://unlicense.org/
 */

class Request {

	/**
	 * Get the server request method
	 *
	 * @return string|null
	 */
	public static function method() {
		return Arr::get($_SERVER, 'REQUEST_METHOD');
	}

	/**
	 * Get the server protocol
	 *
	 * @return string|null
	 */
	public static function protocol() {
		return Arr::get($_SERVER, 'SERVER_PROTOCOL');
	}

	/**
	 * Checks if the current request was sent
	 * with a XMLHttpRequest header as sent by javascript
	 *
	 * @return bool
	 */
	public static function ajax() {
		return strcasecmp(Arr::get($_SERVER, 'HTTP_X_REQUESTED_WITH'), 'XMLHttpRequest') === 0;
	}

	/**
	 * Checks if the current request was sent
	 * via the command line
	 *
	 * @return bool
	 */
	public static function cli() {
		return defined('STDIN');
	}

}