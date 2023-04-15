<?php
  // ambil file database dan function
    require '../databases.php';
    require '../function.php';

  // buat sintaks query
    $data_buku = "SELECT * FROM buku";

  // fetch datanya dengan fungsi query (dari file databases)
    $data_buku = query($data_buku);

  // menjaankan pencarian
  if (isset($_POST['cari'])) {
    // query untuk syarat search
    $keyword = $_POST['keyword'];
		$query = "SELECT * FROM buku WHERE
    isbn LIKE '%$keyword%' OR
    judul LIKE '%$keyword%' OR
    tahun LIKE '%$keyword%' OR
    id_penerbit LIKE '%$keyword%' OR
    id_pengarang LIKE '%$keyword%' OR
    id_katalog LIKE '%$keyword%' OR
    tahun LIKE '%$keyword%'";
    // jalankan fungsinya
    $data_buku = cari($query);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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
            <td>Isbn</td>
            <td>Judul</td>
            <td>Tahun</td>
            <td>Id Penerbit</td>
            <td>Id Pengarang</td>
            <td>Id Katalog</td>
            <td>Stok</td>
            <td>Biaya Sewa</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $data_buku as $datum ) : ?>
            <?php $i++; ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $datum['isbn']; ?></td>
              <td><?= $datum['judul']; ?></td>
              <td><?= $datum['tahun']; ?></td>
              <td><?= $datum['id_penerbit']; ?></td>
              <td><?= $datum['id_pengarang']; ?></td>
              <td><?= $datum['id_katalog']; ?></td>
              <td><?= $datum['qty_stok']; ?> Buah</td>
              <td>Rp.<?= $datum['harga_pinjam']; ?>,-</td>
              <td><a href="edit.php?isbn=<?= $datum["isbn"]; ?>">Edit</a> | 
                  <a href="hapus.php?isbn=<?= $datum["isbn"]; ?>" onclick="return confirm('yakin mau menghapus data ini?')">Hapus</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
  </main>
</body>
</html>