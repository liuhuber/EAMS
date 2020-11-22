<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

//取得使用者
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
//權限檢查
$sql="select sign_mis from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($sign_mis)=$xoopsDB->fetchRow($result);
if($sign_mis == 'N' or $sign_mis == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

//state:4 評估完成
$state=" state='4' and ";
$type=4;
$main = list_requireform($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>