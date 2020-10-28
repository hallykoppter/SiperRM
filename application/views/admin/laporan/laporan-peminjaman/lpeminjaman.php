<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table.table1 {
            border-collapse: collapse;
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        .content {
            height: 800px;
        }
    </style>
</head>

<body>
    <h2>Laporan Peminjaman</h2>
    <div class="content">
        <table border="1" class="table1">
            <tr>
                <th width="100">No RM</th>
                <th width="300">Nama Pasien</th>
                <th width="150">Poli yang dituju</th>
                <th width="100">Tanggal Pinjam</th>
                <th width="150">TTD</th>
            </tr>
            <?php foreach ($peminjaman as $p) : ?>
                <tr>
                    <td height="50"><?= $p['no_rm'] ?></td>
                    <td><?= $p['nama_pasien'] ?></td>
                    <td><?= $p['nama_poli'] ?></td>
                    <td><?= $p['tanggal_pinjam'] ?></td>
                    <td></td>
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