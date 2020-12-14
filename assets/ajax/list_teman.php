<?php

    //memanggil file koneksi
    require_once ("../../config/koneksi.php");
    $keyword=$_GET["keyword"];

    //mencari data yang sama dari database
    $query = "SELECT * FROM data_user WHERE alamat_email LIKE '%$keyword%'";
    $data = mysqli_query($conn, $query) or die (mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_assoc($data);

    //menangkap id user
    $id_friend = $result["id"];

    //query insert database
    if (isset($_GET["id_project"])) {
        $id_project=$_GET["id_project"];
        $query_insert="INSERT INTO db_pivot (id_user,id_proyek) VALUES ($id_friend','$id_project')";
        $nilai = mysqli_query($conn,$query_insert);
    }

    echo ($nilai);
?>