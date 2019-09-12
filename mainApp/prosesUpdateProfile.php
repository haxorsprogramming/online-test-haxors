<?php
session_start();
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
// //
// let dataSend = {username:username, namaLengkap:namaLengkap, nim:nim, tempatLahir:tempatLahir, tanggalLahir:tanggalLahir,
// jk:jk, fakultas:fakultas, jurusan:jurusan, semester:semester, asalSekolah:asalSekolah, hp:hp, email:email, ig:ig};
$namaLengkap = $_POST['namaLengkap'];
$nim = $_POST['nim'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$jk = $_POST['jk'];
$fakultas = $_POST['fakultas'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];
$asalSekolah = $_POST['asalSekolah'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$ig = $_POST['ig'];
$alamat = $_POST['alamat'];
$link -> query("UPDATE tbl_profile SET nama_lengkap='$namaLengkap', jk='$jk', alamat='$alamat', nim='$nim', fakultas='$fakultas', jurusan='$jurusan', semester='$semester', tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', alamat='', no_hp='$hp', asal_sekolah='$asalSekolah', sudah_lengkap='y', ig='$ig', email='$email' WHERE username='$userSes';");
class dataAnggota{}
$anggota = new dataAnggota();
$anggota -> status = $tanggalLahir ;
echo json_encode($anggota);
?>
