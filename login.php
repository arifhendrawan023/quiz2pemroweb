<?php 
session_start();
//cek cookie
if (isset($_COOKIE  ['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = 'true';
    }
}
if(isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}
require "functions.php";

if( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // if (strlen($username) OR strlen($password)  == 0) {
    //     if (strlen($username) AND strlen($password)  == 0) {
    //         $usernamekosong = 1;
    //         $passwordkosong = 1;
    //     } elseif (strlen($username) == 0) {
    //         $usernamekosong = 1;
    //     }
    // }

    if (strlen($password)  == 0) {
        $passwordkosong = 1;
    }

    if (strlen($username)  == 0) {
        $usernamekosong = 1;
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if( mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])) {
            //set session
            $_SESSION['login'] = true;

            //cek remember me
            if (isset($_POST['remember'])) {

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']));
            }
            header("Location: index.php");
            exit;
        }
    }

    $error = 1;

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

    <title>Halaman Login</title>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center">
        <form class="needs-validation w-50  align-self-center" action="" method="POST" style="width: 90%;" novalidate>
            <!-- <div class="alert alert-danger" role="alert">Username dan password salah!</div> -->
            <h1>Halaman Login</h1>
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" name="remember" required>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>
            <p>Belum mempunyai akun? <a href="registrasi.php" style="color: blue;">registrasi</a></p>
            <?php if( isset($error) ) : ?>
            <div class="alert alert-danger" role="alert">
                Username atau password salah!
            </div>
            <?php endif; ?>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>  



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- <script src="script.js"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>