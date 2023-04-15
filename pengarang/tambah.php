<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

   // ambil id katalog
   $dataId = query("SELECT id_pengarang FROM pengarang");

    // mulai input data
    if ( isset($_POST["submit"]) ) {
        $forCheckId = true;
        foreach( $dataId as $id ) {
            if ( strtolower($id["id_pengarang"]) == strtolower($_POST["id_pengarang"]) ) {
                $forCheckId = false;
                if ($forCheckId==false) {
                    break;
                }
            } else {
                $forCheckId = true;
            }
        };
        if ( strlen($_POST["id_pengarang"])>8 ) {
            echo "<script>
                    alert('Data Id pengarang tidak boleh lebih dari 8 karakter');
                </script>";
        } else {
            if ($forCheckId) {
                tambah( $_POST, $conn, 'pengarang' );
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
    <title>Tambah Data Pengarang</title>
</head>
<body>
    <form action="" method="post">

        <br />

        <label for="id_pengarang">Id : </label>
        <input type="text" name="id_pengarang" id="id_pengarang" placeholder="No. Id Pengarang" required>
        
        <br />

        <label for="nama_pengarang">Nama : </label>
        <input type="text" name="nama_pengarang" id="nama_pengarang" placeholder="nama pengarang" required>
        
        <br />
        
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" placeholder="email@sample.dom" required>
        
        <br />
        
        <label for="telp">Telp : </label>
        <input type="text" name="telp" id="telp" placeholder="No. telp" required>
        
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
                    <li><?= $data['id_pengarang']; ?>
              <?php endforeach; ?>
            </ul>
        </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>