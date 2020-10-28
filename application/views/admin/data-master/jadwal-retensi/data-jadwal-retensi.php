<?php echo $this->session->flashdata('Success'); ?>
<?php echo $this->session->flashdata('Delete'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Jadwal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($jadwal as $j) { ?>
			<tr>
				<td><?= date('d M Y', strtotime($j['tanggal'])) ?></td>
				<td><a href="<?= base_url('admin/data-master/jadwalretensi/ubah/' . $j['id_jadwal']) ?>" class="btn btn-info btn-sm">UBAH</a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>