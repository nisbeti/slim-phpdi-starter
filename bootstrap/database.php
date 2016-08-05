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

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => $config->get('db.driver'),
    'host' => $config->get('db.host'),
    'database' => $config->get('db.database'),
    'username' => $config->get('db.username'),
    'password' => $config->get('db.password'),
    'charset' => $config->get('db.charset'),
    'collation' => $config->get('db.collation'),
    'prefix' => $config->get('db.prefix'),
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$capsule->getConnection()->enableQueryLog();
