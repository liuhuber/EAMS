<?php
// Test got Git

include "../../mainfile.php";
include "function.php";
global $xoopsDB,$xoopsUser;

//$main = "Birthday: <input type='date' name='bday' >";
//$main = "ABC";
$confirm_date = date("Y-m-d");
$main = "<FONT COLOR=red>工時認列日期:</FONT> <input type='date' name='workhour_date' value='$confirm_date' />";

include "../../header.php";

echo $main;
//echo my_menu();

include "../../footer.php";
?>
