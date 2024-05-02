<?php

class Fibonacci {


  /**
   * Return the $number first fibonacci sequence
   * @param $number : integer
   * @return Array
   */
  public function get($number){

    $result = array();

    for ($counter = 0; $counter < $number; $counter++) {
      array_push($result, Fibonacci::run($counter));
    }
    return $result;
  }

  private static function run($number)
  {
  
    // if and else if to generate first two numbers
    if ($number == 0)
      return 0;
    else if ($number == 1)
      return 1;
  
    // Recursive Call to get the upcoming numbers
    else
      return (Fibonacci::run($number - 1) + Fibonacci::run($number - 2));
  }
}
?>