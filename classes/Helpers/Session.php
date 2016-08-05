<?php
/**
 * This file is part of a Slim PHP-DI Starter Project
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *
 * @license   https://github.com/nisbeti/slim-phpdi-starter/blob/master/LICENCE.md MIT
 * @link      https://github.com/nisbeti/slim-phpdi-starter
 */

namespace App\Helpers;

use App\Interfaces\Helpers\SessionInterface;
use Noodlehaus\ConfigInterface;

/**
 * Session
 *
 * @param Noodlehaus\ConfigInterface $config
 *
 */
class Session implements SessionInterface
{
    public function __construct()
    {
        ini_set('session.cookie_httponly','1');
        ini_set('session.cookie_lifetime','7200');
        ini_set('session.entropy_length','128');
        ini_set('session.hash_bits_per_character','6');
        ini_set('session.hash_function','sha256');
        ini_set('session.lazy_write','1');
        ini_set('session.use_cookies','1');
        ini_set('session.use_only_cookies','1');
        ini_set('session.use_strict_mode','1');

        session_cache_limiter(false);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        foreach ($_SESSION as $key => $value) {
            $this->$key = $value;
        }
    }

    public function isSet($variable)
    {
        if (isset($this->$variable)) {
            return true;
        }
        return false;
    }

    public function get($variable)
    {
        if ($this->isSet($variable)) {
            return $this->$variable;
        }
        return null;
    }

    public function set($variable, $value = null)
    {
        $this->$variable = $value;
        $_SESSION[$variable] = $value;
    }

    public function unSet($variable)
    {
        if (isset($this->$variable)) {
            unset($_SESSION[$variable]);
            return true;
        }
        return false;
    }

    public function regenerate_id()
    {
        session_regenerate_id(true);
    }

    public function destroy()
    {
        session_destroy();
    }
}
