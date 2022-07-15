<?php
	$host 		= "localhost";
	$user 		= "root";
	$pw 		= "";
	$db			= "tokobuku";

	$kon = new mysqli($host,$user,$pw,$db);

	if (!$kon){
		die("Koneksi gagal: ".mysqli_connect_error());
	}
?>