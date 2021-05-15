<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "world");

function registrasi($data) {
    global $conn;
    
    $id = mysqli_insert_id($conn);
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $konfirmasiPassword = mysqli_real_escape_string($conn, $data['konfirmasiPassword']);

    //cek username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
            </script>";
        return false; 
    }

    //cek konfirmasi password
    if( $password !== $konfirmasiPassword) {
        echo "<script>
                alert('konfirmasi password tidak sesaui!');
            </script>";
        return false;
    }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambah user baru
    mysqli_query($conn, "INSERT INTO users VALUES('$id', '$username', '$password')");
    return mysqli_affected_rows($conn);

}

?>