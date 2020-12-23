<?php 
include_once 'includes/koneksi.php';
if(isset($_POST['submit'])) {

    $nama_produk = mysqli_escape_string($koneksi, $_POST['nama_produk']);
    $keterangan = mysqli_escape_string($koneksi, $_POST['keterangan']);
    $harga = mysqli_escape_string($koneksi, $_POST['harga']);
    $jumlah = mysqli_escape_string($koneksi, $_POST['jumlah']);

    $sql = "INSERT INTO produk(nama_produk, keterangan, harga, jumlah) VALUES ('$nama_produk', '$keterangan', '$harga', '$jumlah')";

    if(mysqli_query($koneksi, $sql)) {
        echo "<script>location.href='index.php'</script>";
        exit();
    } else {
        echo "<script>alert('Tambah data tidak berhasil!');";
        echo "location.href='index.php'</script>";
        exit();
    }

}

?>