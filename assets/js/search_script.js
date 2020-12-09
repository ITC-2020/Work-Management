//ambil elemen 

var keyword = document.getElementById('keyword');
var lihat_project = document.getElementById('lihat_project');

//tambahkan event ketika keyword ditulis

keyword.addEventListener('keyup', function()
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
    ajax.open('GET','../assets/ajax/search_project.php?keyword=' + keyword.value,true);
    ajax.send();
});

