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
$sql="select acceptance from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($acceptance)=$xoopsDB->fetchRow($result);
if($acceptance == 'N' or $acceptance == ''){
	redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
}
//HR
$uname2= $xoopsUser->uname();

//權限檢查
$sql="select eva_m from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname2}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($eva_m)=$xoopsDB->fetchRow($result);

/*if($eva_m == 'H'){


}else{
//state:8 財會已簽核

$main = list_requireform($state,$type); 
}
*/
switch($eva_m){
case "F":
$state=" state='8' and ";
$type=8;
$main = list_requireform_fi($state,$type);
break;
case "H":
$state=" state='7' and ";
$type=8;
$main = list_requireform_hr($state,$type); 
break;
case "A":
$state=" state='8' and ";
$type=8;
$main = list_requireform($state,$type);
break;
default:
$state=" state='8' and ";
$type=8;
$main = list_requireform_own($state,$type,$uname2);

}


include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>