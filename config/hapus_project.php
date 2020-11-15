<?php

    session_start();
    //memanggil file koneksi
    require_once ("../config/koneksi.php");

    //mencari data yang project dari database
    $id = $_GET['id_project'];
    global $conn;
    mysqli_query($conn, "DELETE FROM data_project WHERE id_project=$id");
    $jumlah_hapus= mysqli_affected_rows($conn);
    if ($jumlah_hapus>0) {
        header("Location: ../view/dashboard.php?id_project=<?= $id?status=hapussuccess?>");
        exit;
    }else
    {
        echo 
        '<script>
        alert("Hapus gagal, silahkan coba kembali");
        </script>';
    }
?>