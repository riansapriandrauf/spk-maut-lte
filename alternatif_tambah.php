<div class="page-header">
	<h1>Tambah Alternatif</h1>
</div>
<div class="row">
	<div class="col-sm-6">
		<?php if($_POST) include'aksi.php'?>
		<form method="post">
			<div class="form-group">
				<label>Kode <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="kode" value="<?=$_POST['kode']?>"/>
			</div>
			<div class="form-group">
				<label>Nama Alternatif <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nama" value="<?=$_POST['nama']?>"/>
			</div>
			<div class="form-group">
				<label>Tempat Lahir <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="tempat_lahir" value="<?=$_POST['tempat_lahir']?>"/>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir <span class="text-danger">*</span></label>
				<input class="form-control" type="date" name="tanggal_lahir" value="<?=$_POST['tanggal_lahir']?>"/>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"><?=$_POST['alamat']?></textarea>
			</div>
			<div class="form-group">
				<label>Posisi <span class="text-danger">*</span></label>
				<select class="form-control" name="posisi">
					<option>Helper Mekanik</option>
					<option>Driver</option>
					<option>OP Excavator</option>
				</select>
			</div>
			<div class="form-group">
				<label>No HP <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="no_hp" value="<?=$_POST['no_hp']?>"/>
			</div>
			<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</form>
	</div>
</div>