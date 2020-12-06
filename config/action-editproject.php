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

    //cek tombol submit sudah di klik atau belum
    if(isset($_POST["simpan"]))
    {
        //memulai session
        session_start();
        
        //ambil id project
        $id_project = $_GET["id_project"];

        //ambil data dari input-an form new project

        $title = $_POST["title"];
        $description = $_POST["des_proyek"];
        $deadline = $_POST["deadline"];
        $file = $_POST["file"];
        $id=$_SESSION["id_user"];
        //$teman=$_POST["teman"];

       
        
        $query = "UPDATE data_project SET title = '$title', description = '$description'
        , deadline = '$deadline', file = '$file' WHERE id_project=$id_project";

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
    }
    else
    {
        echo"submit gagal";
    }
       mysqli_close($conn);
?>