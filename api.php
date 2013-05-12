<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	require('api.get.php');
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	require('api.post.php');
}
else{
}
?>