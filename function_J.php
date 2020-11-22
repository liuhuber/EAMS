<?php

//*******提單修改Function*******//
function fix_create()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where `id` = '$_POST[ids]'";
	$result=$xoopsDB -> query($sql);
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
    $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
    $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
    $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
    $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
    $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);

  $op="update_create";
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("<H2>提單修改</H2>","form", $_SERVER['PHP_SELF']);

  $Tray3=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray3", true);
  $add_id=new XoopsFormText ("需求單編號", "id", "16%", 16, $id);
  $add_id->setExtra("disabled");
  $Tray3->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "16%", 16, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray3->addElement($add_state);
  $form->addElement($Tray3);
  
  $project_d[1]="BIS";
  $project_d[2]="HR";
  $project_d[3]="PSCC";
  $project_d[4]="MDT";
  $project_d[5]="MUJI";
  $edit_project=new XoopsFormRadio ("專案名稱", "project", $project);
  $edit_project->addOptionArray($project_d);
  //$edit_project->setExtra("disabled");
  $form->addElement($edit_project);
  
  $priority_d[1]="緊急";
  $priority_d[2]="高";
  $priority_d[3]="中";
  $priority_d[4]="低";
  $edit_priority=new XoopsFormRadio ("優先度", "priority", $priority);
  $edit_priority->addOptionArray($priority_d);
  //$edit_priority->setExtra("disabled");
  $form->addElement($edit_priority);
  
  $company_d[1]="統一超商";
  $company_d[2]="統一世界工程";
  $company_d[3]="統一生活";
  $company_d[4]="統一多拿滋";
  $company_d[5]="統一有機事業";
  $company_d[6]="統一百華";
  $company_d[7]="統一武藏野";
  $company_d[8]="統一星巴克";
  $company_d[9]="統一皇帽";
  $company_d[10]="HRSC人資共享中心";
  $company_d[11]="捷盟行銷";
  $company_d[12]="捷盛";
  $company_d[13]="統一資訊";
  $company_d[14]="首阜企管";
  $company_d[15]="無印良品";
  $company_d[16]="21世紀";
  $company_d[17]="統一時尚";
  $company_d[18]="統一百華";
  $company_d[19]="聖娜多堡";
  $company_d[20]="統一速達";
  $company_d[21]="統一藥品";
  $company_d[22]="客樂得";
  $company_d[23]="統一19";
  $company_d[24]="統一午茶風光";
  $company_d[25]="統一蘭陽藝文";
  $company_d[26]="統一酷聖石";
  $company_d[27]="統昶行銷";
  $company_d[28]="樂清服務";
  $company_d[29]="大智通";
  $company_d[30]="高見文化行銷";
  $edit_company=new XoopsFormSelect ("提單單位", "company", $company);
  $edit_company->addOptionArray($company_d);
  $form->addElement($edit_company);
  
  $Tray4=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray4", true);
  $add_receive_date=new XoopsFormText ("收文日期", "receive_date", "16%", 16, $receive_date);
  $add_receive_date->setExtra("disabled");
  $Tray4->addElement($add_receive_date);
  $add_date_raised=new XoopsFormText ("提單日期", "date_raised", "16%", 16, $date_raised);
  $add_date_raised->setExtra("disabled");
  $Tray4->addElement($add_date_raised);
  //$edit_target_date=new XoopsFormCalendar ("預估完成日", "target_date", 15,$target_date);
  //$edit_target_date->setExtra("disabled");
  //$Tray4->addElement($edit_target_date);
  $form->addElement($Tray4);
  
  $Tray7=new XoopsFormElementTray("提單者資訊", "&nbsp;", "Tray7", true);
  $edit_submitter_fullname=new XoopsFormText ("提單者", "submitter_fullname", "8%", 12, $submitter_fullname);
  //$add_reqtype->setExtra("disabled");
  $Tray7->addElement($edit_submitter_fullname);
  $department_d[1]="會計部";
  $department_d[2]="財務部";
  $department_d[3]="人力資源";
  $department_d[4]="情系部";
  $department_d[5]="採購部";
  $department_d[6]="地區會計";
  $department_d[7]="商場事業部";
  $department_d[8]="發展加盟部";
  $department_d[9]="總帳資產管理team";
  $department_d[10]="稅務team";
  $department_d[11]="總帳team";
  $department_d[12]="財務企劃team";
  $department_d[13]="營運企劃部";
  $department_d[14]="SET企劃";
  $department_d[15]="服務商品部";
  $department_d[16]="稽核";
  $department_d[17]="加盟企劃";
  $department_d[18]="商品設計";
  $department_d[19]="營繕保修";
  $department_d[20]="工程";
  $department_d[21]="桃竹後勤支援";
  $department_d[22]="地區工程";
  $department_d[23]="帳款管理";
  $department_d[24]="IBM";
  $department_d[25]="北一工程";
  $department_d[26]="嘉南區";
  $department_d[27]="財會專案小組";
  $department_d[28]="整合行銷部";
  $department_d[29]="北二工程";
  $department_d[30]="北一後勤支援";
  $department_d[31]="帳款管理team";
  $department_d[34]="薪酬";
  $department_d[35]="工程科技部";
  $department_d[36]="工程採購team";
  $department_d[37]="BIS team";
  $department_d[38]="AMS team";
  $department_d[39]="嘉南後勤支援";
  $department_d[40]="新財會專案";
  $department_d[41]="北二後勤支援";
  $edit_department=new XoopsFormSelect ("提單單位", "department", $department);
  $edit_department->addOptionArray($department_d);
  //$add_reqtype->setExtra("disabled");
  $Tray7->addElement($edit_department);
  $form->addElement($Tray7);
  
  $Tray6=new XoopsFormElementTray("原需求者者資訊", "&nbsp;", "Tray6", true);
  $edit_originator=new XoopsFormText ("原需求者", "originator", "8%", 12, $originator);
  //$add_reqtype->setExtra("disabled");
  $Tray6->addElement($edit_originator);
  $needdep_d[1]="會計部";
  $needdep_d[2]="財務部";
  $needdep_d[3]="人力資源";
  $needdep_d[4]="情系部";
  $needdep_d[5]="採購部";
  $needdep_d[6]="地區會計";
  $needdep_d[7]="商場事業部";
  $needdep_d[8]="發展加盟部";
  $needdep_d[9]="總帳資產管理team";
  $needdep_d[10]="稅務team";
  $needdep_d[11]="總帳team";
  $needdep_d[12]="財務企劃team";
  $needdep_d[13]="營運企劃部";
  $needdep_d[14]="SET企劃";
  $needdep_d[15]="服務商品部";
  $needdep_d[16]="稽核";
  $needdep_d[17]="加盟企劃";
  $needdep_d[18]="商品設計";
  $needdep_d[19]="營繕保修";
  $needdep_d[20]="工程";
  $needdep_d[21]="桃竹後勤支援";
  $needdep_d[22]="地區工程";
  $needdep_d[23]="帳款管理";
  $needdep_d[24]="IBM";
  $needdep_d[25]="北一工程";
  $needdep_d[26]="嘉南區";
  $needdep_d[27]="財會專案小組";
  $needdep_d[28]="整合行銷部";
  $needdep_d[29]="北二工程";
  $needdep_d[30]="北一後勤支援";
  $needdep_d[31]="帳款管理team";
  $needdep_d[34]="薪酬";
  $needdep_d[35]="工程科技部";
  $needdep_d[36]="工程採購team";
  $needdep_d[37]="BIS team";
  $needdep_d[38]="AMS team";
  $needdep_d[39]="嘉南後勤支援";
  $needdep_d[40]="新財會專案";
  $needdep_d[41]="北二後勤支援";
  $edit_needdep=new XoopsFormSelect ("原需求單位", "needdep", $needdep);
  $edit_needdep->addOptionArray($needdep_d);
  //$edit_needdep->setExtra("disabled");
  $Tray6->addElement($edit_needdep);
  $edit_dep_manager=new XoopsFormText ("單位主管", "dep_manager", "16%", 6,$dep_manager);
  //$add_reqtype->setExtra("disabled");
  $Tray6->addElement($edit_dep_manager);
  $form->addElement($Tray6);
  
  $Tray2=new XoopsFormElementTray("聯絡資訊", "&nbsp;", "Tray2", true);
  $edit_phone=new XoopsFormText ("聯絡電話", "phone", "8%", 10, $phone);
  //$add_reqtype->setExtra("disabled");
  $Tray2->addElement($edit_phone);
  $edit_email=new XoopsFormText ("電子郵件", "email", "80%", 60, $email);
  //$add_reqtype->setExtra("disabled");
  $Tray2->addElement($edit_email);
  $form->addElement($Tray2);   
  
  $edit_headline=new XoopsFormText ("主旨", "headline", "80%", 60, $headline);
  //$add_reqtype->setExtra("disabled");
  $form->addElement($edit_headline);
  
  $edit_content=new XoopsFormTextArea ("需求內容", "content", $content, 5, 70);
  //$add_reqtype->setExtra("disabled");
  $form->addElement($edit_content);

  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $main = $form->render();
 
  return $main;
  
}

