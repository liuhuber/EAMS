<?php

include "../../mainfile.php";
include "function.php";
include "function_a.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

// 權限檢查
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
$sql="select transport from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($transport)=$xoopsDB->fetchRow($result);
if($transport == 'N' or $transport == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}

//state: 6(UHD單已簽核), 9(使用者驗收中)
$state=" (state='6' or state='9') and ";
$type=9;
//$main = list_requireform($state,$type);

$uname2= $xoopsUser->uname();

//權限檢查
$sql="select eva_m from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname2}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($eva_m)=$xoopsDB->fetchRow($result);


switch($eva_m){
case "F":
$main = list_requireform_fi($state,$type);
break;
case "H":
$main = list_requireform_hr($state,$type);
break;
case "A":
$main = list_requireform($state,$type);
break;
default:
$main = list_requireform_own($state,$type,$uname2);

}



include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>