<?php
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$xml = simplexml_load_string($HTTP_RAW_POST_DATA);//转换post数据为simplexml对象
//验证token
//if($xml->token) {};
$baseurl = 'http://localhost/';
$token = $xml->token;
$urls = $xml->urls;
$strSrcUrls = array();
//$strShortUrls = array();
// 得到所有的urls
foreach ($urls->url as $url){
	$strSrcUrls[$url] = $url;
}
// 组合查询语句
$strsql = "select srcurl,shorturl from shorturl where srcurl='";
$strsql .= join("' or srcurl='",$strSrcUrls)."';";
// 查询数据库
$db = new SQLite3('shorturl.db');
$result = $db->query($strsql);
while ($row = $results->fetchArray())){
	if (isset($strSrcUrls[$row['srcurl']])) $strSrcUrls[$row['srcurl']] = $row['shorturl'];
}
$strinsert = array();
$strsql = ''
$returnxml = '<?xml version="1.0" encoding="UTF-8"?><xml><urls>';
foreach ($strSrcUrls as $key => $value){
	if ($key === $value)
	{	
		$value = shorturl($value)[0];
		$strSrcUrls[$key] = $value;
		$strinsert[$key] = $value;
		$strsql .= "insert into shorturl values('".$key."','".$value."');";
	}
	$returnxml .= '<srcurl>'.$key.'</srcurl>';
	$returnxml .= '<shorturl>'.$value.'</shorturl>';
}
if ($strsql !== ''){
	$strsql = 'begin;'.$strsql.'commit;';
	$db->exec($strsql);
}
$db->close();
$returnxml .= '</urls></xml>';
header("Content-type:text/html;charset=utf-8");
echo $returnxml;
}
?>