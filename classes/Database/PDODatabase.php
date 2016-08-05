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

use PDO;
use App\Interfaces\Database\DatabaseInterface;

/**
 * PDODatabase
 *
 * For PHP-DI Autowiring
 *
 */
class PDODatabase extends PDO implements DatabaseInterface
{
    //
}
