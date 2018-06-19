<?php

namespace app;

/**
 * Class Router
 * @package app
 *
 * @todo need handle request method in router
 * @todo need firewall
 */
class Router{

    private $configuration = [
        [
            'pattern' => '^/api/v1/product$',
            'controller' => 'ProductController',
            'action' => 'getList',
            'allowedMethods'=> [
                'GET'
            ],
        ],
        [
            'pattern' => '^/api/v1/product/([a-z0-9\-]*)$',
            'controller' => 'ProductController',
            'action' => 'getByUuid',
            'allowedMethods'=> [
                'GET'
            ],
        ],
        [
            'pattern' => '^/$',
            'controller' => 'DefaultController',
            'action' => 'index',
            'allowedMethods'=> [
                'GET'
            ],
        ]
    ];

    /**
     * Router constructor.
     * @param RequestInterface $request
     *
     * @todo need to shield ~ symbol in pattern
     * @todo add EventListeners, remove exit(0) from this place
     */
    public function __construct(RequestInterface $request)
    {
        $uri = $request->getUri();
        $method = $request->getMethod();
        foreach ($this->configuration as $configuration){
            preg_match('~'. $configuration['pattern'] . '~', $uri, $matches);
            if (count($matches) > 0 && in_array($method,$configuration['allowedMethods']) ){
                $controllerName = '\Controller\\' . $configuration['controller'];
                $controller = new $controllerName();
                unset($matches[0]);
                call_user_func_array([$controller, $configuration['action']],$matches);
                exit(0);
            }
        }

        return new Response(json_encode(['error' => ['alias' => 'bad_request', 'description' => 'Bad request']]),400);
    }

}