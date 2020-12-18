<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .logo {
            width: 60px;
            height: 80px;
            position: absolute;
            left: 100px;
            top: 50px;
        }

        h1.kop {
            text-align: center;
            font-family: "Times New Roman";
            line-height: 2px;
            font-size: 14px;
        }

        h2.kop {
            text-align: center;
            font-family: "Times New Roman";
            line-height: 1px;
            font-size: 10px;
        }

        h1.judul {
            text-align: center;
            font-family: "Times New Roman";
            font-size: 12px;
        }

        table.tableisi {
            font-family: "Times New Roman";
            font-size: 12px;
            border-collapse: collapse;
            text-align: center;
        }

        .content {
            font-family: "Times New Roman";
            font-size: 12px;
            height: 800px;
        }

        hr {
            height: 2px;
            border: 2px;
            color: black;
        }

        .bawah {
            margin-top: 10px;
        }

        .bawah tr td {
            font-family: "Times New Roman";
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="Lambang_Jember.png">
    </div>
    <h1 class="kop">PEMERINTAH KABUPATEN JEMBER</h1>
    <h1 class="kop">DINAS KESEHATAN</h1>
    <h1 class="kop"><b>UPT. PUSKESMAS JENGGAWAH</b></h1>
    <h2 class="kop">Alamat : Jl. Kawi No. 139 Telp. (0331)757118 Kec. Jenggawah, kab. Jember </h2>
    <hr />
    <h1 class="judul">LAPORAN PEMUSNAHAN</h1>
    <br>
    <div class="content">
        <table border="1" class="tableisi" cellpadding="7">
            <tr>
                <th width="100" height="30">No RM</th>
                <th width="400">Diagnosa</th>
                <th width="150">Tanggal Kunjungan</th>
                <th width="150">Tanggal Pemindahan</th>
            </tr>
            <?php foreach ($pemusnahan as $p) : ?>
                <tr>
                    <td height="30"><?= $p['no_rm'] ?></td>
                    <td align="left"><?= $p['diagnosa'] ?></td>
                    <td><?php echo date('d M Y', strtotime($p['tanggal_kunjungan'])); ?></td>
                    <td><?php echo date('d M Y', strtotime($p['tanggal_pemusnahan'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <div class="bawah">
            <table border="0" style="border-collapse: collapse" align="right">
                <tr>
                    <td style="text-align: center">Jember, <?= date('d F Y') ?></td>
                </tr>
                <tr>
                    <td height="70px">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center"><u><?= $nama_kepala; ?></u></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?= $nip; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>