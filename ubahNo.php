<?php


require 'functions.php';

// koneksi 

    if ( ubahNo($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
        <script>
                alert('Tidak ada data yang di ubah');
                document.location.href = 'admin.php';
            </script>
        ";
    }


?>