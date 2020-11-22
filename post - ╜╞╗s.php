<?php
include "../../mainfile.php";
include "function.php";

//取得使用者姓名
$uid = ($xoopsUser)?$xoopsUser->getVar('uid'):"";
$username = ($xoopsUser)?$xoopsUser->getVar('uname'):"";
if(empty($xoopsUser)){
   redirect_header("index.php", 3, "請先登入才能使用需求單管理系統");
}

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];

//if(!empty($_REQUEST['sign_mis']))

switch ($op)
{
  case "save_news":
	$sn = insert_requireform();
	//header("location:view.php?sn=$sn");
	//header("location:index.php?sn=$sn");
	$main = "<font size=+2>需求單 <font color=#ff0000><b>$sn</b></font> 建立成功!!</font>";
	break;
  case "update_news":
	update_news();
	header("location:index.php?sn=$sn");
	break;
  default:
	$main = add_requireform($sn);
}

include "../../header.php";
echo $main;
include "../../footer.php";
?> 