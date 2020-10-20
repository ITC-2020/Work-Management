<?php 
	//memanggil file untuk konek ke database
    require_once ("../config/koneksi.php");

    //ambil data dari input-an form register
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    //mencari data yang sama dari database
    $cek_data_query = "SELECT * FROM data_user WHERE nama_lengkap='$nama' and alamat_email='$email'";
    $data = mysqli_query($conn, $cek_data_query) or die (mysqli_error($conn));
 
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($data);

	//menentukan aksi setelahnya
	if($cek >= 1 || $cek < 0){
		header("location:../view/register.php?status=failed");
	}else{
		//query databasenya
	    $db_query = "INSERT INTO data_user (nama_lengkap, alamat_email, password) VALUES('$nama','$email','$password')";

	    //eksekusi query
	    $execute_query = mysqli_query($conn, $db_query) or die (mysqli_error($conn));

		header("location:../view/login.php?status=login");
	}
 	
 	//mengentikan koneksi ke database
	mysqli_close($conn);
?>
