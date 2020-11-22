<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/

//編輯需求單的問題分類，包括新增和修改時會使用
function &edit($reqtype=""){
	//若是有問題分類編號，則視為修改，需取出該分類資料
	$cat_data=(!empty($reqtype))?get_reqtypecat_data($reqtype):array(); 
	//編輯畫面
	$main="<h3>編輯問題分類</h3>
	<FORM action='".$_SERVER['PHP_SELF']."' method='POST'>
	<table><tbody>
	 <tr>
	   <td>問題分類：</td>
		 <td><INPUT type='text' name='data[rname]' size='30' value='".$cat_data['rname']."'></td>
   </tr>
	</tbody></table>
	 <INPUT type='hidden' name='data[reqtype]' value='$reqtype'>
    <INPUT type='hidden' name='op' value='save'>
	 <INPUT type='submit' value='儲存'>
	</FORM>";
	return $main;
}

//儲存問題分類
function save($data=array()){
	global $xoopsDB;
	//利用replace來新增或修改問題分類資料表reqtypecat中的資料
	$sql_replace = "replace into ".$xoopsDB->prefix("reqtypecat")." (reqtype, rname)  values ('".$data['reqtype']."', '".$data['rname']."')";

	//執行SQL語法
	$xoopsDB->query($sql_replace) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$reqtype=$xoopsDB->getInsertId();

	//傳回編號
	return $reqtype;
}

//現有所有分類的列表
function &list_categories(){
	global $xoopsDB;
	//找出目前reqtypecat資料表中的所有問題分類資料
	$sql_select = "select reqtype, rname from ".$xoopsDB->prefix("reqtypecat")." order by reqtype";

	//執行SQL語法
	$result = $xoopsDB->query($sql_select) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");

	$list="";

	//將所有資料取出，並做成表格
	while (list($reqtype, $rname)=$xoopsDB->fetchRow($result)) {
	//利用所屬問題分類編號取得所屬專案之名稱
	//	$category_name=get_category_name($of_reqtype);
		$list.="<tr bgcolor='white'>
      <td>$rname</td>
      <td><a href='".$_SERVER['PHP_SELF']."?op=edit&reqtype=$reqtype'>編輯</a> | <a href='".$_SERVER['PHP_SELF']."?op=del&reqtype=$reqtype'>刪除</a></td>
    </tr>";
	}

	//所有專案的列表    <h4>專案名稱列表</h4>
	$main="
	<table cellspacing='1' cellpadding='3' bgcolor='black'  width=100%>
	<tr bgcolor='#D9E8FF'><td>問題分類名稱</td><td>功能</td></tr>
	$list
	</table>";

	//傳回列表
	return $main;
}

//刪除某一分類
function del_cat($reqtype=""){
	global $xoopsDB;
	//從fileup_categories資料表中根據reqtype編號來刪除一筆資料
	$sql_delete = "delete from ".$xoopsDB->prefix("reqtypecat")." where reqtype='$reqtype'";
	//執行SQL語法
	$xoopsDB->queryF($sql_delete) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
}

/*-----------執行動作判斷區--------------*/

//若有傳入名為op之變數指定為變數$op
$op = (!isset($_REQUEST['op']))? "":$_REQUEST['op'];

//利用$op傳入的值來控制流程
switch($op){
	//$op等於edit時，進行編輯動作
	case "edit";
	$main=&edit($_GET['reqtype']);
	break;

	//$op等於save時，進行儲存動作
	case "save";
	save($_POST['data']);
	header("location: ".$_SERVER['PHP_SELF']);
	break;

	//$op等於del時，進行刪除動作
	case "del";
	del_cat($_GET['reqtype']);
	header("location: ".$_SERVER['PHP_SELF']);
	break;

	//$op不等於以上任一條件時，列出所有分類
	default:
	$main=&list_categories();
	break;
}

/*-----------秀出結果區--------------*/

//引入XOOPS2頁首檔
xoops_cp_header();

//印出相關連結
echo "<a href='".$_SERVER['PHP_SELF']."'>列出問題分類</a> | <a href='".$_SERVER['PHP_SELF']."?op=edit'>新增問題分類</a><br></br>";

//印出主要內容
echo $main;

//引入XOOPS2頁尾檔
xoops_cp_footer();
?>
