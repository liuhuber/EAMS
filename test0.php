<?php
include "../../mainfile.php";
include "function.php";

//取得使用者姓名
//$xoopsUser->getVar('uid'); //使用者編號
//$xoopsUser->getVar('uname'); //使用者名稱
//$xoopsUser->getVar('name'); // 真實姓名
//$xoopsUser->getVar('email'); //電子郵件
//$xoopsUser->getVar('url'); //個人網路站
//$xoopsUser->getVar('timezone_offset'); //時區
//$xoopsUser->getVar('user_intrest'); //興趣
//$xoopsUser->getVar(user_avatar''); //頭像
//$xoopsUser->getVar('user_regdate'); //註冊日期
//$xoopsUser->getVar('posts'); //評論/張貼數
//$xoopsUser->getVar('rank'); //等級
//$xoopsUser->getVar('last_login'); //上次登入時間
//$xoopsUser->getVar('pass'); // md5 編碼後的密碼
//$xoopsUser->getVar('level'); // 使用者階級 (1：會員 2：管理者 5：站長)

$uid = ($xoopsUser)?$xoopsUser->getVar('uid'):"";
$username = ($xoopsUser)?$xoopsUser->getVar('uname'):"";
if($xoopsUser){
	$isAdmin = $xoopsUser->isAdmin();
}else{
    $isAdmin = false;
}
//
	global $xoopsDB;
  $sql="select company, cname from ".$xoopsDB->prefix("companycat")." order by cname";
  $target_date = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " +3 day");
  
//
$main="
 uid=$uid <p>
 username=$username <p>
 isAdmin=$isAdmin <p>
 $target_date
";

/*
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
    $main="<h1><center>需求單管理系統</center></h1><P><P><P><P><P><P>
	程序: 建立需求單 -> 指派 -> 評估 -> 簽核 -> 執行 -> 使用者驗收 -> 轉入正式環境 -> 結案
	<P><P><FONT COLOR=RED>** 使用需求單管理系統前需先登入</FONT>";
  }
}

*/

include "../../header.php";
echo $main;
if($xoopsUser->isAdmin()) echo my_menu();
include "../../footer.php";
?>
