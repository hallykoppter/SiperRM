<script src="http://asprise.azureedge.net/scannerjs/scanner.js" type="text/javascript"></script>

<a href="<?= base_url('pelestarian/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Keterangan</th>
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
            <th>Keterangan</th>
            <th>Status Scan</th>
            <th>Hasil Upload</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($pelestarian as $p) { ?>
            <tr>
                <td><?= $p['no_rm'] ?></td>
                <td><?= $p['nama_pasien'] ?></td>
                <td><?= $p['diagnosa'] ?></td>
                <td>
                    <?php if ($p['tanggal_pelestarian'] == "0000-00-00") : ?>
                        In Aktif
                    <?php else : ?>
                        <?php if ($p['selisih'] >= "730") : ?>
                            Dilestarikan
                        <?php else : ?>
                            In Aktif
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td><?= $p['keterangan'] ?></td>
                <td>
                    <?php if ($p['scan'] == "0") : ?>
                        Belum Scan
                    <?php else : ?>
                        Sudah Scan
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($p['scan'] == "1") : ?>
                        <a href="<?php echo base_url("pelestarian/hasilscan/") . $p["id_pelestarian"] ?>" class="btn btn-success btn-sm"><span> Lihat Berkas</span></a>
                    <?php else : ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a title="Edit" href="<?php echo base_url('pelestarian/edit/' . $p['id_pelestarian']) ?>" class="btn btn-warning btn-sm" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
                    <a title="Hapus" href="<?php echo base_url('pelestarian/delete/' . $p['id_pelestarian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                    <form action="<?= base_url('alih-media'); ?>" method="POST">
                        <input type="hidden" class="form-group" name="id_pelestarian" id="id_pelestarian" value="<?= $p['id_pelestarian']; ?>">
                        <input type="hidden" class="form-group" name="no_rm" id="no_rm" value="<?= $p['no_rm']; ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Scan dan Upload</button>
                    </form>
                    <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $p['id_pelestarian'] ?>">Upload Scan</button> -->
                </td>
            </tr>
        <?php } ?>


        <!-- Button trigger modal -->


        <?php foreach ($pelestarian as $p) : ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $p['id_pelestarian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-2">
                            <div class="row">
                                <div class="col-sm-10 pt-1 bg-info">
                                    <p class="text-sm-justify">Jika belum memiliki file hasil scan, silahkan scan menggunakan tombol di samping!
                                    </p>
                                </div>
                                <div class="col-sm-2 pt-4 mx-auto bg-primary">
                                    <button type="button" title="Scan" class="btn btn-info btn-sm" onclick="scan();">SCAN</button>

                                    <form id="form1" action="<?= base_url('hasilscanlagi') . $p['no_rm']; ?>" method="POST" enctype="multipart/form-data" target="_blank">
                                        <input type="hidden" id="sample-field" name="sample-field" value="Test scan" />
                                        <button type="button" title="upload" class="btn btn-info btn-sm" onclick="submitFormWithScannedImages();">Upload</button>
                                    </form>

                                </div>
                                <div id="server_response"></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="bg-success col-md-12">
                                    <p class="pt-2 text-sm-justify">Silahkan upload file disini</p>
                                </div>
                                <div class="col-sm-12 mb-3 py-2 bg-light">
                                    <form action="<?= base_url('pelestarian/upload_scan/') . $p['id_pelestarian'] ?>" method="POST" enctype="multipart/form-data">
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

            function submitFormWithScannedImages() {
                if (scanner.submitFormWithImages('form1', imagesScanned, function(xhr) {
                        if (xhr.readyState == 4) { // 4: request finished and response is ready
                            document.getElementById('server_response').innerHTML = "<h2>Response from the server: </h2>" + xhr.responseText;
                            document.getElementById('images').innerHTML = ''; // clear images
                            imagesScanned = [];
                        }
                    })) {
                    document.getElementById('server_response').innerHTML = "Submitting, please stand by ...";
                } else {
                    document.getElementById('server_response').innerHTML = "Form submission cancelled.";
                }
            }
        </script>
    </tbody>
</table>