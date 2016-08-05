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

namespace App\Traits;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Trait to
 */
trait CheckAcceptTrait
{
    /**
     * Known handled content types
     *
     * @var array
     */
    protected $knownContentTypes = [
        'application/json',
        'text/html',
    ];

    /**
     * Determine which content type we know about is wanted using Accept header
     *
     * @param Psr\Http\Message\ServerRequestInterface $request
     *
     * @return string
     */
    private function determineContentType(Request $request)
    {
        $acceptHeader = $request->getHeaderLine('Accept');
        $selectedContentTypes = array_intersect(explode(',', $acceptHeader), $this->knownContentTypes);

        if (count($selectedContentTypes)) {
            return $selectedContentTypes[0];
        }

        return 'text/html';
    }
}
