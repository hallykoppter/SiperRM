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
            font-size: 14px;
            border-collapse: collapse;
            text-align: center;
        }

        table.tableatas {
            font-family: "Times New Roman";
            border-collapse: collapse;
            text-align: center;
            font-size: 14px;
        }

        .content {
            font-family: "Times New Roman";
            font-size: 14px;
            height: 800px;
            width: 100%;
        }

        hr {
            height: 2px;
            border: 2px;
            color: black;
        }

        .bawah {
            font-family: "Times New Roman";
            margin-top: 10px;
            width: 100%;
            font-size: 14px;
        }

        .bawah tr td {
            font-family: "Times New Roman";
            font-size: 14px;
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
    <h1 class="judul">BERITA ACARA PEMUSNAHAN BERKAS REKAM MEDIS INAKTIF</h1>
    <h1 class="judul">PUSKESMAS JENGGAWAH</h1>
    <br>
    <div class="content">
        <p>Dengan ini menerangkan terlebih dahulu : </p>
        <table border="o" class="tableatas" cellpadding="7">
            <tr>
                <th width="100" height="30"></th>
                <th width="700"></th>
            </tr>
            <tr>
                <td height="30">1</td>
                <td align="justify">Bahwa dalam rangka pemusnahan dokumen rekam medis inaktif sejak pasien berobat, telah dibentuk Tim Pemusnahan dokumen rekam medis yang mempunyai tugas untuk melaksanakan retensi dan pemusnahan dokumen rekam medis sebagaimana sesuai dengan kebijakan dan ketentuan yang berlaku.</td>
            </tr>
            <tr>
                <td height="30">2</td>
                <td align="justify">Bahwa pelaksanaan pemusnahan dokumen rekam medis tersebut mengacu pada Permenkes No. 269 tahun 2008 tentang Rekam Medis dan SK Kepala Puskesmas No. ............................... tentang retensi dan pemusnahan berkas rekam medis.</td>
            </tr>
        </table>
        <br>
        <p align="justify">atas dasar tersebut diatas, Tim Pemusnahan dokumen rekam medis Puskesmas Jenggawah kabupaten Jember telah melakukan pemusnahan dokumen rekam medis inaktif yang berusia 2 tahun atau lebih terhitung sejak tanggal pasien terkahir berobat. Jumlah dokumen rekam medis yang dimusnahkan sebanyak ................ dokumen rekam medis.</p>
        <br>
        <h1 class="judul" align="left">1 PELAKSANAAN</h1>
        <table border="o" class="tableisi" cellpadding="7">
            <tr>
                <th width="250"></th>
                <th width="50"></th>
                <th width="500"></th>
            </tr>
            <tr>
                <td align="left">Hari</td>
                <td>:</td>
                <td align="left"><?= $hari ?></td>
            </tr>
            <tr>
                <td align="left">Tanggal</td>
                <td>:</td>
                <td align="left"><?= $tanggal ?></td>
            </tr>
            <tr>
                <td align="left">Waktu</td>
                <td>:</td>
                <td align="left"><?= $waktu ?></td>
            </tr>
            <tr>
                <td align="left">Lokasi</td>
                <td>:</td>
                <td align="left"><?= $lokasi ?></td>
            </tr>
        </table>
        <br>
        <h1 class="judul" align="left">2 TIM RETENSI DAN PEMUSNAHAN</h1>
        <table border="o" class="tableisi" cellpadding="7">
            <tr>
                <th width="250"></th>
                <th width="50"></th>
                <th width="500"></th>
            </tr>
            <tr>
                <td align="left">a. Pelindung</td>
                <td>:</td>
                <td align="left"><?= $kepala_pkm ?></td>
            </tr>
            <tr>
                <td align="left">b. Ketua</td>
                <td>:</td>
                <td align="left"><?= $ketua ?></td>
            </tr>
            <tr>
                <td align="left">c. Sekretaris</td>
                <td>:</td>
                <td align="left"><?= $sekretaris ?></td>
            </tr>
            <tr>
                <td align="left">d. Pelaksana</td>
                <td>:</td>
                <td align="left"><?= $pelaksana1 ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td align="left"><?= $pelaksana2 ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td align="left"><?= $pelaksana3 ?></td>
            </tr>
        </table>
        <br>
        <h1 class="judul" align="left">3 TATA CARA</h1>
        <p align="justify">Tata cara retensi dan pemusnahan dokumen rekam medis sesuai dengan kebijakan dan prosedur (SOP Retensi dan SOP Pemusnahan rekam medis) yang berlaku di Puskesmas Jenggawah</p>
        <br>
    </div>
        <div class="bawah">
            <table border="0" style="border-collapse: collapse" align="right">
            <tr>
                <td style="text-align: center">Jember, <?= date('d F Y') ?></td>
            </tr>
            </table>
            <table border="0" style="border-collapse: collapse">
                <tr>
                    <td width="400px" align="center">Sekretaris</td>
                    <td width="400px" align="center">Ketua</td>
                </tr>
                <tr>
                    <td style="height: 70px;">&nbsp;</td>
                    <td style="height: 70px;">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><u><?= $sekretaris; ?></u></td>
                    <td align="center"><u><?= $ketua; ?></u></td>
                </tr>
                <tr>
                    <td align="center"><?= $nip_sekretaris?></td>
                    <td align="center"><?= $nip_ketua?></td>
                </tr>
            </table>
        </div>
        <div class="bawah">
            <table border="0" style="border-collapse: collapse" align="center">
                <tr>
                    <td style="text-align: center">Kepala Puskesmas</td>
                </tr>
                <tr>
                    <td style="height: 70px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center"><u><?= $kepala_pkm; ?></u></td>
                </tr>
                <tr>
                    <td style="text-align: center"><?= $nip_kepala; ?></td>
                </tr>
            </table>
        </div>
    
</body>

</html>