//*******指派修改Function*******//
function fix_assign()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where `id` = '$_POST[ids]'";
	$result=$xoopsDB -> query($sql);
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
    $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
    $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
    $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
    $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
    $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);

  $op="update_assign";
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("<H2>指派修改</H2>","form", $_SERVER['PHP_SELF']);
 
  $Tray3=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray3", true);
  $add_id=new XoopsFormText ("需求單編號", "id", "16%", 16, $id);
  $add_id->setExtra("disabled");
  $Tray3->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "16%", 16, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray3->addElement($add_state);
  $form->addElement($Tray3);
  
  $service_d["緊急"]="緊急";
  $service_d["高"]="高";
  $service_d["中"]="中";
  $service_d["低"]="低";
  $edit_service_level=new XoopsFormRadio ("服務等級", "service_level", $service_level);
  $edit_service_level->addOptionArray($service_d);
  //$edit_project->setExtra("disabled");
  $form->addElement($edit_service_level);
  
  $module_d["BASIS"]="BASIS";
  $module_d["FI"]="FI";
  $module_d["CO"]="CO";
  $module_d["MM"]="MM";
  $module_d["BW"]="BW";
  $module_d["BCS"]="BCS";
  $module_d["WEB"]="WEB";
  $module_d["HR"]="HR";
  $module_d["ABAP"]="ABAP";
  $module_d["TR"]="TR";
  $module_d["Others"]="Others";
  $module_d["禮券"]="禮券";
  $module_d["外掛"]="外掛";
  $edit_module=new XoopsFormRadio ("模組", "module", $module);
  $edit_module->addOptionArray($module_d);
  //$edit_priority->setExtra("disabled");
  $form->addElement($edit_module);
  
  $owner_fullname_d["BASIS"]="BASIS";
  $owner_fullname_d["BWBCS"]="BWBCS";
  $owner_fullname_d["Chriss"]="Chriss";
  $owner_fullname_d["Christine"]="Christine";
  $owner_fullname_d["chyang"]="chyang";
  $owner_fullname_d["Grace"]="Grace";
  $owner_fullname_d["Hank"]="Hank";
  $owner_fullname_d["James"]="James";
  $owner_fullname_d["Joge"]="Joge";
  $owner_fullname_d["Klet"]="Klet";
  $owner_fullname_d["Wen"]="Wen";
  $edit_owner_fullname=new XoopsFormSelect ("負責顧問", "owner_fullname", $owner_fullname);
  $edit_owner_fullname->addOptionArray($owner_fullname_d);
  $form->addElement($edit_owner_fullname);
  
  $category_d["UHD"]="UHD";
  $category_d["專案"]="專案";
  $category_d["權限"]="權限";
  $category_d["規格書"]="規格書";
  $category_d["財會內部需求"]="財會內部需求";
  $category_d["電話記錄"]="電話記錄";
  $category_d["需求"]="需求";
  $category_d["預算需求"]="預算需求";
  $edit_category=new XoopsFormSelect ("需求單類型", "category", $category);
  $edit_category->addOptionArray($category_d);
  $form->addElement($edit_category);
  
  $reqtype_d["客制程式修改"]="客制程式修改";
  $reqtype_d["客制程式新增"]="客制程式新增";
  $reqtype_d["客制程式Bug"]="客制程式Bug";
  $reqtype_d["User Exit"]="User Exit";
  $reqtype_d["TIBCO"]="TIBCO";
  $reqtype_d["SAP標準設定或問題"]="SAP標準設定或問題";
  $reqtype_d["Config"]="Config";
  $reqtype_d["AES"]="AES";
  $reqtype_d["POS"]="POS";
  $reqtype_d["BMS"]="BMS";
  $reqtype_d["例行性作業"]="例行性作業";
  $reqtype_d["排程作業"]="排程作業";
  $reqtype_d["帳號與權限相關作業"]="帳號與權限相關作業";
  $reqtype_d["操作詢問"]="操作詢問";
  $reqtype_d["資料查詢及下載"]="資料查詢及下載";
  $reqtype_d["操作錯誤"]="操作錯誤";
  $reqtype_d["其它"]="其它";
  $reqtype_d["未分類"]="未分類";
  $edit_reqtype=new XoopsFormSelect ("問題分類", "reqtype", $reqtype);
  $edit_reqtype->addOptionArray($reqtype_d);
  $form->addElement($edit_reqtype);
    
  $Tray4=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray4", true);
  $add_receive_date=new XoopsFormText ("收文日期", "receive_date", "16%", 16, $receive_date);
  $add_receive_date->setExtra("disabled");
  $Tray4->addElement($add_receive_date);
  $add_date_raised=new XoopsFormText ("提單日期", "date_raised", "16%", 16, $date_raised);
  $add_date_raised->setExtra("disabled");
  $Tray4->addElement($add_date_raised);
  //$edit_target_date=new XoopsFormCalendar ("預估完成日", "target_date", 15,$target_date);
  //$edit_target_date->setExtra("disabled");
  //$Tray4->addElement($edit_target_date);
  $form->addElement($Tray4);
  
  $Tray7=new XoopsFormElementTray("提單者資訊", "&nbsp;", "Tray7", true);
  $edit_submitter_fullname=new XoopsFormText ("提單者", "submitter_fullname", "8%", 12, $submitter_fullname);
  $edit_submitter_fullname->setExtra("disabled");
  $Tray7->addElement($edit_submitter_fullname);
  $department=get_departmentcat_data($department);
  $edit_department=new XoopsFormText ("提單單位", "department", "8%", 12, $department[dname]);
  $edit_department->setExtra("disabled");
  $Tray7->addElement($edit_department);
  $form->addElement($Tray7);
  
  $crossteam_d[0]="否";
  $crossteam_d[1]="是";
  //$form->addElement(new XoopsFormRadioYN('跨單位需求', 'crossteam', $crossteam); 
  $edit_crossteam=new XoopsFormRadio('跨單位需求(功能尚未開啟)', 'crossteam', $crossteam); 
  $edit_crossteam->addOptionArray($crossteam_d);
  $edit_crossteam->setExtra("disabled");
  $form->addElement($edit_crossteam);
 
  //$form->addElement(new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam));
  $select_crossconsultantcat=new XoopsFormSelect ("跨模組顧問(功能尚未開啟)", "owner_crossteam", 1, 1);
  $option_crossconsultantcat=get_consultantcat_select2();
  $select_crossconsultantcat->addOptionArray($option_crossconsultantcat);
  $select_crossconsultantcat->setExtra("disabled");
  $form->addElement($select_crossconsultantcat);
  
  $edit_headline=new XoopsFormText ("主旨", "headline", "80%", 60, $headline);
  $edit_headline->setExtra("disabled");
  $form->addElement($edit_headline);
  
  $edit_content=new XoopsFormTextArea ("需求內容", "content", $content, 5, 70);
  $edit_content->setExtra("disabled");
  $form->addElement($edit_content);

  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $main = $form->render();
 
  return $main;
}

