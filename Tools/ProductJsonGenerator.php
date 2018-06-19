<?php

require 'ContentGenerator.php';



if (isset($argv[1])){
    $count = $argv[1];
}else{
    $count = 10;
}

if ($count>100){
    die('You need to buy license for generate more products :)' . PHP_EOL);
}

$contentGenerator = new ContentGenerator($count);

$statuses = [
    [
        "alias" => "available",
        "title" => "Есть в наличии"
    ],
    [
        "alias" => "not_available",
        "title" => "Нет в наличии"
    ],
    [
        "alias" => "expected",
        "title" => "Ожидается"
    ],
    [
        "alias" => "discontinued",
        "title" => "Снят с производства"
    ],
];

$products = [];

for($i = 0; $i < $count; ++$i){
    $products[] = [
        'uuid' => $contentGenerator->generateUuid(),
        'title' => $contentGenerator->getRandomTitle(),
        'description' => $contentGenerator->getRandomDescription(),
        'price' => rand(10,10000),
        'status' => $statuses[rand(1, count($statuses)) - 1],
        'created_at' => rand(1, time()),
    ];
}

file_put_contents('products.json', json_encode($products, JSON_UNESCAPED_UNICODE));
