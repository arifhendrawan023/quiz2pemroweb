<?php 

require "database.php";

session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

if( isset($_POST["simpan"])) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $database->prepare('insert into city values(null, ?, ?, ?, ?)');
        $query->execute([$_POST['nama'], $_POST['kodeNegara'], $_POST['kawasan'], $_POST['populasi']]);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    header('Location: index.php');
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

    <title>Hello, world!</title>
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
    <div class="shadow p-3 mb-5 bg-body rounded" style="margin:2%">
    <h2>Tambah Data Kota</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="inputNamaKota">Nama Kota</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama kota" required>
        </div>
        <div class="form-group">
            <label for="inputKodeNegara">Kode Negara</label>
            <select class="form-control" name="kodeNegara" required>
                            <option> ABW </option>
                            <option> AFG </option>
                            <option> ABW </option>
                            <option> AFG </option>
                            <option> AGO </option>
                            <option> AIA </option>
                            <option> ALB </option>
                            <option> AND </option>
                            <option> ANT </option>
                            <option> ARE </option>
                            <option> ARG </option>
                            <option> ARM </option>
                            <option> ASM </option>
                            <option> ATA </option>
                            <option> ATF </option>
                            <option> ATG </option>
                            <option> AUS </option>
                            <option> AUT </option>
                            <option> AZE </option>
                            <option> BDI </option>
                            <option> BEL </option>
                            <option> BEN </option>
                            <option> BFA </option>
                            <option> BGD </option>
                            <option> BGR </option>
                            <option> BHR </option>
                            <option> BHS </option>
                            <option> BIH </option>
                            <option> BLR </option>
                            <option> BLZ </option>
                            <option> BMU </option>
                            <option> BOL </option>
                            <option> BRA </option>
                            <option> BRB </option>
                            <option> BRN </option>
                            <option> BTN </option>
                            <option> BVT </option>
                            <option> BWA </option>
                            <option> CAF </option>
                            <option> CAN </option>
                            <option> CCK </option>
                            <option> CHE </option>
                            <option> CHL </option>
                            <option> CHN </option>
                            <option> CIV </option>
                            <option> CMR </option>
                            <option> COD </option>
                            <option> COG </option>
                            <option> COK </option>
                            <option> COL </option>
                            <option> COM </option>
                            <option> CPV </option>
                            <option> CRI </option>
                            <option> CUB </option>
                            <option> CXR </option>
                            <option> CYM </option>
                            <option> CYP </option>
                            <option> CZE </option>
                            <option> DEU </option>
                            <option> DJI </option>
                            <option> DMA </option>
                            <option> DNK </option>
                            <option> DOM </option>
                            <option> DZA </option>
                            <option> ECU </option>
                            <option> EGY </option>
                            <option> ERI </option>
                            <option> ESH </option>
                            <option> ESP </option>
                            <option> EST </option>
                            <option> ETH </option>
                            <option> FIN </option>
                            <option> FJI </option>
                            <option> FLK </option>
                            <option> FRA </option>
                            <option> FRO </option>
                            <option> FSM </option>
                            <option> GAB </option>
                            <option> GBR </option>
                            <option> GEO </option>
                            <option> GHA </option>
                            <option> GIB </option>
                            <option> GIN </option>
                            <option> GLP </option>
                            <option> GMB </option>
                            <option> GNB </option>
                            <option> GNQ </option>
                            <option> GRC </option>
                            <option> GRD </option>
                            <option> GRL </option>
                            <option> GTM </option>
                            <option> GUF </option>
                            <option> GUM </option>
                            <option> GUY </option>
                            <option> HKG </option>
                            <option> HMD </option>
                            <option> HND </option>
                            <option> HRV </option>
                            <option> HTI </option>
                            <option> HUN </option>
                            <option> IDN </option>
                            <option> IND </option>
                            <option> IOT </option>
                            <option> IRL </option>
                            <option> IRN </option>
                            <option> IRQ </option>
                            <option> ISL </option>
                            <option> ISR </option>
                            <option> ITA </option>
                            <option> JAM </option>
                            <option> JOR </option>
                            <option> JPN </option>
                            <option> KAZ </option>
                            <option> KEN </option>
                            <option> KGZ </option>
                            <option> KHM </option>
                            <option> KIR </option>
                            <option> KNA </option>
                            <option> KOR </option>
                            <option> KWT </option>
                            <option> LAO </option>
                            <option> LBN </option>
                            <option> LBR </option>
                            <option> LBY </option>
                            <option> LCA </option>
                            <option> LIE </option>
                            <option> LKA </option>
                            <option> LSO </option>
                            <option> LTU </option>
                            <option> LUX </option>
                            <option> LVA </option>
                            <option> MAC </option>
                            <option> MAR </option>
                            <option> MCO </option>
                            <option> MDA </option>
                            <option> MDG </option>
                            <option> MDV </option>
                            <option> MEX </option>
                            <option> MHL </option>
                            <option> MKD </option>
                            <option> MLI </option>
                            <option> MLT </option>
                            <option> MMR </option>
                            <option> MNG </option>
                            <option> MNP </option>
                            <option> MOZ </option>
                            <option> MRT </option>
                            <option> MSR </option>
                            <option> MTQ </option>
                            <option> MUS </option>
                            <option> MWI </option>
                            <option> MYS </option>
                            <option> MYT </option>
                            <option> NAM </option>
                            <option> NCL </option>
                            <option> NER </option>
                            <option> NFK </option>
                            <option> NGA </option>
                            <option> NIC </option>
                            <option> NIU </option>
                            <option> NLD </option>
                            <option> NOR </option>
                            <option> NPL </option>
                            <option> NRU </option>
                            <option> NZL </option>
                            <option> OMN </option>
                            <option> PAK </option>
                            <option> PAN </option>
                            <option> PCN </option>
                            <option> PER </option>
                            <option> PHL </option>
                            <option> PLW </option>
                            <option> PNG </option>
                            <option> POL </option>
                            <option> PRI </option>
                            <option> PRK </option>
                            <option> PRT </option>
                            <option> PRY </option>
                            <option> PSE </option>
                            <option> PYF </option>
                            <option> QAT </option>
                            <option> REU </option>
                            <option> ROM </option>
                            <option> RUS </option>
                            <option> RWA </option>
                            <option> SAU </option>
                            <option> SDN </option>
                            <option> SEN </option>
                            <option> SGP </option>
                            <option> SGS </option>
                            <option> SHN </option>
                            <option> SJM </option>
                            <option> SLB </option>
                            <option> SLE </option>
                            <option> SLV </option>
                            <option> SMR </option>
                            <option> SOM </option>
                            <option> SPM </option>
                            <option> STP </option>
                            <option> SUR </option>
                            <option> SVK </option>
                            <option> SVN </option>
                            <option> SWE </option>
                            <option> SWZ </option>
                            <option> SYC </option>
                            <option> SYR </option>
                            <option> TCA </option>
                            <option> TCD </option>
                            <option> TGO </option>
                            <option> THA </option>
                            <option> TJK </option>
                            <option> TKL </option>
                            <option> TKM </option>
                            <option> TMP </option>
                            <option> TON </option>
                            <option> TTO </option>
                            <option> TUN </option>
                            <option> TUR </option>
                            <option> TUV </option>
                            <option> TWN </option>
                            <option> TZA </option>
                            <option> UGA </option>
                            <option> UKR </option>
                            <option> UMI </option>
                            <option> URY </option>
                            <option> USA </option>
                            <option> UZB </option>
                            <option> VAT </option>
                            <option> VCT </option>
                            <option> VEN </option>
                            <option> VGB </option>
                            <option> VIR </option>
                            <option> VNM </option>
                            <option> VUT </option>
                            <option> WLF </option>
                            <option> WSM </option>
                            <option> YEM </option>
                            <option> YUG </option>
                            <option> ZAF </option>
                            <option> ZMB </option>
                            <option> ZWE </option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputKawasan">Kawasan</label>
            <input type="text" class="form-control" name="kawasan" placeholder="Maskukan Kawasan" required>
        </div>
        <div class="form-group">
            <label for="inputPopulasi">Populasi</label>
            <input type="number" class="form-control" name="populasi" placeholder="Masukkan Jumlah Populasi" required>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary" style="margin-top: 20px;" href="index.php">Simpan</button>
            <a type="submit" class="btn btn-secondary" style="margin-top: 20px;" href="index.php">Kembali</a>
        </div>
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
