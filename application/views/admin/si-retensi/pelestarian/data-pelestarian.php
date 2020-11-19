<a href="<?= base_url('pelestarian/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Keterangan</th>
        <th>Status Scan</th>
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
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($pelestarian as $p) : ?>
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
                    <a title="Edit" href="<?php echo base_url('pelestarian/edit/' . $p['id_pelestarian']) ?>" class="btn btn-warning btn-sm" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
                    <a title="Hapus" href="<?php echo base_url('pelestarian/delete/' . $p['id_pelestarian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                    <button data-toggle="modal" data-target="#delete<?= $p['id_pelestarian']; ?>" class="btn btn-primary btn-sm">Upload scan</button>
                    <!-- <button type="button" title="Scan" class="badge badge-primary" onclick="scan();"><i class="fas fa-file-image"></i></button> -->
                </td>
            </tr>
        <?php endforeach; ?>


        <!-- ini modal -->
        <?php foreach ($pelestarian as $item) : ?>
            <div class="modal fade" id="delete<?= $item['id_pelestarian']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete<?= $item['id_pelestarian']; ?>Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- To do -->

                            <div class="row my-auto">
                                <div class="col-sm-10 pt-1 bg-info">
                                    <p class="text-sm-justify">Jika belum memiliki file hasil scan, silahkan scan menggunakan tombol di samping!
                                    </p>
                                </div>
                                <div class="col-sm-2 pt-4 mx-auto bg-primary">
                                    <button type="button" title="Scan" class="btn btn-info btn-sm" onclick="scan();">SCAN</button>
                                </div>
                            </div>
                            <hr>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Pilih file</label>
                                </div>

                            </form>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a type="button" class="btn btn-primary" href="<?= base_url('admin/si-retensi/pelestarian/upload_scan') . $item['id_pelestarian']; ?>">Upload</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal delete -->

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