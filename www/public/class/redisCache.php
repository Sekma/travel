<?php
require __DIR__ . '/../vendor/autoload.php';

class RedisCache {

  private $client;

  function __construct(){
    $this->client = new Predis\Client(['host'=>'redis', 'port'=>'6379', 'password'=>'secret_redis']);
  }

  public function inCache($url){
    return $this->client->exists($url);
  }

  public function load($url){
    return $this->client->get($url);
  }

  public function save($url, $content, $expire = 0){
    $this->client->set($url, $content);

    if($expire>0){
      $this->client->expire($url, $expire);
    }
  }
}

?>