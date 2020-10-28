<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1.judul {
            text-align: center;
        }

        table.tableisi {
            border-collapse: collapse;
            text-align: center;
        }

        .content {
            height: 800px;
        }
    </style>
</head>

<body>
    <h1 class="judul">Laporan Retensi</h1>
    <div class="content">
        <table border="1" class="tableisi">
            <tr>
                <th width="100">No RM</th>
                <th width="250">Diagnosa</th>
                <th width="200">Tanggal Kunjungan</th>
                <th width="200">Tanggal Pemindahan</th>
            </tr>
            <?php foreach ($retensi as $r) : ?>
                <tr>
                    <td height="30"><?= $r['no_rm'] ?></td>
                    <td><?= $r['diagnosa'] ?></td>
                    <td><?= $r['tanggal_kunjungan'] ?></td>
                    <td><?= $r['tanggal_pemindahan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <table border="0" style="border-collapse: collapse;margin-top: 10px" align="right">
        <tr>
            <td>Jember, <?= date('d-m-Y') ?></td>
        </tr>
        <tr>
            <td height="90px">&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center"><?= $nama_kepala; ?></td>
        </tr>
    </table>
</body>

</html>