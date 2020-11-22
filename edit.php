<?php

include "../../mainfile.php";
include "function.php";
include "function_J.php";

global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}


include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");


$form = new XoopsThemeForm("修改需求單", "form", "edit_form.php");
//$form = new XoopsThemeForm("查詢需求單", "form", "list4edit.php");
$fix_d[1]="提單修改";
$fix_d[2]="指派修改";
$fix_d[3]="評估修改";
$fix_d[4]="驗收修改";
$fix_d[5]="認列工時修改";
$edit_fix=new XoopsFormRadio ("專案名稱", "fix");
$edit_fix->addOptionArray($fix_d);
//$edit_project->setExtra("disabled");
$form->addElement($edit_fix);
$form->addElement(new XoopsFormText ("修改需求單號", "ids", "20%", 20));

//$select_statecat=new XoopsFormSelect ("狀態", "state", "", 1);
//$option_statecat=get_statecat_select2();
//$option_statecat[""]="";
//$select_statecat->addOptionArray($option_statecat);
//$form->addElement($select_statecat);

//$headline="";
//$form->addElement(new XoopsFormText ("主旨", "headline", "81%", 60, $headline));
$form->addElement(new XoopsFormButton ("", "","送出", "submit"));

$main = $form->render();
//$main = fixform($sql,$type);
  

include "../../header.php";
echo $main;
//echo my_menu();
print '<IMG SRC="http://172.30.101.143/sap/modules/clog/CLOSE.jpg" >';
include "../../footer.php";
?>