<?php
include "../../mainfile.php";
include "function.php";


function add_signoffform($sn = "")
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

  if(!empty($sn)){
	$sql = "select id,state,service_level,module,owner_fullname,category,reqtype,crossteam,owner_crossteam,headline,content from " . $xoopsDB->prefix('requireform') . " where sn = '$sn'";
	$result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_REQUIRE_GET_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
	list($id,$state,$service_level,$module,$owner_fullname,$category,$reqtype,$crossteam,$owner_crossteam,$headline, $content) = $xoopsDB -> fetchRow($result);
	$op="update_signoff";
  }else{
	$sn=$id=$state=$service_level=$module=$crossteam=$category=$owner_fullname=$reqtype=$headline=$content="";
	$op="save_evaluation";
  }
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("評估","form", $_SERVER['PHP_SELF']);
/*
  $Tray1=new XoopsFormElementTray("按鈕標題", "&nbsp;", "Tray1", true);  
  $add_id=new XoopsFormText ("需求單編號", "id", "20%", 20, $id);
  $add_id->setExtra("disabled");
  $Tray1->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "20%", 20, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray1->addElement($add_state);  
  $form->addElement($Tray1);
*/
  //$form->addElement(new XoopsFormText ("需求單編號", "id", "20%", 20, $id));  
  $add_id=new XoopsFormText ("需求單編號", "id", "20%", 20, $id);
  $add_id->setExtra("disabled");
  $form->addElement($add_id);
 
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "20%", 20, $state_d[sname]);
  $add_state->setExtra("disabled");
  $form->addElement($add_state);
  
  //$form->addElement(new XoopsFormText ("服務等級", "service_level", "20%", 20, $service_level));
  $add_slevel=new XoopsFormText ("服務等級", "service_level", "20%", 20, $service_level);
  $add_slevel->setExtra("disabled");
  $form->addElement($add_slevel);
  
  $module_d=get_modulecat_data($module);
  $add_module=new XoopsFormText ("模組", "module", "20%", 20, $module_d[mname]);
  $add_module->setExtra("disabled");
  $form->addElement($add_module);
  
  $add_owner=new XoopsFormText ("負責顧問", "owner_fullname", "20%", 20, $owner_fullname);
  $add_owner->setExtra("disabled");
  $form->addElement($add_owner);
/*  
  $form->addElement(new XoopsFormText ("類型", "category", "20%", 20, $category));
  $select_categorycat=new XoopsFormSelect ("類型", "category", 1, 1);
  $option_categorycat=get_categorycat_select2();
  $select_categorycat->addOptionArray($option_categorycat);
  $form->addElement($select_categorycat);
*/
  $category_d=get_categorycat_data($category);
  $add_category=new XoopsFormText ("類型", "category", "20%", 20, $category_d[cname]);
  $add_category->setExtra("disabled");
  $form->addElement($add_category);
  
  $reqtype_d=get_reqtypecat_data($reqtype);
  $add_reqtype=new XoopsFormText ("問題分類", "reqtype", "20%", 20, $reqtype_d[rname]);
  $add_reqtype->setExtra("disabled");
  $form->addElement($add_reqtype);
  
  $add_content=new XoopsFormTextArea ("內容", "content", $content, 5, 60);
  $add_content->setExtra("disabled");
  $form->addElement($add_content);
  
  $add_crossteam=new XoopsFormRadioYN('是否跨單位需求', 'crossteam', $crossteam);
  $add_crossteam->setExtra("disabled");
  $form->addElement($add_crossteam);
  
  if($crossteam=="1"){
	$add_crossowner=new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam);
	$add_crossowner->setExtra("disabled");
	$form->addElement($add_crossowner);
  }
  
  $form->addElement(new XoopsFormCalendar ("預估完成日", "est_finish", 15,$est_finish));
  
  $Tray1=new XoopsFormElementTray("按鈕標題", "&nbsp;", "Tray1", true);
  $Tray1->addElement(new XoopsFormText ("評估人員", "con_evaluation", "20%", 20, $con_evaluation));
  $Tray1->addElement(new XoopsFormText ("評估工時(分)", "min_evaluation", "8%", 8, $min_evaluation));
  $Tray1->addElement(new XoopsFormText ("程式設計師 ", "con_abaper", "20%", 20, $con_abaper));
  $Tray1->addElement(new XoopsFormText ("程式設計師工時(分)", "min_abaper", "8%", 8, $min_abaper));
  $form->addElement($Tray1);

  $Tray2=new XoopsFormElementTray("按鈕標題", "&nbsp;", "Tray1", true);
  $Tray2->addElement(new XoopsFormText ("顧問人員", "con_con", "20%", 20, $con_con));
  $Tray2->addElement(new XoopsFormText ("顧問工時(分)", "min_con", "8%", 8, $min_con));
  $Tray2->addElement(new XoopsFormText ("SAP BASIS", "con_basis", "20%", 20, $con_basis));
  $Tray2->addElement(new XoopsFormText ("SAP BASIS工時(分)", "min_basis", "8%", 8, $min_basis));
  $form->addElement($Tray2);
  
  $sum_hour=$sum_min=0;
  //$min_con = 10;
  //$min_basis = 200;
  
  $sum_hour=intval(($min_con + $min_basis)/60);
  $sum_min=($min_con + $min_basis) - ($sum_hour * 60);
  $Tray3=new XoopsFormElementTray("按鈕標題", "&nbsp;", "name", true);
  //$Tray3->addElement(new XoopsFormButton('', 'sum', "計算", 'sum'));  
  $sum_button=new XoopsFormButton('', 'sum', "計算", 'sum');
  //$sum_button->setExtra(" onClick=\"window.location.href='{$_SERVER['PHP_SELF']}'\"");
  //$sum_button->setExtra('onclick="this.form.elements.sum_min.value=\'addCat\';this.form.elements.sum_hour.value=\'addCat\'"');
  //$sum_button->setExtra('onclick="this.form.elements.sum_min.value=1 + 2"');
  
  $Tray3->addElement($sum_button);
  $Tray3->addElement(new XoopsFormText ("總工時(時)", "sum_hour", "20%", 20, $sum_hour));
  $Tray3->addElement(new XoopsFormText ("總工時(分)", "sum_min", "20%", 20, $sum_min));
  $form->addElement($Tray3);
  
  //$form->addElement(new XoopsFormButtonTray ("", "回首頁", 'button', 'onClick="location.href=\'index.php\'"',false));

