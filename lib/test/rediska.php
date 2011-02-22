<?php
require_once(__DIR__.'/../rediska/library/Rediska.php');

// set up Rediska
$options = array(
  'servers'   => array(
    array('host' => '127.0.0.1', 'port' => 6379),
  )
);
$rediska = new Rediska($options);

// set test
$timer->save('Rediska start');
$i = 0;
while ($i < $iterations)
{
  $keyName = new Rediska_Key($key.$i);
  $keyName->setValue(md5('value'.$i));
  $i++;
}

$timer->save('Rediska set');

// get test
$i = 0;
while ($i < $iterations)
{
  $keyName = new Rediska_Key($key.$i);
  $value = $keyName->getValue();
  $i++;
}

$timer->save('Rediska get');