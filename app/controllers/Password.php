<?php

class Password extends Controller{
    public function edit(){
        session_start();
        $data = [
            'id' => $_POST['id_admin'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $result = $this->model('m_admin')->edit($data);
        if($result){
            header("location: ../../public/admin/index");
        }
    }
}