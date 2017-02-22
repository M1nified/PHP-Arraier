<?php
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.'Arraier.php');
include_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.'Post.php');
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase{
  public function testContains(){
    $_POST[0] = 0;
    $_POST[1] = 1;
    $_POST[2] = '';
    $_POST[3] = null;
    $this->assertTrue(m1nified\arraier\Post::contains(0,1));
    $this->assertFalse(m1nified\arraier\Post::contains(4));
  }
}