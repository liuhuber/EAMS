<?php

//取得需求單專案的基本資料  (由編號－＞名稱)
function get_projectcat_data($project=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("projectcat")." where project='$project'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單狀態的名稱
function get_statecat_select($select_state=""){
	global $xoopsDB;
	$sql="select state, sname from ".$xoopsDB->prefix("statecat");
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
        while (list($state,$sname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_state==$state)?"selected":"";
		$option.="<option value='$sname' $selected>$sname</option>";
	}
     return $option;
}

function get_statecat_select2($select_state=""){
	global $xoopsDB;
	$sql="select state, sname from ".$xoopsDB->prefix("statecat")." order by sname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
	while (list($state, $sname)=$xoopsDB->fetchRow($result)) {
		$option["$state"]=$sname;
	}
	
    return $option;
}

//取得需求單狀態的基本資料  (由編號－＞名稱） ok
function get_statecat_data($state=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("statecat")." where state='$state'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單狀態的基本資料(由名稱－＞編號） ok
function get_statecat_sn_data($sname=""){
	global $xoopsDB;
	$sql_select = "select * from ".$xoopsDB->prefix("statecat")." where sname='$sname'";
	$result = $xoopsDB->query($sql_select) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得專案名稱資料
function get_projectcat_select($select_project=""){
	global $xoopsDB;
	$sql="select project, pname from ".$xoopsDB->prefix("projectcat")." order by project";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
        while (list($project,$pname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_project==$project)?"selected":"";
		$option.="<option value='$pname' $selected>$pname</option>";
	}
     return $option;
}

function get_projectcat_select2($select_project=""){
	global $xoopsDB;
	$sql="select project, pname from ".$xoopsDB->prefix("projectcat")." order by pname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
	while (list($project, $pname)=$xoopsDB->fetchRow($result)) {
		$option["$project"]=$pname;
	}
    return $option;
}

//取得需求單專案的基本資料(由名稱－＞編號） ok
function get_projectcat_sn_data($pname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("projectcat")." where pname='$pname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中優先權的資料ok
function get_prioritycat_select($select_priority=""){
	global $xoopsDB;
	$sql="select priority, pname from ".$xoopsDB->prefix("prioritycat")." order by pname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
        while (list($priority,$pname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_priority==$priority)?"selected":"";
		$option.="<option value='$pname' $selected>$pname</option>";
	}
     return $option;
}

function get_prioritycat_select2($select_priority=""){
	global $xoopsDB;
	$sql="select priority, pname from ".$xoopsDB->prefix("prioritycat")." order by pname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
        while (list($priority,$pname)=$xoopsDB->fetchRow($result)) {
		$option["$priority"]=$pname;
	}
     return $option;
}

//取得需求單中優先權的基本資料  (由編號－＞名稱） ok
function get_prioritycat_data($priority=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("prioritycat")." where priority='$priority'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中優先權的基本資料(由名稱－＞編號） ok
function get_prioritycat_sn_data($pname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("prioritycat")." where pname='$pname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中公司名稱的資料ok
function get_companycat_select($select_company=""){
	global $xoopsDB;
	$sql="select company, cname from ".$xoopsDB->prefix("companycat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($company,$cname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_company==$company)?"selected":"";
		$option.="<option value='$cname' $selected>$cname</option>";
	}
     return $option;
}

function get_companycat_select2($select_company=""){
	global $xoopsDB;
	$sql="select company, cname from ".$xoopsDB->prefix("companycat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($company, $cname)=$xoopsDB->fetchRow($result)) {
		$option["$company"]=$cname;
	}
    return $option;
}

//取得需求單中公司名稱的基本資料  (由編號－＞名稱） ok
function get_companycat_data($company=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("companycat")." where company='$company'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中公司名稱的基本資料(由名稱－＞編號） ok
function get_companycat_sn_data($cname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("companycat")." where cname='$cname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中部門名稱的資料ok
function get_departmentcat_select($select_department=""){
	global $xoopsDB;
	$sql="select department, dname from ".$xoopsDB->prefix("departmentcat")." order by dname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($department,$dname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_department==$department)?"selected":"";
		$option.="<option value='$dname' $selected>$dname</option>";
	}
     return $option;
}

function get_departmentcat_select2($select_department=""){
	global $xoopsDB;
	$sql="select department, dname from ".$xoopsDB->prefix("departmentcat")." order by dname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($department,$dname)=$xoopsDB->fetchRow($result)) {
		$option["$department"]=$dname;
	}
     return $option;
}

//取得需求單中部門名稱的基本資料  (由編號－＞名稱） ok
function get_departmentcat_data($department=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("departmentcat")." where department='$department'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中部門名稱的基本資料(由名稱－＞編號） ok
function get_departmentcat_sn_data($dname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("departmentcat")." where dname='$dname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}
// *
//取得需求單中模組名稱的資料ok
function get_modulecat_select($select_module=""){
	global $xoopsDB;
	$sql="select module, mname from ".$xoopsDB->prefix("modulecat")." order by mname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($module,$mname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_module==$module)?"selected":"";
		$option.="<option value='$mname' $selected>$mname</option>";
	}
     return $option;
}

function get_modulecat_select2($select_module=""){
	global $xoopsDB;
	$sql="select module, mname from ".$xoopsDB->prefix("modulecat")." order by mname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($module,$mname)=$xoopsDB->fetchRow($result)) {
		$option["$module"]=$mname;
	}
     return $option;
}

//取得需求單中模組名稱的基本資料  (由編號－＞名稱） ok
function get_modulecat_data($module=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("modulecat")." where module = '$module'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中模組名稱的基本資料(由名稱－＞編號） ok
function get_modulecat_sn_data($dname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("modulecat")." where mname='$mname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

// *
//取得需求單中問題分類的資料ok
function get_categorycat_select($select_category=""){
	global $xoopsDB;
	$sql="select category, cname from ".$xoopsDB->prefix("categorycat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($category,$cname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_category==$category)?"selected":"";
		$option.="<option value='$cname' $selected>$cname</option>";
	}
     return $option;
}

function get_categorycat_select2($select_category=""){
	global $xoopsDB;
	$sql="select category, cname from ".$xoopsDB->prefix("categorycat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($category,$cname)=$xoopsDB->fetchRow($result)) {
		$option["$category"]=$cname;
	}
     return $option;
}

//取得需求單中問題分類的基本資料  (由編號－＞名稱） ok
function get_categorycat_data($category=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("categorycat")." where category = '$category'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中問題分類的基本資料(由名稱－＞編號） ok
function get_categorycat_sn_data($dname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("categorycat")." where cname='$cname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}
// **************************************************************
// *
//取得需求單中問題分類的資料ok
function get_reqtypecat_select($select_reqtype=""){
	global $xoopsDB;
	$sql="select reqtype, rname from ".$xoopsDB->prefix("reqtypecat")." order by rname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($reqtype,$rname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_reqtype==$reqtype)?"selected":"";
		$option.="<option value='$rname' $selected>$rname</option>";
	}
     return $option;
}

function get_reqtypecat_select2($select_reqtype=""){
	global $xoopsDB;
	$sql="select reqtype, rname from ".$xoopsDB->prefix("reqtypecat")." order by rname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($reqtype,$rname)=$xoopsDB->fetchRow($result)) {
		$option["$reqtype"]=$rname;
	}
     return $option;
}

//取得需求單中問題分類的基本資料  (由編號－＞名稱） ok
function get_reqtypecat_data($reqtype=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("reqtypecat")." where reqtype = '$reqtype'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得需求單中問題分類的基本資料(由名稱－＞編號） ok
function get_reqtypecat_sn_data($dname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("reqtypecat")." where rname='$rname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得顧問人員資料
function get_consultantcat_select($select_consultant=""){
	global $xoopsDB;
	$sql="select consultant, cname from ".$xoopsDB->prefix("consultantcat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($consultant,$cname)=$xoopsDB->fetchRow($result)) {
		$selected=($select_consultant==$consultant)?"selected":"";
		$option.="<option value='$cname' $selected>$cname</option>";
	}
     return $option;
}

function get_consultantcat_select2($select_consultant=""){
	global $xoopsDB;
	$sql="select consultant, cname from ".$xoopsDB->prefix("consultantcat")." order by cname";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$option="";
    while (list($consultant,$cname)=$xoopsDB->fetchRow($result)) {
		$option["$consultant"]=$cname;
	}
     return $option;
}

//取得顧問人員的資料  (由顧問人員編號 -> 顧問人員名稱)
function get_consultantcat_data($consultant=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("consultantcat")." where consultant = '$consultant'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

//取得顧問人員的資料  (由顧問人員名稱 -> 顧問人員編號)
function get_consultantcat_sn_data($dname=""){
	global $xoopsDB;
	$sql="select * from ".$xoopsDB->prefix("consultantcat")." where cname='$cname'";
	$result=$xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
	$data=$xoopsDB->fetchArray($result);
	return $data;
}

// ****************************************************************************************************************************
// ****************************************************************************************************************************
// ****************************************************************************************************************************

function del_departmentcat($department = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('departmentcat') . " where `department` = '$department'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_departmentcat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('departmentcat') . " set `dname` = '{$_POST['dname']}' where `department` = '{$_POST['department']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function insert_departmentcat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('departmentcat') . " (`dname`) values ('{$_POST['dname']}')";
  $xoopsDB->query($sql);
  $department = $xoopsDB->getInsertId();
  return $department;
}

function add_departmentcat_form($department = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($department)){
    $sql = "select * from " . $xoopsDB->prefix('departmentcat') . " where department = '$department'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($department , $dname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_departmentcat";
  }else{
    $department = $dname = "";
    $op = "save_departmentcat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯部門名稱","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("部門名稱", "dname", "100%", 255 , $dname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("department", $department));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *************************************************
// **************************************************************
function del_modulecat($module = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('modulecat') . " where `module` = '$module'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_modulecat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('modulecat') . " set `mname` = '{$_POST['mname']}' where `module` = '{$_POST['module']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function insert_modulecat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('modulecat') . " (`mname`) values ('{$_POST['mname']}')";
  $xoopsDB->query($sql);
  $module = $xoopsDB->getInsertId();
  return $module;
}

function add_modulecat_form($module = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($module)){
    $sql = "select * from " . $xoopsDB->prefix('modulecat') . " where module = '$module'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($module , $mname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_modulecat";
  }else{
    $module = $mname = "";
    $op = "save_modulecat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯部門名稱","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("部門名稱", "mname", "100%", 255 , $mname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("module", $module));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *********************************************************
function del_companycat($company = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('companycat') . " where `company` = '$company'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_companycat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('companycat') . " set `cname` = '{$_POST['cname']}' where `company` = '{$_POST['company']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function insert_companycat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('companycat') . " (`cname`) values ('{$_POST['cname']}')";
  $xoopsDB->query($sql);
  $company = $xoopsDB->getInsertId();
  return $company;
}

function add_companycat_form($company = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($company)){
    $sql = "select * from " . $xoopsDB->prefix('companycat') . " where company = '$company'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($company , $cname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_companycat";
  }else{
    $company = $cname = "";
    $op = "save_companycat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯公司名稱","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("公司名稱", "cname", "100%", 255 , $cname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("company", $company));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *************************************************
function del_prioritycat($priority = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('prioritycat') . " where `priority` = '$priority'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_prioritycat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('prioritycat') . " set `pname` = '{$_POST['pname']}' where `priority` = '{$_POST['priority']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function insert_prioritycat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('prioritycat') . " (`pname`) values ('{$_POST['pname']}')";
  $xoopsDB->query($sql);
  $priority = $xoopsDB->getInsertId();
  return $priority;
}

function add_prioritycat_form($priority = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($priority)){
    $sql = "select * from " . $xoopsDB->prefix('prioritycat') . " where priority = '$priority'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($priority , $pname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_prioritycat";
  }else{
    $priority = $pname = "";
    $op = "save_prioritycat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯優先度","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("優先度", "pname", "100%", 255 , $pname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("priority", $priority));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *************************************************
function del_projectcat($project = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('projectcat') . " where `project` = '$project'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_projectcat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('projectcat') . " set `pname` = '{$_POST['pname']}' where `project` = '{$_POST['project']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function insert_projectcat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('projectcat') . " (`pname`) values ('{$_POST['pname']}')";
  $xoopsDB->query($sql);
  $project = $xoopsDB->getInsertId();
  return $project;
}

function add_projectcat_form($project = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($project)){
    $sql = "select * from " . $xoopsDB->prefix('projectcat') . " where project = '$project'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($project , $pname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_projectcat";
  }else{
    $project = $pname = "";
    $op = "save_projectcat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯專案名稱","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("專案名稱", "pname", "100%", 255 , $pname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("project", $project));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *************************************************
function del_statecat($state = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $sql = "delete from " . $xoopsDB->prefix('statecat') . " where `state` = '$state'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

function update_statecat()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
//    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('statecat') . " set `sname` = '{$_POST['sname']}' where `state` = '{$_POST['state']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}
function insert_statecat()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
//  $uid = $xoopsUser->getVar('uid');
//  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('statecat') . " (`sname`) values ('{$_POST['sname']}')";
  $xoopsDB->query($sql);
  $state = $xoopsDB->getInsertId();
  return $state;
}

function add_statecat_form($state = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($state)){
    $sql = "select * from " . $xoopsDB->prefix('statecat') . " where state = '$state'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($state , $sname) = $xoopsDB -> fetchRow($result);
//    $post_date = strtotime($post_date);
    $op = "update_statecat";
  }else{
    $state = $sname = "";
    $op = "save_statecat";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("編輯需求單狀態名稱","form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText ("需求單狀態名稱", "sname", "100%", 255 , $sname),true);
//  $configs = array('editor'=> 'ckeditor',  'value' => $content);
//  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
//  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
//  if(!$isAdmin){
//    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
//  }
  $form->addElement(new XoopsFormHidden ("state", $state));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}

// *****************************************************
/**
 * 將需求單存入資料庫
 */
function insert_requireform()
{
  global $xoopsDB , $xoopsUser;

  $uid = $xoopsUser->getVar('uid');
//  $_POST['submitter_fullname'];
//  $_POST['originator'];
//  $_POST['phone];
//  $_POST['email'];
//  $_POST['target_date'];
//  $_POST['headline'];
//  $_POST['content'];
 
// 產生需求單號: 格式為 AMS-yymmddnn (nn = 01 ~ 99) 
  $today=date('ymd');
  $sql="select * from ".$xoopsDB->prefix("requireform")." where id like '%$today%'";
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
  $num = mysql_num_rows($result) + 1;
  $id = "AMS-".date('ymd').str_pad($num, 2, '0', STR_PAD_LEFT);

  $post_state=1;									// 建立需求單 狀態1: 提單
  
  $post_date_raised=date("Y-m-d");					// 提單日為目前日期
  $post_receive_date=date("Y-m-d H:i:s", time());	// 收文日為目前日期
  $post_dep_manager="Paul";
  $post_referenceid="SAP-".date('ymd').str_pad($num, 2, '0', STR_PAD_LEFT);

$sql="insert into ".$xoopsDB->prefix('requireform')." (`id`,`state`,`project`,`priority`,`company`,`receive_date`,
`submitter_fullname`,`date_raised`,`department`,`target_date`,`originator`,`phone`,`needdep`,`email`,`dep_manager`,
`referenceid`,`headline`,`content`) values 
('$id','$post_state','$_POST[project]','$_POST[priority]','$_POST[company]','$post_receive_date',
'{$_POST['submitter_fullname']}','$post_date_raised','$_POST[department]','{$_POST['target_date']}',
'{$_POST['originator']}','{$_POST['phone']}','$_POST[needdep]','{$_POST['email']}','{$_POST['dep_manager']}',
'$post_referenceid','{$_POST['headline']}','{$_POST['new_content']}')";

//  mysql_query ("insert into `x1e8_requireform` (`id`) values ('$id')") or die ("Invalid query");
//  $sql="insert into " . $xoopsDB->prefix('requireform') . " (`id`) values ($id)";
  
  //$xoopsDB->query($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_INS_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  $xoopsDB->query($sql) ;  
/*
  $sn = $xoopsDB->getInsertId();
  if(!empty($_FILES['upfile']['name'])){
    include_once XOOPS_ROOT_PATH.'/class/uploader.php';
    $allow[] = 'image/gif';
    $allow[] = 'image/jpeg';
    $allow[] = 'image/png';
    $allow[] = 'text/plain';
    $allow[] = 'application/zip';
    $dir=XOOPS_ROOT_PATH . '/uploads/clog';
    $uploader = new XoopsMediaUploader($dir , $allow , 2048000);
    $newfilename="{$sn}_{$_FILES['upfile']['name']}";
    $uploader->setTargetFileName($newfilename);
    if ($uploader->fetchMedia('upfile',0)) {
      if (!$uploader->upload()) {
        redirect_header($_SERVER['PHP_SELF'], 5,  $uploader->getErrors());
      } else {
        redirect_header($_SERVER['PHP_SELF'], 5,   $uploader->getSavedDestination() . '上傳成功！');
      }
    } else {
      redirect_header($_SERVER['PHP_SELF'], 5,  $uploader->getErrors());
    }
  }
*/  
  return $id;
}



/**
 * 修改新聞內容
 */
function update_news()
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
    $uid = $xoopsUser->uid();
    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
    $sql = "update " . $xoopsDB->prefix('my_news') . " set
            `title` = '{$_POST['title']}' ,
            `content` = '{$_POST['news_content']}' ,
            `post_date` = '{$post_date}'
            where `sn` = '{$_POST['sn']}' {$and_uid}";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}


/**
 * 新聞發布介面
 */
function add_form($sn = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($sn)){
    $sql = "select * from " . $xoopsDB->prefix('my_news') . " where sn = '$sn'";
    $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
    list($sn , $title , $content , $post_date , $uid , $counter) = $xoopsDB -> fetchRow($result);
    $post_date = strtotime($post_date);
    $op = "update_news";
  }else{
    $sn = $title = $content = $post_date = $uid = $counter = "";
    $op = "save_news";
  }


  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm(_MD_MYNEWS_EDIT_NEWS,"form", $_SERVER['PHP_SELF']);
  $form->addElement(new XoopsFormText (_MD_MYNEWS_TITLE, "title", "100%", 255 , $title),true);
  $configs = array('editor'=> 'ckeditor',  'value' => $content);
  $form->addElement(new XoopsFormEditor (_MD_MYNEWS_EDIT_NEWS_CONTENT, "news_content", $configs),true);
  $form->addElement(new XoopsFormDateTime (_MD_MYNEWS_SET_TIME, "post_date", 15, $post_date, true));
/*  
  if(!$isAdmin){
    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
  }
*/  
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "", _MD_MYNEWS_SUBMIT, "submit"));
  $main = $form->render();
  return $main;
}



/**
 * 將新聞存入資料庫
 */
function insert_news()
{
  global $xoopsDB , $xoopsUser;
/*
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }
  
  if(!$isAdmin){
    xoops_load('captcha');
    $xoopsCaptcha = XoopsCaptcha::getInstance();
    $xoopsCaptcha->setConfig('skipmember' , false);
    if(!$xoopsCaptcha->verify()) {
        redirect_header($_SERVER['PHP_SELF'], 5, $xoopsCaptcha->getMessage());
    }
  }
*/  
  $uid = $xoopsUser->getVar('uid');
  $post_date = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
  $sql="insert into " . $xoopsDB->prefix('my_news') . "
  (`title` , `content` , `post_date` , `uid`)
  values
  ('{$_POST['title']}' , '{$_POST['news_content']}' , '{$post_date}' , $uid)";
  $xoopsDB->query($sql);
  $sn = $xoopsDB->getInsertId();
  return $sn;
}



/**
 * 自製前台用的連結工具
 */
function my_menu()
{
  global $xoopsUser;
  $menu = "";
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
    if($isAdmin){
      $menu = "<div>[<a href='admin/index.php'>進入模組管理頁面</a>]</div>";
    }
  }
  return $menu;
}

//分頁物件
class PageBar{
	// 目前所在頁碼
	var $current;
	// 所有的資料數量 (rows)
	var $total;
	// 每頁顯示幾筆資料
	var $limit;
	// 目前在第幾層的頁數選項？
	var $pCurrent;
	// 總共分成幾頁？
	var $pTotal;
	// 每一層最多有幾個頁數選項可供選擇，如：3 = {[1][2][3]}
	var $pLimit;
	var $prev;
	var $next;
	var $prev_layer = ' ';
	var $next_layer = ' ';
	var $first;
	var $last;
	var $bottons = array();
	// 要使用的 URL 頁數參數名？
	var $url_page = "g2p";
	// 要使用的 URL 讀取時間參數名？
	var $url_loadtime = "loadtime";
	// 會使用到的 URL 變數名，給 process_query() 過濾用的。
	var $used_query = array();
	// 目前頁數顏色
	var $act_color = "#990000";
	var $query_str; // 存放 URL 參數列

	function PageBar($total, $limit, $page_limit){
		$mydirname = basename( dirname( __FILE__ ) ) ;
		$this->prev = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1leftarrow.gif' alt='"._BP_BACK_PAGE."' align='absmiddle' hspace=3>"._BP_BACK_PAGE;
		$this->next = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/1rightarrow.gif' alt='"._BP_NEXT_PAGE."' align='absmiddle' hspace=3>"._BP_NEXT_PAGE;
		$this->first = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2leftarrow.gif' alt='"._BP_FIRST_PAGE."' align='absmiddle' hspace=3>"._BP_FIRST_PAGE;
		$this->last = "<img src='".XOOPS_URL."/modules/{$mydirname}/images/2rightarrow.gif' alt='"._BP_LAST_PAGE."' align='absmiddle' hspace=3>"._BP_LAST_PAGE;

		$this->limit = $limit;
		$this->total = $total;
		$this->pLimit = $page_limit;
	}

	function init(){
		$this->used_query = array($this->url_page, $this->url_loadtime);
		$this->query_str = $this->processQuery($this->used_query);
		$this->glue = ($this->query_str == "")?'?':
		'&';
		$this->current = (isset($_GET["$this->url_page"]))? $_GET["$this->url_page"]:
		1;
		$this->pTotal = ceil($this->total / $this->limit);
		$this->pCurrent = ceil($this->current / $this->pLimit);
	}

	//初始設定
	function set($active_color = "none", $buttons = "none"){
		if ($active_color != "none"){
			$this->act_color = $active_color;
		}

		if ($buttons != "none"){
			$this->buttons = $buttons;
			$this->prev = $this->buttons['prev'];
			$this->next = $this->buttons['next'];
			$this->prev_layer = $this->buttons['prev_layer'];
			$this->next_layer = $this->buttons['next_layer'];
			$this->first = $this->buttons['first'];
			$this->last = $this->buttons['last'];
		}
	}

	// 處理 URL 的參數，過濾會使用到的變數名稱
	function processQuery($used_query){
		// 將 URL 字串分離成二維陣列
		$vars = explode("&", $_SERVER['QUERY_STRING']);
		for($i = 0; $i < count($vars); $i++){
			$var[$i] = explode("=", $vars[$i]);
		}

		// 過濾要使用的 URL 變數名稱
		for($i = 0; $i < count($var); $i++){
			for($j = 0; $j < count($used_query); $j++){
				if (isset($var[$i][0]) && $var[$i][0] == $used_query[$j]) $var[$i] = array();
			}
		}

		// 合併變數名與變數值
		for($i = 0; $i < count($var); $i++){
			$vars[$i] = implode("=", $var[$i]);
		}

		// 合併為一完整的 URL 字串
		$processed_query = "";
		for($i = 0; $i < count($vars); $i++){
			$glue = ($processed_query == "")?'?':
			'&';
			// 開頭第一個是 '?' 其餘的才是 '&'
			if ($vars[$i] != "") $processed_query .= $glue.$vars[$i];
		}
		return $processed_query;
	}

	// 製作 sql 的 query 字串 (LIMIT)
	function sqlQuery(){
		$row_start = ($this->current * $this->limit) - $this->limit;
		$sql_query = " LIMIT {$row_start}, {$this->limit}";
		return $sql_query;
	}


	// 製作 bar
	function makeBar($url_page = "none"){
		if ($url_page != "none"){
			$this->url_page = $url_page;
		}
		$this->init();

		// 取得目前時間
		$loadtime = '&loadtime='.time();

		// 取得目前頁框(層)的第一個頁數啟始值，如 6 7 8 9 10 = 6
		$i = ($this->pCurrent * $this->pLimit) - ($this->pLimit - 1);

		$bar_center = "";
		while ($i <= $this->pTotal && $i <= ($this->pCurrent * $this->pLimit)){
			if ($i == $this->current){
				$bar_center = "{$bar_center}<font color='{$this->act_color}'>[{$i}]</font>";
			}else{
				$bar_center .= " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}'' title='{$i}'>{$i}</a> ";
			}
			$i++;
		}
		$bar_center = $bar_center . "";

		// 往前跳一頁
		if ($this->current <= 1){
			$bar_left = " {$this->prev} ";
			$bar_first = " {$this->first} ";
		}	else{
			$i = $this->current-1;
			$bar_left = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='"._BP_BACK_PAGE."'>{$this->prev}</a> ";
			$bar_first = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}=1{$loadtime}' title='"._BP_FIRST_PAGE."'>{$this->first}</a> ";
		}

		// 往後跳一頁
		if ($this->current >= $this->pTotal){
			$bar_right = " {$this->next} ";
			$bar_last = " {$this->last} ";
		}	else{
			$i = $this->current + 1;
			$bar_right = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='"._BP_NEXT_PAGE."'>{$this->next}</a> ";
			$bar_last = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$this->pTotal}{$loadtime}' title='"._BP_LAST_PAGE."'>{$this->last}</a> ";
		}

		// 往前跳一整個頁框(層)
		if (($this->current - $this->pLimit) < 1){
			$bar_l = " {$this->prev_layer} ";
		}	else{
			$i = $this->current - $this->pLimit;
			$bar_l = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='".sprintf($this->pLimit,_BP_GO_BACK_PAGE)."'>{$this->prev_layer}</a> ";
		}

		//往後跳一整個頁框(層)
		if (($this->current + $this->pLimit) > $this->pTotal){
			$bar_r = " {$this->next_layer} ";
		}	else{
			$i = $this->current + $this->pLimit;
			$bar_r = " <a href='{$_SERVER['PHP_SELF']}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' title='".sprintf($this->pLimit,_BP_GO_NEXT_PAGE)."'>{$this->next_layer}</a> ";
		}

		$page_bar['center'] = $bar_center;
		$page_bar['left'] = $bar_first . $bar_l . $bar_left;
		$page_bar['right'] = $bar_right . $bar_r . $bar_last;
		$page_bar['current'] = $this->current;
		$page_bar['total'] = $this->pTotal;
		$page_bar['sql'] = $this->sqlQuery();
		return $page_bar;
	}

}

/**
 * 列出所有需求單
 */
function list_requireform($state = "",$type="")
{
  global $xoopsDB , $xoopsUser , $xoopsModuleConfig;
  if($xoopsUser){
    $now_uid = $xoopsUser->getVar("uid");
  	$isAdmin = $xoopsUser->isAdmin();
  }else{
    $now_uid = $isAdmin = "";
  }
  
//  $sql = "select * from " . $xoopsDB->prefix('requireform') . " order by date_raised desc";
	$sql = "select sn,id,state,module,category,headline,owner_fullname,company,submitter_fullname,priority from " . $xoopsDB->prefix('requireform') . " where ".$state."`flag` = 'N' order by id desc";

/*  
  //PageBar(資料數, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $total=$xoopsDB->getRowsNum($result);

  $navbar = new PageBar($total, $xoopsModuleConfig['show_num'], 10);
  $mybar = $navbar->makeBar();
  $bar= sprintf(_BP_TOOLBAR,$mybar['total'],$mybar['current'])."{$mybar['left']}{$mybar['center']}{$mybar['right']}";
  $sql.=$mybar['sql'];
  //分頁工具列為 $bar
*/  
  $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_MYNEWS_LIST_NEWS_ERROR."<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  $all_news="";
  
  $i=0;
  while (list($sn,$id,$state,$module,$category,$headline,$owner_fullname,$company,$submitter_fullname,$priority)=$xoopsDB->fetchRow($result)) {  
    $uid_name=XoopsUser::getUnameFromId($uid,0);
	if ($type == 1) $id="<a href='" . XOOPS_URL . "/modules/clog/assign_owner.php?sn=$sn'>$id</a>";
	// $type=3 評估需求單
	elseif ($type == 3) $id="<a href='" . XOOPS_URL . "/modules/clog/evaluate_form.php?sn=$sn'>$id</a>";
	elseif ($type == 99) $id="<a href='" . XOOPS_URL . "/modules/clog/modify_form.php?sn=$sn'>$id</a>";
	else $id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
//	elseif ($type == 8) $id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
//	elseif ($type == 9) $id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
//	elseif ($type == 10) $id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
	 
//	$id="<a href='" . XOOPS_URL . "/modules/clog/view.php?sn=$sn'>$id</a>";
	$statecat_data=get_statecat_data($state);
	$companycat_data=get_companycat_data($company);
	$prioritycat_data=get_prioritycat_data($priority);
//	$modulecat_data=get_modulecat_data($module);
	
	
	if ( $i % 2 == 1) 
		$all_news.="<tr bgcolor='#FFFF80'>";
    else
		$all_news.="<tr bgcolor='#FFFFFF'>";
	
	$all_news.="
    <td>$id</td>
    <td><FONT COLOR=purple><B>".$statecat_data['sname']."</B></FONT></td>
	<td>$module</td>
	<td>$category</td>
    <td>$headline</td>
    <td>$owner_fullname</td>
	<td>".$companycat_data['cname']."</td>
    <td>$submitter_fullname</td>
    <td>".$prioritycat_data['pname']."</td>
	<td>$tool</td>
    </tr>";
	
	$i++;
  }
  if ($type == 1) $main.="<h4>所有<FONT COLOR=RED><B>等待指派</B></FONT>的需求單列表</h4>";
  if ($type == 3) $main.="<h4>所有<FONT COLOR=RED><B>待評估</B></FONT>及<FONT COLOR=RED><B>待修改</B></FONT>的需求單列表</h4>";
  if ($type == 4) $main.="<h4>所有<FONT COLOR=RED><B>等待情系部簽核</B></FONT>的需求單列表</h4>";
  if ($type == 8) $main.="<h4>所有<FONT COLOR=RED><B>已簽核完成</B></FONT>等待使用者驗收的需求單列表</h4>";
  if ($type == 9) $main.="<h4>所有<FONT COLOR=RED><B>等待轉入正式環境</B></FONT>(包含使用者驗收完成及UHD單已簽核)的需求單列表</h4>";
  if ($type == 10) $main.="<h4>所有<FONT COLOR=RED><B>等待結案</B></FONT>的需求單列表</h4>";
  $main.="
  <table class='outer'>
  <tr>
  <th>需求單號</th>
  <th>需求單狀態</th>
  <th>模組</th>
  <th>需求單類別</th>
  <th>主旨</th>
  <th>負責顧問</th>
  <th>公司</th>
  <th>提單者</th>
  <th>優先度</th>
  <th>功能</th>
  </tr>
  $all_news
  </table>
  <div align='center'>$bar</div>";
  return $main;
}


/**
 * 刪除一筆需求單
 */
function del_requireform($sn = "")
{
  global $xoopsDB , $xoopsUser;
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
    $uid = $xoopsUser->uid();
    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
	// $sql = "delete from " . $xoopsDB->prefix('my_news//') . " where `sn` = '$sn'";
	// 設定刪除旗號 flag = 'Y'
	$sql = "update " . $xoopsDB->prefix('requireform') . " set `flag` = 'Y' where `sn` = '$sn'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_REQUIRE_DEL_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }
}

/**
 * 需求單發佈介面
 */
function add_requireform($sn = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($sn)){
    $op = "update_news";
  }else{
    $sn=$id=$title = $content = $post_date = $uid = $counter = "";
	$op = "save_news";
  }

  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("建立需求單","form", $_SERVER['PHP_SELF']);
//  $id="AMS-2011";
//  $form->addElement(new XoopsFormText ("需求單編號", "id", "20%", 20, $id),true);

  $Tray1=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray1", true);
  $select_companycat=new XoopsFormSelect ("公司名稱", "company", 1, 1);
  $option_companycat=get_companycat_select2();
  $select_companycat->addOptionArray($option_companycat);
  $Tray1->addElement($select_companycat,true);

  $select_prioritycat=new XoopsFormSelect ("優先度", "priority", 3, 1);
  $option_prioritycat=get_prioritycat_select2();
  $select_prioritycat->addOptionArray($option_prioritycat);
  $Tray1->addElement($select_prioritycat,true);
  
  $select_projectcat=new XoopsFormSelect ("專案名稱", "project", 1, 1);
  $option_projectcat=get_projectcat_select2();
  $select_projectcat->addOptionArray($option_projectcat);
  $Tray1->addElement($select_projectcat,true);
  $form->addElement($Tray1);

  $username = ($xoopsUser)?$xoopsUser->getVar('uname'):"";
  $Tray2=new XoopsFormElementTray("提單者資訊", "&nbsp;", "Tray2", true);
  $Tray2->addElement(new XoopsFormText ("提單者", "submitter_fullname", "20%", 20, $username),true);
  $select_departmentcat=new XoopsFormSelect ("提單單位", "department", 1, 1);
  $option_departmentcat=get_departmentcat_select2();
  $select_departmentcat->addOptionArray($option_departmentcat);
  $Tray2->addElement($select_departmentcat);
  $form->addElement($Tray2);
  
  $Tray3=new XoopsFormElementTray("原需求者資訊", "&nbsp;", "Tray3", true);
  $Tray3->addElement(new XoopsFormText ("原需求者", "originator", "20%", 20, $username),true);
  $select_needdep=new XoopsFormSelect ("原需求單位", "needdep", 1, 1);
  $option_needdep=get_departmentcat_select2();
  $select_needdep->addOptionArray($option_needdep);
  $Tray3->addElement($select_needdep);
  $form->addElement($Tray3);  
  
  $phone="02-26480711";
  $Tray4=new XoopsFormElementTray("聯絡資訊", "&nbsp;", "Tray4", true);
  $Tray4->addElement(new XoopsFormText ("聯絡電話", "phone", "20%", 20, $phone),true);
  $email=$xoopsUser->getVar('email');
  $Tray4->addElement(new XoopsFormText ("E-mail", "email", "30%", 30, $email),false);
  $form->addElement($Tray4);  

  $target_date = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " +3 day");
  $Tray5=new XoopsFormElementTray("需求資訊", "&nbsp;", "Tray5", true);
  $Tray5->addElement(new XoopsFormCalendar ("希望完成日期", "target_date", 15,$target_date),true);
  $Tray5->addElement(new XoopsFormText ("單位主管", "dep_manager", "20%", 20, $dep_manager),true);
  $form->addElement($Tray5); 
  
  $form->addElement(new XoopsFormText ("主旨", "headline", "81%", 160, $headline),true);
  if(empty($possible_solutions)) $possible_solutions="請輸入需求內容";
  $form->addElement(new XoopsFormTextArea ("需求單內容", "new_content", $possible_solutions, 10, 70),true);
  
  //$form->setExtra('enctype="multipart/form-data"');
  //$form->addElement(new XoopsFormFile ("上傳附檔", "file", 2048));
 
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));

  $main = $form->render();
  return $main;
}

/**
 * 指派作業
 */
function add_ownerform($sn = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($sn)){
	$sql = "select id,service_level,module,owner_fullname,category,reqtype,crossteam,owner_crossteam,headline,content from " . $xoopsDB->prefix('requireform') . " where sn = '$sn'";
	$result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	list($id,$service_level,$module,$owner_fullname,$category,$reqtype,$crossteam,$owner_crossteam,$headline,$content) = $xoopsDB -> fetchRow($result);
	$op="update_owner";
  }else{
	$sn=$id=$service_level=$module=$crossteam=$category=$owner_fullname=$reqtype=$headline=$content="";
	$op="save_owner";
  }
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("指派顧問","form", $_SERVER['PHP_SELF']);
  //  $form->addElement(new XoopsFormText ("需求單編號", "id", "20%", 20, $id));
  $add_id=new XoopsFormText ("需求單編號", "id", "20%", 20, $id);
  $add_id->setExtra("disabled");
  $form->addElement($add_id, true);
  
  //$form->addElement(new XoopsFormText ("服務等級", "service_level", "20%", 20, $service_level));
  $select_prioritycat=new XoopsFormSelect ("服務等級", "service_level", 3, 1);
  $option_prioritycat=get_prioritycat_select2();
  $select_prioritycat->addOptionArray($option_prioritycat);
  $form->addElement($select_prioritycat);
  
  $select_modulecat=new XoopsFormSelect ("模組", "module", 3, 1);
  $option_modulecat=get_modulecat_select2();
  $select_modulecat->addOptionArray($option_modulecat);
  $form->addElement($select_modulecat);
  
  //$form->addElement(new XoopsFormText ("負責顧問", "owner_fullname", "20%", 20, $owner_fullname), true);
  $select_consultantcat=new XoopsFormSelect ("負責顧問", "owner_fullname", 1, 1);
  $option_consultantcat=get_consultantcat_select2();
  $select_consultantcat->addOptionArray($option_consultantcat);
  $form->addElement($select_consultantcat);
  
  //$form->addElement(new XoopsFormText ("類型", "category", "20%", 20, $category));
  $select_categorycat=new XoopsFormSelect ("類型", "category", 1, 1);
  $option_categorycat=get_categorycat_select2();
  $select_categorycat->addOptionArray($option_categorycat);
  $form->addElement($select_categorycat);
  
  //$form->addElement(new XoopsFormText ("問題分類", "reqtype", "20%", 20, $reqtype));
  $select_reqtypecat=new XoopsFormSelect ("問題分類", "reqtype", 1, 1);
  $option_reqtypecat=get_reqtypecat_select2();
  $select_reqtypecat->addOptionArray($option_reqtypecat);
  $form->addElement($select_reqtypecat);
  
  //$form->addElement(new XoopsFormRadioYN ("跨單位需求", "crossteam", 0, "是", "否"));
  $form->addElement(new XoopsFormRadioYN('跨單位需求', 'crossteam', 0)); 
  //$form->addElement(new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam));
  
  $select_crossconsultantcat=new XoopsFormSelect ("跨模組顧問", "owner_crossteam", 1, 1);
  $option_crossconsultantcat=get_consultantcat_select2();
  $select_crossconsultantcat->addOptionArray($option_crossconsultantcat);
  $form->addElement($select_crossconsultantcat);
  
  //$form->addElement(new XoopsFormText ("主旨", "headline", "100%", 60, $headline));
  $add_headline=new XoopsFormText ("主旨", "headline", "100%", 60, $headline);
  $add_headline->setExtra("disabled");
  $form->addElement($add_headline, true);
  
  //$form->addElement(new XoopsFormTextArea ("需求單內容", "content", $content, 5, 60));
  
  $add_content=new XoopsFormTextArea ("需求單內容", "content", $content, 10, 80);
  $add_content->setExtra("disabled");
  $form->addElement($add_content, true);
/*  
  if(!$isAdmin){
    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
  }
*/  
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  //$form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $Tray9=new XoopsFormElementTray("", "&nbsp;", "Tray9", true); 
  $Tray9->addElement(new XoopsFormButton ("", "save_post1","送出", "submit"));
  $Tray9->addElement(new XoopsFormButton ("", "save_post2","取消", "submit"));
  $form->addElement($Tray9);   
  $main = $form->render();

  return $main;
}

function update_owner()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
//    $isAdmin = $xoopsUser->isAdmin();
//    $uid = $xoopsUser->uid();
//    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
    $assign_date = date("Y-m-d H:i:s" , strtotime("now"));
	$slevel = get_prioritycat_data($_POST['service_level']);
	$module = get_modulecat_data($_POST['module']);
	$consultant = get_consultantcat_data($_POST['owner_fullname']);
	$category =get_categorycat_data($_POST['category']);
	$reqtype = get_reqtypecat_data($_POST['reqtype']);
	$crossconsultant = get_consultantcat_data($_POST['owner_crossteam']);
	
//  $statecat_data=get_statecat_data($_POST['service_level']);
//  ".$statecat_data['sname']."
	if (!empty($_REQUEST['save_post1'])) $state = 3;	//需求單 state: 3(待評估)
	if (!empty($_REQUEST['save_post2'])) $state = 14;	//需求單 state: 14(取消)
//	state = '3' (待評估)
    $sql = "update " . $xoopsDB->prefix('requireform') . " set
			`state` = '$state' ,
			`assign_date` = '$assign_date' ,
            `service_level` = '".$slevel['pname']."' ,
            `module` = '".$module['mname']."' ,
            `owner_fullname` = '".$consultant['cname']."' ,
			`category` = '".$category['cname']."' ,
            `reqtype` = '".$reqtype['rname']."' ,
			`crossteam` = '".$module['mname']."' ,
            `owner_crossteam` = '".$crossconsultant['cname']."' 
            where `sn` = '{$_POST['sn']}'";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }

  $sn = $xoopsDB->getInsertId();
  return $sn;
}

?>
