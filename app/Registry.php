<?php

namespace app;

class Registry {
    private static $instance;

    private $repositories;

    private $sourceConfig = [
        'ProductRepository' => [
            'source' => 'JsonProductSource'
        ]
    ];

    private function _construct(){
        $this->repositories = [];
    }

    /**
     * @return Registry
     */
    static function getInstance ( ) {
        if (!isset (self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return Request
     */
    public function getRequest () {
        return Request::getInstance();
    }

    public function getRepository($repositoryName){
        if(!isset($this->repositories[$repositoryName])){
            $className = '\Repository\\' . $repositoryName;
            $sourceName = '\Repository\DataSource\\' . $this->sourceConfig[$repositoryName]['source'];
            $this->repositories[$repositoryName] = new $className(
                new $sourceName
            );
        }

        return $this->repositories[$repositoryName];
    }

}