//*******評估修改Function*******//
function fix_assess()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where `id` = '$_POST[ids]'";
	$result=$xoopsDB -> query($sql);
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
    $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
    $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
    $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
    $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
    $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);

  $op="update_assess";
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("<H2>評估修改</H2>","form", $_SERVER['PHP_SELF']);
 
  $Tray1=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray1", true);
  $add_id=new XoopsFormText ("需求單編號", "id", "16%", 16, $id);
  $add_id->setExtra("disabled");
  $Tray1->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "16%", 16, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray1->addElement($add_state);
  $form->addElement($Tray1);
  
  $service_d["緊急"]="緊急";
  $service_d["高"]="高";
  $service_d["中"]="中";
  $service_d["低"]="低";
  $edit_service_level=new XoopsFormRadio ("服務等級", "service_level", $service_level);
  $edit_service_level->addOptionArray($service_d);
  //$edit_project->setExtra("disabled");
  $form->addElement($edit_service_level);
  
  $Tray2=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray2", true);
  $module_d["BASIS"]="BASIS";
  $module_d["FI"]="FI";
  $module_d["CO"]="CO";
  $module_d["MM"]="MM";
  $module_d["BW"]="BW";
  $module_d["BCS"]="BCS";
  $module_d["WEB"]="WEB";
  $module_d["HR"]="HR";
  $module_d["ABAP"]="ABAP";
  $module_d["TR"]="TR";
  $module_d["Others"]="Others";
  $module_d["禮券"]="禮券";
  $module_d["外掛"]="外掛";
  $edit_module=new XoopsFormSelect ("模組", "module", $module);
  $edit_module->addOptionArray($module_d);
  //$edit_priority->setExtra("disabled");
  $Tray2->addElement($edit_module);
  $owner_fullname_d["BASIS"]="BASIS";
  $owner_fullname_d["BWBCS"]="BWBCS";
  $owner_fullname_d["Chriss"]="Chriss";
  $owner_fullname_d["Christine"]="Christine";
  $owner_fullname_d["chyang"]="chyang";
  $owner_fullname_d["Grace"]="Grace";
  $owner_fullname_d["Hank"]="Hank";
  $owner_fullname_d["James"]="James";
  $owner_fullname_d["Joge"]="Joge";
  $owner_fullname_d["Klet"]="Klet";
  $owner_fullname_d["Wen"]="Wen";
  $edit_owner_fullname=new XoopsFormSelect ("負責顧問", "owner_fullname", $owner_fullname);
  $edit_owner_fullname->addOptionArray($owner_fullname_d);
  $Tray2->addElement($edit_owner_fullname);
  $category_d["UHD"]="UHD";
  $category_d["專案"]="專案";
  $category_d["權限"]="權限";
  $category_d["規格書"]="規格書";
  $category_d["財會內部需求"]="財會內部需求";
  $category_d["電話記錄"]="電話記錄";
  $category_d["需求"]="需求";
  $category_d["預算需求"]="預算需求";
  $edit_category=new XoopsFormSelect ("需求單類型", "category", $category);
  $edit_category->addOptionArray($category_d);
  $Tray2->addElement($edit_category);
  $reqtype_d["客制程式修改"]="客制程式修改";
  $reqtype_d["客制程式新增"]="客制程式新增";
  $reqtype_d["客制程式Bug"]="客制程式Bug";
  $reqtype_d["User Exit"]="User Exit";
  $reqtype_d["TIBCO"]="TIBCO";
  $reqtype_d["SAP標準設定或問題"]="SAP標準設定或問題";
  $reqtype_d["Config"]="Config";
  $reqtype_d["AES"]="AES";
  $reqtype_d["POS"]="POS";
  $reqtype_d["BMS"]="BMS";
  $reqtype_d["例行性作業"]="例行性作業";
  $reqtype_d["排程作業"]="排程作業";
  $reqtype_d["帳號與權限相關作業"]="帳號與權限相關作業";
  $reqtype_d["操作詢問"]="操作詢問";
  $reqtype_d["資料查詢及下載"]="資料查詢及下載";
  $reqtype_d["操作錯誤"]="操作錯誤";
  $reqtype_d["其它"]="其它";
  $reqtype_d["未分類"]="未分類";
  $edit_reqtype=new XoopsFormSelect ("問題分類", "reqtype", $reqtype);
  $edit_reqtype->addOptionArray($reqtype_d);
  $Tray2->addElement($edit_reqtype);
  $form->addElement($Tray2);
  
  
  $Tray3=new XoopsFormElementTray("跨部門資訊", "&nbsp;", "Tray3", true);
  $add_crossteam=new XoopsFormRadioYN('是否跨單位需求(功能尚未開啟)', 'crossteam', $crossteam);
  $add_crossteam->setExtra("disabled");
  $Tray3->addElement($add_crossteam);
  if($crossteam=="1"){
	$add_crossowner=new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam);
	$add_crossowner->setExtra("disabled");
	$Tray3->addElement($add_crossowner);
	}
  $form->addElement($Tray3); 
  
  $Tray4=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray4", true);
  $add_est_start=new XoopsFormText ("評估日期", "est_start", "16%", 16, $est_start);
  $add_est_start->setExtra("disabled");
  $Tray4->addElement($add_est_start);
  $add_receive_date=new XoopsFormText ("收文日期", "receive_date", "16%", 16, $receive_date);
  $add_receive_date->setExtra("disabled");
  $Tray4->addElement($add_receive_date);
  $add_date_raised=new XoopsFormText ("提單日期", "date_raised", "16%", 16, $date_raised);
  $add_date_raised->setExtra("disabled");
  $Tray4->addElement($add_date_raised);
  //$edit_target_date=new XoopsFormCalendar ("預估完成日", "target_date", 15,$target_date);
  //$edit_target_date->setExtra("disabled");
  //$Tray4->addElement($edit_target_date);
  $form->addElement($Tray4);
  
  $Tray5=new XoopsFormElementTray("提單者資訊", "&nbsp;", "Tray5", true);
  $edit_submitter_fullname=new XoopsFormText ("提單者", "submitter_fullname", "8%", 12, $submitter_fullname);
  $edit_submitter_fullname->setExtra("disabled");
  $Tray5->addElement($edit_submitter_fullname);
  $department=get_departmentcat_data($department);
  $edit_department=new XoopsFormText ("提單單位", "department", "8%", 12, $department[dname]);
  $edit_department->setExtra("disabled");
  $Tray5->addElement($edit_department);
  $form->addElement($Tray5);
  
  $edit_headline=new XoopsFormText ("主旨", "headline", "80%", 60, $headline);
  $edit_headline->setExtra("disabled");
  $form->addElement($edit_headline);
  
  $edit_content=new XoopsFormTextArea ("需求內容", "content", $content, 5, 70);
  //$edit_content->setExtra("disabled");
  $form->addElement($edit_content);
  
  $Tray6=new XoopsFormElementTray("評估資訊", "&nbsp;", "Tray6", true);
  $con_evaluation_d["n/a"]="n/a";
  $con_evaluation_d["BASIS"]="BASIS";
  $con_evaluation_d["BWBCS"]="BWBCS";
  $con_evaluation_d["Chriss"]="Chriss";
  $con_evaluation_d["Christine"]="Christine";
  $con_evaluation_d["chyang"]="chyang";
  $con_evaluation_d["Grace"]="Grace";
  $con_evaluation_d["Hank"]="Hank";
  $con_evaluation_d["James"]="James";
  $con_evaluation_d["Joge"]="Joge";
  $con_evaluation_d["Klet"]="Klet";
  $con_evaluation_d["Wen"]="Wen";
  $edit_con_evaluation=new XoopsFormSelect ("評估人員", "con_evaluation", $con_evaluation);
  $edit_con_evaluation->addOptionArray($con_evaluation_d);
  $Tray6->addElement($edit_con_evaluation);
  $Tray6->addElement(new XoopsFormText ("評估工時(分)", "min_evaluation", "4%", 4, $min_evaluation));
  $con_abaper_d["n/a"]="n/a";
  $con_abaper_d["BASIS"]="BASIS";
  $con_abaper_d["BWBCS"]="BWBCS";
  $con_abaper_d["Chriss"]="Chriss";
  $con_abaper_d["Christine"]="Christine";
  $con_abaper_d["chyang"]="chyang";
  $con_abaper_d["Grace"]="Grace";
  $con_abaper_d["Hank"]="Hank";
  $con_abaper_d["James"]="James";
  $con_abaper_d["Joge"]="Joge";
  $con_abaper_d["Klet"]="Klet";
  $con_abaper_d["Wen"]="Wen";
  $edit_con_abaper=new XoopsFormSelect ("程式設計師", "con_abaper", $con_abaper);
  $edit_con_abaper->addOptionArray($con_abaper_d);
  $Tray6->addElement($edit_con_abaper);
  //$Tray6->addElement(new XoopsFormText ("程式設計師 ", "con_abaper", "12%", 12, $con_abaper));
  $Tray6->addElement(new XoopsFormText ("程式設計師工時(分)", "min_abaper", "4%", 4, $min_abaper));
  $form->addElement($Tray6);

  $Tray7=new XoopsFormElementTray("評估資訊", "&nbsp;", "Tray7", true);
  //$Tray2->addElement(new XoopsFormText ("顧問人員", "con_con", "12%", 12, $con_con));
  $con_con_d["n/a"]="n/a";
  $con_con_d["BASIS"]="BASIS";
  $con_con_d["BWBCS"]="BWBCS";
  $con_con_d["Chriss"]="Chriss";
  $con_con_d["Christine"]="Christine";
  $con_con_d["chyang"]="chyang";
  $con_con_d["Grace"]="Grace";
  $con_con_d["Hank"]="Hank";
  $con_con_d["James"]="James";
  $con_con_d["Joge"]="Joge";
  $con_con_d["Klet"]="Klet";
  $con_con_d["Wen"]="Wen";
  $edit_con_con=new XoopsFormSelect ("顧問人員", "con_con", $con_con);
  $edit_con_con->addOptionArray($con_con_d);
  $Tray7->addElement($edit_con_con);
  $Tray7->addElement(new XoopsFormText ("顧問工時(分)", "min_con", "4%", 4, $min_con));
  //$Tray7->addElement(new XoopsFormText ("SAP BASIS", "con_basis", "12%", 12, $con_basis));
  $con_basis_d["n/a"]="n/a";
  $con_basis_d["BASIS"]="BASIS";
  $edit_con_basis=new XoopsFormSelect ("SAP BASIS", "con_basis", $con_basis);
  $edit_con_basis->addOptionArray($con_basis_d);
  $Tray7->addElement($edit_con_basis); 
  $Tray7->addElement(new XoopsFormText ("SAP BASIS工時(分)", "min_basis", "4%", 4, $min_basis));
  $form->addElement($Tray7);

  if(empty($possible_solutions)) $possible_solutions="請輸入評估內容";  
  $form->addElement(new XoopsFormTextArea ("評估內容", "possible_solutions", $possible_solutions, 10, 70),true);
  
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $Tray9=new XoopsFormElementTray("", "&nbsp;", "Tray9", true); 
  $Tray9=new XoopsFormElementTray("", "&nbsp;", "Tray9", true); 
  $Tray9->addElement(new XoopsFormButton ("", "save_post1","評估暫存儲存", "submit"));
  $Tray9->addElement(new XoopsFormButton ("", "save_post2","轉入評估完成", "submit"));
  $form->addElement($Tray9); 
  
  $main = $form->render();
 
  return $main;
}

