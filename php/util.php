<?php

/*
    字符串GBK转码为UTF-8，数字转换为数字。
*/
function ct2($s){
    if(is_numeric($s)) {
        return intval($s);
    } else {
        return iconv("GBK","UTF-8",$s);
    }
}
/*
    批量处理gbk->utf-8
*/

function icon_to_utf8($s) {

  if(is_array($s)) {
    foreach($s as $key => $val) {
      $s[$key] = icon_to_utf8($val);
    }
  } else {
      $s = ct2($s);
  }
  return $s;

}

?>