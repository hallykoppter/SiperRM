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

        table.table1 {
            border-collapse: collapse;
            text-align: center;
        }

        .content {
            height: 800px;
        }

        hr {
            height: 2px;
            border: 2px;
            color: black;
        }

        .lap {
            text-align: center;
            font-family: Times New Roman;
            line-height: 2px;
            font-size: 16px;
        }

        .bawah {
            font-family: 'Times New Roman';
            font-size: 12px;
            position: relative;
            right: 5%;
            bottom: 5%;
            text-align: center;
        }

        .logo {
            width: 60PX;
            height: 80px;
            position: absolute;
            left: 100px;
            top: 50px;
        }

        td {
            margin-left: 6px;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="logo_jember.png">
    </div>
    <h1 class="judul">PEMERINTAH KABUPATEN JEMBER</h1>
    <h1 class="judul">DINAS KESEHATAN</h1>
    <h1 class="judul"><b>UPT. PUSKESMAS JENGGAWAH</b></h1>
    <h2 class="judul">Alamat : Jl. Kawi No. 139 Telp. (0331)757118 Kec. Jenggawah, kab. Jember </h2>
    <hr />
    <h1 class="lap"><b>Laporan Peminjaman dan Kelengkapan Berkas Rekam Medis </b></h1>
    <br>
    <div class="content">
        <table border="1" class="table1" cellpadding="7">
            <tr>
                <th width="100">No RM</th>
                <th width="300">Nama Pasien</th>
                <th width="150">Poli yang dituju</th>
                <th width="100">Tanggal Pinjam</th>
                <th width="150">Keterlambatan (hr)</th>
                <th width="150">Keterangan</th>
                <th width="150">Kelengkapan</th>
            </tr>
            <?php foreach ($peminjaman as $p) : ?>
                <tr>
                    <td height="50"><?= $p['no_rm'] ?></td>
                    <td align="left"><?= $p['nama_pasien'] ?></td>
                    <td><?= $p['nama_poli'] ?></td>
                    <td><?= $p['tanggal_pinjam'] ?></td>
                    <td><?= $p['keterlambatan'] ?></td>
                    <td><?= $p['keterangan'] ?></td>
                    <td><?= $p['kelengkapan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <br>
    <div class="bawah">
        <table border="0" align="right">
            <tr>
                <td>Jember, <?= date('d-m-Y') ?></td>
            </tr>
            <tr>
                <td height="100px">&nbsp;</td>
            </tr>
            <tr>
                <td td style="text-align: center"><u><?= $nama_kepala; ?></td></u>
            </tr>
            <tr>
                <td td style="text-align: center"><?= $nip; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>