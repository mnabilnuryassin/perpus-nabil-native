<?php
session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {

include('header.html');

		$id = $_GET['id'];
		include('../config/config.php');
		$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");

		$data = $query->fetch_assoc();
	// print_r($data);
		?>
<link rel="stylesheet" href="css/ubah-buku.css">

		<form action='update.php' enctype="multipart/form-data" method='post'>

				<table border="0" align="center">

					<?php
					$penulisread = mysqli_query($koneksi, "SELECT * FROM penulis");
					$penerbitread = mysqli_query($koneksi, "SELECT * FROM penerbit");
					$kategoriread = mysqli_query($koneksi, "SELECT * FROM kategori");
					?>

					<input name="id_blm" type="hidden" class="id-buku" value="<?= $data['id']; ?>">

					<tr >
						<td >
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">ID Buku</span>
								</div>
								<input name="id_upd" type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?= $data['id']; ?>" readonly>
							</div>
						</td>
						<td>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Penulis</label>
								</div>
								<select name="id_penulis_upd" class="custom-select" id="inputGroupSelect01">
									<option value="" disabled>Select one--</option>
									<?php
									if ($penulisread->num_rows > 0) {
										while($row = $penulisread->fetch_assoc()) {
											if ($row['id'] == $data['id_penulis']) { ?>
												<option   value="<?= $row['id']; ?>" selected> <?= $row["nama"]; ?> </option>


											<?php		} else { ?>
												<option   value="<?= $row['id']; ?>"> <?= $row["nama"]; ?> </option>
											<?php 		}
										}
									} ?>
								</select>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">Nama Buku</span>
								</div>
								<input name="nama_upd" type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?= $data['nama']; ?>">
							</div>
						</td>
						<td>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Penerbit</label>
								</div>
								<select name="id_penerbit_upd" class="custom-select" id="inputGroupSelect01">
									<option value="" disabled>Select one--</option>
									<?php
									if ($penerbitread->num_rows > 0) {
										while($row = $penerbitread->fetch_assoc()) {
											if ($row['id'] == $data['id_penerbit']) { ?>
												<option   value="<?= $row['id']; ?>" selected> <?= $row["nama"]; ?> </option>


											<?php		} else { ?>
												<option   value="<?= $row['id']; ?>"> <?= $row["nama"]; ?> </option>
											<?php 		}
										}
									} ?>
								</select>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">Tahun Terbit</span>
								</div>
								<input class="tahun-terbit_upd" name="tahun_terbit_upd" type="text" value="<?= $data['tahun_terbit']; ?>">
							</div>
						</td>
						<td>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Kategori</label>
								</div>
								<select name="id_kategori_upd" class="custom-select" id="inputGroupSelect01">
									<option value="" disabled>Select one--</option>
									<?php
									if ($kategoriread->num_rows > 0) {
										while($row = $kategoriread->fetch_assoc()) {
											if ($row['id'] == $data['id_kategori']) { ?>
												<option   value="<?= $row['id']; ?>" selected> <?= $row["nama"]; ?> </option>


											<?php		} else { ?>
												<option   value="<?= $row['id']; ?>"> <?= $row["nama"]; ?> </option>
											<?php 		}
										}
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
								<textarea class="form-control" name="sinopsis_upd" rows="4" value="<?= $data['sinopsis']; ?>"><?= $data['sinopsis']; ?></textarea>
							</div>
						</td>
						<td>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">Sampul</span>
								</div>
								<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
								<input type="file" name="gambar_sampul_upd" size="50" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?= $data['sampul']; ?>"><img width="33px" height="33px" src="../temp/<?= $data['sampul']; ?>"></input>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-sm">Berkas</span>
								</div>
								<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
								<input type="file" name="berkas_buku_upd" size="50" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?= $data['berkas']; ?>">

							</div>
						</td>
					</table>
					<table align="center">
						<tr>
							<td>
								<button name='submit_ubah' type='submit' class='btn btn-dark'>SIMPAN</button>
							</td>
						</tr>					
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