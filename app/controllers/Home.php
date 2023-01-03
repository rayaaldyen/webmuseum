<?php

class Home extends Controller{
    public function index(){
        session_start();

        $result = $this->model('m_informasi')->tampil();

        $data = [
            'active' => 'home',
            'data' => $result
        ];
        
        $this->view('home/index', $data);
    }
    public function collection(){
        session_start();

        $result = $this->model('m_koleksi')->tampil();

        $data = [
            'active' => 'collection',
            'data' => $result
        ];
        
        $this->view('home/collection', $data);
    }
    public function about(){
        session_start();

        $result = $this->model('m_informasi')->tampil();

        $data = [
            'active' => 'about',
            'data' => $result
        ];
        
        $this->view('home/about', $data);
    }
}