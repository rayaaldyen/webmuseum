<?php

class Admin extends Controller{
    public function index(){
        session_start();

        $result = $this->model('m_koleksi')->tampil();

        $data = [
            'active' => 'dashboard',
            'data' => $result
        ];
        
        $this->view('admin/index', $data);
    }

    public function informasi(){
        session_start();

        $result = $this->model('m_informasi')->tampil();

        $data = [
            'active' => 'dashboard',
            'data' => $result
        ];
        
        $this->view('admin/informasi', $data);
    }

    public function loginCheck(){
        session_start();
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        
        $result = $this->model('m_admin')->login($data);
        if($result != null){
            $_SESSION['email'] = $data['email'];
            header("location: ../../public/admin/index");
        }
    }

    public function signup(){
        session_start();
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'cpassword' => $_POST['cpassword']
        ];
        $result = $this->model('m_admin')->register($data);
        if($result == "sukses"){
            $sukses = "<script>alert('Selamat, registrasi berhasil!')</script>";
            header("location: ../../public/admin/login");
        }else{
            header("location: ../../public/admin/register");
        }
    }

    public function login(){
        $data = [
            'active' => 'login'
        ];
        
        $this->view('admin/login', $data);
    }

    public function register(){
        $data = [
            'active' => 'register'
        ];
        
        $this->view('admin/register', $data);
    }

    public function profil(){
        session_start();

        $result = $this->model('m_admin')->tampil();

        $data = [
            'active' => 'profil',
            'data' => $result
        ];
        
        $this->view('admin/profil', $data);
    }
}