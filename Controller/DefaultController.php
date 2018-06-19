<?php

namespace Controller;

use app\Response;

class DefaultController extends PageController {

    public function index(){
        return new Response(json_encode(['status' => 'ok', 'description' => 'Welcome to Test Rest Application v1']));
    }

}