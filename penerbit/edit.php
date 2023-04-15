<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = strtolower($_GET["id_penerbit"]);

     // buat sintaks query
    $penerbitBuku = "SELECT * FROM penerbit WHERE id_penerbit ". "= "."'".$id."'";

    // fetch datanya dengan fungsi query (dari file databases)
      $penerbitBuku = query($penerbitBuku)[0];

    // jalankan fungsi edit
    if ( isset($_POST["submit"]) ) {
        edit($_POST, $conn, 'penerbit');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>
</head>
<body>
    <form action="" method="post">
        <label for="id_penerbit">Id : </label>
        <input type="text" name="id_penerbit" id="id_penerbit" value="<?= $penerbitBuku['id_penerbit']; ?>" disabled>
        
        <br />

        <label for="nama_penerbit">Nama : </label>
        <input type="text" name="nama_penerbit" id="nama_penerbit" value="<?= $penerbitBuku['nama_penerbit']; ?>" required>
        
        <br />

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="<?= $penerbitBuku['email']; ?>" required>
        
        <br />

        <label for="telp">No. Telp : </label>
        <input type="number" name="telp" id="telp" value="<?= $penerbitBuku['telp']; ?>">
        
        <br />

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" value="<?= $penerbitBuku['alamat']; ?>" required>
        
        <br />


        <button type="submit" name="submit">Edit Data</button>
    </form>
</body>
</html>