<?php 
include_once("functions/my_functions.php");
session_start();
if ($_GET['jenis']=='makanan' && isset($_POST['lanjutkan'])) {
	$porsi=$_POST['jumlah_porsi'];
	$id_makanan=$_GET['id'];
	$account=new outentikasi;
	$id_pelanggan=$account->get_session('id');
	$pesan=new pemesanan;
	$data=$pesan->read_makanan($id_makanan);
	$menu=$data->fetch_assoc();
	$total_harga=$menu['Harga']*$porsi;
	$yes=$pesan->add_to_chart_makanan($id_pelanggan,$id_makanan,$porsi,$total_harga);
	if ($yes) {
		echo "<script>alert('Berhasil Dimasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=list_transaksi.php");
	}
	else{
		echo "<script>alert('Gagal Memasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=index.php");
	}
}

if ($_GET['jenis']=='minuman' && isset($_POST['lanjutkan'])) {
	$porsi=$_POST['jumlah_porsi'];
	$id_minuman=$_GET['id'];
	$account=new outentikasi;
	$id_pelanggan=$account->get_session('id');
	$date=$_POST['date'];
	$pesan=new pemesanan;
	$data=$pesan->read_minuman($id_minuman);
	$menu=$data->fetch_assoc();
	$total_harga=$menu['harga']*$porsi;
	$yes=$pesan->add_to_chart_minuman($id_pelanggan,$id_minuman,$porsi,$total_harga);
	if ($yes) {
		echo "<script>alert('Berhasil Dimasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=list_transaksi.php");
	}
	else{
		echo "<script>alert('Gagal Memasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=index.php");
	}
	
	$porsi_baru=$menu['stock'] - $porsi;
	$sfd=$pesan->update_porsi_minuman($id_minuman,$porsi_baru);
}
 ?>