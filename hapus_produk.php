<?php 
include_once 'includes/koneksi.php';

    if(!isset($_GET['nama_produk'])) {

        header('Location: index.php');
        exit();

    } else {
        $get_nama_produk = $_GET['nama_produk'];
        $sql = "DELETE FROM produk WHERE nama_produk = '$get_nama_produk'";

        if(mysqli_query($koneksi, $sql)) {
            echo "<script>location.href='index.php'</script>";
            exit();

        } else {
            echo "<script>alert('Hapus produk tidak berhasil!');";
            echo "location.href='index.php'</script>";
            exit();

        }
    }
    ?>