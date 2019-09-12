<?php
session_start();
$userSes = $_SESSION['userSes'];
date_default_timezone_set('Asia/Jakarta');
include('../config/db.php');
$waktu = date("Y-m-d H:i:s");
$kPertanyaan = $link -> query("SELECT * FROM tbl_pertanyaan;");
$totalPertanyaan = mysqli_num_rows($kPertanyaan);
$bahanKode = "109122113331124442211876612";
$acak = str_shuffle($bahanKode);
$bahanIdTest = substr($acak, 0, 6);
$link -> query("INSERT INTO tbl_test VALUES('','$bahanIdTest','$userSes','$waktu','','belum_selesai');");
?>
<div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
<div class='container row'>
<div class="col-lg-12 col-md-6 mb-4 mt-4">
  <div class="card">
    <div class="card-header">Test Room</div>
    <div class="card-body">
      <div>
        Catatan sebelum memulai test<br/>
        <ul>
          <li>Mainkan banggggg</li>
        </ul>
      </div>
      <table class="table" style='font-size:11px;'>
<?php
$no = 0;
while($fPer = $kPertanyaan -> fetch_assoc()){
  $kd = $fPer['kd_pertanyaan'];
  $pertanyaan = $fPer['isi'];
  echo "
  <tr>
  <td>
$pertanyaan<br/>
<textarea class='form-control txtJ$no' id='$kd'></textarea>
  </td>
  <td>

  </td>
  </tr>
  ";
  $no++;
}
 ?>
      </table>
      <div>
        Catatan sebelum mensubmit jawaban<br/>
        <ul>
          <li>Untuk pertanyaan yang tidak disi, akan tetap menjadi dasar penilaian panitia</li>
          <li>Hasil seleksi online akan di umumkan melalui email/hp yang bersangkuta</li>
          <li>Selalu bertanya kepada panitia apabila mengalami masalah dalam melakukan test atau ingin melakukan tes ulang</li>
        </ul>
      </div>
      <button class="btn btn-lg btn-success" id='btnSubmit'>Submit Jawaban</button>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
$('#btnSubmit').click(function(){
  let idTest = "<?=$bahanIdTest; ?>";
  let konfirmasiSubmit = window.confirm("Apakah kamu yakin mensubmit jawaban??");
  if(konfirmasiSubmit === true){
    let username = "<?=$userSes; ?>";
    for(i = 0; i < <?=$totalPertanyaan; ?>; i++){
      let valuePertanyaan = $('.txtJ'+i).val();
      let kdPertanyaan = $('.txtJ'+i).attr('id');

      $.post('submitJawaban.php',{'username':username,'idTest':idTest,'jawaban':valuePertanyaan,'kdPertanyaan':kdPertanyaan}, function(){

      });

    }
    window.alert("Terima kasih telah melakukan test.. harap tunggu informasi selanjutnya yang akan diberikan melalu email/hp");
    $('#divUtama').html("Mensubmit jawaban....");
    $('#divUtama').load('testRoom.php');
  }else{

  }

});
});
</script>
