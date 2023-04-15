<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

   // ambil id katalog
   $dataId = query("SELECT id_katalog FROM katalog");

    // mulai input data
    if ( isset($_POST["submit"]) ) {
        $forCheckId = true;
        foreach( $dataId as $id ) {
            if ( strtolower($id["id_katalog"]) == strtolower($_POST["id_katalog"] )) {
                $forCheckId = false;
                if ($forCheckId==false) {
                    break;
                }
            } else {
                $forCheckId = true;
            }
        };
        if ( strlen($_POST["id_katalog"])>3 ) {
            echo "<script>
                    alert('Data Id Katalog tidak boleh lebih dari 3 karakter');
                </script>";
        } else {
            if ($forCheckId) {
                tambah( $_POST, $conn, 'katalog' );
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

        <label for="id_katalog">id_katalog : </label>
        <input type="text" name="id_katalog" id="id_katalog" placeholder="No. Id Katalog" required>
        
        <br />

        <label for="nama">Nama Katalog : </label>
        <input type="text" name="nama" id="nama" placeholder="nama katalog" required>
        
        <br />

        <button type="submit" name="submit">Tambah Data</button>
    </form>
    <?php if ( isset($_POST["submit"]) ) : ?>
        <?php if ($forCheckId==false) : ?>
        <p>
            Daftar Id Katalog yang sudah ada :
            <ul>
              <?php foreach ( $dataId as $data ) : ?>
                    <li><?= $data['id_katalog']; ?>
              <?php endforeach; ?>
            </ul>
        </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>