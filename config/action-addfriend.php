<?php

    //memulai sesion
    session_start();

     //memanggil file koneksi
     require_once ("../config/koneksi.php");

    $id_user = $_SESSION["id_user"];
    $id_project = (int)$_POST["id_project"];
    $keyword = $_POST["keyword"];
    $query = "SELECT * FROM data_user WHERE alamat_email = '$keyword'";
    
    mysqli_query($conn,$query);


    if (mysqli_affected_rows($conn) >0) {
        $data = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($data);
        $id_friend = (int)$result["id"];
        $query_insert = "INSERT INTO db_pivot(id_user,id_proyek) VALUES ('$id_friend','$id_project')";
        mysqli_query($conn,$query_insert);
        header("location:../view/add_friend.php?id_project=".$id_project);
    }else
    {
        header("location:../view/add_friend.php?id_project=".$id_project."&status=failed");
    }
    
?>