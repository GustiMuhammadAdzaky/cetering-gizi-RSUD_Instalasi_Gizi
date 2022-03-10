
$(function () {
    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah data produk');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
   
    
    $('.tampilModalUbah').on('click', function() {
        $('#formModalLabel').html('Ubah data produk');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/alma store/admin.php',
            data: {id : id},
            method: 'post',
            // dataType: 'json',
            success: function(data){
                console.log(data);
                // $('#nama_produk').val(data.nama_produk);
                // $('#deskripsi_produk').val(data.deskripsi_produk);
                // $('#harga').val(data.harga);
                // $('#gambar').val(data.gambar);
                // $('#id').val(data.id);
            }
        });
        
    });


});





// $(function (params) {
//     // params
//     $('.tombolTambahData').on('click', function(){
//         $('#formModalLabel').html('Tambah data produk');
//         $('.modal-footer button[type=submit]').html('Tambah Data');
//         $('#nama_produk').val('');
//         $('#deskripsi_produk').val('');
//         $('#harga').val('');
//         $('#gambar').val('');
//         $('#id').val('');
//     });

//     $('.tampilModalUbah').on('click', function(){
//         // console.log("ok");
//         $('#formModalLabel').html('ubah data produk');
//         $('.modal-footer button[type=submit]').html('Ubah Data');
//         $('.modal-body form').attr('action', 'ubah.php')

//         const id = $(this).data('id');

        // $.ajax({
        //     url: 'http://localhost/ubah.php',
        //     data: {id : id},
        //     method: 'post',
        //     dataType: 'json',
        //     success: function(data){
        //         // console.log(data);
        //         $('#nama_produk').val(data.nama_produk);
        //         $('#deskripsi_produk').val(data.deskripsi_produk);
        //         $('#harga').val(data.harga);
        //         $('#gambar').val(data.gambar);
        //         $('#id').val(data.id);
        //     }
        // });
//     });
// })