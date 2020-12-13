<?php 
   session_start();
   if (!isset($_SESSION['nama'])){
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- date picker assets -->
    <link rel="stylesheet" href="../assets/datepicker/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>    
    <script src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/datepicker/locales/bootstrap-datepicker.id.min.js"></script>
   
    <title>New Project Lanjut</title>

</head>

<body style="background-color: #B1D4E0;">

<?php 
    //cek status yang dikirimkan file action
    if(isset($_GET['status'])){
        if($_GET['status'] == "failed"){
            echo '<script>
            alert("Nama dan Email sudah ada, silahkan menggunakan lainnya!");
            </script>';
        }else if($_GET['status'] == "project_gagal"){
                echo '<script>
                alert("Proyek gagal ditambahkan, silahkan periksa kembali data");
                </script>';
        }
    }
?>
    <h1 class="mt-4 mb-5 ml-5" id="workspace_font">WORKSPACE</h1>
    <div class="container mt-5 shadow" id="kotak"> 
        <h3 class="float-left mt-3 mx-2 px-1 ml-4">Project</h3>
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, <?=$_SESSION['nama']?><i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">
                    <h5 class="mb-3">Susun Tim</h5>
                    <form action="" method="POST">                        
                     <div class="row">
                         <div class="col-10">
                            <!-- gambar-->
                            <img src="../assets/images/buat_proyek _baru.jpg" class="rounded-lg img-fluid">
                        </div>
                    </div>
            </div>

            <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-9 pr-0">
                             <!-- input Email -->
                            <input class="form-control rounded-lg mt-3 mb-3" type="text" placeholder="Masukan Email Anggota" name="title" required>
                        </div>
                        <div class="col-2 mt-4 pl-1">
                            <!-- gambar icon plus -->
                            <a href="#"><i class="fa fa-plus-circle fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-9">
                    Daftar Team
                    </div>
                    <!-- pake perulangan dr sini kalau mau bagus kasih juga percabangan buat yg daftarnya kosong-->
                        <div class="col-9">
                        # Iskhak
                        </div>
                        <div class="col-9">
                        # Hanif
                        </div>
                    <!-- sampai sini -->
                    </div>
                    <input type="submit" class="btn btn-primary mt-5 mr- 3 float-right" value="Buat Proyek" id="tombol" name="submit">
                    </form>
                    <a href="new_project.php"><button class="btn btn-primary mt-5 mr-3 float-right" id="tombol"><i class="fas fa-arrow-left"></i></button></a>
            </div>
        </div>
    </div>

    <!-- js for upload input file label -->
    <script type="application/javascript">
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    <script src="../assets/js/addfriend_script.js"></script>
</body>
</html>