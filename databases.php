<?php
	// data of database
    $DBhost = "localhost";
    $DBuser = "root";
    $DBpassword ="";
    $DBname="perpus";

    // koneksi ke database
	$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);
    function cek_koneksi($koneksi) {
        if($koneksi){
            echo "connected";
        }else{
            echo "not connected";
        }
    }
	// sistem query
	function query( $query ){
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}
?>