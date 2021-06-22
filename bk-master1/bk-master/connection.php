<?php
// buat koneksi dengan database mysql
$link = mysqli_connect("localhost","root","","bk");

//periksa koneksi, tampilkan pesan kesalahan jika gagal
if(!$link){
  die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
       " - ".mysqli_connect_error());
}
?>
