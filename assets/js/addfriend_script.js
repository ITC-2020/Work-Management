//ambil elemen 

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol_cari');
var list_teman = document.getElementById('list_teman');

//tambahkan event ketika keyword ditulis

keyword.addEventListener('keyup', function()
{
    //buat object ajax
    var ajax = new XMLHttpRequest();
    
    
    //cek kesiapan ajax
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200)
        {
            var myobj = JSON.parse(ajax.responseText);
            list_teman.innerHTML==myobj.nama_lengkap;
        }
    }

    //eksekusi ajax
    ajax.open('GET','../assets/ajax/list_teman.php?keyword=' + keyword.value,true);
    ajax.send();
});
tombolCari.addEventListener('click', function()
{

});
