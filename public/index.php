<?php

header('Access-Control-Allow-Origin: *');

require __DIR__.'/../vendor/autoload.php';

new Connect();

require __DIR__.'/../routing/web.php';