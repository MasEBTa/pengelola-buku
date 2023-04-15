<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = $_GET["id_anggota"];

    // mulai input data
    if ( isset($_GET["id_anggota"]) ) {
        hapus( $_GET, $conn , 'anggota');
    }
?>