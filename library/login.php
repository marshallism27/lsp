<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="center">
<div class="card">
  <div class="card-header">
    <h3>Login</h3>
  </div>
  <div class="card-body">
  <div class="login">
    <form action="" method="post">
        <ul>
            <li>                               
            <input placeholder="Username" type="text" name="username" id="username">
            </li>
            <li>                                
            <input placeholder="Password" type="password" name="password" id="password">
            </li>
            <li>
            <button type="submit" name="submit" class="btn btn-success my-2">Submit</button>
            </li>
        </ul>                    
    </form>
    <p class="card-text"><small class="text-muted">Belum punya akun? <a href="register.php">Registrasi disini.</a></small></p>
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>

<?php
include_once('class/User.php');
include_once('class/Relog.php');
session_start();

$user =  new User();
 if (isset($_SESSION['id'])) {
    $cek_user = $user->find($_SESSION['id']);
    if($cek_user['verif'] == 'VERIFIED'){
        if ($cek_user['role'] == 'admin') {
            header("Location: admin/index.php ");
        } elseif ($cek_user['role'] == 'user') {
            header("Location: user/home.php");
        }
    }
}
$login = new Relog();

if(isset($_POST["submit"])){
    $login->login(
        [
            "username" => $_POST["username"],
            "password" => $_POST["password"],
        ]
        );
}

?>