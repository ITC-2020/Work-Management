<?php 
    
    //memanggil file koneksi
	require_once ("../config/koneksi.php");

    //memulai session
	session_start();

	//ambil data dari input-an form login
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    //mencari data yang sama dari database
    $cek_data_query = "SELECT * FROM data_user WHERE alamat_email='$email' and password='$password'";
    $data = mysqli_query($conn, $cek_data_query) or die (mysqli_error($conn));

    //menjadikan result database menjadi array assosiative
    $result = mysqli_fetch_assoc($data);

    //mengambil value dari array result dengan key "nama_lengkap"
    $nama = $result["nama_lengkap"];

    //cek apakah email dan pass yg diinput valid
    if($email == $result["alamat_email"] && $password == $result["password"]){
    	session_start();
        $_SESSION['nama'] = $nama;
        header("Location: ../view/dashboard.php");
    }
    else{
    	header("Location: ../view/login.php");
    }

    //tutup koneksi database
    mysqli_close($conn);
 ?>