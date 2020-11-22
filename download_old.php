<?php
include "../../mainfile.php";
include "function.php";

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":intval($_REQUEST['sn']);
switch ($op)
{
  case "del":
  del_requireform($sn);
  header("location:index.php");
  break;
  
  case "modify":
  header("location:post.php?sn=$sn");
  break;

  default:
  if(!empty($sn)) {
    header("location:view.php?sn=$sn");
  } else {
    $main = list_requireform();
  }
}

include "../../header.php";
echo $main;
echo my_menu();
include "../../footer.php";
?>