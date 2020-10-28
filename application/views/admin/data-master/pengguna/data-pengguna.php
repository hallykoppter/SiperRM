<a href="<?php echo base_url(''); ?>pengguna/input" class="tombolbtm btn btn-primary btn-sm">Tambah Data Pengguna</a>
<?php echo $this->session->flashdata('Success'); ?>
<?php echo $this->session->flashdata('Delete'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<th>NO</th>
		<th>NAMA LENGKAP</th>
		<th>JENIS KELAMIN</th>
		<th>NO HP</th>
		<th>USERNAME</th>
		<th>LEVEL</th>
		<th>STATUS</th>
		<th>AKSI</th>
	</thead>
	<tfoot>
		<tr>
			<th>NO</th>
			<th>NAMA LENGKAP</th>
			<th>JENIS KELAMIN</th>
			<th>NO HP</th>
			<th>USERNAME</th>
			<th>LEVEL</th>
			<th>STATUS</th>
			<th>AKSI</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
		$num = 1;
		foreach ($pengguna as $usr) { ?>
			<tr>
				<td><?= $num ?></td>
				<td><?= $usr["nama_lengkap"] ?></td>
				<td><?= $usr["jenis_kelamin"] ?></td>
				<td><?= $usr["no_hp"] ?></td>
				<td><?= $usr["username"] ?></td>
				<td><?= $usr["level"] ?></td>
				<td>
					<?php
					if ($usr["status_aktif"] == "1") {
						echo "<a class='btn btn-success btn-sm changeStatus' data-id='" . $usr['id_pengguna'] . "'>aktif</a";
					} else
						echo "<a class='btn btn-danger btn-sm changeStatus' data-id='" . $usr['id_pengguna'] . "'>non aktif</a";

					?>
				</td>
				<div>

				</div>
				<td>
					<a href="<?= base_url('admin/data-master/pengguna/delete/' . $usr['id_pengguna']) ?>" class="btn btn-danger btn-sm">HAPUS</a>
					<!-- </td>div class="btn btn-danger btn-sm">Hapus</div> -->
				</td>
			</tr>
		<?php
			$num++;
		} ?>
	</tbody>
</table>
