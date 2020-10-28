<a href="<?php echo base_url(''); ?>poli/input" class="tombolbtm btn btn-primary btn-sm">Tambah Data Poli</a>
<?php echo $this->session->flashdata('Success'); ?>
<?php echo $this->session->flashdata('Delete'); ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<th>NO</th>
		<th>DATA POLI</th>
		<th>AKSI</th>
	</thead>
	<tfoot>
		<tr>
			<th>NO</th>
			<th>DATA POLI</th>
			<th>AKSI</th>
		</tr>
	</tfoot>
	<tbody>
		<?php
		$num = 1;
		foreach ($poli as $pli) { ?>
			<tr>
				<td><?= $num ?></td>
				<td><?= $pli["nama_poli"] ?></td>
				<td>
					<a href="<?= base_url('admin/data-master/poli/delete/' . $pli['id_poli']) ?>" class="btn btn-danger btn-sm mr-2">HAPUS</a>
					<a href="<?= base_url('admin/data-master/poli/edit/' . $pli['id_poli']) ?>" class="btn btn-info btn-sm">UBAH</a>
				</td>
				<!-- <td><?= anchor('poli/hapus/' . $pli->id_poli, 'HAPUS'); ?></td> -->
			</tr>
		<?php
			$num++;
		} ?>
	</tbody>
</table>