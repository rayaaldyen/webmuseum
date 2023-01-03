<?php
include_once "connection.php";
class m_informasi {
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    function execute($query){
        return mysqli_query($this->conn->getConnection(),$query);
    }

    public function tampil($id = null){
        $sql = mysqli_query($this->conn->getConnection(), "SELECT * FROM museum");
        $data = array();
        while($obj = mysqli_fetch_object($sql)){
            array_push($data, $obj);
        }
        return $data;
    }

    public function tambah($data){
        $alamat = mysqli_real_escape_string($this->conn->getConnection(), $data['alamat']);
        $tahun = mysqli_real_escape_string($this->conn->getConnection(), $data['tahun']);
        $biografi = mysqli_real_escape_string($this->conn->getConnection(), $data['biografi']);
        $email = mysqli_real_escape_string($this->conn->getConnection(), $data['email']);
        $noHp = mysqli_real_escape_string($this->conn->getConnection(), $data['nomorHp']);
        $jamSenin = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSenin']);
        $jamSelasa = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSelasa']);
        $jamRabu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamRabu']);
        $jamKamis = mysqli_real_escape_string($this->conn->getConnection(), $data['jamKamis']);
        $jamJumat = mysqli_real_escape_string($this->conn->getConnection(), $data['jamJumat']);
        $jamSabtu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSabtu']);
        $jamMinggu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamMinggu']);
        $htm = mysqli_real_escape_string($this->conn->getConnection(), $data['htm']);


        $namaFoto = $data['gambar']['name'];
        $tmpName = $data['gambar']['tmp_name'];

        $explodeFoto = explode('.',$namaFoto);
        $img_ext = end($explodeFoto);
        $gambar = "koleksi-". round(microtime(true)).".".$img_ext;
        $uploadDir = "img";

        $upload = move_uploaded_file($tmpName, "$uploadDir/informasi/$gambar");
        if($upload){
            $query = mysqli_query($this->conn->getConnection(), "INSERT INTO museum VALUES ('$alamat','$biografi', '', '$email', '$gambar', '$noHp', '$tahun', '$jamSenin', '$jamSelasa', '$jamRabu', '$jamKamis', '$jamJumat', '$jamSabtu', '$jamMinggu', '$htm')");
        }
        return $query;
    }

    public function hapus($id){
        $sql = mysqli_query($this->conn->getConnection(), "DELETE FROM museum WHERE id_museum = '$id'");
        return $sql;
    }

    public function edit($data){
        $id = mysqli_real_escape_string($this->conn->getConnection(), $data['id']);
        $alamat = mysqli_real_escape_string($this->conn->getConnection(), $data['alamat']);
        $tahun = mysqli_real_escape_string($this->conn->getConnection(), $data['tahun']);
        $biografi = mysqli_real_escape_string($this->conn->getConnection(), $data['biografi']);
        $email = mysqli_real_escape_string($this->conn->getConnection(), $data['email']);
        $noHp = mysqli_real_escape_string($this->conn->getConnection(), $data['nomorHp']);
        $jamSenin = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSenin']);
        $jamSelasa = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSelasa']);
        $jamRabu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamRabu']);
        $jamKamis = mysqli_real_escape_string($this->conn->getConnection(), $data['jamKamis']);
        $jamJumat = mysqli_real_escape_string($this->conn->getConnection(), $data['jamJumat']);
        $jamSabtu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamSabtu']);
        $jamMinggu = mysqli_real_escape_string($this->conn->getConnection(), $data['jamMinggu']);
        $htm = mysqli_real_escape_string($this->conn->getConnection(), $data['htm']);
        
        $namaFoto = $data['gambar']['name'];
        if($namaFoto == ''){
            $query = mysqli_query($this->conn->getConnection(), "UPDATE museum SET alamat = '$alamat', biografi = '$biografi', email = '$email', nomorHp = '$noHp', tahun = '$tahun', jamSenin = '$jamSenin', jamSelasa = '$jamSelasa', jamRabu = '$jamRabu', jamKamis = '$jamKamis', jamJumat = '$jamJumat', jamSabtu = '$jamSabtu', jamMinggu = '$jamMinggu', htm = '$htm' WHERE id_museum = '$id'");
        }else{
            $tmpName = $data['gambar']['tmp_name'];
            $explodeFoto = explode('.',$namaFoto);
            $img_ext = end($explodeFoto);
            $gambar = "koleksi-". round(microtime(true)).".".$img_ext;
            $uploadDir = "img";
            $upload = move_uploaded_file($tmpName, "$uploadDir/koleksi/$gambar");
            if($upload){
                $query = mysqli_query($this->conn->getConnection(), "UPDATE museum SET alamat = '$alamat', biografi = '$biografi', email = '$email', gambarMuseum = '$gambar', nomorHp = '$noHp', tahun = '$tahun', jamSenin = '$jamSenin', jamSelasa = '$jamSelasa', jamRabu = '$jamRabu', jamKamis = '$jamKamis', jamJumat = '$jamJumat', jamSabtu = '$jamSabtu', jamMinggu = '$jamMinggu', htm = '$htm' WHERE id_museum = '$id'");
            }
        }
        return $query;
    }
}