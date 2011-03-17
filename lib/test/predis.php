<?php
spl_autoload_register(function($classname)
{
    $path = __DIR__.'/../predis/lib/'.strtr($classname, '\\', '/').'.php';
    require $path;
});

// set up predis
$predis = new Predis\Client();

// set test
$timer->save('predis start');
$i = 0;
while ($i < $iterations)
{
  $predis->set($key.$i, md5('value'.$i));
  $i++;
}

$timer->save('predis set');

// get test
$i = 0;
while ($i < $iterations)
{
  $result = $predis->get($key.$i);
  $i++;
}

$timer->save('predis get');