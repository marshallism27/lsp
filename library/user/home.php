<?php
session_start();
include('../class/User.php');
include_once('../class/Pemberitahuan.php');

$user = new User();
$data_user = $user->find($_SESSION['id']);

$pemberitahuan = new Pemberitahuan();
$data_pemberitahuan = $pemberitahuan->all();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/me.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
   </head>
<body>
<?php include('menubar.php') ?>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
    <span class="text"> Selamat Datang <?= $data_user["fullname"] ?> di Perpustakaan</span>
  </div>

  <div class="container text-right">
  <div class="row">
    <div class="col-4">
    <div class="card" style = "">
  <h5 class="card-header">Pemberitahuan</h5>
  <?php foreach ($data_pemberitahuan as $p) {
    ?>
  <div class="card-body">
    <p class="card-text"><?= $p["isi"]?></p>
  </div>
  <?php
  }
        ?>
</div>
    </div>
    <div class="col-8">
    <div class="row">
  <div class=" col sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Sejarah</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" ></a>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
</section>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="../css/script.js"></script>
</body>
</html>
