<a href="<?php echo base_url('retensi-add'); ?>" class="btn btn-primary float-right">Tambah Data Retensi</a>
<form method="post" action="<?php echo base_url('retensi-post'); ?>">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<th>#</th>
			<th>No RM</th>
			<th>Nama Pasien</th>
			<th>Diagnosa</th>
			<th>Jenis Pelayanan</th>
			<th>Status Pelayanan</th>
			<th>Status Data</th>
			<th>Action</th>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>No RM</th>
				<th>Nama Pasien</th>
				<th>Diagnosa</th>
				<th>Jenis Pelayanan</th>
				<th>Status Pelayanan</th>
				<th>Status Data</th>
				<th>Action</th>
			</tr>
		</tfoot>
		<tbody>
			<?php $nomer = 1; ?>
			<?php foreach ($retensi as $r) : 
			
				$explode = explode('-', date('Y-m-d', strtotime($r["tanggal_pinjam"])));
				$tahun = $explode[0];
				$bulan = $explode[1];
				$tanggal = $explode[2];
				$tgl_pinjam = $tanggal."/".$bulan."/".$tahun;
				// echo ($tgl_pinjam);
				?>
				<tr>
					<td><?= $nomer; ?></td>
					<td><?php echo $r['no_rm'] ?></td>
					<td><?php echo $r['nama_pasien'] ?></td>
					<td><?php echo $r['diagnosa'] ?></td>
					<td><?php echo $r['jenis_pelayanan'] ?></td>
					<?php if ($r['nama_status'] == "Kembali") : ?>
						<td>
							<div class="badge badge-success"><?php echo $r['nama_status'] ?></div>
						</td>
						<td>
							<div class="badge badge-danger">Nonaktif</div>
						</td>
					<?php else : ?>
						<td>
							<div class="badge badge-danger"><?php echo $r['nama_status'] ?></div>
						</td>
						<td>
							<input type="checkbox" name="status_data[]" value="<?php echo $r['id_permintaan'] ?>">
						</td>
					<?php endif; ?>
					<td>
						<a title="Edit" href="<?= base_url('retensi-update/' . $r['id_permintaan']) ?>" class="badge badge-warning" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
						<a title="Hapus" href="<?= base_url('retensi-delete/' . $r['id_permintaan']) ?>" onclick="return confirm('yakin ingin menghapus data?')" class="badge badge-danger"><i class="fa fa-trash"></i></a>
						<a title="KIRIM PESAN" href="https://wa.me/?text=Pesan%20dari%20Puskesmas%20Jenggawah%20:%20Mengingatkan%20bahwa%20data%20rekam%20medis%20pasien%20dengan%20no%20rm%20<?php echo $r["no_rm"];?>,%20Atas%20Nama%20<?php echo $r["nama_pasien"];?>%20di%20<?php echo $r["nama_poli"];?>%20Tanggal%20Pinjam%20<?php echo $tgl_pinjam;?>.%20Mohon%20harap%20segera%20diretensi.%20Terima%20Kasih." target="_blank" class="badge badge-success"><i class="fa fa-whatsapp"></i></a>
					</td>
				</tr>
				<?php $nomer++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<button type="submit" name="hapus_data" class="btn btn-danger">Hapus Data Terpilih</button>
</form>