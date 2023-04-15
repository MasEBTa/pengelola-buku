<?php
/* =============================================================
||||||||||||||||||||||||sistem edit|||||||||||||||||||||||||||||
================================================================*/
	function edit( $data, $koneksi, $tabel ){
        mysqli_query($koneksi, 'SET foreign_key_checks = 0');
		// ambil data dari tiap elemen dalam form
        $keyValue = [];
        $forquery = '';
            // buat datanya siap untuk di query dan masukkan ke variable keyvalue
            foreach ($data as $key => $value) {
                $value = htmlspecialchars($value);
                array_push($keyValue, $key.' = '."'".$value."'");
            }
            
        // Pembuatan sintaks query
        $j = count($keyValue);
            // finishing untuk query {menambah koma}
            for ($i = 0, $k = 1; $i < $j-1; $i++, $k++) {
                $forquery = $forquery.$keyValue[$i];
                if ($k<$j-1) {
                    $forquery = $forquery.', ';
                }
            }

            // query insert data {menambah statement where}
            foreach ($_GET as $key => $value) {
                $queryEdit = "UPDATE ".$tabel." VALUE SET ".$forquery." WHERE ". $key." = '".strtolower($value)."'";
            }

        // melakukan query
        mysqli_query($koneksi, $queryEdit);
        
		// mengembalikan nilai jika ada manipulasi data di database 
		if ( mysqli_affected_rows($koneksi) == 1 ) {
            // membuat redirec setelah mengedit
           echo "<script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php'; /*redirect versi js*/
                </script>";
        } elseif ( mysqli_affected_rows($koneksi) == 0 ) {
            // membuat redirec setelah mengedit
           echo "<script>
                    alert('Tidak ada data yang berubah');
                </script>";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan');
                </script>";
        };
        mysqli_query($koneksi, 'SET foreign_key_checks = 1');
	}
?>

<?php
/* ================================================================
||||||||||||||||||||||||||sistem Tambah||||||||||||||||||||||||||||
===================================================================*/
    function tambah( $data, $koneksi, $tabel ) {
        $keyValue = [];
        $thekey = [];
        foreach ($data as $key => $value) {
            $value = htmlspecialchars($value);
            array_push($keyValue, $value);
            array_push($thekey, $key);
        }

        // // Pembuatan sintaks query
        $j = count($data);
        $forkey = '';
        $forquery = '';
            // finishing untuk query {menambah koma}
            for ($i = 0, $k = 1; $i < $j-1; $i++, $k++) {
                $forquery = $forquery."'".$keyValue[$i]."'";
                $forkey = $forkey.$thekey[$i];
                if ($k<$j-1) {
                    $forquery = $forquery.', ';
                    $forkey = $forkey.', ';
                }
            }

            // query insert data
            $queryInsert = "INSERT INTO $tabel ($forkey)
            VALUES ($forquery)";

        // melakukan query
        mysqli_query($koneksi, $queryInsert);

        // mengembalikan nilai jika ada manipulasi data di database 
		if ( mysqli_affected_rows($koneksi) == 1 ) {
            // membuat redirec setelah menginput
           echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php'; /*redirect versi js*/
                </script>";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan');
                </script>";
        };
    }
?>

<?php
/* ================================================================
|||||||||||||||||||||||||||sistem Hapus||||||||||||||||||||||||||||
===================================================================*/
    function hapus( $data, $koneksi, $tabel ) {
        mysqli_query($koneksi, 'SET foreign_key_checks = 0');
        foreach ($_GET as $key => $value) {
            mysqli_query($koneksi, "DELETE FROM ".$tabel." WHERE ". $key . " = '". $value."'" );
        }
        
        // mengembalikan nilai jika ada manipulasi data di database 
		if ( mysqli_affected_rows($koneksi) == 1 ) {
            // membuat redirec setelah menginput
            echo "<script>
                    alert('data berhasil dihapus');
                    document.location.href = 'index.php'; /*redirect versi js*/
                </script>";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan';
                </script>";
        };
        mysqli_query($koneksi, 'SET foreign_key_checks = 1');
    }
?>

<?php
/* ================================================================
|||||||||||||||||||||||||||sistem Hapus||||||||||||||||||||||||||||
===================================================================*/
	function cari($query) {
		return query($query);
	}
?>