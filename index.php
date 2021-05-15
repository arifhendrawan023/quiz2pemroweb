<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
require "database.php";
$page 	 = isset( $_GET['page'] ) ? (int) $_GET['page'] : 1;
$perPage = 500;

$start = ( $page > 1 ) ? ( $page * $perPage ) - $perPage : 0;

$data = $database->prepare( "SELECT SQL_CALC_FOUND_ROWS * FROM city order by ID desc LIMIT $start, $perPage" );
$data->execute();
$hasil = $data->fetchAll( PDO::FETCH_ASSOC );
$jumlah = count($hasil);

$total = $database->query( "SELECT FOUND_ROWS() as total" )->fetch()['total'];
$pages = ceil( $total / $perPage );

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Data Kota Dunia</title>
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <!-- <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <img src="https://en.wikipedia.org/wiki/Wikipedia_logo#/media/File:Wikipedia-logo-v2.svg" width="30" height="30" alt="">
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="tambahData.php">Tambah Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="logout.php" style="right: 0;">Logout</a>
                    </li>

                </ul>
            </div>
    </nav>
    <div class="container-expand-lg">
        <div class="mb-5 bg-body rounded m-3">
            <h1 class="text-center">Daftar Kota Dunia</h1>
            <a type="button" class="btn btn-outline-secondary btn-lg dark" style="margin-bottom: 25px;" href="tambahData.php">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode Negara</th>
                        <th scope="col">Kawasan</th>
                        <th scope="col">Populasi</th>
                        <th scope="col" style="text-align:center">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    for ($i = 0;$i<$jumlah;$i++ ) :
                    ?>
                    <tr>
                        <th class="ml-3"><?php echo $no++ ?></th> 
                        <td><?php echo $hasil[$i]['Name'] ?></td>
                        <td><?php echo $hasil[$i]['CountryCode'] ?></td>
                        <td><?php echo $hasil[$i]['District'] ?></td>
                        <td><?php echo $hasil[$i]['Population'] ?></td>
                        <td style="text-align:center">
                            <a type="button" class="btn btn-link" style="text-decoration: none;" href="editData.php?id=<?php echo $hasil[$i]['ID']; ?>">Ubah</a>
                            <a type="button" class="btn btn-link" style="text-decoration: none;" href="hapus.php?id=<?php echo $hasil[$i]['ID']; ?>" onclick="return confirm('data akan dihapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <nav class="ml-3" aria-label="Page navigation" style="margin-top: -45px;">
                <?php for ( $x=1; $x <= $pages; $x++ ): ?>
                    <ul class="pagination pagination-sm" style="float:left;">
                        <li class="page-item" style="float:left; margin:2px"><a class="page-link" href="?page=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                    </ul>
                <?php endfor; ?>
        </nav>
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
