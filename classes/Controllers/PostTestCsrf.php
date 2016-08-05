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

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Interfaces\RouterInterface as Router;
use App\Interfaces\ViewInterface as View;
use App\Helpers\RenderView;
// use Noodlehaus\ConfigInterface as Config;
// use App\Interfaces\Helpers\SessionInterface as Session;
// use App\Interfaces\Database\DatabaseInterface as DB;
use App\Interfaces\Helpers\FlashInterface as Flash;
// use Psr\Log\LoggerInterface as Logger;

/**
 * PostTestCsrf Controller
 *
 * @param  \Psr\Http\Message\ServerRequestInterface $request    PSR7 request
 * @param  \Psr\Http\Message\ResponseInterface      $response   PSR7 response
 * @param  App\Interfaces\ViewInterface             $view       e.g. Slim\Views\Twig
 * @param  App\Interfaces\FlashInterface            $flash      e.g. Slim\Flash\Messages
 *
 * @return HTTP response message
 *
 */
class PostTestCsrf
{
    public function __invoke(
        Request $request,
        Response $response,
        View $view,
        Flash $flash
    ) {
        /* get input */
        $parsedBody = $request->getParsedBody();

        /* do action */

        /* route away */
        return new RenderView($request, $response, $view, 'home', [
            'someParam' => $parsedBody['test'],
        ]);
    }
}
