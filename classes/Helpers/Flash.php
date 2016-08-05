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

use Slim\Flash\Messages;
use App\Interfaces\Helpers\FlashInterface;

/**
 * Flash
 *
 * For PHP-DI Autowiring
 *
 */
class Flash extends Messages implements FlashInterface
{
    //
}
