<?php
include "../../../include/cp_header.php";
include "../function.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$state=(empty($_REQUEST['state']))?"":$_REQUEST['state'];
switch ($op)
{
  case "save_statecat":
  $state = insert_statecat();
  header("location:statecat.php");
  break;

  case "update_statecat":
  update_statecat();
  header("location:statecat.php?state=$state");
  break;
  
  default:
  $main = add_statecat_form($state);
}

xoops_cp_header();
//loadModuleAdminMenu(1);
echo $main;
xoops_cp_footer();
?>

