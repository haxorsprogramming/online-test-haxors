<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
$username = $_POST['username'];
$password = $_POST['password'];
//ubah password ke md5
$passFin = md5($password);
class dataAnggota{}
$anggota = new dataAnggota();

//cek apakah email sudah terdaftar
$kAkun = $link -> query("SELECT id FROM tbl_user WHERE username='$username';");
$jlhAkun = mysqli_num_rows($kAkun);

if($jlhAkun > 0){
$anggota -> status = 'u_ada';
}else{
$anggota -> status = 'u_tidak';
//simpan user baru ke tbl_user
$link -> query("INSERT INTO tbl_user VALUES('','$username','$passFin','$waktu','','y');");
//simpan user ke profile
$link -> query("INSERT INTO tbl_profile VALUES('','$username','-','-','-','-','-','-','-','','-','-','-','-','n','-','-');");
}
$anggota -> waktu = $waktu;

echo json_encode($anggota);

?>
