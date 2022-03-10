<?php

require 'functions.php';

// koneksi 

    if ( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
        <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'admin.php';
            </script>
        ";
    }


?>