<?php
session_start();
include_once('../class/User.php');
include_once('../class/pengembalian.php');

$user = new User();
$data_user = $user->find($_SESSION["id"]);

$pengembalian = new Peminjaman();
$data_pengembalian = $pengembalian->find($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/me.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include('menubar.php') ?>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
    <span class="text"> Selamat Datang <?= $data_user["fullname"] ?> di Perpustakaan</span>
  </div>
  <div class="pengembalian">
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="text-right">Daftar pengembalian</h4>
    </div>
    <div class="mb-3 text-right">
    <a href="form_pengembalian.php"><button class="btn btn-primary">Pinjam Buku</button></a>
    </div>
    <table id = "pengembalian" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal Pengembalian</th>
            <th>Kondisi Buku Saat Dikembalikan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <?php foreach($data_pengembalian as $key => $p){
            // var_dump($data_pengembalian);
            ?>
            <tbody>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $p["buku"]?></td>
                <td><?= $p["t_kembali"]?></td>
                <td><?= $p["k_buku_k"]?></td>
                <td>
                <a href="form_pengembalian.php?edit?= id_peminjaman=<?= $p["id_peminjaman"]?>"><button class="btn btn-success">Pengembalian Buku</button></a>
                </td>
            </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <script>
  $(document).ready(function(){
    $('#pengembalian').DataTable();
});
  </script>
</div>
</div>
<div>
</section>
</body>
<script src="../css/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>