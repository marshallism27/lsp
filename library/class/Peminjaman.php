<?php
include_once('Database.php');

class Peminjaman extends Database{
    
    public function all(){
        $sql = "SELECT peminjaman.id as id_peminjaman, user.nama as peminjam, peminjaman.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, peminjaman, buku WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";
        
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);

    }

    public function find($id){
        $sql = "SELECT peminjaman.id as id_peminjaman, user.nama as peminjam, peminjaman.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p FROM user, peminjaman, buku WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND peminjaman.id_user = '$id' AND t_kembali is NULL";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function findKembali($id){
        $sql = "SELECT peminjaman.id as id_peminjaman, user.nama as peminjam, peminjaman.judul as buku, peminjaman.t_kembali peminjaman.k_buku_k FROM user, peminjaman, buku WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND peminjaman.id_user = '$id' AND t_kembali is NOT NULL";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function getPengembalian(){
        $sql = "SELECT peminjaman.id as id_peminjaman, user.nama as peminjam, peminjaman.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, peminjaman, buku WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND t_kembali is NOT NULL";
        
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman(){
        $sql = "SELECT peminjaman.id as id_peminjaman, user.nama as peminjam, peminjaman.judul as buku, peminjaman.t_pinjam, peminjaman.k_buku_p, peminjaman.t_kembali, peminjaman.k_buku_k, peminjaman.denda FROM user, peminjaman, buku WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND t_kembali is NULL";
        
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $t_pinjam = $data["t_pinjam"];
        $k_buku_p = $data["k_buku_p"];

        $sql = "INSERT INTO peminjaman (id_user, id_buku, t_pinjam, k_buku_p) VALUES ('id_user', 'id_buk'u, 't_pinjam', 'K 
        _buku_p')"
    }

    

}
?>