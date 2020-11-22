<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/

//編輯需求單的部門名稱，包括新增和修改時會使用
function &edit($department=""){
	//若是有$department編號，則視為修改，需取出該分類資料
	$cat_data=(!empty($department))?get_departmentcat_data($department):array(); 
	//編輯畫面
	$main="<h3>編輯部門名稱</h3>
	<FORM action='".$_SERVER['PHP_SELF']."' method='POST'>
	<table>
	<tbody>
		<tr>
		<td>部門名稱：</td>
		<td><INPUT type='text' name='data[dname]' size='30' value='".$cat_data['dname']."'></td>
        </tr>
    </tbody>
	</table>
	<INPUT type='hidden' name='data[department]' value='$department'>
    <INPUT type='hidden' name='op' value='save'>
	<INPUT type='submit' value='儲存'>
	 </FORM>";
	return $main;
}

//儲存分類設定
function save($data=array()){
	global $xoopsDB;
	//利用replace來新增或修改fileup_categories資料表中的資料
	$sql_replace = "replace into ".$xoopsDB->prefix("departmentcat")." (department, dname)  values ('".$data['department']."', '".$data['dname']."')";

	//執行SQL語法
	$xoopsDB->query($sql_replace) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$department=$xoopsDB->getInsertId();

	//傳回編號
	return $department;
}

//現有所有分類的列表
function &list_categories(){
	global $xoopsDB;
	//找出目前departmentcat資料表中的所有分類資料
	$sql_select = "select department, dname from ".$xoopsDB->prefix("departmentcat")." order by department";

	//執行SQL語法
	$result = $xoopsDB->query($sql_select) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");

	$list="";

	//將所有資料取出，並做成表格
	while (list($department, $dname)=$xoopsDB->fetchRow($result)) {
	//利用所屬部門編號$of_department取得所屬部門之名稱
	//	$category_name=get_category_name($of_department);
		$list.="<tr bgcolor='white'>
      <td>$dname</td>
      <td><a href='".$_SERVER['PHP_SELF']."?op=edit&department=$department'>編輯</a> | <a href='".$_SERVER['PHP_SELF']."?op=del&department=$department'>刪除</a></td>
    </tr>";
	}

	//所有部門的列表  <h3>現有需求單部門名稱列表</h3>
	$main="
	<table cellspacing='1' cellpadding='3' bgcolor='black'  width=100%>
	<tr bgcolor='#D9E8FF'><td>部門名稱</td><td>功能</td></tr>
	$list
	</table>";

	//傳回列表
	return $main;
}

//刪除某一分類
function del_cat($department=""){
	global $xoopsDB;
	//從fileup_categories資料表中根據department編號來刪除一筆資料
	$sql_delete = "delete from ".$xoopsDB->prefix("departmentcat")." where department='$department'";
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
	$main=&edit($_GET['department']);
	break;

	//$op等於save時，進行儲存動作
	case "save";
	save($_POST['data']);
	header("location: ".$_SERVER['PHP_SELF']);
	break;

	//$op等於del時，進行刪除動作
	case "del";
	del_cat($_GET['department']);
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
echo "<a href='".$_SERVER['PHP_SELF']."'>列出所有部門</a> | <a href='".$_SERVER['PHP_SELF']."?op=edit'>新增部門名稱</a><br></br>";

//印出主要內容
echo $main;

//引入XOOPS2頁尾檔
xoops_cp_footer();
?>
