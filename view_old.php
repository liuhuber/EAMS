<?php
include "../../mainfile.php";
include "function.php";
global $xoopsDB , $xoopsUser;

//取得使用者姓名
$uid = $xoopsUser->uid();
$uname=$xoopsUser->uname();
//權限檢查
$sql="select * from ".$xoopsDB->prefix("authorization")." where `uname` = '{$uname}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],6, "執行錯誤");
list($uname,$assign,$confirm,$sign_mis,$sign_fin,$sysadm,$close)=$xoopsDB->fetchRow($result);

$sn=(empty($_REQUEST['sn']))?"":intval($_REQUEST['sn']);
if(empty($sn)){
  header("location:index.php");
}else{
  $main = show_requireform($sn);
  
  $sql = "select sn,id,state,category from " . $xoopsDB->prefix('requireform') . " where `sn` = '$sn'";
  $result = $xoopsDB -> query($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_GET_NEWS_ERROR."<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  list($sn,$id,$state,$category)=$xoopsDB -> fetchRow($result);
  include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
  
  $main2="<P><FORM action='sign_action.php?sn=$sn' method='POST'>";
  if($state=='4'){						//評估完成
	if($category=='3'){					//UHD單
		if($sign_mis == 'Y'){
			$main2.="<INPUT type='submit' name='sign_uhd' value='UHD簽核'>";
		}
	}else{
		if($sign_mis == 'Y'){
			$main2.="<FONT COLOR=red>情報系統部說明:</FONT><BR><textarea cols=80 rows=6 name=action_entry2>預設文字</textarea><BR>
			<INPUT type='submit' name='sign_mis' value='情系部簽核'>
			<INPUT type='submit' name='wait' value='待修改'>
			<INPUT type='submit' name='reject' value='拒絕'>
			<INPUT type='submit' name='delay' value='延緩'>";
		}
	}
  } elseif($state=='6'){		//UHD已簽核 -> 轉入正式環境
	$main2.="<INPUT type='submit' name='sign_prd' value='轉入正式環境'>";
  } elseif($state=='7'){	  //情系部已簽核 -> 財會小組簽核
	if($sign_fin == 'Y'){
		$main2.="<FONT COLOR=red>財會小組主管說明:</FONT><BR><textarea cols=80 rows=6 name=action_entry3>預設文字</textarea><BR>
		<INPUT type='submit' name='sign_fin' value='財會小組簽核'>";
	}
  } elseif($state=='8'){		//財會小組已簽核 -> 使用者驗收中
	$main2.="<FONT COLOR=red>執行結果說明:</FONT><BR><textarea cols=80 rows=6 name=action_entry>Request Number:</textarea><BR>
	<INPUT type='submit' name='sign_accept' value='使用者驗收'>";
  } elseif($state=='9'){		//使用者已驗收 -> 轉入正式環境
	$main2.="<INPUT type='submit' name='sign_prd2' value='轉入正式環境'>";
  } elseif($state=='10'){		//已轉入正式環境 -> 結案
	//if($close == 'Y'){
		$confirm_date = date("Y-m-d");
		$main2.="<FONT COLOR=red>工時認列日期:</FONT> <input type='date' name='workhour_date' value='$confirm_date' /><BR>
		<INPUT type='submit' name='sign_close' value='結案'>";
	//}
  }
 
  $main2.="<INPUT type='hidden' name='sn' value='$sn'><INPUT type='hidden' name='id' value='$id'></FORM>";
}

include "../../header.php";
echo $main;
echo $main2;
//echo my_menu();
echo "<p><div>[<a href='index.php'>回首頁</a>]</div>";
include "../../footer.php";


/**
 * 讀出一筆需求單
 */
function show_requireform($sn = "")
{
  global $xoopsDB;
  $sql = "select * from " . $xoopsDB->prefix('requireform') . " where `sn` = '$sn'";
  $result = $xoopsDB -> query($sql) or redirect_header("index.php" , 3 , _MD_MYNEWS_GET_NEWS_ERROR."<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  list($sn,$id,$state,$project,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$department,
  $target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,$headline,$content,$assign_date,$est_start,
  $est_finish,$service_level,$module,$crossteam,$category,$owner_fullname,$reqtype,$owner_crossteam,$con_evaluation,
  $con_abaper,$con_con,$con_basis,$min_evaluation,$min_abaper,$min_con,$min_basis,$sum_min,$sum_hour,
  $possible_solutions,$resolution,$requestid,$inform_date,$transport_date,$workhour_date,$amsclose_date,
  $infoclose_date,$action_entry,$action_entry2,$action_entry3,$flag) = $xoopsDB -> fetchRow($result);
  
  
  $d_state=get_statecat_data($state);
  $d_project=get_projectcat_data($project);
  $d_company=get_companycat_data($company);
  $d_priority=get_prioritycat_data($priority);
  //$d_module=get_modulecat_data($module);
  $d_department=get_departmentcat_data($department);
  $d_needdep=get_departmentcat_data($needdep);
  //$d_category=get_categorycat_data($category);
  //$d_reqtype=get_reqtypecat_data($reqtype);
  if($crossteam=='1'){
	$crossteam="是";
  }else{
	$crossteam="否";
  }

  $eols=array("\n","\r");
  $content = str_replace("\r\n","\n",$content);
  $content = str_replace($eols,"<br>",$content)."\n";
  
$main="<h4>需求單號: $id</h4>
<TABLE BORDER>
<TR>
<TD><FONT COLOR=blue>狀態:</FONT><FONT COLOR=red><B> $d_state[sname]</B></FONT></TD>
<TD><FONT COLOR=blue>專案名稱:</FONT> $d_project[pname]</TD>
<TD><FONT COLOR=blue>優先度:</FONT> $d_priority[pname]</TD>
<TD><FONT COLOR=blue>公司名稱:</FONT> $d_company[cname]</TD>
</TR>
<TR>
<TD><FONT COLOR=blue>收文日期:</FONT> $receive_date</TD>
<TD><FONT COLOR=blue>提單者:</FONT> $submitter_fullname</TD>
<TD><FONT COLOR=blue>提單日期:</FONT> $date_raised</TD>
<TD><FONT COLOR=blue>提單單位:</FONT> $d_department[dname]</TD>
</TR>
<TR>
<TD><FONT COLOR=blue>希望完成日期:</FONT> $target_date</TD>
<TD><FONT COLOR=blue>原需求者:</FONT> $originator</TD>
<TD><FONT COLOR=blue>聯絡電話:</FONT> $phone</TD>
<TD><FONT COLOR=blue>原需求單位:</FONT> $d_needdep[dname]</TD>
</TR>
<TR>
<TD><FONT COLOR=blue>電子郵件:</FONT> $email</TD>
<TD><FONT COLOR=blue>單位主管:</FONT> $dep_manager</TD>
<TD><FONT COLOR=blue>參考單號:</FONT> $referenceid</TD>
<TD></TD>
</TR>
</TABLE>	 
<TABLE BORDER>
<TR>
<TD><FONT COLOR=blue>主旨:</FONT><FONT COLOR=purple><B> $headline</B></FONT></TD>
</TR>
<TR></TR>
<TR>
<TD><FONT COLOR=blue>內容:</FONT> <P>$content</TD>
</TR>
</TABLE>
<P>";
 
if($state != '1'){
$main.="<h4>評估資訊</h4>
<TABLE BORDER>
	 <TR>
	   <TD><FONT COLOR=blue>指派日期:</FONT> $assign_date</TD>
       <TD><FONT COLOR=blue>評估日期:</FONT> $est_start</TD>
       <TD><FONT COLOR=blue>預估完成日期:</FONT> $est_finish</TD>
	   <TD><FONT COLOR=blue>服務等級:</FONT> $service_level</TD>       
     </TR>
	 <TR>
	   <TD><FONT COLOR=blue>負責模組:</FONT> $module</TD>
       <TD><FONT COLOR=blue>負責顧問:</FONT> $owner_fullname</TD>
	   <TD><FONT COLOR=blue>需求單類型:</FONT><FONT COLOR=purple><B> $category</B></FONT></TD>
	   <TD><FONT COLOR=blue>問題分類:</FONT> $reqtype</TD>       
     </TR>
	 <TR>
	   <TD><FONT COLOR=blue>跨單位需求:</FONT> $crossteam</TD>
       <TD><FONT COLOR=blue>跨模組顧問:</FONT> $owner_crossteam</TD>
       <TD><FONT COLOR=blue>評估人員:</FONT> $con_evaluation</TD>
	   <TD><FONT COLOR=blue>評估工時:</FONT> $min_evaluation (分)</TD>
     </TR>
	 <TR>
	   <TD><FONT COLOR=blue>顧問人員:</FONT> $con_con</TD>
       <TD><FONT COLOR=blue>顧問人員工時:</FONT> $min_con (分)</TD>
       <TD><FONT COLOR=blue>BASIS顧問:</FONT> $con_basis</TD>
	   <TD><FONT COLOR=blue>BASIS工時:</FONT> $min_basis (分)</TD>
     </TR>
	 <TR>
       <TD><FONT COLOR=blue>程式設計師:</FONT> $con_abaper</TD>
       <TD><FONT COLOR=blue>程式設計師工時:</FONT> $min_abaper</TD>
	   <TD><FONT COLOR=blue>總工時:</FONT><FONT COLOR=purple><B> $sum_hour (小時) $sum_min (分)</B></FONT></TD>
       <TD></TD>
     </TR>
	 <TR></TR>
</TABLE>
<TABLE BORDER>
	 <TR>
       <TD><FONT COLOR=blue>評估內容:</FONT> <P>$possible_solutions</TD>
     </TR>
</TABLE>";
}

if($state == '6' or $state == '7' or $state == '8' or $state == '9' or $state == '10' or $state == '12'){
$main.="<h4>執行/簽核資訊</h4>
<TABLE BORDER>
	 <TR>
       <TD><FONT COLOR=blue>執行原因:</FONT> $resolution</TD>
       <TD><FONT COLOR=blue>驗收通知日期:</FONT> $inform_date</TD>
	   <TD><FONT COLOR=blue>轉PRD日期:</FONT> $transport_date</TD>
       <TD><FONT COLOR=blue>工時認列日期:</FONT> $workhour_date</TD>
     </TR>
	 <TR>
       <TD><FONT COLOR=blue>AMS結案日期:</FONT> $amsclose_date</TD>
	   <TD><FONT COLOR=blue>情系結案日期:</FONT> $infoclose_date</TD>
     </TR>
</TABLE>
<TABLE BORDER>
<TR><TD><FONT COLOR=blue>Request Number:</FONT> $requestid</TD></TR>
</TABLE>
<TABLE BORDER>
<TR>
	<TD><FONT COLOR=blue>執行結果:</FONT> <P>$action_entry</TD>
</TR>
</TABLE>
<TABLE BORDER>
<TR>
	<TD><FONT COLOR=blue>情報系統部結果說明:</FONT> <P>$action_entry2</TD>
</TR>
</TABLE>
<TABLE BORDER>
<TR>
	<TD><FONT COLOR=blue>財會專案小組結果說明:</FONT> <P>$action_entry3</TD>
</TR>
</TABLE>";

}
// <body text="008800" bgcolor="ffcc00" link="ff0000">  
  return $main;
}


?> 