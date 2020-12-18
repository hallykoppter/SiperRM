<a href="<?php echo base_url(''); ?>data-sosial-pasien/input" class="tombolbtm btn btn-primary btn-sm">Tambah Data Pasien</a>
<?php echo $this->session->flashdata('Success'); ?>
<?php echo $this->session->flashdata('Delete'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<th>NO</th>
		<th>NO RM</th>
		<th>NAMA PASIEN</th>
		<th>JENIS KELAMIN</th>
		<th>TGL LAHIR</th>
		<!-- <th>UMUR</th> -->
		<th>ALAMAT</th>
		<th>STATUS DATA</th>
		<th>AKSI</th>
	</thead>
	<tfoot>
		<tr>
			<th>NO</th>
			<th>NO RM</th>
			<th>NAMA PASIEN</th>
			<th>JENIS KELAMIN</th>
			<th>TGL LAHIR</th>
			<!-- <th>UMUR</th> -->
			<th>ALAMAT</th>
			<th>STATUS DATA</th>
			<th>AKSI</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
		$num = 1;
		foreach ($pasien as $psn) { ?>
			<tr>
				<td><?= $num ?></td>
				<td><?= $psn["no_rm"] ?></td>
				<td><?= $psn["nama_pasien"] ?></td>
				<td><?= $psn["jenis_kelamin"] ?></td>
				<td><?= $psn["tgl_lahir"] ?></td>
				<td><?= $psn["alamat"] ?></td>
				<td>
					<?php
					if ($psn["status_aktif"] == "1") {
						echo "<div class='btn btn-success btn-sm'>Aktif</div";
					} else
						echo "<div class='btn btn-danger btn-sm'>InAktif</div";

					?>
				</td>
				<td>
					<a href="<?= base_url('admin/data-master/datasosialpasien/delete/' . $psn['no_urut']) ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash sm"></i></a>
					<a href="<?= base_url('admin/data-master/datasosialpasien/edit/' . $psn['no_urut']) ?>" class="btn btn-primary btn-sm">Edit</a></td>
				</td>
			</tr>
		<?php
			$num++;
		} ?>
	</tbody>
</table>