<?php
session_start();

if(!isset($_SESSION['userSes'])){
header('location:../');
}
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
$kTest = $link -> query("SELECT * FROM tbl_test WHERE username='$userSes' AND status='selesai';");
$jlhTest = mysqli_num_rows($kTest);
if($jlhTest > 0){
  $ps = "Kamu telah melakukan test, terima kasih";
}else{
  $ps = "Kamu belum melakukan online test, segera lakukan online test sebelum waktu test berakhir!!";
}
?>
<div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
<div>
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
           Selamat datang
          </h4>
        </div>
</div>
<div class='container row'>

<div class="col-lg-6 col-md-6 mb-4">
          <div class="card">
            <div class="card-header">Status test kamu</div>
            <div class="card-body">
              <div class="alert alert-warning" role="alert">
  <?=$ps; ?>
  </div>
            </div>
        </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                      <div class="card">
                        <div class="card-header">5 Peserta terakhir test</div>
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <td>No Tes</td><td>Username</td><td>Waktu</td>
                            </thead>
                            <tbody>
                              <?php
                              $kPeserta = $link -> query("SELECT * FROM tbl_test WHERE status='selesai' LIMIT 0, 5;");
                              while($kPer = $kPeserta -> fetch_assoc()){
                                $username = $kPer['username'];
                                $idTest = $kPer['id_test'];
                                $waktu = $kPer['waktu_mulai'];
                                echo "
                                <tr>
                                <td>$idTest</td><td>$username</td><td>$waktu</td>
                                </tr>
                                ";
                              }
                               ?>
                            </tbody>

                          </table>
                        </div>
                    </div>
                        </div>

          </div>


          <div class='container row'>

          <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card">
                      <div class="card-header">Informasi jadwal</div>
                      <div class="card-body">
                        <ul style="font-size:12px;">
                          <li><span class="text-muted">Pendaftaran &amp; Online Test (on going)</span></li>
                          <li><span class="text-muted">Pengumuman Online Test (09 - 20 September)</span></li>
                          <li><span class="text-muted">Tes Wawancara (21 September)</span></li>
                          <li><span class="text-muted">Pengumuman Tes Wawancara(21 September)</span></li>
                          <li><span class="text-muted">Pengumuman Final &amp; Persiapan meetup</span></li>
                          <li><span class="text-muted">Meetup club perdana</span></li>
                        </ul>
                      </div>
                  </div>
                      </div>

                      <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card">
                                  <div class="card-header">Public chat</div>
                                  <div class="card-body">


                                  </div>
                              </div>
                                  </div>

                    </div>


</div>
