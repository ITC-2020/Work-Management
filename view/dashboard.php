<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/new_project.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <title>Dashboard</title>

</head>

<body>
    <div class="container mt-4" style="display: flex; justify-content: space-between;">
        <h1 id="workspace_font">WORKSPACE</h1>
        <a class="btn btn-danger" href="../config/action-logout.php" style="height: 40px;">Logout</a>
    </div>
    <div class="container mt-4 pb-4 mb-3 shadow" id="kotak">
        <nav class="navbar navbar-expand-lg mt-2 mx-2">
            <a class="navbar-brand">Projek</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a id="lihat_semua" class="nav-item nav-link active" href="#">Semua <span class="sr-only">(current)</span></a>
                    <a id="lihat_proses" class="nav-item nav-link" href="#">Proses</a>
                    <a id="lihat_selesai" class="nav-item nav-link" href="#">Selesai</a>
                </div>
                <div>
                    <h5 class="hello">Hello, <?php

                                // Tampilin Nama Depan
                                // $nama = explode(" ", $_SESSION['nama']);
                                // echo $nama[0];
                                // Tampilin nama full
                                echo $_SESSION['nama'];
                                ?> !<i class="fas fa-user ml-2"></i></h5>
                    <p class="email"><?= $_SESSION['alamat_email'] ?></p>
                </div>
            </div>
        </nav>

        <!-- input search -->
        <div class="row mt-2 mx-2">
            <div class="col-md-3 mx-2">
                <div class="input-group bg-white input-group-sm rounded-pill border border-dark">
                    <div class="button input-group-append">
                        <button class="btn ml-2 " type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <input id="keyword" class="cari form-control rounded-pill" type="search" placeholder="Cari" aria-label="Search">
                </div>
            </div>
        </div>

        <!-- baris untuk kotak" kecil -->
        <div class="row mt-3 mb-5 ml-4" id="lihat_project">
            <?php
            //memanggil file koneksi
            require_once("../config/koneksi.php");

            //mencari data yang project dari database
            $id = $_SESSION['id_user'];
            // $cek_data_query = "SELECT *
            // FROM data_project
            // INNER JOIN db_pivot ON db_pivot.id_user = data_project.id_user";
            $cek_data_query = "SELECT * FROM data_project WHERE id_user='$id' ORDER BY `data_project`.`deadline` DESC";
            $data = mysqli_query($conn, $cek_data_query) or die(mysqli_error($conn));

            //menampilkan data project
            while ($result = mysqli_fetch_assoc($data)) {
            ?>
                <!-- kotak" kecil -->
                <div class="col-md-3 rounded-lg mx-4 pb-5 pt-2 my-3 shadow bg-white" id="kotak_kecil">
                    <a href="edit_project.php?id_project=<?= $result['id_project'] ?>"><i class="fas fa-edit  float-right"></i></a>
                    <a href="lihat_project.php?id_project=<?= $result['id_project'] ?>"><i class="fas fa-eye  float-right mr-2"></i></a>
                    <a href="../config/hapus_project.php?id_project=<?= $result['id_project'] ?>"><i class="fas fa-trash float-right mr-2"></i></a>
                    <br>
                    <h4><?= $result['title'] ?></h4>
                    <p><?= $result['description'] ?></p>
                        <?php
                        $deadline = new DateTime($result["deadline"]);
                        $time_now = new DateTime();
                     
                        if ($deadline > $time_now) {
                            $time_difference = $deadline->diff($time_now)->format("%a" . " days left");
                        ?>
                            <button class="deadline rounded-pill px-2 shadow"
                            style="position: absolute; bottom: 7px; left: 5px;">
                            <?= $time_difference ?></button>
                        <?php
                        } else {
                            $time_difference = $deadline->diff($time_now)->format("%a" . " days ago");
                        ?>
                            <button class="deadline rounded-pill px-2 shadow" 
                            style="position: absolute; bottom: 7px; left: 5px; color:tomato;">
                            <?= $time_difference ?></button>
                        <?php
                        }
                        ?>
                    <i class="fas fa-user"  style="position: absolute; bottom: 7px; right: 10px;"></i>
                </div>
            <?php } ?>
        </div>


        <div class="d-flex align-items-end flex-column">
            <a href="new_project.php"><button class="btn btn-primary shadow" id="tombol" type="button">Proyek Baru</button></a>
        </div>

    </div>
    <script src="../assets/js/dashboard_script.js"></script>
    <script src="../assets/js/search_script.js"></script>
</body>

</html>