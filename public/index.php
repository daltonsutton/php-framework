<?php

/**
 * PHP Framework
 *
 * Lightweight PHP Framework
 *
 * @package		php-framework
 * @link		https://dalton.sutton.io
 * @copyright	https://unlicense.org/
 */

define('VERSION', '0.0.1');
define('START_TIME', microtime(true));
define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));

define('PATH', dirname(__DIR__) . DS);
define('APP', PATH . 'app' . DS);
define('SYS', PATH . 'system' . DS);
define('EXT', '.php');

require APP . 'run' . EXT;