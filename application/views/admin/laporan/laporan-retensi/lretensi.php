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
            font-family: Times New Roman;
            font-size: 12px;
            height: 800px;
        }

        hr {
            height: 2px;
            border: 2px;
            color: black;
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
    <h1 class="judul" font-size="12px" height="10px">LAPORAN RETENSI REKAM MEDIS RAWAT JALAN</h1>
    <div class="content">
        <table border="1" class="tableisi">
            <tr>
                <th width="100">No RM</th>
                <th width="400">Diagnosa</th>
                <th width="150">Tanggal Kunjungan</th>
                <th width="150">Tanggal Pemindahan</th>
            </tr>
            <?php foreach ($retensi as $r) : ?>
                <tr>
                    <td height="30"><?= $r['no_rm'] ?></td>
                    <td align="left"><?= $r['diagnosa'] ?></td>
                    <td><?= $r['tanggal_kunjungan'] ?></td>
                    <td><?= $r['tanggal_pemindahan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="bawah">
        <table border="0" style="border-collapse: collapse" align="right">
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