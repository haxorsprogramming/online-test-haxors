$(document).ready(function(){
    var capNotif = $('#capNotifLogin');
    capNotif.hide();

    $('#btnDaftar').click(function(){
        let username = $('#txtUsername').val();
        let password = $('#txtPassword').val();
        // let data = {username:username, password:password}
        if(username === ''){
            window.alert("Isi username!!");
        }else if(password === ''){
            window.alert("Isi password!!");
        }else{
            $.post('prosesDaftar.php',{'username':username,'password':password},function(data){
                let obj = JSON.parse(data);
               if(obj.status ==='u_ada'){
                capNotif.removeClass('alert-warning');
                capNotif.removeClass('alert-success').addClass('alert-danger');
                capNotif.html('Username Sudah terdaftar!!');
                capNotif.show();
               }else{
                    capNotif.removeClass('alert-warning');
                    capNotif.removeClass('alert-danger').addClass('alert-success');
                    capNotif.html('Pendaftaran berhasil, halaman diarahkan kembali ke halaman login');
                    capNotif.show();
                    setTimeout(keHalLogin,1500);
               }
            });
        }
    });  

    function keHalLogin()
    {
        window.location.assign('../');
    }

});