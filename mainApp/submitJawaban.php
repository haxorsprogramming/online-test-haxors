<?php
session_start();
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
// 'username':username,'jawaban':valuePertanyaan,'kdPertanyaan':kdPertanyaan
$bahanKode = "qwertyuioplkjhgfdsazxvbnmpol";
$acak = str_shuffle($bahanKode);
$bahanKdJawaban = substr($acak, 0, 10);
$kdSoal = $_POST['kdPertanyaan'];
$jawaban = $_POST['jawaban'];
$idTest = $_POST['idTest'];
$link -> query("INSERT INTO tbl_jawaban VALUES('','$bahanKdJawaban','$kdSoal','$userSes','$jawaban','$waktu');");
$link -> query("UPDATE tbl_test SET status='selesai' WHERE id_test='$idTest'; ");
?>
