<?php
include_once "connection.php";
class m_admin {
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    function execute($query){
        return mysqli_query($this->conn->getConnection(),$query);
    }

    public function tampil($id = null){
        $sql = mysqli_query($this->conn->getConnection(), "SELECT * FROM admin");
        $data = array();
        while($obj = mysqli_fetch_object($sql)){
            array_push($data, $obj);
        }
        return $data;
    }
    
    public function login($data){
        $email = mysqli_real_escape_string($this->conn->getConnection(), $data['email']);
        $password = mysqli_real_escape_string($this->conn->getConnection(), $data['password']);
        if(!empty($email) && !empty($password)){
            $sql = mysqli_query($this->conn->getConnection(), "SELECT * FROM admin WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                $data = mysqli_fetch_assoc($sql);
                $pass_user = md5($password);
                $pass_encript = $data['password'];
                if($pass_user === $pass_encript){
                    return $data;
                }else{
                    return "Email atau Password salah";
                }
            }else{
                return "$email - Email ini belum terdaftar";
            }
        }else{
            return "Semua kolom input harus terisi!";
        }
    }

    public function register($data){
        $email = mysqli_real_escape_string($this->conn->getConnection(), $data['email']);
        $password = mysqli_real_escape_string($this->conn->getConnection(), $data['password']);
        $cpassword = mysqli_real_escape_string($this->conn->getConnection(), $data['cpassword']);
        if(!empty($email) && !empty($password) && !empty($cpassword)){
            $sql = mysqli_query($this->conn->getConnection(), "SELECT * FROM admin WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) == 0){
                if($password == $cpassword){
                    $password1 = md5($password);
                    $sql = "INSERT INTO admin (email, password) VALUES ('$email', '$password1')";
                    return "sukses";
                }else{
                    return "<script>Konfirmasi password tidak sesuai</script>";
                }
            }else{
                return "<script>Email sudah terdaftar</script>";
            }
        }else{
            return "<script>Semua kolom harus terisi!</script>";
        }
    }

    public function edit($data){
        $id = mysqli_real_escape_string($this->conn->getConnection(), $data['id']);
        $password = mysqli_real_escape_string($this->conn->getConnection(), $data['password']);
        $password1 = md5($password);
        $query = mysqli_query($this->conn->getConnection(), "UPDATE admin SET password = '$password1' WHERE id_admin = '$id'");

        if($query){
            return $query;
        }
    }

}

