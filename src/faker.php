#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->addCommands(array(
    new \Command\FakerCommand()
));

$application->run();