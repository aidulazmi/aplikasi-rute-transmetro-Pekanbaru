<?php
	include 'koneksi.php';
	
	class usr{}
	
	$Username = $_GET["Username"];
	$password = $_GET["password"];
	
	if ((empty($Username)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysql_query("SELECT * FROM driver WHERE Username='$Username' AND password='$password'");
	
	$row = mysql_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['Username'];
		$response->id_driver = $row['id_driver'];
		$response->Username = $row['Username'];
		$response->email = $row['email'];
		$response->nm_lengkap = $row['nm_lengkap'];
		$response->alamat = $row['alamat'];
		$response->no_hp = $row['no_hp'];
		$response->nama_koridor = $row['nama_koridor'];
		$response->platn = $row['platn'];
		$response->foto = $row['foto'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysql_close();



?>