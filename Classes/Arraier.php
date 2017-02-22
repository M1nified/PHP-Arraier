<?php namespace m1nified\arraier;

class Arraier{
  private $array = [];
  function __construct(&$array){
    $this->array = $array;
  }
  public function contains(){
    $names = func_get_args();
    foreach($names as $name){
      if(
        !array_key_exists($name,$this->array)
        || ( is_string($this->array[$name]) && $this->array[$name] === '' )
        || ( !is_scalar($this->array[$name]) && !is_array($this->array[$name]) )
      ){
        return false;
      }
    }
    return true;
  }
  public function xmlize(){
    $tree = array();
    foreach ($this->array as $key => $value) {
        if(is_array($value)){
            $value = self::xmlize_array($value);
        }
        $key = strtoupper($key);
        // $tree []= "<$key>$value</$key>";
        array_push($tree,"<$key>$value</$key>");
    }
    $tree = implode("\n<br>\n",$tree);
    return $tree;
  }
  
  // Statics
  public static function xmlize_order_by($order_array){
    $tree = array();
    foreach ($order_array as $key => $value) {
      $value_big = strtoupper($value);
      array_push($tree,"<$value_big>{$this->array[$value]}</$value_big>");
    }
    $tree = implode("\n<br>\n",$tree);
    return $tree;
  }
  public static function xmlize_array($arr){
      if(!is_array($arr)){
          return $arr;
      }
      $tree = array();
      foreach($arr as $key => $value){
        $key = strtoupper($key);
        // $tree []= "<$key>".self::xmlize_array($value)."</$key>";
        array_push($tree,"<$key>".self::xmlize_array($value)."</$key>");
      }
        $tree = implode("\n<br>\n",$tree);
        return $tree;
  }
}