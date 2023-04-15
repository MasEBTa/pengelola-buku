<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // ambil data primaty key di url
    $id = strtolower($_GET["id_katalog"]);

     // buat sintaks query
    $data_katalogue = "SELECT * FROM katalog WHERE id_katalog ". "= "."'".$id."'";

    // fetch datanya dengan fungsi query (dari file databases)
      $data_katalogue = query($data_katalogue)[0]; 

    // ambil id katalog
      $dataId = query("SELECT id_katalog FROM katalog WHERE NOT id_katalog = "."'".$id."'");
    //   $dataIdAll = query("SELECT id_katalog FROM katalog");

    // jalankan fungsi edit
    if ( isset($_POST["submit"]) ) {
        // $forCheckId = true;
        // foreach( $dataId as $id ) {
        //     if ( strtolower($id["id_katalog"]) == strtolower($_POST["id_katalog"] )) {
        //         $forCheckId = false;
        //         if ($forCheckId==false) {
        //             break;
        //         }
        //     } else {
        //         $forCheckId = true;
        //     }
        // };
        // if ( strlen($_POST["id_katalog"])>3 ) {
        //     echo "<script>
        //             alert('Data Id Katalog tidak boleh lebih dari 3 karakter');
        //         </script>";
        // } else {
        //     if ($forCheckId) {
        //         edit( $_POST, $conn, 'katalog' );
        //     } else {
        //         echo "<script>
        //                 alert('Data Id Tidak boleh sama dengan yang sudah ada');
        //             </script>";
        //     }
        // }
        edit( $_POST, $conn, 'katalog' );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Katalog</title>
</head>
<body>
    <form action="" method="post">
        <label for="id_katalog">Id Katalog : </label>
        <input type="text" name="id_katalog" id="id_katalog" value="<?= $data_katalogue['id_katalog']; ?>" disabled>
        
        <br />

        <label for="username">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?= $data_katalogue['nama']; ?>" required>
        
        <br />

        <button type="submit" name="submit">Edit Data</button>
    </form>
    <!-- <?php if ( isset($_POST["submit"]) ) : ?>
        <?php if ($forCheckId==false) : ?>
        <p>
            Daftar Id Katalog yang sudah ada :
            <ul>
              <?php foreach ( $dataIdAll as $data ) : ?>
                <?php if ( strtolower($data["id_katalog"]) == strtolower($_GET["id_katalog"]) ) : ?>
                    <li><?= $_GET['id_katalog']; ?> <span style="color: red;">(ini adalah id kamu saat ini)</span></li>
                  <?php else : ?>
                    <li><?= $data['id_katalog']; ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
        </p>
        <?php endif; ?>
    <?php endif; ?> -->
</body>
</html>