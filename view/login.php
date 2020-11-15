<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/login_reg_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <?php 

    //Cek status yang dikirimkan file action
    if(isset($_GET['status'])){
        if($_GET['status'] == "login"){
            echo '<script>
            alert("Silahkan login dengan akun yang telah dibuat.");
            </script>';
        }
        else{
            echo '<script>
            alert("Login gagal, silahkan login dengan email dan password yang benar");
            </script>';
        }
    
    }
    ?>
    <div id="main_content" class="container-fluid justify-content-between p-0">
        <!--container-left-->
        <div class="responsif container-fluid p-0 justify-content-center">
            <img class="image" src="../assets/images/BG.png">
            <h3 class="name" >WORKSPACE</h3>
        </div>
        <!--container-left-end-->

        <!--container-right-->
        <div id="formlogin" class="container d-flex flex-column justify-content-around">

            <!--Headline-->
            <div class="row d-flex justify-content-sm-center mt-5 mb-n1 px-4">
                <h2 class="headline mx-auto text-center">Masuk Sekarang Yuk!</h2>
                <p class="mx-auto text-center ">Sudah sampai mana projek kamu? Jangan lupa dikerjain yaa. </p>
            </div>
            <!--Headline-end-->

            <!--form-->
            <div class="container d-flex justify-content-center align-content-center mb-n5">
                <form action="../config/action-login.php" method="POST">
                    <div class="form-group">
                    <label class="pl-3" for="exampleInputEmail1">Alamat Email :</label>
                    <input type="email" class="radius form-control p-4" id="exampleInputEmail1" placeholder="Masukkan alamat email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="pl-3" for="exampleInputPassword1">Kata Sandi</label>
                        <div class="mata">
                            <input type="password" class="radius form-control p-4" id="exampleInputPassword1" placeholder="Enter your password" name="password" required>               
                            <div class="eye">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                            <!-- <input id="input_form" type="password" class="form-control p-4" id="exampleInputPassword1" placeholder="Masukkan kata sandi">-->
                        </div>
                    </div>
                    <!--button-->
                    <div class="row mt-5">
                    <button type="submit" id="button-action" class="btn mx-auto px-4"><h5>Masuk</h5></button>
                    </div>
                    <!--button-end-->
                </form>
            </div>
            <!--form-end-->

            <div class="row mt-5"></div>
                <h6 class="mx-auto">Belum punya akun? <span><a href="register.php">Daftar Sekarang</a></span></h6>
        </div>
        <!--container-right-end-->

    </div>

    <script type="text/javascript" src="../assets/js/login_reg_script.js"></script>
</body>
</html>