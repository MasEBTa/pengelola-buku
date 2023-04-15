<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = $_GET["id_penerbit"];

    // mulai input data
    if ( isset($_GET["id_penerbit"]) ) {
        hapus( $_GET, $conn , 'penerbit');
    }
?>