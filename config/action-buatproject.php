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

    if(isset($_POST["submit"]))
    {
        //memulai session
        session_start();
        
        //ambil data dari input-an form new project

        $title = $_POST["title"];
        $description = $_POST["description"];
        $deadline = $_POST["deadline"];
        $file = $_POST["file"];
        $id=$_SESSION["id_user"];
        //$teman=$_POST["teman"];

        $query = "INSERT INTO data_project VALUES
        ('','$title','$description','$deadline','ongoing','$file','$id_teman','$id')
        ";

        //query insert data

        mysqli_query($conn,$query);

        //cek data berhasil ditambahkan atau tidak
        if(mysqli_affected_rows($conn)>0)
        {
            header("location:../view/dashboard.php?status=success");
        }else{
            header("location:../view/new_project.php?status=project_gagal");
        }
    }
       mysqli_close($conn);
?>