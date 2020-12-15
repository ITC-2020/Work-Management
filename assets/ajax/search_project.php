<?php

//memanggil file koneksi
require_once("../../config/koneksi.php");

// memulai session
session_start();

//mencari data yang project dari database
$id = $_SESSION['id_user'];
$keyword = $_GET["keyword"];

//mencari data yang sama dari database
$query = "SELECT * FROM data_project 
        WHERE id_user='$id' AND (
        title LIKE '%$keyword%' OR
        description LIKE '%$keyword%' OR
        deadline LIKE '%$keyword%'
        ) ORDER BY `data_project`.`deadline` DESC";

$data = mysqli_query($conn, $query) or die(mysqli_error($conn));

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
            <button class="deadline rounded-pill px-2 shadow" style="position: absolute; bottom: 7px; left: 5px;">
                <?= $time_difference ?></button>
        <?php
        } else {
            $time_difference = $deadline->diff($time_now)->format("%a" . " days ago");
        ?>
            <button class="deadline rounded-pill px-2 shadow" style="position: absolute; bottom: 7px; left: 5px; color:tomato;">
                <?= $time_difference ?></button>
        <?php
        }
        ?>
        <i class="fas fa-user" style="position: absolute; bottom: 7px; right: 10px;"></i>
    </div>
<?php } ?>