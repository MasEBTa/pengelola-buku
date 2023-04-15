<?php
  // ambil file database dan function
    require '../databases.php';
    require '../function.php';

  // buat sintaks query
    $data_katalogue = "SELECT * FROM katalog";

  // fetch datanya dengan fungsi query (dari file databases)
    $data_katalogue = query($data_katalogue);

  // menjaankan pencarian
  if (isset($_POST['cari'])) {
    // query untuk syarat search
    $keyword = $_POST['keyword'];
		$query = "SELECT * FROM katalog WHERE
    id_katalog LIKE '%$keyword%' OR
    nama LIKE '%$keyword%'";
    // jalankan fungsinya
    $data_katalogue = cari($query);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Katalog</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
 <nav>
    <?php require '../navigasi.php'; ?>
  </nav>
  <br />
  
  <main>

    <a href="tambah.php">
      <button type="button">Tambah Data</button>
    </a>

    <br><br>
    <form action="" method="post">
      <input class="cari" type="text" name="keyword" size="50" autofocus placeholder="Masukkan Keyword" autocomplete="off">
      <button type="submit" name="cari">Cari Data</button>
      <?php if (isset($_POST['cari'])) : ?>
        <a href="index.php">
          <button type="button">Tampilkan Semua Data</button>
        </a>
      <?php endif ?>
    </form>
    <br />

    <?php $i = 0; ?>
    <table>
        <thead>
          <tr>
            <td>No</td>
            <td>Id Katalog</td>
            <td>Nama Katalog</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $data_katalogue as $datum ) : ?>
            <?php $i++; ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $datum['id_katalog']; ?></td>
              <td><?= $datum['nama']; ?></td>
              <td><a href="edit.php?id_katalog=<?= $datum["id_katalog"]; ?>">Edit</a> | 
                  <a href="hapus.php?id_katalog=<?= $datum["id_katalog"]; ?>" onclick="return confirm('yakin mau menghapus data ini?')">Hapus</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
  </main>
</body>
</html>