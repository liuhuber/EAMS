<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}
$uid = $xoopsUser->uid();

$sql="1=1";

//需求單號查詢
if($_POST[id]) $sql .= " and id like '%$_POST[id]%'";

//狀態查詢
if($_POST[state]) $sql .= " and state = '$_POST[state]'";

//模組名稱查詢
if($_POST[module]){ 
	switch($_POST[module]){
	case "1":
	$sql .= " and module = 'BASIS' ";
	break;
	case "2":
	$sql .= " and module = 'FI' ";
	break;
	case "3":
	$sql .= " and module = 'CO' ";
	break;
	case "4":
	$sql .= " and module = 'MM' ";
	break;
	case "5":
	$sql .= " and module = 'BW' ";
	break;
	case "6":
	$sql .= " and module = 'BCS' ";
	break;
	case "7":
	$sql .= " and module = 'WEB' ";
	break;
	case "8":
	$sql .= " and module = 'HR' ";
	break;
	case "9":
	$sql .= " and module = 'ABAP' ";
	break;
	case "10":
	$sql .= " and module = 'TR' ";
	break;
	case "11":
	$sql .= " and module = 'HR' ";
	break;
	case "17":
	$sql .= " and module = 'Others' ";
	break;
	case "18":
	$sql .= " and module = '禮券' ";
	break;
	case "19":
	$sql .= " and module = '$_POST[module]' ";
	break;
	
	default:
	$sql .= " and module = '' ";
	}
}
//公司名稱查詢
if($_POST[company]) $sql .= " and company = '$_POST[company]'";

//專案名稱查詢
if($_POST[project]) $sql .= " and project = '$_POST[project]'";

//提單者查詢
if($_POST[submitter_fullname]) $sql .= " and submitter_fullname like '%$_POST[submitter_fullname]%'";

//提單日期查詢
//if($_POST[raised_date1] and $_POST[raised_date2]) $sql .= " and date_raised >= '$_POST[raised_date1]' and date_raised <= '$_POST[raised_date2]'";

//負責顧問查詢
if($_POST[owner_fullname]) $sql .= " and owner_fullname like '%$_POST[owner_fullname]%'";

//主旨查詢
if($_POST[headline]) $sql .= " and headline like '%$_POST[headline]%'";

//內容查詢
if($_POST[content]) $sql .= " and content like '%$_POST[content]%'";

$sql .= " and ";
$type="";
$main = list_requireform($sql,$type);  
include "../../header.php";
echo $main;

//echo my_menu();

include "../../footer.php";
?>