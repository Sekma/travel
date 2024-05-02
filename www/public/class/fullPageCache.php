<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "./class/redisCache.php";

class FPC {

  private $cache;
  private $url;
  private $start;

  function __construct(){

    ob_start();

    $this->cache = new RedisCache();
    $this->url = $_SERVER['REQUEST_URI'];
    $this->start = microtime(true);
  }

  public function start(){

    if($this->cache->inCache($this->url) == true){
      $page = $this->cache->load($this->url);
      echo $page;
      echo "<div class='performance' style = 'color:red'>Performance: " . (microtime(true) - $this->start) . ' s</div>';
      exit();
    }
  }

  public function end(){
    if($this->cache->inCache($this->url) == false){   
      $this->cache->save($this->url, ob_get_contents());
    }
  
    echo "<div class='performance' style = 'color:red'>Performance: " . (microtime(true) - $this->start) . ' s</div>';
  }

}
?>