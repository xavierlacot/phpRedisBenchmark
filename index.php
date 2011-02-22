<?php
$logfile = 'test.log';
$libraries = array(
  'predis',
  'rediska'
);
$iterations = array(100, 1000, 10000);

foreach ($libraries as $library)
{
  foreach ($iterations as $iteration)
  {
    $command = sprintf(
      '%s test.php %s %s %s',
      getPhpCli(),
      $library,
      $iteration,
      $logfile
    );
    passthru($command);
  }
}


function getPhpCli()
{
  $path = getenv('PATH') ? getenv('PATH') : getenv('Path');
  $suffixes = DIRECTORY_SEPARATOR == '\\' ? (getenv('PATHEXT') ? explode(PATH_SEPARATOR, getenv('PATHEXT')) : array('.exe', '.bat', '.cmd', '.com')) : array('');

  foreach (array('php5', 'php') as $phpCli)
  {
    foreach ($suffixes as $suffix)
    {
      foreach (explode(PATH_SEPARATOR, $path) as $dir)
      {
        $file = $dir.DIRECTORY_SEPARATOR.$phpCli.$suffix;

        if (is_executable($file))
        {
          return $file;
        }
      }
    }
  }

  throw new Exception('Unable to find PHP executable');
}