<script src="https://asprise.azureedge.net/scannerjs/scanner.js"></script>
<script src="<?= base_url('assets/scannerjs/scanner.js'); ?>"></script>


<script>
    //
    // Please read scanner.js developer's guide at: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
    //

    /** Initiates a scan */
    function scanToLocalDisk() {
        scanner.scan(displayResponseOnPage, {
            "output_settings": [{
                "type": "save",
                "format": "jpg",
                "save_path": "C:\\Scanned_Result\\<?= $no_rm; ?>${EXT}"
            }]
        });
    }

    function displayResponseOnPage(successful, mesg, response) {
        if (!successful) { // On error
            document.getElementById('response').innerHTML = 'Failed: ' + mesg;
            return;
        }

        if (successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
            document.getElementById('response').innerHTML = 'User cancelled';
            return;
        }

        document.getElementById('response').innerHTML = scanner.getSaveResponse(response);
    }
</script>

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-9">
            <div class="card bg-success">
                <div class="card-body">
                    <p class="card-text">Belum mempunyai file hasil scan? silahkan scan dengan klik tombol di bawah</p>
                    <hr>
                    <button class="btn btn-primary" type="button" onclick="scanToLocalDisk();">Scan</button>
                    <div class="bg-danger text-white mt-2 pl-2" id="response"></div>
                </div>
            </div>
            <form action="<?= base_url('pelestarian/upload_scan'); ?>" method="POST" id="form1" name="form1" enctype="multipart/form-data">
                <div class="form-row align-items-center mt-3">
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <style>
                                    .input {
                                        display: inline-block;
                                        border: 1px solid #ccc;
                                        padding: 6px 12px;
                                        cursor: pointer;
                                    }
                                </style>
                                <input type="file" class="input" name="file" id="file" onchange="tampilkanPreview(this, 'preview')">
                            </div>
                        </div>
                        <input type="hidden" name="id_pelestarian" id="id_pelestarian" value="<?= $id_pelestarian; ?>">
                        <input type="text" class="form-control mb-2" name="sample-field" id="sample-field" value="<?= $no_rm; ?>" readonly>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2 py-4">Upload</button>
                    </div>
                </div>
            </form>
        </div>
        <style>
            .image:hover {
                transform: scale(1.5);
            }
        </style>
        <div class="col-lg-3 border">
            <div class="row justify-content-center">
                <img class="image" id="preview" width="180px"></img>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function tampilkanPreview(userfile, idpreview) {
        var gb = userfile.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }
</script>