<?php
$data[] = array(
    'id_anggota'=>1,
    'nama_anggota' => 'rian maualana',
    'jenis_kelamin' => 'laki-laki',
    'alamat' => 'aceh barat',
    'status' => '1',
    );
$data[] = array(
    'id_anggota'=>2,
    'nama_anggota' => 'rian maualana2',
    'jenis_kelamin' => 'laki-laki',
    'alamat' => 'aceh barat',
    'status' => '1',
    );
$data[] = array(
    'id_anggota'=>3,
    'nama_anggota' => 'rian maualana2',
    'jenis_kelamin' => 'laki-laki',
    'alamat' => 'aceh barat',
    'status' => '1',
    );
// ubah ke json
$jsonfile = json_encode($data,JSON_PRETTY_PRINT);


// Simpan 
file_put_contents('anggota.json',$jsonfile);
?> 