//*******驗收修改Function*******//
function fix_exam()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where `id` = '$_POST[ids]'";
	$result=$xoopsDB -> query($sql);
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
    $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
    $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
    $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
    $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
    $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);

  $op="update_exam";
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("<H2>驗收修改</H2>","form", $_SERVER['PHP_SELF']);
 
  $Tray1=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray1", true);
  $add_id=new XoopsFormText ("需求單編號", "id", "16%", 16, $id);
  $add_id->setExtra("disabled");
  $Tray1->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "16%", 16, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray1->addElement($add_state);
  $form->addElement($Tray1);
  
  $Tray2=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray2", true);
  $add_module=new XoopsFormText ("模組", "module", "8%", 8, $module);
  $add_module->setExtra("disabled");
  $Tray2->addElement($add_module);
  $add_owner=new XoopsFormText ("負責顧問", "owner_fullname", "10%", 10, $owner_fullname);
  $add_owner->setExtra("disabled");
  $Tray2->addElement($add_owner);
  $add_category=new XoopsFormText ("類型", "category", "8%", 8, $category);
  $add_category->setExtra("disabled");
  $Tray2->addElement($add_category);
  $add_reqtype=new XoopsFormText ("問題分類", "reqtype", "16%", 16, $reqtype);
  $add_reqtype->setExtra("disabled");
  $Tray2->addElement($add_reqtype);
  $form->addElement($Tray2);
  
  $Tray3=new XoopsFormElementTray("跨部門資訊", "&nbsp;", "Tray3", true);
  $add_crossteam=new XoopsFormRadioYN('是否跨單位需求', 'crossteam', $crossteam);
  $add_crossteam->setExtra("disabled");
  $Tray3->addElement($add_crossteam);
  if($crossteam=="1"){
	$add_crossowner=new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam);
	$add_crossowner->setExtra("disabled");
	$Tray3->addElement($add_crossowner);
	}
  $form->addElement($Tray3); 
  
  $Tray4=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray4", true);
  $add_inform_date=new XoopsFormText ("驗收日期", "inform_date", "16%", 16, $inform_date);
  $add_inform_date->setExtra("disabled");
  $Tray4->addElement($add_inform_date);
  $add_est_start=new XoopsFormText ("評估日期", "est_start", "16%", 16, $est_start);
  $add_est_start->setExtra("disabled");
  $Tray4->addElement($add_est_start);
  $add_date_raised=new XoopsFormText ("提單日期", "date_raised", "16%", 16, $date_raised);
  $add_date_raised->setExtra("disabled");
  $Tray4->addElement($add_date_raised);
  //$edit_target_date=new XoopsFormCalendar ("預估完成日", "target_date", 15,$target_date);
  //$edit_target_date->setExtra("disabled");
  //$Tray4->addElement($edit_target_date);
  $form->addElement($Tray4);
  
  $edit_headline=new XoopsFormText ("主旨", "headline", "80%", 60, $headline);
  $edit_headline->setExtra("disabled");
  $form->addElement($edit_headline);
  
  $edit_content=new XoopsFormTextArea ("需求內容", "content", $content, 5, 70);
  $edit_content->setExtra("disabled");
  $form->addElement($edit_content);
  
  $Tray6=new XoopsFormElementTray("評估資訊", "&nbsp;", "Tray6", true);
  $con_evaluation_d["n/a"]="n/a";
  $con_evaluation_d["BASIS"]="BASIS";
  $con_evaluation_d["BWBCS"]="BWBCS";
  $con_evaluation_d["Chriss"]="Chriss";
  $con_evaluation_d["Christine"]="Christine";
  $con_evaluation_d["chyang"]="chyang";
  $con_evaluation_d["Grace"]="Grace";
  $con_evaluation_d["Hank"]="Hank";
  $con_evaluation_d["James"]="James";
  $con_evaluation_d["Joge"]="Joge";
  $con_evaluation_d["Klet"]="Klet";
  $con_evaluation_d["Wen"]="Wen";
  $edit_con_evaluation=new XoopsFormSelect ("評估人員", "con_evaluation", $con_evaluation);
  $edit_con_evaluation->addOptionArray($con_evaluation_d);
  $Tray6->addElement($edit_con_evaluation);
  $Tray6->addElement(new XoopsFormText ("評估工時(分)", "min_evaluation", "4%", 4, $min_evaluation));
  $con_abaper_d["n/a"]="n/a";
  $con_abaper_d["BASIS"]="BASIS";
  $con_abaper_d["BWBCS"]="BWBCS";
  $con_abaper_d["Chriss"]="Chriss";
  $con_abaper_d["Christine"]="Christine";
  $con_abaper_d["chyang"]="chyang";
  $con_abaper_d["Grace"]="Grace";
  $con_abaper_d["Hank"]="Hank";
  $con_abaper_d["James"]="James";
  $con_abaper_d["Joge"]="Joge";
  $con_abaper_d["Klet"]="Klet";
  $con_abaper_d["Wen"]="Wen";
  $edit_con_abaper=new XoopsFormSelect ("程式設計師", "con_abaper", $con_abaper);
  $edit_con_abaper->addOptionArray($con_abaper_d);
  $Tray6->addElement($edit_con_abaper);
  //$Tray6->addElement(new XoopsFormText ("程式設計師 ", "con_abaper", "12%", 12, $con_abaper));
  $Tray6->addElement(new XoopsFormText ("程式設計師工時(分)", "min_abaper", "4%", 4, $min_abaper));
  $form->addElement($Tray6);

  $Tray7=new XoopsFormElementTray("評估資訊", "&nbsp;", "Tray7", true);
  //$Tray2->addElement(new XoopsFormText ("顧問人員", "con_con", "12%", 12, $con_con));
  $con_con_d["n/a"]="n/a";
  $con_con_d["BASIS"]="BASIS";
  $con_con_d["BWBCS"]="BWBCS";
  $con_con_d["Chriss"]="Chriss";
  $con_con_d["Christine"]="Christine";
  $con_con_d["chyang"]="chyang";
  $con_con_d["Grace"]="Grace";
  $con_con_d["Hank"]="Hank";
  $con_con_d["James"]="James";
  $con_con_d["Joge"]="Joge";
  $con_con_d["Klet"]="Klet";
  $con_con_d["Wen"]="Wen";
  $edit_con_con=new XoopsFormSelect ("顧問人員", "con_con", $con_con);
  $edit_con_con->addOptionArray($con_con_d);
  $Tray7->addElement($edit_con_con);
  $Tray7->addElement(new XoopsFormText ("顧問工時(分)", "min_con", "4%", 4, $min_con));
  //$Tray7->addElement(new XoopsFormText ("SAP BASIS", "con_basis", "12%", 12, $con_basis));
  $con_basis_d["n/a"]="n/a";
  $con_basis_d["BASIS"]="BASIS";
  $edit_con_basis=new XoopsFormSelect ("SAP BASIS", "con_basis", $con_basis);
  $edit_con_basis->addOptionArray($con_basis_d);
  $Tray7->addElement($edit_con_basis); 
  $Tray7->addElement(new XoopsFormText ("SAP BASIS工時(分)", "min_basis", "4%", 4, $min_basis));
  $form->addElement($Tray7);
  
  //$sum_hour=$sum_min=0;
  //$total=$_POST['min_evaluation'] + $_POST['min_abaper'] + $_POST['min_con'] + $_POST['min_basis'];
  //$sum_hour=intval($total / 60);
  //$sum_min=$total - $sum_hour * 60;

  if(empty($possible_solutions)) $possible_solutions="請輸入評估內容";  
  $form->addElement(new XoopsFormTextArea ("評估內容", "possible_solutions", $possible_solutions, 10, 70));
  
  $form->addElement(new XoopsFormTextArea ("執行結果說明", "action_entry", $action_entry, 5, 70));
  
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $main = $form->render();
 
  return $main;
}

