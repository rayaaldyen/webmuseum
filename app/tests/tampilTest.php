<?php
use PHPUnit\Framework\TestCase;


include "app/models/m_koleksi.php";


class tampilTest extends TestCase{

    public function testTampil(){
        $koleksi= new m_koleksi;
        $data = [
            'nama' => "Pedang Zulfikar",
            'kategori' => "Senjata",
            'detail' => "Pedang Zulfikar adalah salah satu dari sembilan pedang legendaris yang dimiliki Rasulullah SAW. Dari segi bahasa, nama Zulfikar ditengarai berasal dari kata fiqār yang artinya “pembedaan atau pembagian”. Secara istilah zulfikar diartikan sebagai pembeda antara benar dan salah. ",
            'tahun' => "650",
            'gambar' => "pedang zulfikar"
        ];
        $add = $koleksi->tambah($data);
        $result = $koleksi->tampil();
        
        
        
        $check = array();
        
        $check[0] = "Pedang Zulfikar";
        $check[1] = "pedang zulfikar.jpg";
        $check[2] = "Senjata";
        $check[3] = "650";
        $check[4] = "Pedang Zulfikar adalah salah satu dari sembilan pedang legendaris yang dimiliki Rasulullah SAW. Dari segi bahasa, nama Zulfikar ditengarai berasal dari kata fiqār yang artinya “pembedaan atau pembagian”. Secara istilah zulfikar diartikan sebagai pembeda antara benar dan salah. ";

        $this->assertEquals($result[0]->nama_koleksi, $check[0]);
        


        
    }
    
}