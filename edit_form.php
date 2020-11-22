<?php
include "../../mainfile.php";
include "function.php";
include "function_J.php";
global $xoopsDB , $xoopsUser;

//*******提單修改寫入*******//
function update_create()
{
 global $xoopsDB , $xoopsUser;
  
	if($xoopsUser){
		$sql = "update " . $xoopsDB->prefix('requireform') . " set
			`project` = '{$_POST['project']}' ,
            `priority` = '{$_POST['priority']}' ,
            `company` = '{$_POST['company']}' , 
            `submitter_fullname` = '{$_POST['submitter_fullname']}' ,
			`department` = '{$_POST['department']}' ,
            `originator` = '{$_POST['originator']}' ,
			`needdep` = '{$_POST['needdep']}' ,
            `dep_manager` = '{$_POST['dep_manager']}' ,
			`phone` = '{$_POST['phone']}' ,
			`email` = '{$_POST['email']}' ,
			`headline` = '{$_POST['headline']}' ,
			`content` = '{$_POST['content']}'
            where `sn` = '{$_POST['sn']}'";
		$xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	}

  $sn = $xoopsDB->getInsertId();
  return $sn;
}

//*******指派修改寫入*******//
function update_assign()
{
 global $xoopsDB , $xoopsUser;
  
	if($xoopsUser){ 
		$sql = "update " . $xoopsDB->prefix('requireform') . " set
			`service_level` = '{$_POST['service_level']}' ,
            `module` = '{$_POST['module']}' ,
            `owner_fullname` = '{$_POST['owner_fullname']}' , 
            `category` = '{$_POST['category']}' ,
			`reqtype` = '{$_POST['reqtype']}'
            where `sn` = '{$_POST['sn']}'";
		$xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	}

  $sn = $xoopsDB->getInsertId();
  return $sn;
}

//*******評估修改寫入*******//
function update_assess()
{
 global $xoopsDB , $xoopsUser;
  
	if($xoopsUser){
		$est_start = date("Y-m-d H:i:s", time());
		//$est_start = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
		$total=$_POST['min_evaluation'] + $_POST['min_abaper'] + $_POST['min_con'] + $_POST['min_basis'];
		$sum_hour=intval($total / 60);
		$sum_min=$total - $sum_hour * 60;
	
		if (!empty($_REQUEST['save_post1'])) $state = 17;	//需求單 state: 17(評估暫存)
		if (!empty($_REQUEST['save_post2'])) $state = 4;	//需求單 state: 4(評估完成)
	
		$sql = "update " . $xoopsDB->prefix('requireform') . " set
			`state` = '$state' ,
			`service_level` = '{$_POST['service_level']}' ,
            `module` = '{$_POST['module']}' ,
            `owner_fullname` = '{$_POST['owner_fullname']}' , 
            `category` = '{$_POST['category']}' ,
			`reqtype` = '{$_POST['reqtype']}',
			`content` = '{$_POST['content']}',
			`est_start` = '$est_start' ,
			`est_finish` = '{$_POST['est_finish']}' ,
            `con_evaluation` = '{$_POST['con_evaluation']}' ,
            `min_evaluation` = '{$_POST['min_evaluation']}' , 
            `con_abaper` = '{$_POST['con_abaper']}' ,
			`min_abaper` = '{$_POST['min_abaper']}' ,
            `con_con` = '{$_POST['con_con']}' ,
			`min_con` = '{$_POST['min_con']}' ,
            `con_basis` = '{$_POST['con_basis']}' ,
			`min_basis` = '{$_POST['min_basis']}' ,
			`sum_min` = '$sum_min' ,
			`sum_hour` = '$sum_hour' ,
			`possible_solutions` = '{$_POST['possible_solutions']}'
            where `sn` = '{$_POST['sn']}'";
		$xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	}
	
  $sn = $xoopsDB->getInsertId();
  return $sn;
}

