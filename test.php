<?php
$key = 'oneKey';

// initialize timer
require_once(__DIR__.'/lib/timer.php');
$timer = new Timer();
$timer->save('start');

// run test
list($command, $library, $iterations, $logfile) = $argv;
require_once(__DIR__.'/lib/test/'.$library.'.php');
$timer->collect($logfile);