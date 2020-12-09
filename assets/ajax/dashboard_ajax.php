<?php

// memulai session
session_start();

//memanggil file koneksi
require_once("../../config/koneksi.php");


//mencari data yang project dari database
$id = $_SESSION['id_user'];
if (!isset($_GET["lihat_proses"])) {
    $cek_data_query = "SELECT * FROM data_project WHERE id_user='$id' ORDER BY `data_project`.`deadline` DESC" ;
} else if($_GET["lihat_proses"]=="ongoing") {
    $lihat_proses = $_GET["lihat_proses"];
    $cek_data_query = "SELECT * FROM data_project WHERE id_user='$id'" . "AND status = '$lihat_proses' ORDER BY `data_project`.`deadline` ASC";
}else{
    $lihat_proses = $_GET["lihat_proses"];
    $cek_data_query = "SELECT * FROM data_project WHERE id_user='$id'" . "AND status = '$lihat_proses' ORDER BY `data_project`.`deadline` DESC";
}

$data = mysqli_query($conn, $cek_data_query) or die(mysqli_error($conn));

//menampilkan data project
while ($result = mysqli_fetch_assoc($data)) {
?>
    <!-- kotak" kecil -->
    <div class="col-md-3 rounded-lg mx-4 pt-2 pb-5 my-3  shadow bg-white" id="kotak_kecil">
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
            <button class="rounded-pill px-2 deadline shadow" 
            style="position: absolute; bottom: 7px; left: 5px;">
            <?= $time_difference ?></button>
        <?php
        } else {
            $time_difference = $deadline->diff($time_now)->format("%a" . " days ago");
        ?>
            <button class="rounded-pill px-2 deadline shadow" 
            style="position: absolute; bottom: 7px; left: 5px; color: tomato;">
            <?= $time_difference ?></button>
        <?php
        }
        ?>
        
        <i class="fas fa-user" style="position: absolute; bottom: 7px; right: 10px;"></i>
    </div>
<?php } ?>