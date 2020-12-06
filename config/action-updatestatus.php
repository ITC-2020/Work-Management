<?php

    //memulai session
    session_start();
    

    if(!isset($_SESSION["login"]))
    {
        header("Location:../view/login.php?");
        exit;
    }
    //memanggil file koneksi
    require_once ("../config/koneksi.php");
 
        //ambil id project
        $id_project = $_GET["id_project"];
        $id=$_SESSION["id_user"];
       
        
        $query = "UPDATE data_project SET status = 'finished' WHERE id_project=$id_project". "AND id_user=$id";

        //query insert data

        mysqli_query($conn,$query);

        //cek data berhasil ditambahkan atau tidak
        if(mysqli_affected_rows($conn)>0)
        {
            header("location:../view/dashboard.php");
        }else{
            echo
            '<script>
                    alert("Project gagal di update");
            </script>';
            header("location:../view/new_project.php");
        }
?>