<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		h1.judul {
            text-align: center;
			font-family: Times New Roman;
			line-height: 2px;
			font-size: 14px;
        }
		h2.judul {
			text-align: center;
			font-family: Times New Roman;
			line-height: 1px;
			font-size: 10px;
		}

        table.tableisi {
            border-collapse: collapse;
            text-align: center;
        }

        .content {
            height: 800px;
            font-family: Times New Roman;
            font-size: 12px;
        }
		hr {
			height: 2px;
			border:2px;
			color: black;
		}
        .bawah{
            position: absolute;
            right: 5%;
            bottom: 5%;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="judul">PEMERINTAH KABUPATEN JEMBER</h1>
	<h1 class="judul">DINAS KESEHATAN</h1>
	<h1 class="judul"><b>UPT. PUSKESMAS JENGGAWAH</b></h1>
	<h2 class="judul">Alamat : Jl. Kawi No. 139 Telp. (0331)757118 Kec. Jenggawah, kab. Jember </h2>
	<hr />
    <h1 class="judul" font-size="12px" height="10px">LAPORAN PELESTARIAN</h1>
    <div class="content">
        <table border="1" class="tableisi">
            <tr>
                <th width="70">No RM</th>
                <th width="300">Diagnosa</th>
                <th width="150">Tanggal Kunjungan</th>
                <th width="150">Tanggal Pelestarian</th>
                <th width="130">Keterangan</th>
            </tr>
            <?php foreach ($pelestarian as $p) : ?>
                <tr>
                    <td height="30"><?= $p['no_rm'] ?></td>
                    <td align="left"><?= $p['diagnosa'] ?></td>
                    <td><?= $p['tanggal_kunjungan'] ?></td>
                    <td><?= $p['tanggal_pelestarian'] ?></td>
                    <td><?= $p['keterangan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="bawah">
        <table border="0" style="border-collapse: collapse;margin-top: 5px" align="right">
            <tr>
                <td>Jember, <?= date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td height="70px">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center"><?= $nama_kepala; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>