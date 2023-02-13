<?php
include_once('Database.php');

class Relog extends Database{

    public function register($fullname, $username, $password, $role, $verif){
        $role = "user";
        $verif = "UNVERIFIED";

        $sql = mysqli_query($this->db, "INSERT INTO user (fullname, username, password, role, verif) VALUES ('$fullname', '$username', '$password', '$role', '$verif')");

        return $sql;
    }

    public function exist($username){

        $sql = mysqli_query($this->db, "SELECT * FROM user WHERE username = '$username'");

        if($sql->num_rows > 0){
            return true;
        }
        return false;
    }

    public function login($data){
        $username = $data["username"];
        $password = $data["password"];

        $sql1 = "SELECT* FROM user WHERE username = '$username'";
        $cek_user = $this->db->query($sql1)->fetch_assoc();

        if($cek_user){
            if(password_verify($password, $cek_user["password"])){
                $_SESSION["id"] = $cek_user["id"];

                if($cek_user["verif"] == 'VERIFIED'){
                    if($cek_user["role"] == 'admin'){
                        header('location: admin/index.php');
                    } elseif ($cek_user["verif"] == 'VERIFIED'){
                        if($cek_user["role"] == 'user'){
                            header("location: user/home.php");
                        }
                    }else{
                        if($cek_user["verif"] == 'UNVERIFIED'){
                            echo "<script> swal('Anda tidak bisa login karena belum Terverifikasi, Silahkan Hubungi Admin')";
                        }
                    }
                }
            }
        }
        
        }    
    
}


?>
