<?php
/**
 * Slim Framework (http://slimframework.com)
 *
 * @link      https://github.com/slimphp/Slim
 * @copyright Copyright (c) 2011-2016 Josh Lockhart
 * @license   https://github.com/slimphp/Slim/blob/3.x/LICENSE.md MIT
 */
namespace App\Handlers;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Body;

/**
 * Custom Slim application error handler
 *
 * It outputs the error message and diagnostic information in either JSON, XML,
 * or HTML based on the Accept header.
 */
class ErrorCustom extends \Slim\Handlers\Error
{
    protected $config;

    protected $view;

    protected $logger;

    public function __construct($config, $view, $logger)
    {
        $this->config = $config;
        $this->view = $view;
        $this->logger = $logger;

        $this->displayErrorDetails = (bool) $this->config->get('slimConfig.settings.displayErrorDetails');
    }

    /**
     * Write to the error log if displayErrorDetails is false
     *
     * @param \Exception|\Throwable $throwable
     *
     * @return void
     */
    protected function writeToErrorLog($throwable)
    {
        if ($this->displayErrorDetails) {
            // return;
        }

        $message = 'Slim Application Error:' . PHP_EOL;
        $message .= $this->renderThrowableAsText($throwable);
        while ($error = $throwable->getPrevious()) {
            $message .= PHP_EOL . 'Previous error:' . PHP_EOL;
            $message .= $this->renderThrowableAsText($throwable);
        }

        $message .= PHP_EOL . 'View in rendered output by enabling the "displayErrorDetails" setting.' . PHP_EOL;

        $this->logError($message);

        if ($this->config->get('logger.enabled')) {
            try {
                $this->logger->error($message);
            } catch (Exception $e) {
                $this->logger->debug($e . $message);
            }
        }
    }

    /**
     * Render HTML error page
     *
     * @param  \Exception $exception
     *
     * @return string
     */
    protected function renderHtmlErrorMessage(Exception $exception)
    {
        $title = 'Slim Application Error';

        if ($this->displayErrorDetails) {
            $html = '<p>The application could not run because of the following error:</p>';
            $html .= '<h2>Details</h2>';
            $html .= $this->renderHtmlException($exception);

            while ($exception = $exception->getPrevious()) {
                $html .= '<h2>Previous exception</h2>';
                $html .= $this->renderHtmlException($exception);
            }
        } else {
            $html = '<p>A website error has occurred. Sorry for the temporary inconvenience.</p>';
        }

        return $this->view->fetch('errors/500.html.twig', [
            'html' => $html
        ]);
    }
}
