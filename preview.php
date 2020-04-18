<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>L'W Watch</title>

    <!-- font -->
    <link rel="stylesheet" href="main_style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="index.php" class="navbar-brand">
    <img src="https://as1.ftcdn.net/jpg/01/88/99/42/500_F_188994292_i4UrDwGxVqSNkdUyyF3qD1F6jhKOvPJT.jpg" alt="" width="100" height="100">
    KalitaTrans
        <!-- <img src="images/logo.svg" height="28" alt="CoolBrand"> -->
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">Tentang Kalita</a>
            <a href="#" class="nav-item nav-link">Destinasi/paket</a>
            <a href="#" class="nav-item nav-link">Top Bus</a>
            <a href="#" class="nav-item nav-link disabled" tabindex="-1">Reports</a>
        </div>
  
    </div>
</nav>


<!-- konten -->
<?php 
session_start();

 require "functions.php";
 
 $id    = $_GET['id'];
 $query = mysqli_query ($koneksi, "SELECT * FROM paket_wisata WHERE id_wisata='$id'");
 $hasil = mysqli_fetch_assoc($query);
 //  direct produk
 $_SESSION['wisata'] = $id;
 
 ?>
<form action="" method="POST">
<div class="container-fluid">
  <div class="row">
    <div class="col">
        <div class="judul" style="margin-top: 3cm; margin-left: 2cm;"> 
            <p>Rp. <?php echo $hasil ['harga_trip']; ?></p>
            <a href="prosesBeli.php" class="btn btn-dark">Beli Sekarang</a>
            <small class="form-text text-muted">Barang yang dibeli akan masuk ke menu checkout terlebih dahulu</small>
            <br>
            <br>
        </div>

        <div class="card w-60" style="border: 0px;">
            <div class="card-body">
                <h5 class="card-title">Deskripsi Produk</h5>
                <p><?php echo $hasil ['trip']; ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="gambar" style="margin-top: 3cm;">
            <img src="img/<?php echo $hasil ['img']; ?>" width="500px">
        </div>
    </div>
  </div>
</form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>