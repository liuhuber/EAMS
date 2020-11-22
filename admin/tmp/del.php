<?php
/*-----------引入檔案區--------------*/
//引入XOOPS的/include/cp_header.php
include "../../../include/cp_header.php";

//引入自訂的共同function檔案
include "../function.php";

/*-----------function程式區--------------*/


/*-----------秀出結果區--------------*/
//95.09.09修正成可在register_globals = Off
$bsn=$_GET['bsn'];


//$cat_data=(!empty($bsn))?get_equipborrow_data($bsn):array();
del_equipborrow($bsn);
header("location:../index.php");

//引入XOOPS2頁尾檔
include XOOPS_ROOT_PATH.'/footer.php';
?>
