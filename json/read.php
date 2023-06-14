<?php
// mendefinisi file json
    $file = 'anggota.json';
    // mendapat file json
    $anggota = file_get_contents($file);
    // deconde json
    $datas = json_decode($anggota,true);

    foreach($datas as $data){
        echo $data['id_anggota']; 
        echo $data['nama_anggota']; 
        echo $data['jenis_kelamin']; 
        echo $data['alamat']; 
        echo $data['status']; 
    }

?>