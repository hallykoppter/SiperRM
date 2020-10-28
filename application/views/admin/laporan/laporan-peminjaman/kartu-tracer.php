<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <p style="text-align:center"> TRACER PEMINJAMAN BERKAS REKAM MEDIS PUSKESMAS JENGGAWAH </p>
    <div class="content">
		<table border="1">
			<tr>
				<td width="130" height="40">Tanggal Pinjam</td>
				<td width="140">No RM</td>
				<td width="140">Nama</td>
				<td width="140">Poli</td>
				<td width="140">TTD</td>
			</tr>
			<?php for ($i = 0; $i < 19; $i++) : ?>
				<tr>
                <td height="50"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
				</tr>
			<?php endfor; ?>
	</div>
    </table>
</body>

</html>