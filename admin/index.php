<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/

//編輯需求單的類別名稱，包括新增和修改時會使用
function &edit($id=""){
	//若是有$esn編號，則視為修改，需取出該分類資料
	$cat_data=(!empty($id))?get_requireform_data($id):array(); 
    $statecat_select=get_statecat_select($cat_data['state']);
    $statecat_data=get_statecat_data($cat_data['state']);
	$projectcat_select=get_projectcat_select($cat_data['project_id']);
    $projectcat_data=get_projectcat_data($cat_data['project_id']);
    $prioritycat_select=get_prioritycat_select($cat_data['priority']);
    $prioritycat_data=get_prioritycat_data($cat_data['priority']);
	$companycat_select=get_companycat_select($cat_data['company']);
    $companycat_data=get_companycat_data($cat_data['company']);
	
	
	//編輯畫面
	$main="<h3>編輯需求單的基本資料</h3>
	<FORM action='".$_SERVER['PHP_SELF']."' method='POST'>
	<table>
	<tbody>	
    <tr>
		<td>需求單單號：</td>
		<td><INPUT type='text' name='data[id]' size='30' value='".$cat_data['id']."'></td>
		<td>狀態：</td>
		<td>
          <select name='data[state]'>
	      <option selected value='".$statecat_data['sname']."'>".$statecat_data['sname']."</option>
	      $statecat_select </select>
		</td>	
    </tr>
    <tr>
		<td>專案名稱：</td>
		<td>
		  <select name='data[project_id]'>
	      <option selected value='".$projectcat_data['project_name']."'>".$projectcat_data['project_name']."</option>
	      $projectcat_select </select>
		</td>
		<td>優先度：</td>
		<td>
		  <select name='data[priority]'>
	      <option selected value='".$prioritycat_data['priority_name']."'>".$prioritycat_data['priority_name']."</option>
	      $prioritycat_select </select>
		</td>
    </tr>
	
    <tr>
	    <td>公司名稱：</td>
		<td>
		  <select name='data[company]'>
	      <option selected value='".$companycat_data['company_name']."'>".$companycat_data['company_name']."</option>
	      $companycat_select </select>
		</td>
		<td>收文日期：</td>
		<td><INPUT type='text' name='data[receive_date]' size='30' value='".$cat_data['receive_date']."'></td>
    </tr>
	<tr>
		<td>提單者：</td>
		<td><INPUT type='text' name='data[submitter_fullname]' size='30' value='".$cat_data['submitter_fullname']."'></td>
		<td>提單日期：</td>
		<td><INPUT type='text' name='data[date_raised]' size='30' value='".$cat_data['date_raised']."'></td>
    </tr>
    <tr>
		<td>提單單位：</td>
		<td><INPUT type='text' name='data[writedep]' size='30' value='".$cat_data['writedep']."'></td>
		<td>希望完成日期：</td>
		<td><INPUT type='text' name='data[target_date]' size='30' value='".$cat_data['target_date']."'></td>
    </tr>
    <tr>
		<td>原需求者：</td>
		<td><INPUT type='text' name='data[originator]' size='30' value='".$cat_data['originator']."'></td>
		<td>驗收者電話：</td>
		<td><INPUT type='text' name='data[phone]' size='30' value='".$cat_data['phone']."'></td>
    </tr>		
    
    <tr>
		<td>原需求單位：</td>
		<td><INPUT type='text' name='data[needdep]' size='30' value='".$cat_data['needdep']."'></td>
		<td>E-mail：</td>
		<td><INPUT type='text' name='data[email]' size='30' value='".$cat_data['email']."'></td>
    </tr>
	
    <tr>
		<td>單位主管：</td>
		<td><INPUT type='text' name='data[dep_manager]' size='30' value='".$cat_data['dep_manager']."'></td>
		<td>參考單號：</td>
		<td><INPUT type='text' name='data[referenceid]' size='30' value='".$cat_data['referenceid']."'></td>
    </tr>
	
    <tr>
		<td>主題：</td>
		<td><INPUT type='text' name='data[headline]' size='60' value='".$cat_data['headline']."'></td>
    </tr>
    <tr>
		<td>內容：</td>
		<td><textarea  rows='10' cols='60' name='data[description]' >".$cat_data['description']."</textarea></td>
    </tr>
	
	</tbody>
	</table>
	<INPUT type='hidden' name='data[id]' value='$id'>
    <INPUT type='hidden' name='op' value='save'>
	<INPUT type='submit' value='儲存'>
	</FORM>";
	return $main;
}



