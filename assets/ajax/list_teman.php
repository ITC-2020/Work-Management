<?php

    //memanggil file koneksi
    require_once ("../../config/koneksi.php");
    $keyword=$_GET["keyword"];

    //mencari data yang sama dari database
    $query = "SELECT * FROM data_user WHERE alamat_email LIKE '%$keyword%'";
    $data = mysqli_query($conn, $query) or die (mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_object($data);

    $myJSON=json_encode($result);
    echo $myJSON;

?>