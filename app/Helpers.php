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

/**
 * Link stylesheets
 *
 * @example styles($styles);
 *
 */
function styles($styles = []) {
	foreach($styles as $link):
        echo '<link rel="stylesheet" href="' . $link . '">'.PHP_EOL;
    endforeach;
}

/**
 * Link scripts
 *
 * @example scripts($scripts);
 *
 */
function scripts($scripts = []) {
	foreach($scripts as $link):
        echo '<script src="' . $link . '"></script>'.PHP_EOL;
    endforeach;
}