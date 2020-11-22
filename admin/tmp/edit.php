<?php

/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";


/*-----------秀出結果區--------------*/
//引入XOOPS2頁首檔
include XOOPS_ROOT_PATH.'/header.php';

//95.09.09修正成可在register_globals = Off
$bsn=$_REQUEST['bsn'];
$bdate=$_POST['bdate'];
$bman=$_POST['bman'];
$esn=$_POST['esn'];
$bnow=$_POST['bnow'];
$the_day=$_POST['the_day'];
$bnote=$_POST['bnote'];
//------------------------------------


global $xoopsDB,$xoopsUser;
	//取得使用者姓名
	$uid = ($xoopsUser)?$xoopsUser->getVar('uid'):"";
       
if (!empty($uid)){

$equipborrow_data=get_equipborrow_data($bsn);
$equip_data=get_equip_data($equipborrow_data[esn]);

//印出主要內容
//if ($the_day and $bman and $bequip ){
if ($the_day){

//利用replace來新增或修改equipborrow資料表中的資料
	$sql_insert = "replace into ".$xoopsDB->prefix("equipborrow")." (bsn,bdate,bman,esn,bnow,backdate,bnote)  values ('$bsn','$bdate', '$bman','$esn','$bnow','$the_day','$bnote')";

	//執行SQL語法
	$xoopsDB->query($sql_insert) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$bsn=$xoopsDB->getInsertId();
 
//在設備資料增加借用者及借出訊息
     $data=get_equip_data($esn);
     $data['ebman']='';
if($bnow=='歸還'){
$bnow='未借出';
}
     $data['eborrow']=$bnow;
     save_equip_data($data);





header("location:../index.php");

}else{

$username = ($xoopsUser)?$xoopsUser->getVar('name'):'';
$mktime=mktime (date("H"),date("i"),date("s"),date("m")  ,date("d"),date("Y"));
$the_day=date("Y-m-d",$mktime);
// $equip_select=get_equip_select($esn);

        
        $main="<h3>設備歸還登記表</h3>
        <form method='POST' action='edit.php'>
	<table border='2' width='100%' id='table1'>
		<tr>
			<td align='left'>借用日期：$equipborrow_data[bdate]</td>
                               </tr>
                               <tr>
			<td align='left'>借用人：$equipborrow_data[bman]</td>
		</tr>
                                <tr>
			<td align='left'>借用設備：$equip_data[ename]</td>	
                                </tr>	
                                <tr>
                                <td><font color='blue'> ---------------------------------------------------------------</font></td>   
                                </tr>	
                                <tr>
		<td align='left'>歸還情形：
                                <select size='1' name='bnow' >
               	                <option value='歸還'>歸還</option>
	                <option value='借出'>借出</option>
                                <option value='人為損壞'>人為損壞</option>
                                <option value='自然損壞'>自然損壞</option>
                                <option value='遺失'>遺失</option>
	                </select>
                               (修改前情形：$equipborrow_data[bnow])
                                </td>
                                </tr>
                                <tr>
			<td align='left'>歸還或回報日期：
                                 <INPUT type='text' name='the_day' size='12' value='".$the_day."'>  (修改前日期：$equipborrow_data[backdate])</td>	
                                </tr>				
		<tr>
			<td align='left'>設備歸還補充說明：<br>
			<textarea rows='5' name='bnote' cols='60'>$equipborrow_data[bnote]</textarea></td>
		</tr>
	    </table>
              <input type='hidden' name='bsn' value='$equipborrow_data[bsn]'>
               <input type='hidden' name='bdate' value='$equipborrow_data[bdate]'>
              <input type='hidden' name='bman' value='$equipborrow_data[bman]'>
              <input type='hidden' name='esn' value='$equipborrow_data[esn]'>
           	<p><input type='submit' value='送出' name='B1'><input type='reset' value='重新設定' name='B2'></p>
      </form>";

echo $main;
}
}

//引入XOOPS2頁尾檔
include XOOPS_ROOT_PATH.'/footer.php';
?>
