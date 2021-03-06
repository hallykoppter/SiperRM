<a href="<?= base_url('pemusnahan/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Status Scan</th>
        <th>Hasil Upload</th>
        <th>Action</th>
    </thead>
    <tfoot>
        <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Status Data</th>
            <th>Status Scan</th>
            <th>Hasil Upload</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($pemusnahan as $p) : ?>
            <tr>
                <td><?= $p['no_rm'] ?></td>
                <td><?= $p['nama_pasien'] ?></td>
                <td><?= $p['diagnosa'] ?></td>
                <td>
                    <?php if ($p['tanggal_pemusnahan'] == "0000-00-00") : ?>
                        In Aktif
                    <?php else : ?>
                        <?php if ($p['selisih'] >= "730") : ?>
                            Dimusnahkan
                        <?php else : ?>
                            In Aktif
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($p['scan'] == "0") : ?>
                        Belum Scan
                    <?php else : ?>
                        Sudah Scan
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($p['scan'] == 1) : ?>
                        <a href="<?php echo base_url("pemusnahan/hasilscan/") . $p["id_pemusnahan"] ?>" class="btn btn-success btn-sm"><span> Lihat Berkas</span></a>
                    <?php else: ?>
                    <?php endif; ?> 
                </td>
                <td>
                    <a title="Edit" href="<?php echo base_url('pemusnahan/edit/' . $p['id_pemusnahan']) ?>" class="btn btn-warning btn-sm" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
                    <a title="Hapus" href="<?php echo base_url('pemusnahan/delete/' . $p['id_pemusnahan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $p['id_pemusnahan'] ?>">Upload Scan</button>
                </td>
            </tr>
        <?php endforeach; ?>

    <!-- Button trigger modal -->


    <?php foreach ($pemusnahan as $p) : ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $p['id_pemusnahan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-2">
                            <!-- <div class="row">
                                <div class="col-sm-10 pt-1 bg-info">
                                    <p class="text-sm-justify">Jika belum memiliki file hasil scan, silahkan scan menggunakan tombol di samping!
                                    </p>
                                </div>
                                <div class="col-sm-2 pt-4 mx-auto bg-primary">
                                    <button type="button" title="Scan" class="btn btn-info btn-sm" onclick="scan();">SCAN</button>
                                </div>
                            </div>
                            <hr> -->
                            <div class="row">
                                <div class="bg-success col-md-12">
                                    <p class="pt-2 text-sm-justify">Silahkan upload file disini</p>
                                </div>
                                <div class="col-sm-12 mb-3 py-2 bg-light">
                                    <form action="<?= base_url('pemusnahan/upload_scan/') . $p['id_pemusnahan'] ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row justify-content-between">
                                            <input type="file" id="image" name="image" required>
                                            <button class="btn btn-primary" type="submit">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>


        <div id="images" /> <!-- Displays scanned images  -->

        <script type="text/javascript">
            // Need to upload scanned images to server or save them on hard disk? Please refer to the dev guide: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
            // For more scanning code samples, please visit https://github.com/Asprise/scannerjs.javascript-scanner-access-in-browsers-chrome-ie.scanner.js

            var scanRequest = {
                "use_asprise_dialog": true, // Whether to use Asprise Scanning Dialog
                "show_scanner_ui": false, // Whether scanner UI should be shown
                "twain_cap_setting": { // Optional scanning settings
                    "ICAP_PIXELTYPE": "TWPT_RGB" // Color
                },
                "output_settings": [{
                    "type": "return-base64",
                    "format": "jpg"
                }]
            };

            /** Triggers the scan */
            function scan() {
                scanner.scan(displayImagesOnPage, scanRequest);
            }

            /** Processes the scan result */
            function displayImagesOnPage(successful, mesg, response) {
                if (!successful) { // On error
                    console.error('Failed: ' + mesg);
                    return;
                }
                if (successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
                    console.info('User cancelled');
                    return;
                }
                var scannedImages = scanner.getScannedImages(response, true, false); // returns an array of ScannedImage
                for (var i = 0;
                    (scannedImages instanceof Array) && i < scannedImages.length; i++) {
                    var scannedImage = scannedImages[i];
                    var elementImg = scanner.createDomElementFromModel({
                        'name': 'img',
                        'attributes': {
                            'class': 'scanned',
                            'src': scannedImage.src
                        }
                    });
                    (document.getElementById('images') ? document.getElementById('images') : document.body).appendChild(elementImg);
                }
            }
        </script>
    </tbody>
</table>