<?php

final class autoloader{

    private static $instance;

    private function __construct()
    {
        $this->registerAppAtoload();
    }

    public static function getAutoloader(){
        if (!isset(self::$instance)){
            self::$instance = new autoloader();
        }
        return self::$instance;
    }

    private function registerAppAtoload(){
        spl_autoload_register(function ($class_name) {
            $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
            $appPath  = __DIR__. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $class_name . '.php';
            if (file_exists($appPath)){
                require $appPath;
            }
        });
    }

}