<?php 
include "functions.php";
if( isset($_POST["register"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $konfirmasiPassword = $_POST["konfirmasiPassword"];
    if (strlen($_POST["username"]) AND ($_POST["password"]) AND ($_POST["konfirmasiPassword"]) != 0) {
        if ( registrasi($_POST) > 0) {
            // echo "<script class='alert alert-secondary' role='alert'>";
            // echo "alert('user baru berhasil ditambahkan')";
            // echo "</script>";
            header("Location: login.php");
            exit;
        } else {
            echo mysqli_error(($conn));
        }
    }
    if (strlen($username)  == 0) {
        $usernamekosong = 1;
    }
    if (strlen($konfirmasiPassword)  == 0) {
        $konfirmasiPasswordkosong = 1;
    }
    if (strlen($password)  == 0) {
        $passwordkosong = 1;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Halaman Registrasi</title>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center">
        <form class="w-50  align-self-center" action="" method="POST" style="width: 90%;">
            <h3>Halaman Registrasi</h3>
            <input type="hidden" name="id" required>
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <?php if( !isset($usernamekosong) ) : ?>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                <?php endif; ?>
                <?php if( isset($usernamekosong) ) : ?>
                <input type="text" class="form-control is-invalid" name="username" aria-describedby="emailHelp">
                <div class="invalid-feedback">
                    Username tidak boleh kosong!
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <?php if( !isset($passwordkosong) ) : ?>
                <input type="password" class="form-control" name="password" id="password">
                <?php endif; ?>
                <?php if( isset($passwordkosong) ) : ?>
                <input type="password" class="form-control is-invalid" name="password" id="password">
                <div class="invalid-feedback">
                    Password tidak boleh kosong!
                </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="exampleInputKonfirmasiPassword1">Konfirmasi Password</label>
                <?php if( !isset($konfirmasiPasswordkosong) ) : ?>
                <input type="password" class="form-control" name="konfirmasiPassword" id="konfirmasiPassword">
                <?php endif; ?>
                <?php if( isset($konfirmasiPasswordkosong) ) : ?>
                <input type="password" class="form-control is-invalid" name="konfirmasiPassword" id="konfirmasiPassword">
                <div class="invalid-feedback">
                    Konfirmasi Password tidak boleh kosong!
                </div>
                <?php endif; ?>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Registrasi</button>
        </form>
    </div>  
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>