//儲存分類設定
function save($data=array()){
	global $xoopsDB;
	//利用replace來新增或修改fileup_categories資料表中的資料
    $statecat_sn_data=get_statecat_sn_data($data['state']);
    $data['state']=$statecat_sn_data['state'];
	$projectcat_sn_data=get_projectcat_sn_data($data['project_id']);
    $data['project_id']=$projectcat_sn_data['project_id'];
    $prioritycat_sn_data=get_prioritycat_sn_data($data['priority']);
    $data['priority']=$prioritycat_sn_data['priority'];
    $companycat_sn_data=get_companycat_sn_data($data['company']);
    $data['company']=$companycat_sn_data['company'];
    	
	
//	$sql_replace = "replace into ".$xoopsDB->prefix("requireform")." (esn, csn,ename,eno,ecompany,etype,emoneyno,eown,eplace,ebuydate,eokdate,enow,eborrow,ebman,enote)  values ('".$data['esn']."', '".$data['csn']."','".$data['ename']."','".$data['eno']."', '".$data['ecompany']."', '".$data['etype']."', '".$data['emoneyno']."', '".$data['eown']."', '".$data['eplace']."', '".$data['ebuydate']."', '".$data['eokdate']."', '".$data['enow']."', '".$data['eborrow']."', '".$data['ebman']."', '".$data['enote']."')";
//    $sql_replace = "replace into ".$xoopsDB->prefix("requireform")." (id,state,project_name,priority,company,receive_date,submitter_fullname,date_raised,writedep,target_date,originator,phone,needdep,email,dep_manager,referenceid,headline,description) values ('".$data['id']."', '".$data['state']."','".$data['project_name']."','".$data['priority']."', '".$data['company']."', '".$data['receive_date']."', '".$data['submitter_fullname']."', '".$data['date_raised']."', '".$data['writedep']."', '".$data['target_date']."', '".$data['originator']."', '".$data['phone']."', '".$data['needdep']."', '".$data['email']."', '".$data['dep_manager']."', '".$data['referenceid']."', '".$data['headline']."', '".$data['description']."')";
    $sql_replace = "replace into ".$xoopsDB->prefix("requireform")." (id,state,company,headline,submitter_fullname) values ('".$data['id']."','".$data['state']."','".$data['company']."','".$data['headline']."','".$data['submitter_fullname']."')";
	//執行SQL語法
	$xoopsDB->query($sql_replace) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$id=$xoopsDB->getInsertId();

	//傳回編號
	return $id;
}

//現有所有分類的列表
function &list_categories(){
	global $xoopsDB;
	//找出目前requireform資料表中的所有分類資料
	//$sql_select = "select esn, cname, cnote from ".$xoopsDB->prefix("requireform")." order by esn";
    $sql_select = "select id,state,company,headline,submitter_fullname from ".$xoopsDB->prefix("requireform")." order by id desc";

	//執行SQL語法
	$result = $xoopsDB->query($sql_select) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");

	$list="";

	//將所有資料取出，並做成表格
	while (list($id,$state,$company,$headline,$submitter_fullname)=$xoopsDB->fetchRow($result)) {
		//利用所屬類別編號$of_esn取得所屬類別之名稱
//		$category_name=get_category_name($of_esn);
        $statecat_data=get_statecat_data($state);
		$companycat_date=get_companycat_data($company);

		$list.="<tr bgcolor='white'><td>$id</td><td>".$statecat_data['sname']."</td><td>".$companycat_date['company_name']."</td><td>$headline</td><td>$submitter_fullname</td><td><a href='".$_SERVER['PHP_SELF']."?op=edit&id=$id'>編輯</a> | <a href='".$_SERVER['PHP_SELF']."?op=del&id=$id'>刪除</a></td></tr>";
	}

	//所有類別的列表
	$main="<h3>現有所有需求單資料列表</h3>
	<table cellspacing='1' cellpadding='3' bgcolor='black'  width=100%>
	<tr bgcolor='#D9E8FF'><td>需求單號</td><td>狀態</td><td>公司</td><td>主旨</td><td>提單者</td><td>功能</td></tr>
	$list
	</table>";

	//傳回列表
	return $main;
}



//刪除某一分類
function del_cat($esn=""){
	global $xoopsDB;
	//從fileup_categories資料表中根據esn編號來刪除一筆資料
	$sql_delete = "delete from ".$xoopsDB->prefix("requireform")." where esn='$esn'";
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
	$main=&edit($_GET['id']);
	break;

	//$op等於save時，進行儲存動作
	case "save";
	save($_POST['data']);
	header("location: ".$_SERVER['PHP_SELF']);
	break;

	//$op等於del時，進行刪除動作
	case "del";
	del_cat($_GET['id']);
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
echo "<a href='".$_SERVER['PHP_SELF']."'>列出需求單</a> | <a href='".$_SERVER['PHP_SELF']."?op=edit'>新增需求單</a>";

//印出主要內容
echo $main;

//引入XOOPS2頁尾檔
xoops_cp_footer();
?>
