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

    <title>Ubah Project</title>

</head>

<body style="background-color: #B1D4E0;">

    <?php
    //memanggil file koneksi
    require_once("../config/koneksi.php");

    //mencari data yang project dari database
    $id_project = $_GET['id_project'];
    $cek_data_query = "SELECT * FROM data_project WHERE id_project='$id_project'";
    $data = mysqli_query($conn, $cek_data_query) or die(mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_assoc($data)
    ?>

    <h1 class="mt-4 mb-5 ml-5" id="workspace_font">WORKSPACE</h1>
    <div class="container mt-5 shadow" id="kotak">
        <h3 class="float-left mt-3 mx-2 px-1 ml-4">Project</h3>
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, <?= $_SESSION['nama'] ?> <i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">
                <h5>Ubah Proyek</h5>
                <form action="../config/action-editproject.php?id_project='<?=$id_project?>'" method="POST">
                    <div class="row">
                        <div class="col-9 pr-0">
                            <!-- input judul proyek -->
                            <input name="title" class="form-control rounded-lg mt-3 mb-3" type="text" value="<?= $result['title'] ?>" placeholder="Judul Proyek">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <!-- Tampilkan nama anggota -->
                            <p>Daftar Anggota</p>
                            <?php 
                                    //query_cari
                                    //mendapatkan id user sebagai anggota kelompok dalam tabel pivot
                                    $query_cari = "SELECT * FROM db_pivot WHERE id_proyek='$id_project'";
                                    $cari = mysqli_query($conn,$query_cari);

                                    //mencari data yang anggota berdasar id user
                                    while ($data_teman = mysqli_fetch_assoc($cari)) {
                                        $user = $data_teman['id_user'];
                                        $cek_data_query_team = "SELECT * FROM data_user WHERE id='$user'";
                                        $data_team = mysqli_query($conn, $cek_data_query_team) or die (mysqli_error($conn));
                                        $result_team = mysqli_fetch_assoc($data_team);
                                ?>
                                <p id="namaAnggota"># <?= $result_team['nama_lengkap'] ?></i></a></p>
                            <?php } ?>
                        </div>
                    </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="row">
                    <div class="col-10">
                        <!-- input deskripsi -->
                        <textarea name="des_proyek" id="" rows="3" class="form-control mb-2 mt-2 rounded-lg" placeholder="Deskripsi Proyek"><?= $result['description'] ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 py-2 mb-2">
                        <!-- input tanggal -->
                        <input name="deadline" type="text" class="form-control rounded-lg" id="date" value="<?= $result['deadline'] ?>" placeholder="YYYY-MM-DD" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="custom-file">
                            <!-- input file -->
                            <input name="file" type="file" class="custom-file-input " id="file">
                            <label class="custom-file-label" for="file">Unggah Document</label>
                        </div>
                        <p class="mt-3"> <i class="fa fa-file"></i> <?= $result['file'] ?></p>
                    </div>
                </div>
                <input name = "simpan" type="submit" class="btn btn-primary mt-5 mr-3 float-right" value="simpan dan lanjut" id="tombol">
                </form>

                <a href="../config/action-updatestatus.php?id_project='<?=$id_project?>'"><button class="btn btn-primary mt-5 mr-1 float-right" id="tombol">proyek selesai</button></a>

                <a href="dashboard.php"><button class="btn btn-primary mt-5 mr-3 float-right" id="tombol"><i class="fas fa-arrow-left"></i></button></a>
            </div>
        </div>
    </div>

    <!-- js for upload input file label -->
    <script type="application/javascript">
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
</body>

</html>