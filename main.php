<?php

require __DIR__ . '/vendor/autoload.php';

$logger = new Monolog\Logger("rogueN");
$logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__.'/log/rogueN.log', Monolog\Logger::DEBUG));
$logger->info("---------------------------------------");
$logger->info("------ START --------------------------");
$logger->info("---------------------------------------");

$ring = array_fill(0,5,array_fill(0,5,'.'));

$climate = new League\CLImate\CLImate;


while (true) {
    $climate->clear();
    $climate->blue()->table($ring);    
    sleep (1);
}