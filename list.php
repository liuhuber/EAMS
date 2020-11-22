<?php

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_REQUIRE_MUST_LOGIN);
}

include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

$form = new XoopsThemeForm("查詢需求單", "form", "list_result.php");
//$form = new XoopsThemeForm("查詢需求單", "form", "test.php");

$form->addElement(new XoopsFormText ("需求單號", "id", "20%", 20));


$select_statecat=new XoopsFormSelect ("狀態", "state", "", 1);
$option_statecat=get_statecat_select2();
$option_statecat[""]="";
$select_statecat->addOptionArray($option_statecat);
$form->addElement($select_statecat);

$select_modulecat=new XoopsFormSelect ("模組", "module", "", 1);
$option_modulecat=get_modulecat_select2();
$option_modulecat[""]="";
$select_modulecat->addOptionArray($option_modulecat);
$form->addElement($select_modulecat);

$select_companycat=new XoopsFormSelect ("公司名稱", "company", "", 1);
$option_companycat=get_companycat_select2();
$option_companycat[""]="";
$select_companycat->addOptionArray($option_companycat);
$form->addElement($select_companycat);

$select_projectcat=new XoopsFormSelect ("專案名稱", "project", "", 1);
$option_projectcat=get_projectcat_select2();
$option_projectcat[""]="";
$select_projectcat->addOptionArray($option_projectcat);
$form->addElement($select_projectcat);

  
//$submitter_fullname="";
//$form->addElement(new XoopsFormText ("提單者", "submitter_fullname", "20%", 20, $submitter_fullname));
$form->addElement(new XoopsFormText ("提單者", "submitter_fullname", "20%", 20));

$form->addElement(new XoopsFormText ("負責顧問", "owner_fullname", "20%", 20, $content));  
$headline="";

$form->addElement(new XoopsFormText ("主旨", "headline", "100%", 60, $headline));
$form->addElement(new XoopsFormText ("內容", "content", "100%", 60, $content));


//  $form->addElement(new XoopsFormHidden ("sn", $sn));
//  $form->addElement(new XoopsFormHidden ("op", $op));

$form->addElement(new XoopsFormButton ("", "","送出", "submit"));
$main = $form->render();
  

include "../../header.php";
echo $main;
//echo my_menu();

include "../../footer.php";
?>