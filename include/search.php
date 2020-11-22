<?php
function clog_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	//處理許功蓋
	if(get_magic_quotes_gpc()){
		foreach($queryarray as $k=>$v){
			$arr[$k]=addslashes($v);
		}
		$queryarray=$arr;
	}
	$sql = "SELECT sn,title,post_date, uid FROM ".$xoopsDB->prefix("my_news")." WHERE 1";
	if ( $userid != 0 ) {
		$sql .= " AND uid=".$userid." ";
	}
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((title LIKE '%{$queryarray[0]}%' OR content LIKE '%{$queryarray[0]}%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "( title LIKE '%{$queryarray[$i]}%' OR content LIKE '%{$queryarray[$i]}%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY post_date DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/page_paintbrush.png";
		$ret[$i]['link'] = "view.php?sn=".$myrow['sn'];
		$ret[$i]['title'] = $myrow['title'];
		$ret[$i]['time'] = strtotime($myrow['post_date']);
		$ret[$i]['uid'] = $myrow['uid'];
		$i++;
	}
	return $ret;
}
?>
