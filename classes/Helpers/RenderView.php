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

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Interfaces\ViewInterface as View;
use App\Interfaces\Helpers\RenderViewInterface;
use App\Traits\CheckAcceptTrait;

/**
 * RenderView
 *
 *
 *
 */
class RenderView implements RenderViewInterface
{
    use CheckAcceptTrait;

    public function __construct(
        Request $request,
        Response $response,
        View $view,
        $template = 'home',
        $data = []
    ) {
        $contentType = $this->determineContentType($request);
        switch ($contentType) {

            case 'text/html':
                return $view->render($response, $template . '.html.twig', $data);
                break;
        }
    }
}
