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
    <div class="card-header">Edit Profile - <small><b>Harap lengkapi profil untuk dapat melakukan test</b></small></div>
    <div class="card-body">
      <table class="table">
        <tr>
          <td>Username</td><td><?=$userSes; ?></td>
        </tr>
        <tr>
          <td>Nama</td><td><input type='text' class="form-control" id='txtNama' value='<?=$fPro['nama_lengkap']; ?>'></td>
        </tr>
        <tr>
          <td>Nim</td><td><input type='text' class="form-control" id='txtNim' value='<?=$fPro['nim']; ?>'></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td><td><input type='text' class="form-control" id='txtTempatLahir' value='<?=$fPro['tempat_lahir']; ?>'> , <input type='date' class="form-control" id='txtTanggalLahir' value='<?=$fPro['tanggal_lahir']; ?>'></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td><td>
            <select id='txtJk' class="form-control">
              <option value="lk">Laki Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Alamat</td><td><input value="<?=$fPro['alamat']; ?>" type="text" id='txtAlamat' class="form-control"></td>
        </tr>

        <tr>
          <td>Fakultas</td><td>
            <select class="form-control" id='txtFakultas'>
              <option value='saintek'>Sains dan Teknologi</option>
              <option value='luar_saintek'>Bukan saintek</option>
            </select></td>
        </tr>
        <tr>
          <td>Jurusan</td><td>
            <select class="form-control"  id='txtJurusan'>
              <option value='ilmu_komputer'>Ilmu Komputer</option>
              <option value='sistem_informasi'>Sistem Informasi</option>
              <option value='biologi'>Biologi</option>
              <option value='fisika'>Fisika</option>
              <option value='matematika'>Matematika</option>
              <option value='luar_saintek'>Saya dari luar saintek</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Semester</td><td>
            <input type='number'  id='txtSemester' class="form-control" value='<?=$fPro['semester']; ?>'>
          </td>
        </tr>
        <tr>
          <td>Asal Sekolah</td><td><input  id='txtAsalSekolah' value="<?=$fPro['asal_sekolah']; ?>" class="form-control"></td>
        </tr>
        <tr>
          <td>Hp</td><td><input value="<?=$fPro['no_hp']; ?>"  id='txtHp' class="form-control"></td>
        </tr>
        <tr>
          <td>Email</td><td><input value="<?=$fPro['email']; ?>"  id='txtEmail' class="form-control"></td>
        </tr>
        <tr>
          <td>Instagram</td><td><input value="<?=$fPro['ig']; ?>" id='txtIg' class="form-control"></td>
        </tr>
      </table>
      <div>
        <button class="btn btn-success" id='btnSimpan'>Simpan Profil</button>
      </div>
    </div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $('#btnSimpan').click(function(){
    //$('#divUtama').html("Memuat ..");
    let username = "<?=$userSes ;?>";
    let namaLengkap = $('#txtNama').val();
    let nim = $('#txtNim').val();
    let tempatLahir = $('#txtTempatLahir').val();
    let tanggalLahir = $('#txtTanggalLahir').val();
    let jk = $('#txtJk').val();
    let fakultas = $('#txtFakultas').val();
    let jurusan = $('#txtJurusan').val();
    let semester = $('#txtSemester').val();
    let asalSekolah = $('#txtAsalSekolah').val();
    let hp = $('#txtHp').val();
    let email = $('#txtEmail').val();
    let ig = $('#txtIg').val();
    let alamat = $('#txtAlamat').val();
    let dataSend = {username:username, namaLengkap:namaLengkap, nim:nim, alamat:alamat, tempatLahir:tempatLahir, tanggalLahir:tanggalLahir, jk:jk, fakultas:fakultas, jurusan:jurusan, semester:semester, asalSekolah:asalSekolah, hp:hp, email:email, ig:ig};
    if(namaLengkap === '' || nim ==='' || tempatLahir === '' || asalSekolah === '' || hp === '' || ig === '' || alamat === ''){
      window.alert("Harap isi semua field!!");
    }else{
      $.post('prosesUpdateProfile.php',dataSend, function(data){
        var obj = JSON.parse(data);
        window.alert("Profile telah di update")
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('profile.php');
      });
    }


  });
});
</script>
