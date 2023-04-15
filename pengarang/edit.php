<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = strtolower($_GET["id_pengarang"]);

     // buat sintaks query
    $pengarangBuku = "SELECT * FROM pengarang WHERE id_pengarang ". "= "."'".$id."'";

    // fetch datanya dengan fungsi query (dari file databases)
      $pengarangBuku = query($pengarangBuku)[0];

    // jalankan fungsi edit
    if ( isset($_POST["submit"]) ) {
        edit($_POST, $conn, 'pengarang');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengarang</title>
</head>
<body>
    <form action="" method="post">
        <label for="id_pengarang">Id : </label>
        <input type="text" name="id_pengarang" id="id_pengarang" value="<?= $pengarangBuku['id_pengarang']; ?>" disabled>
        
        <br />

        <label for="nama_pengarang">Nama : </label>
        <input type="text" name="nama_pengarang" id="nama_pengarang" value="<?= $pengarangBuku['nama_pengarang']; ?>" required>
        
        <br />

        <label for="email">Email : </label>
        <input type="text" name="email" id="email" value="<?= $pengarangBuku['email']; ?>" required>
        
        <br />

        <label for="telp">No. Telp : </label>
        <input type="text" name="telp" id="telp" value="<?= $pengarangBuku['telp']; ?>" required>
        
        <br />

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" value="<?= $pengarangBuku['alamat']; ?>" required>
        
        <br />


        <button type="submit" name="submit">Edit Data</button>
    </form>
</body>
</html>