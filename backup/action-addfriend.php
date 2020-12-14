<?php

    //memulai sesion
    session_start();

     //memanggil file koneksi
     require_once ("../config/koneksi.php");

    $id_user = $_SESSION["id_user"];
    $id_project = $_POST["id_project"];
    $keyword = $_POST["keyword"];
    var_dump($keyword);
    var_dump($id_project);
    var_dump($id_user);

    $query = "SELECT * FROM data_user WHERE alamat email = '$keyword'";
    
    mysqli_query($conn,$query);

    if (mysqli_affected_rows($conn) >0) {
        $data = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($data);
        $id_friend = $result["id_user"];
        $query_insert = "INSERT INTO db_pivot VALUES ('','$id_project','$id_friend')";
        mysqli_query($conn,$query_insert);
        echo 
        '<script>
            alert("teman berhasil ditambahkan ke dalam project");
        </script>';
        header("location:../view/add_friend.php?id_project=".$id_project);
    }else
    {
        echo 
        '<script>
            alert("teman tidak ditemukan");
        </script>';
        header("location:../view/add_friend.php?id_project=".$id_project);
    }
    
?>