<?php

//memulai session
session_start();


if (!isset($_SESSION["login"])) {
    header("Location:../view/login.php?");
    exit;
}
//memanggil file koneksi
require_once("../config/koneksi.php");

//ambil id project
$id_project = $_GET["id_project"];

//ambil data dari input-an form new project

$title = $_POST["title"];
$description = $_POST["des_proyek"];
$deadline = $_POST["deadline"];
$file = $_POST["file"];
$id = $_SESSION["id_user"];
//$teman=$_POST["teman"];

if ($file == '') {
    $query = "UPDATE data_project SET title = '$title', description = '$description'
            , deadline = '$deadline' WHERE id_project=$id_project";
} else {
    $query = "UPDATE data_project SET title = '$title', description = '$description'
            , deadline = '$deadline', file = '$file' WHERE id_project=$id_project";
}

//query insert data

mysqli_query($conn, $query);

header("location:../view/add_friend.php?id_project=".$id_project);

mysqli_close($conn);
?>