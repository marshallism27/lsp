<?php
session_start();
include_once("../class/User.php");
$user = new User();
$data_user = $user->find($_SESSION["id"]);

if(isset($_POST["submit"])){
    $data = [
        "nis" => $_POST["nis"],
        "username" => $_POST["username"],
        "fullname" => $_POST["fullname"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "verif" => $_POST["verif"],
        "join_date" => $_POST["join_date"],
        "foto" => $_FILES["foto"]
    ];

    $user->update($_POST["id"], $data);
}

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
   <title>Profil</title>
<body>
<?php include('menubar.php') ?>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
    <span class="text"> Selamat Datang <?= $data_user["fullname"] ?> di Perpustakaan</span>
  </div>
    <form action="" method ="POST" enctype = "multipart/form-data">
  <div class="container-md rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" height = "150px" src = "<?= $data_user["foto"] ?>">
            <span class="font-weight-bold"><?= $data_user["fullname"] ?></span>
            <span class="text-black-50"></span>
            <span> </span>
        </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Kode User</label>
                        <input type="text" class="form-control" disabled value="<?= $data_user["kode"]?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">NIS</label>
                        <input name="nis" type="text" class="form-control" value="<?= $data_user["nis"] ?>">
                        <input type="hidden" name="id" value="<?= $data_user["id"] ?>">
                    </div>
                    </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Foto</label>
                        <input type="file" name ="foto" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Username</label>
                        <input name = "username" type="text" class="form-control" value="<?= $data_user["username"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Fullname</label>
                        <input name="fullname" type="text" class="form-control" value="<?= $data_user["fullname"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Kelas</label>
                        <select class = "form-select" name="kelas" id="">
                            <option disabled >Pilih Opsi</option>
                            <option value="">10 DKV 1</option>
                            <option value="">10 DKV 2</option>
                            <option value="">10 RPL 1</option>
                            <option value="">10 RPL 2</option>
                            <option value="">11 RPL 1</option>
                            <option value="">11 RPL 2</option>
                            <option value="">11 MM </option>
                            <option value="">12 RPL 1</option>
                            <option value="">12 MM </option>
                            
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" name = "password" class="form-control" placeholder= "Password Belum Diubah" value="<?= $data_user["password"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Alamat</label>
                        <input type="text" name = "alamat" class="form-control" value="<?= $data_user["alamat"] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Verifikasi</label>
                        <input type="text" name = "verif" class="form-control" disabled value="<?= $data_user["verif"] ?>">
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name ="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>

</section>

</body>
<script src="../css/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>