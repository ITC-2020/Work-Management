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
   
    <!-- date picker js active button -->
    <script>
        $(function () {
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
        <h5 class="float-right mt-3 mx-2 px-1 mr-4">Hello, Iskhak!<i class="fas fa-user ml-1"></i></h5>
        <br>
        <div class="row mt-5 mb-5 mx-4">
            <div class="col-md-6">
                    <h5>Buat Proyek Baru</h5>
                    <form action="action-buatproject.php" method="">
                        <div class="row">
                            <div class="col-9 pr-0">
                                <!-- input judul proyek -->
                                <input class="form-control rounded-lg mt-3 mb-3" type="text" placeholder="Judul Proyek">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9 py-2 mb-2 pr-0">
                                <!-- input nama anggota -->
                                <input class="form-control rounded-lg" type="text" placeholder="Anggota Tim">
                            </div>
                            <div class="col-2 py-2 mt-2 pl-1">
                                <!-- gambar icon plus -->
                                <a href="#"><i class="fa fa-plus-circle fa-lg"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <!-- Tampilkan nama anggota -->
                                <p>Daftar Anggota</p>
                                <p id="namaAnggota"># Muhamad Iskhak <a href=""><i class="fas fa-trash"></i></a></p>
                                <p id="namaAnggota"># Muhamad Iskhak <a href=""><i class="fas fa-trash"></i></a></p>
                                <p id="namaAnggota"># Muhamad Iskhak <a href=""><i class="fas fa-trash"></i></a></p>
                            </div>
                        </div>
            </div>

            <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-10">
                            <!-- input deskripsi -->
                            <textarea name="des_proyek" id="" rows="3" class="form-control mb-2 mt-2 rounded-lg" placeholder="Deskripsi Proyek"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 py-2 mb-2">
                            <!-- input tanggal -->
                            <input type="text" class="form-control rounded-lg" id="date" placeholder="YYYY-MM-DD" name="">
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
                    <input type="submit" class="btn btn-primary mt-5 mr- 3 pt-2 pr-3 float-right" value="Buat Proyek" id="tombol">
                    </form>
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
</body>
</html>