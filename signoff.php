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
$sql="select sign_mis, sign_fin from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($sign_mis, $sign_fin)=$xoopsDB->fetchRow($result);
if($sign_mis == 'N' and $sign_fin == 'N'){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

//state:4 評估完成 or 7 (情報系統部已簽核)
$state=" (state='4' or state='7') and ";
$type=4;
$main = list_requireform($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>