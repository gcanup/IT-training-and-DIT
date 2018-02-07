<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anup PHP test</title>
</head>
<body>


<?php

//$album = null;

if(isset($_POST['album_id'])) {	
	//loadApi();
	
	print_r("Hello world");
	
	$url = "https://app.nepaliaudiobook.com/api/public/v2/tracks/" . $_POST['album_id'];
	$data = array(); //'key1' => 'value1', 'key2' => 'value2'

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n authorization: bearer token",
			'method'  => 'GET',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	
	$result = file_get_contents($url, false, $context);
	
	$decodedData = json_decode($result, true);
	
	
	//print_r($decodedData['data']['album']['title']);

	
	$album = $decodedData['data']['album'];

	echo '<h1>'.$album['title'].'</h1>';
	echo '<img src="'.$album['thumbnail'].'" />';	
}

function loadApi($url){


	
}

?>


<form action="" method="POST">

    <label for="album-id">Album id</label>
    <input type="number" name="album_id" id="album-id"/>

    <input type="submit" value="Submit" />
</form>
    
</body>
</html>