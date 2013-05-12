<?php
class shorturl{
	static function get_shorturl($strSource,$token="")	// 原始链接得到短链接
	{
		$base32 = array (
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
		'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
		'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
		'y', 'z', '0', '1', '2', '3', '4', '5'
		);

		$hex = md5($token.$strSource);
		$hexLen = strlen($hex);
		$subHexLen = $hexLen / 8;
		$output = array();

		for ($i = 0; $i < $subHexLen; $i++) {
			$subHex = substr ($hex, $i * 8, 8);
			$int = 0x3FFFFFFF & (1 * ('0x'.$subHex));
			$out = '';

			for ($j = 0; $j < 6; $j++) {
			  $val = 0x0000001F & $int;
			  $out .= $base32[$val];
			  $int = $int >> 5;
			}

			$output[] = $out;
		}

		return $output;
	}
	
	static function get_srcurl($strShort)				// 短连接得到原始链接
	{
		$mysqli = new mysqli(DB_HOST, USER_NAME, USER_PASSWORD, DB_NAME);
		if ($mysqli->connect_error)
		{
			return false;
		}
		$strsql = "select srcurl from urlinfo where shorturl='$strShort'";
		$result = $mysqli->query($strsql);
		if (!$result or $result->num_rows !== 1)
		{
			$result->close();
			$mysqli->close();
			return false;
		}
		$datarow = $result->fetch_array();
		$result->close();
		$mysqli->close();
		return $datarow['srcurl'];
	}
}
?>