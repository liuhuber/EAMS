<?php
include "../../mainfile.php";
include "function.php";

/*
if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}
*/

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];
switch ($op)
{
  case "save_owner":
  $sn = insert_requireform();
  header("location:view.php?sn=$sn");
//  header("location:index.php?sn=$sn");
	
  break;

  case "update_owner":
  update_owner();
  header("location:view.php?sn=$sn");
  //header("location:index.php?sn=$sn");
  break;

  default:
  $main = add_ownerform($sn);
}

include "../../header.php";
echo $main;
include "../../footer.php";
?> 