<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // mulai input data
    if ( isset($_POST["submit"]) ) {
        tambah( $_POST, $conn, 'anggota' );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id_anggota" value="">
        
        <br />

        <label for="name">Name : </label>
        <input type="text" name="nama" id="name" placeholder="Masukkan Nama Kamu" required>
        
        <br />

        <label for="username">Username : </label>
        <input type="text" name="username" id="username" placeholder="Nama pengguna" required>
        
        <br />

        <label for="password">Password : </label>
        <input type="text" name="password" id="password" placeholder="Pastikan Aman" required>

        <br />

        <label for="gender">Gender : </label>
        <input type="radio" name="sex" value="L" id="gender"> Pria
        <input type="radio" name="sex" value="P"> Wanita

        <br />

        <label for="telp">Telp : </label>
        <input type="text" name="telp" id="telp" placeholder="no. telp atau wa" required>
        
        <br />

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" placeholder="Tempat tinggal" required>

        <br />

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" placeholder="email" required>

        <br />

        <input type="hidden" name="tgl_entry" value="<?= date('Y-m-d H:i:s'); ?>">

        <input type="hidden" name="role" value="USER">

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>