<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

// 權限檢查
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
$sql="select evaluation from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($evaluation)=$xoopsDB->fetchRow($result);
if($evaluation == 'N' or $evaluation == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}


//state:3 待評估 or 13 (待修改)
$state=" (state='3' or state='13') and ";
$type=3;
$main = list_requireform($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>