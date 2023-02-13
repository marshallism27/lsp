<?php
include_once("Database.php");
include_once("Buku.php");

class Stock extends Database{
    public function reduceGood($id, $data){
        $buku = new Buku();
        $data_buku = $buku->find($data["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["jbb"];
        $kurang = $currentStock - 1;

        $sql = "UPDATE buku set jbb = '$kurang' WHERE id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function addGood($id){
        $buku = new Buku();
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $_GET["id_buku"];

        $currentStock = $data_buku["jbb"];
        $tambah = $currentStock + 1;

        $sql = "UPDATE buku set jbb = '$tambah' WHERE id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function reduceBad($id){
        $buku = new Buku();
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["jbr"];
        $kurang = $currentStock - 1;

        $sql = "UPDATE buku set jbr = '$kurang' WHERE id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function addBad($id){
        $buku = new Buku();
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $_GET["id_buku"];

        $currentStock = $data_buku["jbr"];
        $tambah = $currentStock + 1;

        $sql = "UPDATE buku set jbr = '$tambah' WHERE id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }
}
?>
