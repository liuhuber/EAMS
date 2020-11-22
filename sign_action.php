<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;
	
if(!empty($_REQUEST['sign_uhd']))
{
	//	state = '4' (評估完成) -> '6' (UHD單已簽核)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '6', `action_entry2` = '{$_POST['action_entry2']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>UHD單已簽核完成: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['sign_mis']))
{
	//	state = '4' (評估完成) -> '7' (情系部已簽核)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '7', `action_entry2` = '{$_POST['action_entry2']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>情報系統部已簽核完成: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
	//$id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
}
else
if(!empty($_REQUEST['sign_fin']))
{
	//	state = '7' (情系部已簽核) -> '8' (財會小組已簽核)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '8', `action_entry3` = '{$_POST['action_entry3']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>財會小組主管已簽核完成: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['wait']))
{
	//	state = '4' (評估完成) -> '13' (待修改)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '13', `action_entry2` = '{$_POST['action_entry2']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>待修改: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['reject']))
{
	//	state = '4' (評估完成) -> '15' (拒絕)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '15', `action_entry2` = '{$_POST['action_entry2']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>拒絕: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['delay']))
{
	//	state = '4' (評估完成) -> '16' (延緩)
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '16', `action_entry2` = '{$_POST['action_entry2']}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>延緩: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['sign_accept']))
{
	//	state = '8' (財會小組主管已簽核) -> '9' (使用者驗收中)
	$inform_date=date("Y-m-d H:i:s" , strtotime("now"));
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '9', `action_entry` = '{$_POST['action_entry']}', `inform_date` = '{$inform_date}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>使用者驗收中: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['sign_prd']) or !empty($_REQUEST['sign_prd2']))
{
	//	state = '6' (UHD單已簽核) or '9' (使用者驗收中) -> '10' (已轉入正式環境)
	$transport_date=date("Y-m-d H:i:s" , strtotime("now"));
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '10', `transport_date` = '{$transport_date}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>已轉入正式環境: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}
else
if(!empty($_REQUEST['sign_close']))
{
	//	state = '10' (已轉入正式環境) -> 12(結案)
	$close_date=date("Y-m-d H:i:s" , strtotime("now"));
    $sql = "update ".$xoopsDB->prefix('requireform')." set `state` = '12', `workhour_date` = '{$_POST['workhour_date']}', `amsclose_date` = '{$close_date}', `infoclose_date` = '{$close_date}' where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	$main="<h4>結案: <FONT COLOR=red><B><a href='".XOOPS_URL."/modules/clog/view.php?sn=$_POST[sn]'> $_POST[id]</a></B></FONT></h4>";
}




include "../../header.php";
echo $main;
echo "<div>[<a href='index.php'>回首頁</a>]</div>";
//echo my_menu();

include "../../footer.php";
?>