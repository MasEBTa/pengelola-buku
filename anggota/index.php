<?php
  // ambil file database dan function
    require '../databases.php';
    require '../function.php';

  // buat sintaks query
    $data_anggota = "SELECT * FROM anggota";

  // fetch datanya dengan fungsi query (dari file databases)
    $data_anggota = query($data_anggota);
    
  // menjaankan pencarian
  if (isset($_POST['cari'])) {
    // query untuk syarat search
    $keyword = $_POST['keyword'];
		$query = "SELECT * FROM anggota WHERE
    nama LIKE '%$keyword%' OR
    username LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    email LIKE '%$keyword%'";
    // jalankan fungsinya
    $data_anggota = cari($query);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data anggota</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <nav>
    <?php require '../navigasi.php'; ?>
  </nav>
  <main>
  
    <br />
    <a href="tambah.php">
      <button>Tambah Data</button>
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
            <!-- <td>id</td> -->
            <td>Nama</td>
            <td>Username</td>
            <td>Password</td>
            <td>Gender</td>
            <td>Telp</td>
            <td>Alamat</td>
            <td>Email</td>
            <td>tanggal Pendaftaran</td>
            <td>Akun</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $data_anggota as $datum ) : ?>
            <?php $i++; ?>
            <tr>
              <td><?= $i; ?>.</td>
              <!-- <td><?= $datum['id_anggota']; ?></td> -->
              <td><?= $datum['nama']; ?></td>
              <td><?= $datum['username']; ?></td>
              <td><?= $datum['password']; ?></td>
              <td><?= $datum['sex']; ?></td>
              <td><?= $datum['telp']; ?></td>
              <td><?= $datum['alamat']; ?></td>
              <td><?= $datum['email']; ?></td>
              <td><?= $datum['tgl_entry']; ?></td>
              <td><?= $datum['role']; ?></td>
              <td><a href="edit.php?id_anggota=<?= $datum["id_anggota"]; ?>">Edit</a> | 
                  <a href="hapus.php?id_anggota=<?= $datum["id_anggota"]; ?>" onclick="return confirm('yakin mau menghapus data ini?')">Hapus</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
  </main>
</body>
</html>