<?php

namespace Controller;

use app\Response;

class ProductController extends PageController
{

    public function getByUuid($uuid){
        $json = $this->getRepository('ProductRepository')->findByUuid($uuid);

        return new Response($json);
    }

    public function getList(){
        $json = $this->getRepository('ProductRepository')->findList();

        return new Response($json);
    }

}