<a href="<?php echo base_url(''); ?>penanggungjawab-poli/input" class="tombolbtm btn btn-primary btn-sm">Tambah Penanggung Jawab Poli</a>
<?php echo $this->session->flashdata('Success'); ?>
<?php echo $this->session->flashdata('Delete'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<th>No</th>
		<th>Nama Penanggung Jawab</th>
		<th>Poli</th>
		<th>Aksi</th>
	</thead>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Nama Penanggung Jawab</th>
			<th>Poli</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<?php
			$num = 1;
			foreach ($penanggungjawabpoli as $pjp) { ?>
		<tr>
			<td><?= $num ?></td>
			<td><?= $pjp["nama_penanggungjawab"] ?></td>
			<td><?= $pjp["nama_poli"] ?></td>
			<td>
				<a href="<?= base_url('admin/data-master/penanggungjawabpoli/edit/' . $pjp['id_penanggungjawab']) ?>" class="btn btn-info btn-sm mr-2">UBAH</a>
				<a href="<?= base_url('admin/data-master/penanggungjawabpoli/delete/' . $pjp['id_penanggungjawab']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">HAPUS</a>
			</td>
		</tr>
	<?php
				$num++;
			} ?>
	</tr>
	</tbody>
</table>