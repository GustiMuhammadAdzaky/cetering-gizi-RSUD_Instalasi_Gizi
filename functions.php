<?php
// $conn = mysqli_connect("localhost", "id16053753_yuli", "*lf8@>NoVg+a(dj?", "id16053753_kedaicakeyuli");
// $conn = mysqli_connect("sql111.epizy.com", "epiz_26382506", "pILwHrYH6g", "epiz_26382506_phpdasar");
$conn = mysqli_connect("localhost", "root", "", "makanan");
// $conn = mysqli_connect("sql305.epizy.com", "epiz_30210395", "rRj5FyXCfuW", "epiz_30210395_makanan");







function query($query){
    global $conn;
    $reslut = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($reslut)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {

    global $conn;
    // Ambill data dar tiap element Form

    $nama_produk = htmlspecialchars ($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars ($data["deskripsi_produk"]);
    $harga = htmlspecialchars ($data["harga"]);

    // upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi_produk`, `harga`, `gambar`) VALUES (NULL, '$nama_produk', '$deskripsi_produk', '$harga', '$gambar')";


    // INSERT INTO Customers (CustomerName, City, Country)
    // VALUES ('Cardinal', 'Stavanger', 'Norway');

    // $query = "INSERT INTO 'produk' (`id`, `nama_produk`, `deskripsi_produk`, `harga`, `gambar`) VALUES (`NULL`,`$nama_produk`,`$deskripsi_produk`,`$harga`,`$gambar`)";

    // $query = "INSERT INTO produk VALUES ('','$nama_produk','$deskripsi_produk','$harga','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
    
}

function upload(){
    

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek upload
    if ( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebihdahulu!')
            </script>";
            return false;
    }

    // cek upload gambar 
    $ekstensiGambarValid = ['jpg', 'png', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!')
            </script>";
        return false;
    }
    if ( $ukuranFile > 15000000 ) {
        echo "<script>
        alert('Ukuran gambar terlalu besar')
            </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;


}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    // data
    global $conn;
    // Ambill data dar tiap element Form
    $id = $data["id"];
    $nama_produk = htmlspecialchars ($data["nama_produk"]);
    $deskripsi_produk = htmlspecialchars ($data["deskripsi_produk"]);
    $harga = htmlspecialchars ($data["harga"]);
    $gambarLama = ($data["gambarLama"]);

    if  ($_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }

    $query = "UPDATE produk SET 
                nama_produk = '$nama_produk',
                deskripsi_produk = '$deskripsi_produk',
                harga = '$harga',
                gambar = '$gambar'
              WHERE id = $id
            ";
    
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahNo($data){
    // data
    global $conn;
    // Ambill data dar tiap element Form
    $id = $data["id"];
    $noHp = htmlspecialchars($data["nomor"]);



    $query = "UPDATE nomor_hp SET 
                nomor = '$noHp'
              WHERE id = $id
            ";
    
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);
    $password2 = mysqli_real_escape_string($conn,$data['password2']);

    // cek username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
            return false;
    }


    // cek konfirmasi password
    if ($password2 !== $password) {
        echo "<script>
            alert('konfirmasi Password tidak benar');
            </script>";
            return false;
    }
        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);


        // tambahkan user baru ke database
        mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
        return mysqli_affected_rows($conn);    
}

?>