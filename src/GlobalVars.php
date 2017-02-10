<?php namespace m1nified\arraier;
/**
 *
 */
class Post
{
  // function __construct(argument){
  //   # code...
  // }
//   public static function contains_from_arr($arr){
//       print_r($arr);
//       return forward_static_call_array('contains',$arr);
//   }
  public static function contains(){
    $names = func_get_args();
    foreach($names as $name){
      if((!is_scalar($_POST[$name]) && !is_array($_POST[$name])) || !isset($_POST[$name]) || empty($_POST[$name])){
        return false;
      }
    }
    return true;
  }
//   public static function contains_detailed($messages = []){
//     $name = func_get_args();
//     $misses = [];
//     foreach ($names as $name) {
//       if(!is_scalar($_POST[$name]) || !isset($_POST[$name]) || empty($_POST[$name])){
//         $misses[$name] = $messages[$name] || true;
//       }
//     }
//     return $misses;
//   }
  public static function xmlize(){
    $tree = array();
    foreach ($_POST as $key => $value) {
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
  public static function xmlize_order_by($order_array){
    $tree = array();
    foreach ($order_array as $key => $value) {
      $value_big = strtoupper($value);
      array_push($tree,"<$value_big>{$_POST[$value]}</$value_big>");
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
?>