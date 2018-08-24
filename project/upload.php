
<?php

$berkas_buku = $_FILES['berkas_buku']['tmp_name'];
$gambar_sampul = $_FILES['gambar_sampul']['tmp_name'];

$nama_file_sampul = $_FILES['gambar_sampul']['name'];
$nama_file_berkas = $_FILES['berkas_buku']['name'];

$ukuran_file_sampul = $_FILES['gambar_sampul']['size'];
$ukuran_file_berkas = $_FILES['berkas_buku']['size'];

$tipe_file_sampul = $_FILES['gambar_sampul']['type'];
$tipe_file_berkas = $_FILES['berkas_buku']['type'];

$file_error_sampul = $_FILES['gambar_sampul']['error'];
$file_error_berkas = $_FILES['berkas_buku']['error'];


@ $baca_dir = opendir('temp/');
if (!$baca_dir) {
	mkdir('temp/', 0777);
	$letak_file_sampul = 'temp/'.$nama_file_sampul;
	$letak_file_berkas = 'temp/'.$nama_file_berkas;
} else {
	$letak_file_sampul = 'temp/'.$nama_file_sampul;
	$letak_file_berkas = 'temp/'.$nama_file_berkas;
}

closedir($baca_dir);

$id 			= $_POST['id'];
$nama 			= $_POST['nama'];
$tahun_terbit 	= $_POST['tahun_terbit'];
$id_penulis 	= $_POST['id_penulis'];
$id_penerbit 	= $_POST['id_penerbit'];
$id_kategori 	= $_POST['id_kategori'];
$sinopsis 		= $_POST['sinopsis'];
$submit_tambah 	= $_POST['submit_tambah'];


include('../config/config.php');


$resultcreate = mysqli_query($koneksi, "INSERT INTO buku(
													id,
													nama,
													tahun_terbit,
													id_penulis,
													id_penerbit,
													id_kategori,
													sinopsis,
													sampul,
													berkas)
													VALUES(
													'$id',
													'$nama',
													'$tahun_terbit',
													'$id_penulis',
													'$id_penerbit',
													'$id_kategori',
													'$sinopsis',
													'$nama_file_sampul',
													'$nama_file_berkas')");

if (isset($submit_tambah)) {
	header('Location: daftar_buku.php');
}


?>
