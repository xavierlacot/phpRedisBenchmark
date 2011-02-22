<?php
require_once(__DIR__.'/../redisent/redisent.php');

// set up predis
$redis = new redisent\Redis('localhost');

// set test
$timer->save('redisent start');
$i = 0;
while ($i < $iterations)
{
  $redis->set($key.$i, md5('value'.$i));
  $i++;
}

$timer->save('redisent set');

// get test
$i = 0;
while ($i < $iterations)
{
  $result = $redis->get($key.$i);
  $i++;
}

$timer->save('redisent get');