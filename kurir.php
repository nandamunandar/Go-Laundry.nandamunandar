<?php 

require "db.php";
$kurir = new Database();


$nama   =$_POST['nama'];
$email  =$_POST['email'];
$alamat =$_POST['alamat'];

$insert = $kurir->insert('kurir', [
    'id_kurir' => '',
    'nama'      => $_POST['nama'],
    'email'     => $_POST['email'],
    'alamat'    => $_POST['alamat']
]);

if ( $insert > 0 ) {
    header('Location:index.php');
} else {
    echo "Gagal..:(";
}