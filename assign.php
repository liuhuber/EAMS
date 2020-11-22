<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_REQUIRE_MUST_LOGIN);
}

//取得使用者
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
//權限檢查
$sql="select assign from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($assign)=$xoopsDB->fetchRow($result);
if($assign == 'N' or $assign == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

// stat=1(提單), type=1(執行assign_owner.php)
$state=" state='1' and ";
$type=1;
$main = list_requireform($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>