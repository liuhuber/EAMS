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
//主旨查詢
if($_POST[headline]) $sql .= " and id like '%$_POST[headline]%'";
$sql .= " and ";
$type="";

$main = list_requireform($sql,$type); 
//$main = list_requireform($sql,$type); 

include "../../header.php";

//echo my_menu();
echo $all_news;
include "../../footer.php";
?>