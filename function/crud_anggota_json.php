<?php 
if(isset($_POST['save'])){
    $file = "../json/anggota.json";

    $anggota = file_get_contents($file);

    $data = json_decode($anggota, true);

    $data [] = array(
        'id_anggota'     => $_POST['id'],
        'nama_anggota'   => $_POST['nama'],
        'jenis_kelamin'   => $_POST['jenis_kelamin'],
        'alamat' => $_POST['alamat'],
        'status' => $_POST['status']
    );

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    // Menyimpan data ke dalam anggota.json
    $anggota = file_put_contents($file, $jsonfile);
}else if(isset($_POST['edit'])){
    $file = "../json/anggota.json";

    $anggota = file_get_contents($file);

    $data = json_decode($anggota, true);
    foreach ($data as $key => $d) {
        // Perbarui data kedua
        if ($data[$key]['id_anggota'] === $_POST['id_anggota'] ) {
            $data[$key]['nama_anggota'] = $_POST['nama'];
            $data[$key]['jenis_kelamin'] = $_POST['jenis_kelamin'];
            $data[$key]['alamat'] = $_POST['alamat'];
            $data[$key]['status'] = $_POST['status'];
        }
    }

    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    // Menyimpan data ke dalam anggota.json
    $anggota = file_put_contents($file, $jsonfile);  
}else if(isset($_POST['delete'])){
    $file = "../json/anggota.json";

    $anggota = file_get_contents($file);

    $data = json_decode($anggota, true);

    foreach ($data as $key => $d) {
        // Hapus data kedua
        if ($d['id_anggota'] === $_POST['id_anggota']) {
            // Menghapus data array sesuai dengan index
            // Menggantinya dengan elemen baru
            array_splice($data, $key, 1);
        }
    }

    // Mengencode data menjadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

    // Menyimpan data ke dalam anggota.json
    $anggota = file_put_contents($file, $jsonfile);
}

?>