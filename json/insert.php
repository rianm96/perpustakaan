<?php
// File json yang akan dibaca
$file = "anggota.json";

// Mendapatkan file json
$anggota = file_get_contents($file);

// Mendecode anggota.json
$data = json_decode($anggota, true);

// Data array baru
$data [] = array(
    'id_anggota'     => 3,
    'nama_anggota'   => 'Bayu',
    'jenis_kelamin'   => 'laki-laki',
    'alamat' => 'Kediri',
    'status' => 1
);

// Mengencode data menjadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
$anggota = file_put_contents($file, $jsonfile);