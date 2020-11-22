<?php
$modversion = array();
$modversion['name'] = "需求單管理系統";
$modversion['version'] = "1.0";
$modversion['description'] = "需求單管理系統";
$modversion['credits'] = "";
$modversion['author'] = "Huber Liu(pmliu@tw.ibm.com)";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = "0";
$modversion['image'] = "images/logo.png";
$modversion['dirname'] = "clog";


//---使用者主選單設定---//
$modversion['hasMain'] = 1;
$modversion['sub'][0]['name'] = "查詢需求單";
$modversion['sub'][0]['url'] = "list.php";
$modversion['sub'][1]['name'] = "建立需求單";
$modversion['sub'][1]['url'] = "post.php";
$modversion['sub'][2]['name'] = "指派";
$modversion['sub'][2]['url'] = "assign.php";
$modversion['sub'][3]['name'] = "評估";
$modversion['sub'][3]['url'] = "evaluate.php";
$modversion['sub'][4]['name'] = "情系部簽核";
$modversion['sub'][4]['url'] = "signoff_mis.php";
$modversion['sub'][5]['name'] = "財會小組簽核";
$modversion['sub'][5]['url'] = "signoff_fin.php";
$modversion['sub'][6]['name'] = "使用者驗收";
$modversion['sub'][6]['url'] = "acceptance.php";
$modversion['sub'][7]['name'] = "轉入正式環境";
$modversion['sub'][7]['url'] = "transport.php";
$modversion['sub'][8]['name'] = "結案";
$modversion['sub'][8]['url'] = "close.php";
$modversion['sub'][9]['name'] = "下載";
$modversion['sub'][9]['url'] = "download.php";
$modversion['sub'][10]['name'] = "修改需求單";
$modversion['sub'][10]['url'] = "edit.php";


//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/clog.sql";
$modversion['tables'][1] = "authorization";
$modversion['tables'][2] = "categorycat";
$modversion['tables'][3] = "companycat";
$modversion['tables'][4] = "consultantcat";
$modversion['tables'][5] = "departmentcat";
$modversion['tables'][6] = "modulecat";
$modversion['tables'][7] = "prioritycat";
$modversion['tables'][8] = "projectcat";
$modversion['tables'][9] = "reqtypecat";
$modversion['tables'][10] = "statecat";
$modversion['tables'][11] = "requireform";

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/statecat.php";
$modversion['adminmenu'] = "admin/menu.php";

//---搜尋介面設定---//
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.php";
$modversion['search']['func'] = "clog_search";
?>
