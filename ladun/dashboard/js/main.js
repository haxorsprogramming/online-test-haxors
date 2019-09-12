$(document).ready(function(){
    $('#divUtama').html("Memuat ..");
    $('#divUtama').load('beranda.php');

    $('.btnBeranda').click(function(){
        $('#divUtama').html("Memuat ..");
        $('#divUtama').load('beranda.php');
    });

    $('.btnProfile').click(function(){
      $('#divUtama').html("Memuat ..");
      $('#divUtama').load('profile.php');
    });

    $('.btnTestRoom').click(function(){
      $('#divUtama').html("Memuat ..");
      $('#divUtama').load('testRoom.php');
    });

});
