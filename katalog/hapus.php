<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = $_GET["id_katalog"];

    // mulai input data
    if ( isset($_GET["id_katalog"]) ) {
        hapus( $_GET, $conn , 'katalog');
    }
?>