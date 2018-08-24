<?php
session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {

include('header.html');

		include('../config/config.php');
		$id = $_GET['id'];
			$query1 = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$id'");
			$data_penulis  = $query1->fetch_assoc();
		?>

<link rel="stylesheet" href="detail-penulis.css">


<div id="table-buku-wrap">
	<table border="0" class="table-buku">

		<?php 
			$resultread = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_penulis='$id'");	

			$baris = 0;
			$kolom = 4;
			if ($resultread->num_rows > 0) { 
				while($row = $resultread->fetch_assoc()) { 
					if ($baris >= $kolom) {
			 		echo "<tr></tr>";
			 		$baris = 0;
			 	}
			 	$baris++;
		?>

			<td>
				<a href="view_buku.php?id=<?= $row['id'] ?>">
					<img height="200px" width="150px" src="temp/<?= $row['sampul']; ?>"><br>
					<div class="judul-buku"><?= $row['nama']; ?></div><br>
					<div class="tahun-terbit-buku"><?= $row['tahun_terbit']; ?></div>
				</a>
			</td>	
		

				<?php } ?>
			<?php } ?>

	</table>
</div>



<h2 align="right">
	<?php echo $data_penulis['nama'];  ?>
</h2>

	<div id="table-penulis-wrap">
		<table border="0" class="table-penulis">

			
			<tr>
				<td class="penulis-judul">Tempat Tinggal</td>	
				<td align="center">&nbsp:&nbsp</td>
				<td>
					<?php
						echo $data_penulis['alamat'];
					?>
				</td>
			</tr>

			<tr>
				<td class="penulis-judul">Telepon</td>	
				<td align="center">:</td>
				<td>
					<?php
						echo $data_penulis['telepon'];
					?>
				</td>
			</tr>

			<tr>
				<td class="penulis-judul">Email</td>
				<td align="center">:</td>
				<td>
					<?php
						echo $data_penulis['email'];
					?>
				</td>
			</tr>
		</table>
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