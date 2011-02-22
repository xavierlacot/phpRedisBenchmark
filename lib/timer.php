<?php
class Timer
{
  protected $times;
  protected $memory;

  public function save($name)
  {
    $this->memory[$name] = memory_get_peak_usage();
    $this->times[$name] = microtime(true);
  }

  public function collect($filename = null)
  {
    $return = '';
    $previous = null;

    foreach ($this->times as $name => $time)
    {
      if ($previous)
      {
        $duration = $time - $previous;
        $return .= $name.": ".number_format($duration, 4)." - ".$this->memory[$name]."\n";
      }

      $previous = $time;
    }

    echo $return;

    if (null != $filename)
    {
      file_put_contents($filename, $return, FILE_APPEND);
    }
  }
}