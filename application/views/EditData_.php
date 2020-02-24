<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>

<body>
<div class="row d-flex justify-content-center mt-5">
<div class="col-6">
	<div class="card">
		<div class="card-body">
		<div class="card-titile">
			<h3>Form Ubah Data Mahasiswa</h3>
			<hr>
		</div>
		<?php foreach($mahasiswa as $u){ ?>
			<form action=<?php echo site_url('mahasiswa/update'); ?> method="post">
				<div class="container">
					<div class="form-group">
						<label for="nim">Nim</label>
						<input type="number" class="form-control" placeholder="ex: 1455301035" name="nim" id="nim" value="<?php echo $u->nim ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" placeholder="ex: Iqbal Mahatma" name="nama" id="nama" value="<?php echo $u->nama ?>">
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label>
						<input type="text" class="form-control" placeholder="ex: Lelaki" value="<?php echo $u->jk ?>" name="jk" id="jk">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" placeholder="ex: Jl. Sekolah" name="alamat" id="alamat" value="<?php echo $u->alamat ?>">
					</div>
					<div class="form-group">
						<label for="telfon">Telfon</label>
						<input type="number" class="form-control" placeholder="ex: 08121616172" name="telfon" id="telfon" value="<?php echo $u->telfon ?>">
					</div>
                    <div class="form-group">
					<label for="kode_matkul">Mata Kuliah</label>
					<select name="kode_matkul" id="kode_matkul" class="form-control custom-select">
							<?= $matkul=$this->db->query("SELECT DISTINCT `matkul`.*, `matkul`.`nama_matkul`
            FROM `matkul` JOIN `mahasiswa`")->result(); ?>
							<?php foreach($matkul as $key => $value) : ?>
							<option value="<?= $value->kode_matkul ?>"><?= $value->nama_matkul;?></option>
							<?php endforeach; ?>
						</select>
						</div>
                <input type="submit" value="Ubah" class="btn btn-success float-right">
				</div>
			</form>
							<?php } ?>
		</div>
	</div>
</div>
</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
</body>

</html>
