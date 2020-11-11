<?php

    session_start();
    //memanggil file koneksi
    require_once ("../config/koneksi.php");

    $teman=$_POST["teman"];

    //mencari data yang sama dari database
    $cek_data_query = "SELECT * FROM data_user WHERE alamat_email='$teman'";
    $data = mysqli_query($conn, $cek_data_query) or die (mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_assoc($data);

    //mengambil value dari array result
    $id_teman = $result["id"];
   
?>