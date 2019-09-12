<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include('config/db.php');
$waktu = date("Y-m-d H:i:s");
$username = $_POST['username'];
$password = $_POST['password'];
//ubah password ke md5
$passFin = md5($password);
class dataAnggota{}
$anggota = new dataAnggota();


$kAkun = $link -> query("SELECT id FROM tbl_user WHERE username='$username';");
$jlhAkun = mysqli_num_rows($kAkun);

$kSAkun = $link -> query("SELECT id FROM tbl_user WHERE username='$username' AND password='$passFin';");
$jlhSAkun = mysqli_num_rows($kSAkun);

if($jlhAkun > 0){
    if($jlhSAkun > 0){
        $anggota -> statusLogin = 'success';
        $_SESSION['userSes'] = $username;
    }else{
        $anggota -> statusLogin = 'fail_password';
    }
}else{

    $anggota -> statusLogin = 'no_username';
}



echo json_encode($anggota);

?>
