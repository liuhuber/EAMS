
<?php
include "../../mainfile.php";
include "function.php";
include "function_a.php";

global $xoopsDB,$xoopsUser;

if(empty($xoopsUser)){
   redirect_header("index.php" , 3 , _MD_MYNEWS_MUST_LOGIN);
}
$uid = $xoopsUser->uid();

$main = download_requireform();

echo $main;

?>

