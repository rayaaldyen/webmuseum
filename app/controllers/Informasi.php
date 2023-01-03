<?php

class Informasi extends Controller{
    public function index(){
        session_start();

        $result = $this->model('m_informasi')->tampil();

        $data = [
            'active' => 'dashboard',
            'data' => $result
        ];
        
        $this->view('admin/informasi', $data);
    }

    public function tambah(){
        session_start();
        $data = [
            'alamat' => $_POST['alamat'],
            'tahun' => $_POST['tahun'],
            'gambar' => $_FILES['gambarMuseum'],
            'email' => $_POST['email'],
            'biografi' => $_POST['biografi'],
            'nomorHp' => $_POST['nomorHp'],
            'jamSenin' => $_POST['jamSenin'],
            'jamSelasa' => $_POST['jamSelasa'],
            'jamRabu' => $_POST['jamRabu'],
            'jamKamis' => $_POST['jamKamis'],
            'jamJumat' => $_POST['jamJumat'],
            'jamSabtu' => $_POST['jamSabtu'],
            'jamMinggu' => $_POST['jamMinggu'],
            'htm' => $_POST['htm']
        ];
        $result = $this->model('m_informasi')->tambah($data);
        if($result){
            header("location: ../../public/admin/informasi");
        }
    }

    public function edit(){
        session_start();
        $data = [
            'id' => $_POST['id_museum'],
            'alamat' => $_POST['alamat'],
            'tahun' => $_POST['tahun'],
            'gambar' => $_FILES['gambarMuseum'],
            'email' => $_POST['email'],
            'biografi' => $_POST['biografi'],
            'nomorHp' => $_POST['nomorHp'],
            'jamSenin' => $_POST['jamSenin'],
            'jamSelasa' => $_POST['jamSelasa'],
            'jamRabu' => $_POST['jamRabu'],
            'jamKamis' => $_POST['jamKamis'],
            'jamJumat' => $_POST['jamJumat'],
            'jamSabtu' => $_POST['jamSabtu'],
            'jamMinggu' => $_POST['jamMinggu'],
            'htm' => $_POST['htm']
        ];
        $result = $this->model('m_informasi')->edit($data);
        if($result){
            header("location: ../../public//admin/informasi");
        }
    }

    public function hapus(){
        session_start();
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);
        $result = $this->model('m_informasi')->hapus(end($url));
        if($result){
            header("location: ../..//admin/informasi");
        }
    }
}