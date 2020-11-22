<?php
include "../../../include/cp_header.php";
include "../function.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.php";
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";

$op=(empty($_REQUEST['op']))?"":$_REQUEST['op'];
$state=(empty($_REQUEST['state']))?"":$_REQUEST['state'];
switch ($op)
{
  case "save_requireform":
  $state = insert_requireform();
  header("location:index.php");
  break;

  case "update_requireform":
  update_requireform();
  header("location:index.php?state=$state");
  break;
  
  default:
  $main = add_requireform_form($state);
}

xoops_cp_header();
//loadModuleAdminMenu(0);
echo $main;
xoops_cp_footer();
?>

