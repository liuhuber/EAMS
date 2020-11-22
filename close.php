<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_REQUIRE_MUST_LOGIN);
}

// 權限檢查
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
$sql="select assign from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($assign)=$xoopsDB->fetchRow($result);
if($assign == 'N' or $assign == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

//state: 10(已轉入正式環境)
$state=" state='10' and ";
$type=10;
$main = list_requireform($state,$type);

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>