<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = $_GET["id_anggota"];

    // buat sintaks query
    $data_anggotaN = "SELECT * FROM anggota WHERE id_anggota = ".$id;

    // fetch datanya dengan fungsi query (dari file databases)
    $data_anggotaN = query($data_anggotaN)[0];

    // mulai editing
    if ( isset($_POST["submit"]) ) {
        edit( $_POST, $conn, 'anggota' );
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
        <label for="name">Name : </label>
        <input type="text" name="nama" id="name" value="<?= $data_anggotaN['nama']; ?>" required>
        
        <br />

        <label for="username">Username : </label>
        <input type="text" name="username" id="username" value="<?= $data_anggotaN['username']; ?>" required>
        
        <br />

        <label for="password">Password : </label>
        <input type="text" name="password" id="password" value="<?= $data_anggotaN['password']; ?>" required>

        <br />

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="<?= $data_anggotaN['email']; ?>" required>
        
        <br />
<?php if ( $data_anggotaN['sex'] == 'P' ) : ?>
        <label for="gender">Gender : </label>
        <input type="radio" name="sex" value="L" id="gender"> Pria
        <input type="radio" name="sex" value="P" checked> Wanita
    <?php else : ?>
        <label for="gender">Gender : </label>
        <input type="radio" name="sex" value="L" checked> Pria
        <input type="radio" name="sex" value="P" id="gender"> Wanita
<?php endif; ?>
        <br />

        <label for="telp">Telp : </label>
        <input type="text" name="telp" id="telp" value="<?= $data_anggotaN['telp']; ?>" required>
        
        <br />

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" value="<?= $data_anggotaN['alamat']; ?>" required>

        <br />

        <button type="submit" name="submit">Edit Data</button>
    </form>
</body>
</html>