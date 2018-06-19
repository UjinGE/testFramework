<?php

namespace app;

final class Request implements RequestInterface {

    private $server;
    private $get;
    private $uri;
    private $method;

    public static $instance;

    private function __construct()
    {
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->uri = explode('?', $this->server['REQUEST_URI'])[0];
        $this->method = $this->server['REQUEST_METHOD'];
    }

    /**
     * @return Request
     */
    public static function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getUri(){
        return $this->uri;
    }

    public function getMethod(){
        return $this->method;
    }
}