<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<center>
    <h1 style="margin-top:2cm;">Proses Beli</h1>

    <?php 
    
    session_start();
    require "functions.php";

    $id = $_SESSION['wisata'];
    $getData  = mysqli_query($koneksi, "SELECT harga_trip FROM paket_wisata WHERE id_wisata ='$id'");
    $result   = mysqli_fetch_assoc($getData);

    $array = $result['harga_trip'];
    $string = implode(" ", (array)$array);

    if(isset($_POST['bayar'])){
      
      $jumlah = $_POST['jumlah'];
      $kode = $_POST['kode'];
      $bus  = $_POST['bus'];
      // cari kode diskon
      $mencariBus = mysqli_query($koneksi, "SELECT harga");
      $cariDiskon = mysqli_query($koneksi, "SELECT * FROM diskon WHERE voucher = '$kode'");
      $hasil = $jumlah * $string;

      $user   = $_SESSION['id'];

      $code = mysqli_query($koneksi, "INSERT INTO pembelian VALUES('', '$user', '','$id', '$hasil')");
      if($code == TRUE){
        $_SESSION['transaksi'] = "berhasil";
        header("location:index_new.php");
      }else{
        echo "<script>
        alert('Kode tidak valid/tidak ada')
        </script>";
      }
    }

    ?>
    

    <form class="" action="" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="value1">Jumlah Pesanan</label>
        <div class="col-sm-10">
            <input type="number" name="jumlah" id="value1" class="form-control" min="0" placeholder="Masukan jumlah pesanan" required />
        </div>
      
        <div class="form-group">
        <label class="control-label col-sm-2" for="value2">Pilih Bus</label>
        <div class="col-sm-10">
            <select name="bus" id="">
            <option value="1">Mitra Rahayu (50 seat)</option>
            <option value="5">Pandawa 87(59 seat)</option>
            </select>
        </div>

      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="value2">Harga</label>
        <div class="col-sm-10">
            <input type="number" value="<?php echo $string; ?>" name="harga" id="value2" class="form-control" min="0" placeholder="Enter second value" required readonly/>
        </div>
      </div>
      <!-- <div class="collapse" id="showProduk"> -->
        <div class="form-group">
          <label class="control-label col-sm-2">Kode Diskon</label>
          <div class="col-sm-10">
              <input type="text" name="kode" class="form-control" min="0" placeholder="Masukan Kode" />
          </div>
        </div>
      <!-- </div> -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="sum">Total harga</label>
        <div class="col-sm-10">
            <input type="number" name="total" id="total" class="form-control" placeholder="Total" readonly />
        </div>
      </div>
      <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
      <br>
      <br>
      <!-- <button class="btn btn-secondary" data-toggle="collapse" data-target="#showProduk" aria-expanded="false" aria-controls="showProduk">Masukan Kode Diskon</button> -->
    </form>
</center>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> -->
    <!-- proses -->
    <script>
      $(function(){
            $('#value1, #value2').keyup(function(){
               var value1 = parseFloat($('#value1').val()) || 0;
               var value2 = parseFloat($('#value2').val()) || 0;
               $('#total').val(value1 * value2);
            });
         });
    </script>
  </body>
</html>