<?php
session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {

include('header.html');

		include('../config/config.php');
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");

		$data = $query->fetch_assoc();

//menampilkan data dari database
		$resultread 	= mysqli_query($koneksi, "SELECT * FROM buku");
		$penulisread	= mysqli_query($koneksi, "SELECT * FROM penulis");
		$penerbitread	= mysqli_query($koneksi, "SELECT * FROM penerbit");
		$kategoriread	= mysqli_query($koneksi, "SELECT * FROM kategori");

		?>

<link rel="stylesheet" href="view-buku.css">
	
	<div class="ket-buku-wrap">
		<div class="ket-buku">
			<table border="0">
				
				<tr>
					<td rowspan="10" class="table-view-sampul">
						<img height="400px" width="250px" src="temp/<?= $data['sampul']; ?>">
					</td>
					<td rowspan="10" width="25px"></td>
				</tr>


				<tr>
					<td class="table-view-isi" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: silver; vertical-align: bottom;">
						<h3><?= $data["nama"]; ?></h3>
					</td>
				</tr>


				<tr>
					<td class="table-view-judul">
						Tahun Terbit
					</td>
				</tr>


				<tr>
					<td class="table-view-isi">
						<?= $data["tahun_terbit"]; ?>
					</td>
				</tr>


				<tr>
					<td class="table-view-judul">
						Penulis
					</td>
				</tr>


				<tr>
					<td class="table-view-isi">
						<?php
						$query = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$data[id_penulis]'");
						$data_penulis  = $query->fetch_assoc();

						?>
						<a href="detail_penulis.php?id= <?= $data_penulis['id']; ?>">
							<?php
							echo 	$data_penulis["nama"];
							?>
						</a>
						<?php

						?>
					</td>
				</tr>


				<tr>
					<td class="table-view-judul">
						Penerbit
					</td>
				</tr>


				<tr>
					<td class="table-view-isi">
						<?php
						$query = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id='$data[id_penerbit]'");
						$data_penerbit  = $query->fetch_assoc();

						?>
						<a href="detail_penerbit.php?id= <?= $data_penerbit['id']; ?>">
							<?php

							echo 	$data_penerbit["nama"];

							?>
						</a>
					</td>

				</tr>


				<tr>
					<td class="table-view-judul">
						Kategori
					</td>
				</tr>


				<tr>
					<td class="table-view-isi">
						<?php
						$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$data[id_kategori]'");
						$data_kategori  = $query->fetch_assoc();

						?>
						<a href="#">
							<?php

							echo 	$data_kategori["nama"];

							?>
						</a>
						<?php

						?>
					</td>
				</tr>


				<tr>
					<td height="20px" colspan="3">

					</td>
				</tr>


				<tr>
					<td class="table-view-judul" colspan="3">
						Sinopsis
					</td>
				</tr>


				<tr>
					<td class="table-view-sinopsis" colspan="4">
						<?= $data["sinopsis"]; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
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