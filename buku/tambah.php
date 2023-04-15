<?php
    // ambil file database dan function
    require '../databases.php';
    require '../function.php';

    // buat sintaks query
        // query dari tabel buku
        $data_buku = "SELECT isbn FROM buku";
        // query data penerbit
        $penerbit = "SELECT id_penerbit, nama_penerbit FROM penerbit";
        // query data pengarang
        $pengarang = "SELECT id_pengarang, nama_pengarang FROM pengarang";
        // query data katalog
        $katalog = "SELECT * FROM katalog";
        

    // fetch datanya dengan fungsi query (dari file databases)
        // fetch data dari tabel buku
        $data_buku = query($data_buku);
        // fetch data penerbit
        $penerbit = query($penerbit);
        // fetch data pengarang
        $pengarang = query($pengarang);
        // fetch data katalig
        $katalog = query($katalog);

    // mulai input data
    if ( isset($_POST["submit"]) ) {
        $forCheckId = true;
        foreach( $data_buku as $id ) {
            if ( strtolower($id["isbn"]) == strtolower($_POST["isbn"]) ) {
                $forCheckId = false;
                if ($forCheckId==false) {
                    break;
                }
            } else {
                $forCheckId = true;
            }
        };
        if ($forCheckId) {
            tambah( $_POST, $conn, 'buku' );
        } else {
            echo "<script>
                    alert('Data Isbn Tidak boleh sama dengan yang sudah ada');
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body>
    <form action="" method="post">

        <br />

        <label for="isbn">Isbn : </label>
        <input type="text" name="isbn" id="isbn" placeholder="Masukkan Nomor ISBN" required>
        
        <br />

        <label for="judul">Judul : </label>
        <input type="text" name="judul" id="judul" placeholder="Judul Buku" required>
        
        <br />

        <label for="tahun">Tahun : </label>
        <input type="text" name="tahun" id="tahun" placeholder="Tahun Terbit" required>

        <br />

        <label for="id_penerbit">Penerbit : </label>
        <select name="id_penerbit" id="id_penerbit" required>
            <option value="">Pilih penerbit</option>
          <?php foreach ($penerbit as $key => $value) : ?>
            <option value="<?= $value['id_penerbit']; ?>"><?= $value['nama_penerbit']; ?></option>
          <?php endforeach; ?>
        </select>
        <a href="../penerbit/tambah.php"><button type="button">Tambah Baru</button></a>

        <br />

        <label for="id_pengarang">Pengarang : </label>
        <select name="id_pengarang" id="id_pengarang" required>
            <option value="">Pilih pengarang</option>
          <?php foreach ($pengarang as $key => $value) : ?>
                <option value="<?= $value['id_pengarang']; ?>"><?= $value['nama_pengarang']; ?></option>
          <?php endforeach; ?>
        </select>
        <a href="../pengarang/tambah.php"><button type="button">Tambah Baru</button></a>

        <br />

        <label for="id_katalog">Katalog : </label>
        <select name="id_katalog" id="id_katalog" required>
            <option value="">Pilih katalog</option>
          <?php foreach ($katalog as $key => $val) : ?>
                <option value="<?= $val['id_katalog']; ?>"><?= $val['nama']; ?></option>
           <?php endforeach; ?>
        </select>
        <a href="../katalog/tambah.php"><button type="button">Tambah Baru</button></a>

        <br />

        <label for="qty_stok">Stok : </label>
        <input type="text" name="qty_stok" id="qty_stok" placeholder="jumlah Stok" required>
        
        <br />

        <label for="harga_pinjam">Harga Sewa : </label>
        <input type="text" name="harga_pinjam" id="harga_pinjam" placeholder="Dalam Rupiah" required>

        <br />

        <button type="submit" name="submit">Tambah Data</button>
    </form>
    <?php if ( isset($_POST["submit"]) ) : ?>
        <?php if ($forCheckId==false) : ?>
        <p>
            Daftar Isbn yang sudah ada :
            <ul>
              <?php foreach ( $data_buku as $data ) : ?>
                    <li><?= $data['isbn']; ?>
              <?php endforeach; ?>
            </ul>
        </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>