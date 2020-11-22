<?php

include "../../mainfile.php";
include "function.php";
include "function_J.php";
include "function_a.php";

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
//HR
$uname2= $xoopsUser->uname();

//權限檢查
$sql="select eva_m from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname2}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($eva_m)=$xoopsDB->fetchRow($result);

switch($eva_m){
case "F":
$state=" (state='3' or state='13' or state='17') and ";
$type=3;
$main = list_requireform_fi($state,$type);
break;
case "H":
$state=" (state='3' or state='13' or state='17') and ";
$type=3;
$main = list_requireform_hr($state,$type); 
break;
case "A":
$state=" (state='3' or state='13' or state='17') and ";
$type=3;
$main = list_requireform($state,$type);
break;
default:
$state=" (state='3' or state='13' or state='17') and ";
$type=3;
$main = list_requireform_own($state,$type,$uname2);

}

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>