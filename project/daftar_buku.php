<?php

session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {

	include('../config/config.php');

	$resultread 	= mysqli_query($koneksi, "SELECT * FROM buku");	
	$penerbitread	= mysqli_query($koneksi, "SELECT * FROM penerbit");
	$kategoriread	= mysqli_query($koneksi, "SELECT * FROM kategori");		
	include('header.html');

?>

<link rel="stylesheet" href="css/daftar-buku.css">

		<table class='table table-striped' border="0">
			<tr> 
				<td class="head-table-daftar">ID Buku 		</td> 
				<td class="head-table-daftar">Nama Buku 	</td>
				<td class="head-table-daftar">Tahun Terbit 	</td>
				<td class="head-table-daftar">Penulis 		</td>
				<td class="head-table-daftar">Penerbit 		</td>
				<td class="head-table-daftar">Kategori 		</td>
				<td class="head-table-daftar">Sampul 		</td>
				<td class="head-table-daftar">Berkas 		</td>
				<td class="head-table-daftar">				</td>
			</tr>


			<?php

			if ($resultread->num_rows > 0) { 
				while($row = $resultread->fetch_assoc()) { ?> 

					<tr class="table-result">
						<td>
							<?= $row["id"]; ?>
						</td>
						<td>
							<?= $row["nama"]; ?>
						</td>
						<td>
							<?= $row["tahun_terbit"]; ?>
						</td>
						<td>
							<?php 						
							$query = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$row[id_penulis]'");
							$data  = $query->fetch_assoc();
							echo 	$data["nama"]; 
							?>
						</td>
						<td>
							<?php 	
							$query = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id='$row[id_penerbit]'");
							$data  = $query->fetch_assoc();
							echo 	$data["nama"]; 
							?>
						</td>
						<td>
							<?php 	
							$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$row[id_kategori]'");
							$data  = $query->fetch_assoc();
							echo 	$data["nama"]; 
							?>				
						</td>
						<td>
							<img 
							width 	='50px' 
							height 	='50px'
							src 	='temp/<?= $row["sampul"]; ?>'>
						</td>
						<td>
							<a href="temp/<?= $row["berkas"]; ?>">
								<img width="20px" height="20px" src="icon/download-icon.png">
							</a>
						</td>
						<?php 
						$folder_berkas = "temp/";
						if 		 (empty($folder_berkas.$row["berkas"])) { 
							?>
							<td>
								File Kosong
							</td>
							<?php 
						} elseif (!empty($folder_berkas.$row["berkas"])){ 
							?>

							<?php 
						} 
						?>


						<td>
							<!-- icon pensil (edit buku) -->
							<a class="icon" href="ubah_buku.php?id= <?= $row['id']; ?>">
								<img width="20px" height="20px" src="icon/pencil-icon.png">
							</a>
							<!-- icon mata (lihat detail buku) -->
							<a class="icon"	href="view_buku.php?id= <?= $row['id']; ?>">
								<img width="20px" height="20px" src="icon/eye-icon.png">
							</a>
							<!-- icon tempat sampah (hapus buku) -->
							<form 	action="" 
									method="get">
							<input 	type="hidden" 
									value="<?= $data['id']; ?>">
							<a 		class="icon" 
									href="daftar_buku.php?id=<?= $row['id']; ?>" 
									onclick="return confirm('Yakin ingin menghapus?');" >
								<img 	width="20px" 
										height="20px" 
										src="icon/trash-icon.png">
							</a>
						</form>

						<?php
						if (isset($_GET['id'])) {
							$id = $_GET['id'];
							$target_file_berkas = "temp/$row[berkas]";
							$target_file_sampul = "temp/$row[sampul]";
							unlink($target_file_berkas);
							unlink($target_file_sampul);
							$resultdelete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
							header('Location: daftar_buku.php');
						}
						?>

					</td> 
				</tr>
			<?php } ?>
		<?php } ?>

	</table>


	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
} else {
	header('Location: login.php');
}
?>