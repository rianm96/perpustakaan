<?php 
include "../config/connection.php";
$message = "";
if(isset($_POST['save'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $_insert = "INSERT INTO anggota (id_anggota,nama_anggota,jenis_kelamin,alamat,status) VALUES ('$id','$nama','$jenis_kelamin','$alamat','$status')";
    if(mysqli_query($conf,$_insert)){
        $message = "data saved";
    }else{
        echo "Error :".$_insert." ".mysqli_error($conf);
    }
    mysqli_close($conf);
}else if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $_edit = "UPDATE anggota SET id_anggota='$id',nama_anggota='$nama',jenis_kelamin='$jenis_kelamin',alamat='$alamat',status='$status'  WHERE id_anggota ='$id' ";
    if(mysqli_query($conf,$_edit)){
        $message = "data updated";
    }else{
        echo "Error :".$_edit." ".mysqli_error($conf);
    }
}else if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $_delete = "DELETE FROM anggota WHERE id_anggota = '$id' ";
    if(mysqli_query($conf, $_delete)){
        $message = "data deleted";
    }else{
        echo "Error :".$_edit." ".mysqli_error($conf);
    }
}

?>