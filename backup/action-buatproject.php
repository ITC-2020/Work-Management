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
        
        //ambil data dari input-an form new project

        $title = $_POST["title"];
        $description = $_POST["description"];
        $deadline = $_POST["deadline"];
        $file = $_POST["file"];
        $id_user=$_SESSION["id_user"];
        //$teman=$_POST["teman"];

        $query = "INSERT INTO data_project VALUES
        ('','$title','$description','$deadline','ongoing','$file','','$id_user')";

        //query insert data

        mysqli_query($conn,$query);
        $jumlah=mysqli_affected_rows($conn);

        //cari id project
        $query_cari = "SELECT * FROM data_project WHERE id_user = '$id_user' 
        AND title = '$title' 
        AND description = '$description' 
        AND deadline = '$deadline'";
        $data = mysqli_query($conn,$query_cari) or die(mysqli_error($conn));
        $data_id = mysqli_fetch_assoc($data);

        //cek data berhasil ditambahkan atau tidak
        if($jumlah>0)
        {
            header("location:../view/add_friend.php?id_project=".$data_id["id_project"]);
        }else{
            header("location:../view/new_project.php?status=project_gagal");
        }
    }
       mysqli_close($conn);
?>