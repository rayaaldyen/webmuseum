<?php

class Koleksi extends Controller{
    public function index(){
        session_start();
        $data = [
            'active' => 'dashboard'
        ];
        
        $this->view('admin/informasi', $data);
    }

    public function hapus(){
        session_start();
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);
        $result = $this->model('m_koleksi')->hapus(end($url));
        if($result){
            header("location: ../../admin/index");
        }
    }

    public function tambah(){
        session_start();
        $data = [
            'nama' => $_POST['nama_koleksi'],
            'kategori' => $_POST['kategori'],
            'detail' => $_POST['detail_koleksi'],
            'tahun' => $_POST['tahun'],
            'gambar' => $_FILES['gambar']
        ];
        $result = $this->model('m_koleksi')->tambah($data);
        if($result){
            header("location: ../../public/admin/index");
        }
    }

    public function edit(){
        session_start();
        $data = [
            'id' => $_POST['id_koleksi'],
            'nama' => $_POST['nama_koleksi'],
            'kategori' => $_POST['kategori'],
            'detail' => $_POST['detail_koleksi'],
            'tahun' => $_POST['tahun'],
            'gambar' => $_FILES['gambar']
        ];
        $result = $this->model('m_koleksi')->edit($data);
        if($result){
            header("location: ../../public/admin/index");
        }
    }
}