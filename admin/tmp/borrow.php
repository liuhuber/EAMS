<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/


/*-----------秀出結果區--------------*/
//引入XOOPS2頁首檔
include XOOPS_ROOT_PATH.'/header.php';


//95.09.09修正成可在register_globals = Off
$the_day=$_POST['the_day'];
$bman=$_POST['bman'];
$bequip=$_POST['bequip'];
$bnow=$_POST['bnow'];
$bnote=$_POST['bnote'];
//------------------------------------


global $xoopsDB,$xoopsUser;
	//取得使用者姓名
	$uid = ($xoopsUser)?$xoopsUser->getVar('uid'):"";

       
if (!empty($uid)){
//印出主要內容
if ($the_day and $bman and $bequip ){

$equip_sn_data=get_equip_sn_data($bequip);
$bequip= $equip_sn_data['esn'];

	//利用replace來新增或修改equipborrow資料表中的資料
	$sql_insert = "insert into ".$xoopsDB->prefix("equipborrow")." (bdate,bman,esn,bnow,bnote)  values ('$the_day', '$bman','$bequip','$bnow','$bnote')";

	//執行SQL語法
	$xoopsDB->query($sql_insert) or redirect_header($_SERVER['PHP_SELF'], 10,"執行錯誤，儲存分類資料失敗！");

	//取得最後新增資料的流水編號
	$bsn=$xoopsDB->getInsertId();
   //在設備資料增加借用者及借出訊息
     $data=get_equip_data($bequip);
     $data['ebman']=$bman;
     $data['eborrow']=$bnow;
     save_equip_data($data);
 //  $data1=get_place_num($place);
//     $data1['fixpnum']=$data1['fixpnum']+1;
//      save_place_num($data1);
    

//     $data2=get_title_num($title);
//     $data2['fixtnum']=$data2['fixtnum']+1; 
//     save_title_num($data2);

header("location:../index.php");



}else{

$username = ($xoopsUser)?$xoopsUser->getVar('name'):'';
$mktime=mktime (date("H"),date("i"),date("s"),date("m")  ,date("d"),date("Y"));
$the_day=date("Y-m-d",$mktime);
$equip_select=get_equip_select($esn);

        
        $main="<h3>設備借用登記表</h3>
        <form method='POST' action='borrow.php'>
	<table border='2' width='100%' id='table1'>
		<tr>
			<td align='left'>借用日期：<input type='text' name='the_day' size='10' value='$the_day'></td>
                               </tr>
                               <tr>
			<td align='left'>借用人：<input type='text' name='bman' size='10'></td>
		</tr>
                                <tr>
			<td align='left'>借用設備：
                                <select name='bequip'>
	                <option value=''>請選擇設備名稱</option>
	                $equip_select </select></td>	
                                </tr>		
		<tr>
			<td align='left'>設備借用補充說明：<br>
			<textarea rows='6' name='bnote' cols='60'></textarea></td>
		</tr>
	    </table>
                <input type='hidden' name='bnow' value='借出'>
	<p><input type='submit' value='送出' name='B1'><input type='reset' value='重新設定' name='B2'></p>
      </form>";

echo $main;
}
}

//引入XOOPS2頁尾檔
include XOOPS_ROOT_PATH.'/footer.php';
?>
