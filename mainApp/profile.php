<?php
session_start();
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
$kProfil = $link -> query("SELECT * FROM tbl_profile WHERE username='$userSes' LIMIT 0,1;");
$fPro = $kProfil -> fetch_assoc();
 ?>
<div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
<div class='container row'>
<div class="col-lg-12 col-md-6 mb-4 mt-4">
  <div class="card">
    <div class="card-header">Data Profile - <small><b>Harap lengkapi profil untuk dapat melakukan test</b></small></div>
    <div class="card-body">
      <table class="table">
        <tr>
          <td>Username</td><td><?=$userSes; ?></td>
        </tr>
        <tr>
          <td>Nama</td><td><?=$fPro['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <td>Nim</td><td><?=$fPro['nim']; ?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td><td><?=$fPro['tempat_lahir']; ?> , <?=$fPro['tanggal_lahir']; ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td><td><?=$fPro['jk']; ?></td>
        </tr>
        <tr>
          <td>Nim</td><td><?=$fPro['nim']; ?></td>
        </tr>
        <tr>
          <td>Fakultas</td><td><?=$fPro['fakultas']; ?></td>
        </tr>
        <tr>
          <td>Jurusan</td><td><?=$fPro['jurusan']; ?></td>
        </tr>
        <tr>
          <td>Semester</td><td><?=$fPro['semester']; ?></td>
        </tr>
        <tr>
          <td>Asal Sekolah</td><td><?=$fPro['asal_sekolah']; ?></td>
        </tr>
        <tr>
          <td>Hp</td><td><?=$fPro['no_hp']; ?></td>
        </tr>
        <tr>
          <td>Email</td><td><?=$fPro['email']; ?></td>
        </tr>
        <tr>
          <td>Instagram</td><td><?=$fPro['ig']; ?></td>
        </tr>
      </table>
      <div>
        <button class="btn btn-success" id='btnEdit'>Edit Profil</button>
      </div>
    </div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $('#btnEdit').click(function(){
    $('#divUtama').html("Memuat ..");
    $('#divUtama').load('formEditProfile.php');
  });
});
</script>
