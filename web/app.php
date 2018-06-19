<?php

require __DIR__. DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'autoloader.php';

$autoloader = autoloader::getAutoloader();
$kernel = new \app\Kernel();
