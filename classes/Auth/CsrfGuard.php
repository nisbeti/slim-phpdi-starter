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

namespace App\Auth;

use Slim\Csrf\Guard;
use App\Interfaces\Auth\CsrfGuardInterface;

/**
 * CsrfGuard
 *
 * For PHP-DI Autowiring
 *
 */
class CsrfGuard extends Guard implements CsrfGuardInterface
{
    // TO_DO: have injected $this->session, to use own session object
}
