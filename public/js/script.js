$(function(){
    // Tombol Tambah Data
    $('.tombolTambahData').on('click', function() {
        $('#exampleModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', '<?php echo BASEURL; ?>/mahasiswa/tambah');
        
        // Reset form
        $('#id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('Teknik Informatika');
    });

    // Tombol Ubah Data
    $('.tampilModalUbah').on('click', function() {
        $('#exampleModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', '<?php echo BASEURL; ?>/mahasiswa/ubah');

        const id = $(this).data('id');
        console.log('ID yang diklik:', id);

        $.ajax({
            url: '<?php echo BASEURL; ?>/mahasiswa/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                console.log('Data dari server:', data);
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            },
            error: function(xhr, status, error) {
                console.log('Error AJAX:', error);
                console.log('Response:', xhr.responseText);
            }
        });
    });
});