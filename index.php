<!doctype html>
<html>
<head>
<title>短网址</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="assets/default.css" />
</head>
<body>
<div id="header"></div>
<div id="content">
	<h2>请输入您要缩短的网址：</h2>
	<div id="create_form">
		<form method="get" action="index.php">
			<input id="url" type="text" name="url" value="">
			<input class="button" type="submit" value="">
			<p><label for="alias">自定义别名 (可选):</label><br>
			http://2.gy/<input id="alias" maxlength="40" type="text" name="alias" value=""> 可包含字母,数字,-和_</p>
		</form>
	</div>
</div>
<div id="footer"></div>
</body>
</html>