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

$app->get('/', \App\Controllers\GetHome::class)->setName('home');

$app->get('/test/csrf', \App\Controllers\GetTestCsrf::class)->setName('test.csrf');
$app->post('/test/csrf', \App\Controllers\PostTestCsrf::class)->setName('test.csrf.post');

