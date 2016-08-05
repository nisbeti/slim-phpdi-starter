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

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Interfaces\Database\DatabaseInterface;

/**
 * CapsuleDatabase
 *
 * For PHP-DI Autowiring
 *
 */
class CapsuleDatabase extends Capsule implements DatabaseInterface
{
    //
}
