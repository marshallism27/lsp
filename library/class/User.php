<?php
include_once('Database.php');

class User extends Database{

    public function all(){
        $sql = "SELECT * FROM user";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT*FROM user WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function getAnggota(){
        $sql = "SELECT * FROM user WHERE role = 'user'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function getAdmin(){
        $sql = "SELECT * FROM user WHERE role = 'admin'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nis = $data["nis"];
        $username = $data["username"];
        $fullname = $data["fullname"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $role = $data["role"];
        $verif = $data["verif"];
        $join_date = date('Y-m-d H:i:s');
        $foto = $_FILES["foto"];

        $target_file = '../images' .date('Ymdhis') .basename($foto["name"]);
        move_uploaded_file($foto["tmp_name"], $target_file);

        $sql = "INSERT INTO user (kode, nis, username, fullname, password, kelas, alamat, role, verif, join_date, foto) VALUES ('$kode', '$nis', '$username', '$fullname', '$password', '$kelas', '$alamat', '$role', '$verif', '$join_date', '$target_file')";

        if($this->db->query($sql) === TRUE){
            echo "Berhasil Menambahkan";
        }else{
            echo "Gagal";
        }

    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nis = $data["nis"];
        $username = $data["username"];
        $fullname = $data["fullname"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $role = $data["role"];
        $verif = $data["verif"];
        $join_date = date('Y-m-d H:i:s');
        $foto = $_FILES["foto"];

        if($foto["error"] !== 4){$target_file = '../images' .date('Ymdhis') .basename($foto["name"]);
        move_uploaded_file($foto["tmp_name"], $target_file);

        $sql = "UPDATE user SET kode = '$kode', nis = '$nis', username = '$username', fullname = '$fullname', password = '$password', kelas = '$kelas', role = '$role', verif = '$verif', join_date = '$join_date', foto = '$target_file' WHERE id='$id'";
        }else{
            $sql = "UPDATE user SET kode = '$kode', nis = '$nis', username = '$username', fullname = '$fullname', password = '$password', kelas = '$kelas', role = '$role', verif = '$verif', join_date = '$join_date' WHERE id='$id'";
        }

        if($this->db->query($sql) === TRUE){
            echo "Berhasil Menambahkan";
        }else{
            echo "Gagal";
        }
    }

    public function delete($id){
        $date = date('Y-m-d H:i:s');

        $sql = "UPDATE user SET deleted_at = '$date' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            echo "Berhasil Menambahkan";
        }else{
            echo "Gagal";
        }
    }
} 

?>