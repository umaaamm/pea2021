<?php
include("koneksi.php");
$nik_pegawai=$_POST['nik_pegawai'];
$qry=mysqli_query($koneksi,"select * from tb_pevita_user a join tb_sub_kategori b on a.id_nominasi=b.id_kategori join tb_nominasi c on b.id_nominasi = c.id_nominasi where nik_pegawai='$nik_pegawai'") or die(mysqli_error());

$banyak=mysqli_num_rows($qry);
$output = array();
if($banyak >= 1){
	while($data=mysqli_fetch_object($qry)){
		$output[]=$data;
	}
}
else{
	$output['error']=true;
}
echo json_encode($output,JSON_PRETTY_PRINT);