<?php
session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {


	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include('../config/config.php');
	$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
	$data = $query->fetch_assoc();

	include('header.html');
 ?>

 <link 	rel="stylesheet" 
 		href="css/tambah-buku.css">

	<form 	action="upload.php" 
			enctype="multipart/form-data" 
			method="post">

	<table border="0" align="center">
		<div class="input-group input-group-sm mb-3">
		  	<input 	name="id" 
		  			type="hidden" 
		  			class="form-control" 
		  			placeholder="<?= $data['nama']; ?>" 
		  			aria-describedby="inputGroup-sizing-sm" 
		  			readonly>
		</div>

		<tr>
				<td>					
					<div class="input-group input-group-sm mb-3">
					 	 <div class="input-group-prepend">
					    	<span 	class="input-group-text" 
					    			id="inputGroup-sizing-sm">
					    			Nama Buku
				    		</span>
					  	</div>
							<input 	name="nama" 
									type="text" 
									class="form-control" 
									aria-describedby="inputGroup-sizing-sm">
					</div>				
				</td>

				<td>
					<?php

						$penulisread 	= mysqli_query($koneksi, "SELECT * FROM penulis");
						$penerbitread 	= mysqli_query($koneksi, "SELECT * FROM penerbit");
						$kategoriread 	= mysqli_query($koneksi, "SELECT * FROM kategori");
					 ?>

					<div class="input-group mb-3">
					  	<div class="input-group-prepend">
						    <label 	class="input-group-text" 
						    		for="inputGroupSelect01">
						    			Penulis
						    </label>
					 	</div>
						<select name="id_penulis" 
					  			class="custom-select" 
					  			id="inputGroupSelect01">

						  	<option value="" 
						  			disabled>
						  			Select one--
						  	</option>

						   	<?php
							   	if ($penulisread->num_rows > 0) {
									while($row = $penulisread->fetch_assoc()) {
							?>

							    <option   value="<?= $row['id']; ?>"> 
							    	<?= $row["nama"]; ?> 
							    </option>

						    <?php 	}
						    	} ?>

						</select>
					</div>
				</td>

		<tr>
				<td>
					<div class="input-group input-group-sm mb-3">
				 	 <div class="input-group-prepend">
				    	<span 	class="input-group-text" 
					    		id="inputGroup-sizing-sm">
					    		Tahun Terbit
				    	</span>
				  	</div>
						<input 	class="tahun-terbit" 
								name="tahun_terbit" 
								type="date">
					</div>
				</td>
				<td>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <label class="input-group-text" 
						    		for="inputGroupSelect01">
						    		Penerbit
							</label>
						</div>

						<select name="id_penerbit" 
								class="custom-select" 
								id="inputGroupSelect01">

						  	<option value="" 
						  			disabled>
						  			Select one--
					  		</option>

						   	<?php
						   		if ($penerbitread->num_rows > 0) {
									while($row = $penerbitread->fetch_assoc()) {
							?>

						    <option value="<?= $row['id']; ?>"> 
						    		<?= $row["nama"]; ?> 
							</option>

						    <?php 	}
						    	} ?>

						</select>
					</div>						
				</td>
		</tr>

		<tr>
			<td rowspan="2">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text">Sinopsis</span>
				  </div>
					<textarea class="form-control" name="sinopsis" rows="4"> </textarea>
				</div>
			</td>

			<td>
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
					    <label 	class="input-group-text" 
					    		for="inputGroupSelect01">
					    		Kategori
						</label>
			  		</div>
					<select name="id_kategori" 
							class="custom-select" 
							id="inputGroupSelect01">
					  	<option value="" 
					  			disabled>
					  			Select one--
				  		</option>
					   	<?php
					   		if ($kategoriread->num_rows > 0) {
								while($row = $kategoriread->fetch_assoc()) {
						?>
					    <option value="<?= $row['id']; ?>"> 
					    			<?= $row["nama"]; ?> 
						</option>

					    <?php 	}
					    	} ?>

					</select>
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				   	<span class="input-group-text" id="inputGroup-sizing-sm">Sampul</span>
				  </div>
				  	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
				  	<input type="file" name="gambar_sampul" size="50" class="form-control" aria-describedby="inputGroup-sizing-sm">
				</div>
			</td>
		</tr>

		<tr>
			<td align="center">
				<button class="btn btn-dark" name="submit_tambah" type="submit">Submit</button>
			</td>
			<td>
				<div class="input-group input-group-sm mb-3">
				 	 <div class="input-group-prepend">
				    	<span class="input-group-text" id="inputGroup-sizing-sm">Berkas</span>
				  	</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
				  	<input type="file" name="berkas_buku" size="50" class="form-control" aria-describedby="inputGroup-sizing-sm">
				</div>
			</td>
	
	</table>
	</form>



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