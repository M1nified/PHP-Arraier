<?php namespace m1nified\arraier;
/**
 *
 */
class Post
{
  public static function contains(){
    $arraier = new Arraier($_POST);
    return call_user_func_array([$arraier,'contains'], func_get_args());
  }
  public static function xmlize(){
    $arraier = new Arraier($_POST);
    return $arraier->xmlize();
  }
  public static function xmlize_order_by($order_array){
    return Arraier::xmlize_order_by($order_array);
  }
  public static function xmlize_array($arr){
    return Arraier::xmlize_array($arr);
  }
}
?>