<?php
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.'Arraier.php');
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.'Post.php');
use PHPUnit\Framework\TestCase;

class ArraierTest extends TestCase{
  public function testContains(){
    $array = [
      0 => 0,
      1 => 1,
      2 => '',
      3 => null
    ];
    $arraier = new m1nified\arraier\Arraier($array);
    $this->assertTrue($arraier->contains(0,1));
    $this->assertFalse($arraier->contains(4));
    $this->assertFalse($arraier->contains(2));
  }
  public function testNotContains(){
    $array = [
      0 => 0,
      1 => 1,
      2 => '',
      3 => null
    ];
    $arraier = new m1nified\arraier\Arraier($array);
    $this->assertTrue($arraier->not_contains(4));
    $this->assertTrue($arraier->not_contains(2));
    $this->assertTrue($arraier->not_contains(2,3,4));
    $this->assertFalse($arraier->not_contains(0));
    $this->assertFalse($arraier->not_contains(0,1));
  }
}