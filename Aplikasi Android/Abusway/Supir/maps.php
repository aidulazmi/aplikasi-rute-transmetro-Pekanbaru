<?php 
	$server		= "localhost"; // adjust the server name
	$user		= "root"; // adjust the username
	$password	= ""; // adjust the password
	$database	= "si_buswey"; // adjust the target databese
	
	$con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect MySQL: " . mysqli_connect_error();
	}

	$query = mysqli_query($con, "SELECT * FROM halte ORDER BY nama_halte ASC");
	
	$json = '{"nama_halte": [';

	
	// create looping dech array in fetch
	while ($row = mysqli_fetch_array($query)){

	// quotation marks (") are not allowed by the json string, we will replace it with the` character
	// strip_tag serves to remove html tags on strings
		$char ='"';

		$json .= 
		'{
			"kd_halte":"'.str_replace($char,'`',strip_tags($row['kd_halte'])).'", 
			"nama_halte":"'.str_replace($char,'`',strip_tags($row['nama_halte'])).'",
			"latitute":"'.str_replace($char,'`',strip_tags($row['latitute'])).'",
			"longtitude":"'.str_replace($char,'`',strip_tags($row['longtitude'])).'"
		},';
	}

	// omitted commas at the end of the array
	$json = substr($json,0,strlen($json)-1);

	$json .= ']}';

	// print json
	echo $json;
	
	mysqli_close($con);
	
?>