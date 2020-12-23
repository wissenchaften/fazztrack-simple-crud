<?php 
include_once 'includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>CRUD Fazztrack</title>
</head>
<body class="container-md shadow p-5">
    <h1>CRUD Fazztrack</h1>
    <h2>Tambah data produk</h2>
    <form action="tambah.php" method="POST" class="mt-4">
        <input type="text" name="nama_produk" placeholder="Nama produk" class="form-control"/><br/>
        <input type="text" name="keterangan" placeholder="Keterangan produk" class="form-control"/><br/>
        <input type="number" name="harga" placeholder="Harga produk" class="form-control"/><br/>
        <input type="number" name="jumlah" placeholder="Jumlah produk" class="form-control"/><br/>

        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
    </form>

    <table class="table table-sm table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Hapus/Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM produk";
                $result = mysqli_query($koneksi, $query);
                $i = 1;
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td scope="row"><?=$i++;?></td>
                <td><?=$row['nama_produk'];?></td>
                <td><?=$row['keterangan'];?></td>
                <td>Rp. <?=$row['harga'];?></td>
                <td><?=$row['jumlah'];?></td>
                <td>
                    <a href="ubah_produk.php?nama_produk=<?=$row['nama_produk']?>">Edit</a> | 
                    <a onclick="return confirm('Yakin ingin menghapus data?');" href="hapus_produk.php?nama_produk=<?=$row['nama_produk']?>">Hapus</a>
                </td>
            </tr>
            <?php } 
            }
            ?>
        </tbody>
    </table>
    <script src="assets/js/jquery-3.5.1.min"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>