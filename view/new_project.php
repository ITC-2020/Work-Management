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
            $("#deadline").datepicker({
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

    <?php
    //cek status yang dikirimkan file action
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "failed") {
            echo '<script>
            alert("Nama dan Email sudah ada, silahkan menggunakan lainnya!");
            </script>';
        } else if ($_GET['status'] == "project_gagal") {
            echo '<script>
                alert("Proyek gagal ditambahkan, silahkan periksa kembali data");
                </script>';
        }
    }
    ?>
    <h1 class="mt-4 mb-5 ml-5" id="workspace_font">WORKSPACE</h1>
    <div class="container mt-5 shadow" id="kotak">
        <h3 class="float-left mt-3 mx-2 px-1 ml-4">Project</h3>
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, <?= $_SESSION['nama'] ?><i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">

                <h5 class="mb-3">Buat Proyek Baru</h5>
                <form action="../config/action-buatproject.php" method="POST">
                    <div class="row">
                        <div class="col-10">

                            <!-- gambar-->
                            <img src="../assets/images/buat_proyek _baru.jpg" class="rounded-lg img-fluid">
                        </div>
                    </div>
            </div>

            <div class="col-md-6 mt-4">

                <div class="row">
                    <div class="col-10">
                        <!-- input judul proyek -->
                        <input class="form-control rounded-lg mt-3 mb-3" type="text" placeholder="Judul Proyek" name="title" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <!-- input deskripsi -->
                        <textarea name="description" id="description" rows="3" class="form-control mb-2 mt-2 rounded-lg" placeholder="Deskripsi Proyek"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 py-2 mb-2">
                        <!-- input tanggal -->
                        <input type="text" class="form-control rounded-lg" id="deadline" placeholder="YYYY-MM-DD" name="deadline">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="custom-file">
                            <!-- input file -->
                            <input type="file" class="custom-file-input " name="file" id="file">
                            <label class="custom-file-label" for="file">Unggah Document</label>
                        </div>
                    </div>

                </div>
                <input type="submit" class="btn btn-primary mt-5 mr- 3 float-right" value="Buat Proyek" id="tombol" name="submit">
                </form>
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