<?php
include_once "connection.php";
class m_koleksi {
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    function execute($query){
        return mysqli_query($this->conn->getConnection(),$query);
    }

    public function tampil($id = null){
        $sql = mysqli_query($this->conn->getConnection(), "SELECT * FROM koleksi");
        $data = array();
        while($obj = mysqli_fetch_object($sql)){
            array_push($data, $obj);
        }
        return $data;
    }

    public function hapus($id){
        $sql = mysqli_query($this->conn->getConnection(), "DELETE FROM koleksi WHERE id_koleksi = '$id'");
        return $sql;
    }

    public function tambah($data){
        $nama = mysqli_real_escape_string($this->conn->getConnection(), $data['nama']);
        $tahun = mysqli_real_escape_string($this->conn->getConnection(), $data['tahun']);
        $kategori = mysqli_real_escape_string($this->conn->getConnection(), $data['kategori']);
        $detail = mysqli_real_escape_string($this->conn->getConnection(), $data['detail']);

        $namaFoto = $data['gambar']['name'];
        $tmpName = $data['gambar']['tmp_name'];

        $explodeFoto = explode('.',$namaFoto);
        $img_ext = end($explodeFoto);
        $gambar = "koleksi-". round(microtime(true)).".".$img_ext;
        $uploadDir = "img";

        $upload = move_uploaded_file($tmpName, "$uploadDir/koleksi/$gambar");
        if($upload){
            $query = mysqli_query($this->conn->getConnection(), "INSERT INTO koleksi VALUES ('','$nama', '$gambar', '$kategori', '$tahun', '$detail')");
        }
        return $query;
    }

    public function edit($data){
        $id = mysqli_real_escape_string($this->conn->getConnection(), $data['id']);
        $nama = mysqli_real_escape_string($this->conn->getConnection(), $data['nama']);
        $tahun = mysqli_real_escape_string($this->conn->getConnection(), $data['tahun']);
        $kategori = mysqli_real_escape_string($this->conn->getConnection(), $data['kategori']);
        $detail = mysqli_real_escape_string($this->conn->getConnection(), $data['detail']);
        $namaFoto = $data['gambar']['name'];
        if($namaFoto == ''){
            $query = mysqli_query($this->conn->getConnection(), "UPDATE koleksi SET nama_koleksi = '$nama', kategori = '$kategori', tahun = '$tahun', detail_koleksi = '$detail' WHERE id_koleksi = '$id'");
        }else{
            $tmpName = $data['gambar']['tmp_name'];
            $explodeFoto = explode('.',$namaFoto);
            $img_ext = end($explodeFoto);
            $gambar = "koleksi-". round(microtime(true)).".".$img_ext;
            $uploadDir = "img";
            $upload = move_uploaded_file($tmpName, "$uploadDir/koleksi/$gambar");
            if($upload){
                $query = mysqli_query($this->conn->getConnection(), "UPDATE koleksi SET nama_koleksi = '$nama', gambar='$gambar', kategori = '$kategori', tahun = '$tahun', detail_koleksi = '$detail' WHERE id_koleksi = '$id'");
            }
        }
        return $query;
    }
}