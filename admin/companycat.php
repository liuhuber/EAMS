<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/

//編輯需求單的公司名稱，包括新增和修改時會使用
function &edit($company=""){
	//若是有$company編號，則視為修改，需取出該分類資料
	$cat_data=(!empty($company))?get_companycat_data($company):array(); 
	//編輯畫面
	$main="<h3>編輯公司名稱</h3>
	<FORM action='".$_SERVER['PHP_SELF']."' method='POST'>
	<table>
	<tbody>
		<tr>
		<td>公司名稱：</td>
		<td><INPUT type='text' name='data[cname]' size='30' value='".$cat_data['cname']."'></td>
        </tr>
    </tbody>
	</table>
	<INPUT type='hidden' name='data[company]' value='$company'>
    <INPUT type='hidden' name='op' value='save'>
	<INPUT type='submit' value='儲存'>
	 </FORM>";
	return $main;
}

//儲存分類設定
function save($data=array()){
	global $xoopsDB;
	//利用replace來新增或修改fileup_categories資料表中的資料
	$sql_replace = "replace into ".$xoopsDB->prefix("companycat")." (company, cname)  values ('".$data['company']."', '".$data['cname']."')";

	//執行SQL語法
	$xoopsDB->query($sql_replace) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$company=$xoopsDB->getInsertId();

	//傳回編號
	return $company;
}

//現有所有分類的列表
function &list_categories(){
	global $xoopsDB;
	//找出目前companycat資料表中的所有分類資料
	$sql_select = "select company, cname from ".$xoopsDB->prefix("companycat")." order by company";

	//執行SQL語法
	$result = $xoopsDB->query($sql_select) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");

	$list="";

	//將所有資料取出，並做成表格
	while (list($company, $cname)=$xoopsDB->fetchRow($result)) {
		//利用所屬公司編號$of_company取得所屬公司之名稱
	//	$category_name=get_category_name($of_company);
		$list.="<tr bgcolor='white'>
      <td>$cname</td>
      <td><a href='".$_SERVER['PHP_SELF']."?op=edit&company=$company'>編輯</a> | <a href='".$_SERVER['PHP_SELF']."?op=del&company=$company'>刪除</a></td></tr>";
	}

	//所有公司的列表  <h3>現有需求單公司名稱列表</h3>
	$main="
	<table cellspacing='1' cellpadding='3' bgcolor='black'  width=100%>
	<tr bgcolor='#D9E8FF'><td>公司名稱</td><td>功能</td></tr>
	$list
	</table>";

	//傳回列表
	return $main;
}

//刪除某一分類
function del_cat($company=""){
	global $xoopsDB;
	//從fileup_categories資料表中根據company編號來刪除一筆資料
	$sql_delete = "delete from ".$xoopsDB->prefix("companycat")." where company='$company'";
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
	$main=&edit($_GET['company']);
	break;

	//$op等於save時，進行儲存動作
	case "save";
	save($_POST['data']);
	header("location: ".$_SERVER['PHP_SELF']);
	break;

	//$op等於del時，進行刪除動作
	case "del";
	del_cat($_GET['company']);
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
echo "<a href='".$_SERVER['PHP_SELF']."'>列出公司名稱</a> | <a href='".$_SERVER['PHP_SELF']."?op=edit'>新增公司名稱</a><br></br>";

//印出主要內容
echo $main;

//引入XOOPS2頁尾檔
xoops_cp_footer();
?>