/*  
  $butt_cancel = new XoopsFormButton('', 'cancel', "取消", 'cancel');
  $butt_cancel->setExtra('onclick="history.go(-1)"');
  $buttontray->addElement($butt_cancel);
  $form->addElement($buttontray);

  $reset_btn = new XoopsFormButton('', 'reset', "重設", 'reset');
  $buttontray->addElement($reset_btn);
  $form->addElement($buttontray);
*/
  $possible_solutions="請輸入評估內容";  
  $form->addElement(new XoopsFormTextArea ("評估內容", "possible_solutions", $possible_solutions, 5, 60));
/*  
  $add_content=new XoopsFormTextArea ("評估內容", "possible_solutions", $possible_solutions, 5, 60);
  $add_content->setExtra("disabled");
  $form->addElement($add_content, true);
*/  
  if(!$isAdmin){
    $form->addElement( new XoopsFormCaptcha (_MD_MYNEWS_CAPTCHA, "xoopscaptcha" ,false));
  }
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $main = $form->render();

  return $main;
}

function update_signoff()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
    $uid = $xoopsUser->uid();
    $and_uid = ($isAdmin)? "" : "and uid = '{$uid}'";
	
	$est_start = date("Y-m-d H:i:s", time());
	//$est_start = date("Y-m-d H:i:s" , strtotime($_POST['post_date']['date'])+$_POST['post_date']['time']);
	$total=$_POST['min_evaluation'] + $_POST['min_abaper'] + $_POST['min_con'] + $_POST['min_basis'];
	$sum_hour=intval($total / 60);
	$sum_min=$total - $sum_hour * 60;
	

//	state = '4' (評估完成)
    $sql = "update " . $xoopsDB->prefix('requireform') . " set
			`state` = '4' ,
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
            where `sn` = '{$_POST['sn']}' {$and_uid}";
    $xoopsDB -> queryF($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_UPDATE_NEWS_ERROR . "<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  }

  $sn = $xoopsDB->getInsertId();
  return $sn;
}

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$sn=(empty($_REQUEST['sn']))?"":$_REQUEST['sn'];
switch ($op)
{
  case "save_evaluation":
  $sn = insert_requireform();
  header("location:view.php?sn=$sn");
//  header("location:index.php?sn=$sn");
	
  break;

  case "update_signoff":
  update_signoff();
  header("location:view.php?sn=$sn");
  //header("location:index.php?sn=$sn");
  break;

  default:
  $main = add_signoffform($sn);
}

include "../../header.php";
echo $main;
include "../../footer.php";
?> 