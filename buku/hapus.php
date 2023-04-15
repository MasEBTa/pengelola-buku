<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = $_GET["isbn"];

    // mulai input data
    if ( isset($_GET["isbn"]) ) {
        hapus( $_GET, $conn , 'buku');
    }
?>