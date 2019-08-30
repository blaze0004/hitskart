<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
$x = get_data_curl('https://www.googleapis.com/youtube/v3/channels?part=contentDetails&id=UCSmC99d8wQvNWbqpGcFVumw&fields=items%2Fid&key=AIzaSyCN8jbhC5px2U9GdJdlkUCSN0A1xZh5xus');
$x = json_decode($x, true);
echo "'.$x['items/id'].'";
function get_data_curl($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
?>

</body>
</html>