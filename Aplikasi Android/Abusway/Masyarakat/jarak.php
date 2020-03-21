<?php 
	include_once "koneksi.php";
	
	$latitute = $_GET['latitute'];
	$longtitude = $_GET['longtitude'];	
	
	/* 10.0.2.2 adalah IP Address localhost EMULATOR ANDROID STUDIO,
        Ganti IP Address tersebut dengan IP Laptop Apabila di RUN di HP. HP dan Laptop harus 1 jaringan */
	$url = "http://192.168.43.190/busway/uploads/";
	
	// perhitungan haversine formula pada sintak SQL
	$query = mysqli_query($con, "SELECT kd_halte, nama_halte, foto, (6371 * ACOS(SIN(RADIANS(latitute)) * SIN(RADIANS($latitute)) + COS(RADIANS(longtitude - $longtitude)) * COS(RADIANS(latitute)) * COS(RADIANS($latitute)))) AS jarak FROM halte HAVING jarak < 6371 ORDER BY jarak ASC");
	
	$json = array();
	
	$no = 0;
	
	while($row = mysqli_fetch_assoc($query)){
		$json[$no]['kd_halte'] = $row['kd_halte'];
		$json[$no]['nama_halte'] = $row['nama_halte'];
		$json[$no]['foto'] = $url.$row['foto'];
		$json[$no]['jarak'] = $row['jarak'];
		
		$no++;
	}
	
	echo json_encode($json);
	
	mysqli_close($con);
	
?>