//*******驗收修改寫入*******//
function update_exam()
{
 global $xoopsDB , $xoopsUser;
  
	if($xoopsUser){
		$est_start = date("Y-m-d H:i:s", time());
		//$est_start = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
		$total=$_POST['min_evaluation'] + $_POST['min_abaper'] + $_POST['min_con'] + $_POST['min_basis'];
		$sum_hour=intval($total / 60);
		$sum_min=$total - $sum_hour * 60;
	
		// `owner_fullname` = '".$consultant['cname']."' ,
		$con_evaluation = get_consultantcat_data($_POST['con_evaluation']);
		$con_con = get_consultantcat_data($_POST['con_con']);
		$con_abaper = get_consultantcat_data($_POST['con_abaper']);
		$con_basis = get_consultantcat_data($_POST['con_basis']);
	
		$sql = "update " . $xoopsDB->prefix('requireform') . " set
			`est_start` = '$est_start' ,
			`est_finish` = '{$_POST['est_finish']}' ,
            `con_evaluation` = '{$_POST['con_evaluation']}' ,
            `min_evaluation` = '{$_POST['min_evaluation']}' , 
            `con_abaper` = '{$_POST['con_abaper']}' ,
			`min_abaper` = '{$_POST['min_abaper']}' ,
            `con_con` = '{$_POST['con_con']}' ,
			`min_con` = '{$_POST['min_con']}' ,
            `con_basis` = '{$_POST['con_basis']}' ,
			`min_basis` = '{$_POST['min_basis']}' ,
			`sum_min` = '$sum_min' ,
			`sum_hour` = '$sum_hour' ,
			`possible_solutions` = '{$_POST['possible_solutions']}' ,
			`action_entry` = '{$_POST['action_entry']}'
            where `sn` = '{$_POST['sn']}'";
		$xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	}
	
  $sn = $xoopsDB->getInsertId();
  return $sn;
}

//*******認列工時修改寫入*******//
function update_close()
{
 global $xoopsDB , $xoopsUser;

	if($xoopsUser){
		$sql = "update " . $xoopsDB->prefix('requireform') . " set
			`workhour_date` = '{$_POST['workhour_date']}'
            where `sn` = '{$_POST['sn']}'";
		$xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	}
  
  $sn = $xoopsDB->getInsertId();
  return $sn;
}

//*******主程式開始*******//
if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

//取得使用者姓名
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();

//權限抓取
$sql="select * from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($uname,$assign,$evaluation,$sign_mis,$sign_fin,$acceptance,$transport,$sysadm,$close,$eva_m)=$xoopsDB->fetchRow($result);

//單號抓取,狀態抓取
$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];

  switch ($op)
  {
    //修改提單-寫回DB
    case "update_create":
    update_create();
    header("location:view.php?sn=$sn");
    //header("location:index.php?sn=$sn");
    break;
    //修改指派-寫回DB
	case "update_assign":
    update_assign();
    header("location:view.php?sn=$sn");
    break;
	//修改評估-寫回DB
	case "update_assess":
    update_assess();
    header("location:view.php?sn=$sn");
    break;
	//修改驗收-寫回DB
	case "update_exam":
    update_exam();
    header("location:view.php?sn=$sn");
    break;
	//修改認列工時-寫回DB
	case "update_close":
    update_close();
    header("location:view.php?sn=$sn");
    break;
	
    default:
	if ($_POST['fix'] == 1) {
		//提單權限判斷(有無情系簽核權限)
		if($sign_mis == 'N' or $sign_mis == ''){
		redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
		}
		//導向提單修改
	    else {$main = fix_create($ids);
		}
	}
	if ($_POST['fix'] == 2) {
		//權限判斷(指派權限)
		if($assign == 'N' or $assign == '') {
		redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
		}
		//導向指派修改
		else {$main = fix_assign($ids);
		}
	}
	if ($_POST['fix'] == 3) {
		//權限判斷(評估權限)
		if($evaluation == 'N' or $evaluation == '') {
		redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
		}
		//導向評估修改
		else {$main = fix_assess($ids);
		}
	}
	if ($_POST['fix'] == 4) {
		//權限判斷(驗收權限)
		if($acceptance == 'N' or $acceptance == '') {
		redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
		}
		//導向驗收修改
		else {$main = fix_exam($ids);
		}
	}
	if ($_POST['fix'] == 5) {
		//權限判斷(結案權限)
		if($close == 'N' or $close == '') {
		redirect_header("index.php" , 3 , _MD_REQUIRE_NO_AUTHORIZATION);
		}
		//導向認列工時修改
		else {$main = fix_close($ids);
		}
	}
  }
  
include "../../header.php";
echo $main;
include "../../footer.php";
?> 

