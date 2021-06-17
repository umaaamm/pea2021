<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="db_pevita";
    $koneksi=mysqli_connect($servername, $username, $password);

  if ($koneksi) {
    mysqli_select_db ($koneksi, $database) or die ("Database Tidak Ditemukan");
   } else {
     echo "<b> Koneksi Gagal </b>";
   }

?>