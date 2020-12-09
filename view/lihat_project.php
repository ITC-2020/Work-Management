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

    <title>Lihat Project</title>

</head>

<body style="background-color: #B1D4E0;">

<?php 
    //memanggil file koneksi
    require_once ("../config/koneksi.php");

    //mencari data yang project dari database
    $id = $_GET['id_project'];
    $cek_data_query = "SELECT * FROM data_project WHERE id_project='$id'";
    $data = mysqli_query($conn, $cek_data_query) or die (mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_assoc($data)
?>

    <h1 class="mt-4 mb-5 ml-5" id="workspace_font">WORKSPACE</h1>
    <div class="container mt-2 mb-3 shadow" id="kotak"> 
        <h3 class="float-left mt-3 mx-2 px-1 ml-4">Project</h3>
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, <?= $_SESSION['nama'] ?> <i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">
                    <h5>Proyek <?= $result['title'] ?></h5>
                        <div class="row">
                            <div class="col-9 pr-0">
                                <!-- input judul proyek -->
                                <label for="" class="mt-3">Judul Project</label>
                                <input class="form-control rounded-lg mb-3" type="text" value="<?= $result['title'] ?>" placeholder="Judul Proyek" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <!-- Tampilkan nama anggota -->
                                <p>Daftar Anggota</p>
                                <?php 
                                    //dapatkan id user dr kolom tabel
                                    $idUser = explode(",",$result['team']);
                                    //mencari data yang anggota berdasar id user
                                    foreach($idUser as $user){
                                        $cek_data_query_team = "SELECT * FROM data_user WHERE id='$user'";
                                        $data_team = mysqli_query($conn, $cek_data_query_team) or die (mysqli_error($conn));
                                        $result_team = mysqli_fetch_assoc($data_team);
                                ?>
                                <p id="namaAnggota"># <?= $result_team['nama_lengkap'] ?> <a href="config/action-team.php?id=<?= $result_team['id'] ?>"><i class="fas fa-trash"></i></a></p>
                                    <?php } ?>
                            </div>
                        </div>
            </div>

            <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-10">
                            <!-- input deskripsi -->
                            <label for="" class="mt-3">Deskripsi Project</label>
                            <textarea name="des_proyek" id="" rows="3" class="form-control mb-2 mt-2 rounded-lg" placeholder="Deskripsi Proyek" readonly><?= $result['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 py-2 mb-2">
                            <!-- input tanggal -->
                            <label for="" class="mt-3">Tanggal Project</label>
                            <input type="text" class="form-control rounded-lg" id="date"  value="<?= $result['deadline'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <p>File Project</p>
                            <p class="mt-3"> <i class="fa fa-file"></i> <?= $result['file'] ?></p>
                        </div>
                    </div>
                    <a href="edit_project.php?id_project=<?= $id ?> "><button class="btn btn-primary mt-5 mr-3 float-right" id="tombol">Edit Project</button></a>
                    <a href="dashboard.php"><button class="btn btn-primary mt-5 mr-3 float-right" id="tombol"><i class="fas fa-arrow-left"></i></button></a>
            </div>
        </div>
    </div>
</body>
</html>