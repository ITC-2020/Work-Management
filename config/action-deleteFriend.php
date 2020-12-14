<?php
    
    //memanggil file koneksi
    require_once ("../config/koneksi.php");

    $id_friend = $_GET["user"];
    $id_project = $_GET["id_project"];

    //cari data team
    $query_hapus = "DELETE FROM db_pivot WHERE id_user=$id_friend AND id_proyek=$id_project";
    $team = mysqli_query($conn,$query_hapus) or die(mysqli_error($conn));
    
    if (mysqli_affected_rows($conn) > 0) {
        header("Location:../view/add_friend.php?id_project=".$id_project);
    }
    
?>