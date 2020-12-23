<?php 
include_once 'includes/koneksi.php';
if(isset($_GET['nama_produk'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Edit Produk</title>
</head>
<body class="container-md shadow p-5">
    <h2>Edit produk</h2>
    <a href="index.php">Batal</a>

    <?php 
        $get_nama_produk = $_GET['nama_produk'];
        $sql = "SELECT * FROM produk WHERE nama_produk = '$get_nama_produk'";
        $result = mysqli_query($koneksi, $sql);
        while($row = mysqli_fetch_assoc($result)) {
    ?>
    <form method="POST" class="mt-2">
        <input type="text" name="nama_produk" value="<?=$row['nama_produk'];?>" placeholder="Nama produk" class="form-control"/><br/>
        <input type="text" name="keterangan" value="<?=$row['keterangan'];?>" placeholder="Keterangan produk" class="form-control"/><br/>
        <input type="number" name="harga" value="<?=$row['harga'];?>" placeholder="Harga produk" class="form-control"/><br/>
        <input type="number" name="jumlah" value="<?=$row['jumlah'];?>" placeholder="Jumlah produk" class="form-control"/><br/>

        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
    </form>
        <?php } ?>

        <?php 
            if(isset($_POST['submit'])) {
                $nama_produk = mysqli_escape_string($koneksi, $_POST['nama_produk']);
                $keterangan = mysqli_escape_string($koneksi, $_POST['keterangan']);
                $harga = mysqli_escape_string($koneksi, $_POST['harga']);
                $jumlah = mysqli_escape_string($koneksi, $_POST['jumlah']);

                $sql = "UPDATE produk SET nama_produk = '$nama_produk', keterangan = '$keterangan', harga = '$harga', jumlah = '$jumlah' WHERE nama_produk = '$get_nama_produk'";

                if(mysqli_query($koneksi, $sql)) {
                    echo "<script>location.href='index.php'</script>";
                    exit();
                } else {
                    echo "<script>alert('Edit produk tidak berhasil!');";
                    echo "location.href='index.php'</script>";
                    exit();
                }

            }
        ?>

<?php } ?>
    <script src="assets/js/jquery-3.5.1.min"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>