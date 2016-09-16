<?php

require __DIR__ . '/vendor/autoload.php';

$logger = new Monolog\Logger("rogueN");
$logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/log/rogueN.log', Monolog\Logger::DEBUG));
$logger->info("---------------------------------------");
$logger->info("------ START --------------------------");
$logger->info("---------------------------------------");



$ring = new \knF\Support\Map();

$path = $ring->shortestPath(new \knF\Support\Position(0,0), new \knF\Support\Position(5,5));

$climate = new League\CLImate\CLImate;



while (true) {
    $climate->clear();
    $climate->blue()->table($ring->map);    
    $climate->green()->table($path);
    sleep (1);
}