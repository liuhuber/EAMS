
<?php
include "../../mainfile.php";
include "function.php";

global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}
$uid = $xoopsUser->uid();



function download_requireform($state = "",$type="")
{
  global $xoopsDB , $xoopsUser , $xoopsModuleConfig;
  if($xoopsUser){
    $now_uid = $xoopsUser->getVar("uid");
  	$isAdmin = $xoopsUser->isAdmin();
  }else{
    $now_uid = $isAdmin = "";
  }
  
//  $sql = "select * from " . $xoopsDB->prefix('requireform') . " order by sn";
	$sql = "select * from " . $xoopsDB->prefix('requireform') . " where (`owner_fullname` = 'Chriss' or `owner_fullname` = 'Christine') order by id desc";


  $result = $xoopsDB -> query($sql) or redirect_header(XOOPS_URL , 3 , _MD_MYNEWS_LIST_NEWS_ERROR."<br />" . $xoopsDB->errno() . " : " . $xoopsDB->error());
  $all_news="";
  
  $i=0;
  while (list($sn,$id,$state,$project_name,$priority,$company,$receive_date,$submitter_fullname,$date_raised,$writedep,$target_date,$originator,$phone,$needdep,$email,$dep_manager,$referenceid,
$headline,
$description,
$assign_date,
$est_start,
$est_finish,
$service_level,
$module,
$crossteam,
$category,
$owner_fullname,
$reqtype,
$owner_crossteam,
$con_evaluation,
$con_abaper,
$con_con,
$con_basis,
$min_evaluation,
$min_abaper,
$min_con,
$min_basis,
$sum_min,
$sum_hour,
$possible_solutions,
$resolution,
$requestid,
$inform_date,
$transport_date,
$workhour_date,
$amsclose_date,
$infoclose_date,
$action_entry,
$actionentry2,
$actioinentry3,$flag)=$xoopsDB->fetchRow($result)) { 
 
    $uid_name=XoopsUser::getUnameFromId($uid,0);
	$statecat_data=get_statecat_data($state);
	$companycat_data=get_companycat_data($company);
	$prioritycat_data=get_prioritycat_data($priority);
	$project_name_data=get_projectcat_data($project_name);
	$writedep_name=get_departmentcat_data($writedep);
	$needdep_name=get_departmentcat_data($needdep);
	
	
	if ( $i % 2 == 1) 
		$all_news.="<tr bgcolor='#FFFF80'>";
    else
		$all_news.="<tr bgcolor='#FFFFFF'>";
	
	
	
	$all_news.="
    
    
  
<td>$id</td>
<td>".$statecat_data['sname']."</td>
<td>$referenceid</td>
<td>$submitter_fullname</td>
<td>$headline</td>
<td>$owner_fullname</td>
<td>$module</td>
<td>$category</td>
<td>$reqtype</td>
<td>".$project_name_data['pname']."</td>
<td>".$prioritycat_data['pname']."</td>
<td>".$companycat_data['cname']."</td>
<td>".$writedep_name['dname']."</td>
<td>$originator</td>
<td>".$needdep_name['dname']."</td>
<td>$dep_manager</td>
<td>$receive_date</td>
<td>$date_raised</td>
<td>$target_date</td>
<td>$phone</td>
<td>$email</td>
<td>$description</td>
<td>$est_start</td>
<td>$est_finish</td>
<td>$service_level</td>
<td>$crossteam</td>
<td>$owner_crossteam</td>
<td>$con_evaluation</td>
<td>$min_evaluation</td>
<td>$con_con</td>
<td>$min_con</td>
<td>$con_abaper</td>
<td>$min_abaper</td>
<td>$con_basis</td>
<td>$min_basis</td>
<td>$sum_min</td>
<td>$possible_solutions</td>
<td>$resolution</td>
<td>$inform_date</td>
<td>$transport_date</td>
<td>$amsclose_date</td>
<td>$workhour_date</td>
<td>$infoclose_date</td>
<td>$action_entry</td>
<td>$actionentry2</td>
<td>$actioinentry3</td>
<td>$assign_date</td>
<td>$sum_hour</td>
<td>$requestid</td>
<td>$flag</td>
 </tr>";
 
 
	$i++;
  }
 
  
  
  $main.="
  <table class='outer' border = '1' frame = 'border' rules='all'>
  <tr bgcolor='#abff24'>  
<th>id</th>
<th>state</th>
<th>referenceid</th>
<th>submitter_fullname</th>
<th>headline</th>
<th>owner_fullname</th>
<th>module</th>
<th>category</th>
<th>reqtype</th>
<th>project_name</th>
<th>priority</th>
<th>company</th>
<th>writedep</th>
<th>originator</th>
<th>needdep</th>
<th>dep_manager</th>
<th>receive_date</th>
<th>date_raised</th>
<th>target_date</th>
<th>phone</th>
<th>email</th>
<th>description</th>
<th>est_start</th>
<th>est_finish</th>
<th>service_level</th>
<th>crossteam</th>
<th>owner_crossteam</th>
<th>con_evaluation</th>
<th>min_evaluation</th>
<th>con_con</th>
<th>min_con</th>
<th>con_abaper</th>
<th>min_abaper</th>
<th>con_basis</th>
<th>min_basis</th>
<th>sum_min</th>

<th>possible_solutions</th>
<th>resolution</th>
<th>inform_date</th>
<th>transport_date</th>
<th>amsclose_date</th>
<th>workhour_date</th>
<th>infoclose_date</th>
<th>action_entry</th>
<th>actionentry2</th>
<th>actioinentry3</th>
<th>assign_date</th>
<th>sum_hour</th>
<th>requestid</th>
<th>flag</th>

  </tr>
  $all_news
  </table>
  <div align='center'>$bar</div>";
  
$file_type = "vnd.ms-excel";
$file_ending = "xls";
$file_date = date("Ymd");
header("Pragma: public");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/$file_type");
header("Content-Disposition: attachment; filename=AMS_Calllog_record_$file_date.$file_ending");
header("Content-Transfer-Encoding: Binary ");
header("Pragma: no-cache");
header("Expires: 0");
  
  
  
  return $main;
}






//include "../../header.php";


$main = download_requireform();

echo $main;
//echo my_menu();
//include "../../footer.php";
?>

