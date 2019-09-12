<?php
session_start();
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
$kProfil = $link -> query("SELECT * FROM tbl_profile WHERE username='$userSes' LIMIT 0,1;");
$fPro = $kProfil -> fetch_assoc();
$statusProfil = $fPro['sudah_lengkap'];
//cari apakah
$kTest = $link -> query("SELECT id FROM tbl_test WHERE username='$userSes' AND status='selesai';");
$jlhTest = mysqli_num_rows($kTest);
if($jlhTest > 0){
  $st = 'Kamu telah melakukan test!!';
  $bt = '';
  $ps = '';
}else{
  if($statusProfil=='n'){
    $st = 'Kamu harus melengkapi profil untuk melakukan test!!';
    $bt = '';
    $ps = '';
  }else{
    $st = 'Kamu dapat melakukan tes';
    $bt = '<button class="btn btn-lg btn-primary" id="btnStart">Mulai Test</button>';
    $ps = '<p>Catatan sebelum melakukan test!!<br/>
    <ul>
    <li>Disarankan untuk menggunakan laptop atau perangkat dengan dimensi besar agar tulisan menjadi jelas dan tidak mengalami masalah saat melakukan test</li>
    <li>Pastikan koneksi internet kamu dalam keadaan stabil agar proses test lancar</li>
    <li>Hasil test akan diumumkan melalui email/hp, dan dashboard calon anggota</li>
    <li>Peserta diperkenankan untuk menggunakan internet untuk mencari bantuan jawaban, namun lebih disarankan untuk memberikan jawaban pribadi terhadap pertanyaan yang membutuhkan pendapat, dll</li>
    </ul>
    <hr/>
    ';
  }
}

 ?>
<div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
<div class='container row'>
<div class="col-lg-12 col-md-6 mb-4 mt-4">
  <div class="card">
    <div class="card-header">Test Room - <?=$jlhTest; ?><small><b>Pastikan kamu telah melengkapi profil untuk melakukan test</b></small></div>
    <div class="card-body">
      <div class="alert alert-primary" role="alert">
<?=$st; ?>
</div>
<br/>
<?=$ps; ?>
<br/>
<?=$bt; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
<script>
$(document).ready(function(){
  $('#btnStart').click(function(){

    $('#divUtama').html("Memuat ..");
    $('#divUtama').load('mainTestPage.php');
  });
});
</script>
