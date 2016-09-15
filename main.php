<?php

require __DIR__ . '/vendor/autoload.php';

$logger = new Monolog\Logger("rogueN");
$logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/log/rogueN.log', Monolog\Logger::DEBUG));
$logger->info("---------------------------------------");
$logger->info("------ START --------------------------");
$logger->info("---------------------------------------");



$ring = new \knF\Support\Map();

$climate = new League\CLImate\CLImate;


while (true) {
    $climate->clear();
    $climate->blue()->table($ring->map);    
    sleep (1);
}