$(function(){

    $('.tombolTambahData').on('click',function(){
        $('#newSiswaModalLabel').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah');
    })
    
     $('.tampilModalUbah').on('click', function(){
        $('#newSiswaModalLabel').html('Edit Data Siswa');
        $('.modal-footer button[type=submit]').html('Edit');


        const id_siswa = $(this).data('id_siswa');
        
        $.ajax({
            url: 'http://localhost/web_magang/admin/siswaubah',
            data: {id_siswa : id_siswa},
            method: 'post',
            dataType: 'json',
            success: function(data){
                console.log(data);
            }
        });
     });

});