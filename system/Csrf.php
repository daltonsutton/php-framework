<?php 

namespace System;

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
 * Csrf class
 * Creates and verifies CSRF tokens
 */
class Csrf {
    /**
     * CSRF token key name for the user session
     */
    const SESSION_KEY  = 'csrf_token';

    /**
     * CSRF token length
     */
    const TOKEN_LENGTH = 64;

    /**
     * Checks the CSRF token
     *
     * @param string $userToken token to check
     *
     * @return bool
     */
    public static function check($userToken)
    {
        if ($sessionToken = Session::get(self::SESSION_KEY)) {
            return hash_equals($sessionToken, $userToken);
        }

        return false;
    }

    /**
     * Generates a CSRF token
     *
     * @return string
     */
    public static function token()
    {
        if ($sessionToken = Session::get(self::SESSION_KEY)) {
            return $sessionToken;
        }

        $token = self::noise(self::TOKEN_LENGTH);

        Session::put(self::SESSION_KEY, $token);

        return $token;
    }

    // noise function 32 chars long
    public static function noise($length = 32) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
}