//*******認列工時修改Function*******//
function fix_close()
{
  global $xoopsDB , $xoopsUser;
  
  if($xoopsUser){
    $isAdmin = $xoopsUser->isAdmin();
  }else{
    $isAdmin = false;
  }

	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where `id` = '$_POST[ids]'";
	$result=$xoopsDB -> query($sql);
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
    $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
    $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
    $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
    $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
    $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);

  $op="update_close";
  
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  $form = new XoopsThemeForm("評估修改","form", $_SERVER['PHP_SELF']);
 
  $Tray1=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray1", true);
  $add_id=new XoopsFormText ("需求單編號", "id", "16%", 16, $id);
  $add_id->setExtra("disabled");
  $Tray1->addElement($add_id);
  $state_d=get_statecat_data($state);
  $add_state=new XoopsFormText ("狀態", "state", "16%", 16, $state_d[sname]);
  $add_state->setExtra("disabled");
  $Tray1->addElement($add_state);
  $form->addElement($Tray1);
  
  $Tray2=new XoopsFormElementTray("需求單資訊", "&nbsp;", "Tray2", true);
  $add_module=new XoopsFormText ("模組", "module", "8%", 8, $module);
  $add_module->setExtra("disabled");
  $Tray2->addElement($add_module);
  $add_owner=new XoopsFormText ("負責顧問", "owner_fullname", "10%", 10, $owner_fullname);
  $add_owner->setExtra("disabled");
  $Tray2->addElement($add_owner);
  $add_category=new XoopsFormText ("類型", "category", "8%", 8, $category);
  $add_category->setExtra("disabled");
  $Tray2->addElement($add_category);
  $add_reqtype=new XoopsFormText ("問題分類", "reqtype", "16%", 16, $reqtype);
  $add_reqtype->setExtra("disabled");
  $Tray2->addElement($add_reqtype);
  $form->addElement($Tray2);
  
  $Tray3=new XoopsFormElementTray("跨部門資訊", "&nbsp;", "Tray3", true);
  $add_crossteam=new XoopsFormRadioYN('是否跨單位需求', 'crossteam', $crossteam);
  $add_crossteam->setExtra("disabled");
  $Tray3->addElement($add_crossteam);
  if($crossteam=="1"){
	$add_crossowner=new XoopsFormText ("跨模組顧問", "owner_crossteam", "20%", 20, $owner_crossteam);
	$add_crossowner->setExtra("disabled");
	$Tray3->addElement($add_crossowner);
	}
  $form->addElement($Tray3); 
  
  $Tray5=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray5", true);
  $edit_workhour_date=new XoopsFormCalendar ("認列工時日期", "workhour_date", 11,$workhour_date);
  //$edit_workhour_date=new XoopsFormText ("認列工時日期", "workhour_date", "16%", 16, $workhour_date);
  //$add_workhour_date->setExtra("disabled");
  $Tray5->addElement($edit_workhour_date);
  $add_amsclose_date=new XoopsFormText ("結案日期", "amsclose_date", "16%", 16, $amsclose_date);
  $add_amsclose_date->setExtra("disabled");
  $Tray5->addElement($add_amsclose_date);
  $form->addElement($Tray5);
  
  $Tray4=new XoopsFormElementTray("日期資訊", "&nbsp;", "Tray4", true);
  $add_inform_date=new XoopsFormText ("驗收日期", "inform_date", "16%", 16, $inform_date);
  $add_inform_date->setExtra("disabled");
  $Tray4->addElement($add_inform_date);
  $add_est_start=new XoopsFormText ("評估日期", "est_start", "16%", 16, $est_start);
  $add_est_start->setExtra("disabled");
  $Tray4->addElement($add_est_start);
  $add_date_raised=new XoopsFormText ("提單日期", "date_raised", "16%", 16, $date_raised);
  $add_date_raised->setExtra("disabled");
  $Tray4->addElement($add_date_raised);
  $form->addElement($Tray4);
  
  $edit_headline=new XoopsFormText ("主旨", "headline", "80%", 60, $headline);
  $edit_headline->setExtra("disabled");
  $form->addElement($edit_headline);
  
  $edit_content=new XoopsFormTextArea ("需求內容", "content", $content, 5, 70);
  $edit_content->setExtra("disabled");
  $form->addElement($edit_content);
  
  $add_possible_solutions=new XoopsFormTextArea ("評估內容", "possible_solutions", $possible_solutions, 10, 70);
  $add_possible_solutions->setExtra("disabled");
  $form->addElement($add_possible_solutions);
  
  $form->addElement(new XoopsFormHidden ("sn", $sn));
  $form->addElement(new XoopsFormHidden ("op", $op));
  $form->addElement(new XoopsFormButton ("", "","送出", "submit"));
  $main = $form->render();

  return $main;
}

?>
