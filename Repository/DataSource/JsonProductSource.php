<?php

namespace Repository\DataSource;

class JsonProductSource implements ProductSourceInterface{

    public function findByUuid(string $uuid){
        $json = $this->getSource();
        $array = json_decode($json);
        $key = array_search($uuid, array_column($array,'uuid'));
        if ($key === false){
            //@todo need correct error handlers;
            die('not found');
        }
        return json_encode($array[$key]);
    }

    public function findList(){
        return $this->getSource();
    }

    private function getSource(){
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'products.json');
    }

}