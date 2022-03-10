<?php

session_start();
if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}


require "functions.php";
$produk = query("SELECT * FROM produk ORDER BY id DESC");
$nomor = query("SELECT * FROM nomor_hp ORDER BY id DESC");

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">


    <title>Halaman Admin</title>
  </head>
<body>

<!-- Buttom -->

<div class="container">
    <h1 class="text-center">HALAMAN ADMIN</h1>
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data
        </button>
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#noModal">
                No Hp
        </button>
        <span class="badge bg-danger">
          <a href="logout.php" class="text-light"> Logout </a>
        </span>
    <br>


    
<!-- Tabel -->
    <table class= "table table table-striped">

    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Action</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Deskripsi produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
        </tr>
    </thead>
  <tbody>
  <?php $i = 1; ?>
    <?php foreach ($produk as $row) {?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
            <a data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#formModal<?php echo $row["id"]; ?>" class="tampilModalUbah">
            Ubah</a> |
            <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="
            return confirm('yakin?');">Hapus</a>
        </td>
        <td><?php echo $row["nama_produk"]; ?></td>
        <td><?php echo $row["deskripsi_produk"]; ?></td>
        <td><?php echo $row["harga"]; ?></td>
        <td><img src="img/<?php echo $row["gambar"]; ?>" width="80px" height="80px" alt=""></td>
    </tr>
    <?php $i++; ?>
    <?php } ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="tambah.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama_produk">Nama</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk">
            </div>
            <div class="form-group">
                <label for="deskripsi_produk">Deskripsi Produk</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah data</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- modal edit -->
<?php
$no = 0;
foreach ($produk as $row)  : $no++; ?>
<div class="modal fade" id="formModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ubah.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?php echo $row['gambar']; ?>">
            <div class="form-group">
                <label for="nama_produk">Nama</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required value="<?php echo $row['nama_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi_produk">Deskripsi Produk</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" required value="<?php echo $row['deskripsi_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required value="<?php echo $row['harga']; ?>">
            </div>
            <div class="form-group">
              <label for="gambar"> Gambar : </label>
              <br>
              <img src="img/<?php echo $row["gambar"]; ?>" width="80px" height="80px" alt="">
              <br>
              <input type="file" name="gambar" id="gambar">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php foreach ($nomor as $no) : ?>
  <div class="modal fade" id="noModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Nomor Hp Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ubahNo.php" method="post">
            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $no["id"]; ?>">
                <label for="nomor">+62</label>
                <input type="text" class="form-control" id="nomor" name="nomor" required value="<?php echo $no['nomor']; ?>">
              </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


    
</body>
<script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="script.js"></script> -->
</html>