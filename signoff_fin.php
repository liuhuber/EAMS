<?php

include "../../mainfile.php";
include "function.php";
include "function_a.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

//取得使用者
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
//權限檢查
$sql="select sign_fin from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($sign_fin)=$xoopsDB->fetchRow($result);
if($sign_fin == 'N' or $sign_fin == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

//state: 7 (情系部已簽核)
$state=" (state='7') and ";
$type=7;
$main = list_requireform_nohr($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>