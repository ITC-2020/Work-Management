//ambil elemen 

var lihat_semua = document.getElementById('lihat_semua');
var lihat_proses = document.getElementById('lihat_proses');
var lihat_selesai = document.getElementById('lihat_selesai');
var lihat_project = document.getElementById('lihat_project');

//tambahkan event ketika button di klik

lihat_semua.addEventListener('click', function()
{
    //buat object ajax
    var ajax = new XMLHttpRequest();
    
    //cek kesiapan ajax
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200)
        {
            lihat_project.innerHTML=ajax.responseText;
        }
    }
    //eksekusi ajax
    ajax.open('GET','../assets/ajax/dashboard_ajax.php',true);
    ajax.send();
});

lihat_proses.addEventListener('click', function()
{
    //buat object ajax
    var ajax = new XMLHttpRequest();

    //cek kesiapan ajax
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200)
        {
            lihat_project.innerHTML=ajax.responseText;
        }
    }
    //eksekusi ajax
    ajax.open('GET','../assets/ajax/dashboard_ajax.php?lihat_proses=ongoing',true);
    ajax.send();
});

lihat_selesai.addEventListener('click', function()
{
    //buat object ajax
    var ajax = new XMLHttpRequest();
    
    //cek kesiapan ajax
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200)
        {
            lihat_project.innerHTML=ajax.responseText;
        }
    }
    //eksekusi ajax
    ajax.open('GET','../assets/ajax/dashboard_ajax.php?lihat_proses=finished',true);
    ajax.send();
});

