<?php
    $servername="10.254.2.40";
    $username="root";
    $password="Gadai162!";
    $database="db_pevita";
    $koneksi=mysqli_connect($servername, $username, $password);

  if ($koneksi) {
    mysqli_select_db ($koneksi, $database) or die ("Database Tidak Ditemukan");
   } else {
     echo "<b> Koneksi Gagal </b>";
   }

?>