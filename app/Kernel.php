<?php

namespace app;

use Controller\ProductController;

class Kernel{

    public function __construct(){
        $request = Registry::getInstance()->getRequest();
        $router = new Router($request);
    }

}