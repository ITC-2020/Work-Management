<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
$id_project = $_GET["id_project"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/new_project.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- date picker assets -->
    <link rel="stylesheet" href="../assets/datepicker/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/datepicker/locales/bootstrap-datepicker.id.min.js"></script>

    <!-- date picker js active button -->
    <script>
        $(function() {
            $("#date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                language: 'id'
            });
        });
    </script>

    <title>New Project Lanjut</title>

</head>

<body style="background-color: #B1D4E0;">
    <h1 class="mt-4 mb-5 ml-5" id="workspace_font">WORKSPACE</h1>
    <div class="container mt-5" id="kotak">
        <h3 class="float-left mt-3 mx-2 px-1 ml-4">Project</h3>
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, <?= $_SESSION['nama'] ?><i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">
                <h5>Buat Proyek Baru</h5>
                <form action="../config/action-addfriend.php" method="POST">
                    <input type="hidden" name="id_project" value='<?= $id_project ?>'>
                    <div class="row">
                        <div class="col-9 py-2 mb-2 pr-0">
                            <!-- input nama anggota -->
                            <input class="form-control rounded-lg" id="keyword" type="text" placeholder="Anggota Tim" name="keyword">
                        </div>
                        <div class="col-2 py-2 mt-2 pl-1">
                            <!-- gambar icon plus -->
                            <a href="../config/action-addfriend.php"tombol_cari"><i class="fa fa-plus-circle fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10" id="list_teman">
                            <!-- Tampilkan nama anggota -->
                            <p>Daftar Anggota</p>
                            <?php
                            //memanggil file koneksi
                            require_once("../config/koneksi.php");

                            $id_user = $_SESSION["id_user"];

                            $query = "SELECT * FROM db_pivot WHERE id_proyek = '$id_project'";
                            $data = mysqli_query($conn,$query) or die (mysqli_error($conn));
                            $result = mysqli_fetch_assoc($data);
                            while ($result = mysqli_fetch_assoc($data)) 
                            {
                                $id_friend = $result["id"];
                                $query_cari = "SELECT * FROM data_user WHERE id = '$id_friend'";
                                $data_id = mysqli_query($conn,$query_cari);
                                $nama_user = mysqli_fetch_assoc($data_id);
                            ?>
                                <p id="namaAnggota"><?=$nama_user["nama_lengkap"]?> <a href=""><i class="fas fa-trash"></i></a></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            </div>

            <div class="col-md-6 mt-4">
                <input type="submit" class="btn btn-primary mt-5 mr- 3 float-right" value="Buat Proyek" id="tombol" name="submit">
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/search_script.js"></script>
</body>

</html>