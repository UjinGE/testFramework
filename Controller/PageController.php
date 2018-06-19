<?php

namespace Controller;

use app\Registry;

abstract class PageController {

    protected function getRequest ()
    {
        return Registry::getInstance()->getRequest();
    }

    protected function getRepository($repositoryName){
        return Registry::getInstance()->getRepository($repositoryName);
    }
}