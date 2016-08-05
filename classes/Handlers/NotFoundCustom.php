<?php
/**
 * Slim Framework (http://slimframework.com)
 *
 * @link      https://github.com/slimphp/Slim
 * @copyright Copyright (c) 2011-2016 Josh Lockhart
 * @license   https://github.com/slimphp/Slim/blob/3.x/LICENSE.md MIT
 */
namespace App\Handlers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Body;

/**
 * Custom Slim application not found handler.
 *
 * It outputs a simple message in either JSON, XML or HTML based on the
 * Accept header.
 */
class NotFoundCustom extends \Slim\Handlers\NotFound
{
    protected $config;

    protected $view;

    protected $logger;

    public function __construct($config, $view, $logger)
    {
        $this->config = $config;
        $this->view = $view;
        $this->logger = $logger;
    }

    /**
     * Return a response for text/html content not found
     *
     * @param  ServerRequestInterface $request  The most recent Request object
     *
     * @return ResponseInterface
     */
    protected function renderHtmlNotFoundOutput(ServerRequestInterface $request)
    {
        if ($this->config->get('logger.enabled')) {
            $message = '404 on ' . (string)$request->getUri();

            $this->logger->debug($message);
        }

        return $this->view->fetch('errors/404.html.twig');
    }
}
