<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

   // ambil id katalog
   $dataId = query("SELECT id_penerbit FROM penerbit");

    // mulai input data
    if ( isset($_POST["submit"]) ) {
        $forCheckId = true;
        foreach( $dataId as $id ) {
            if ( strtolower($id["id_penerbit"]) == strtolower($_POST["id_penerbit"]) ) {
                $forCheckId = false;
                if ($forCheckId==false) {
                    break;
                }
            } else {
                $forCheckId = true;
            }
        };
        if ( strlen($_POST["id_penerbit"])>8 ) {
            echo "<script>
                    alert('Data Id penerbit tidak boleh lebih dari 8 karakter');
                </script>";
        } else {
            if ($forCheckId) {
                tambah( $_POST, $conn, 'penerbit' );
            } else {
                echo "<script>
                        alert('Data Id Tidak boleh sama dengan yang sudah ada');
                    </script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Katalog</title>
</head>
<body>
    <form action="" method="post">

        <br />

        <label for="id_penerbit">Id : </label>
        <input type="text" name="id_penerbit" id="id_penerbit" placeholder="No. Id penerbit" required>
        
        <br />

        <label for="nama_penerbit">Nama : </label>
        <input type="text" name="nama_penerbit" id="nama_penerbit" placeholder="nama penerbit" required>
        
        <br />
        
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" placeholder="email@sample.dom" required>
        
        <br />
        
        <label for="telp">Telp : </label>
        <input type="number" name="telp" id="telp" placeholder="No. telp" required>
        
        <br />

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" id="alamat" placeholder="alamat" required>
        
        <br />

        <button type="submit" name="submit">Tambah Data</button>
    </form>
    <?php if ( isset($_POST["submit"]) ) : ?>
        <?php if ($forCheckId==false) : ?>
        <p>
            Daftar Id Katalog yang sudah ada :
            <ul>
              <?php foreach ( $dataId as $data ) : ?>
                    <li><?= $data['id_penerbit']; ?>
              <?php endforeach; ?>
            </ul>
        </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>