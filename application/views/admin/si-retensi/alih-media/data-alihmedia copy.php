<style>
    #dialog-enable-scan {
        display: none;
        position: fixed;
        z-index: 1000;
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
        min-height: 10em;
        width: 60%;
        top: 5em;
        background-color: #f8efc0;
        padding: 32px;
        border-radius: 8px;
        font-family: Arial, Helvetica, sans-serif;
    }

    #dialog-ready-to-scan {
        display: none;
        position: fixed;
        z-index: 2000;
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
        min-height: 8em;
        width: 40%;
        top: 5em;
        background-color: #27AE60;
        padding: 32px;
        border-radius: 8px;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        text-align: center;
    }
</style>
<script>
    window.scannerjs_config = {
        // specify a func(Boolean show) to be called to show/hide scan app prompt dialog
        display_install_func: function(show) {
            console.log("Display enabling scan app dialog? " + show);
            if (show) {
                $('#dialog-enable-scan').show(500);
            } else {
                $('#dialog-enable-scan').hide();
            }
            // return true; // 'return true' to continue the default behavior of showing/hiding the standard dialog
        },

        // specify a func() to be called upon scanning is enabled
        display_scan_ready_func: function() {
            console.log("Ready to scan.");
            $('#dialog-ready-to-scan').show().delay(1500).fadeOut();
        }
    };
</script>
<!--<script src="https://asprise.azureedge.net/scannerjs/scanner.js" type="text/javascript"></script>-->
<script src="http://asprise.azureedge.net/scannerjs/scanner.js" type="text/javascript"></script>

<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    //
    // Please read scanner.js developer's guide at: http://asprise.com/document-scan-upload-image-browser/ie-chrome-firefox-scanner-docs.html
    //

    /** Initiates a scan */
    function scanToJpg() {
        scanner.scan(displayImagesOnPage, {
            "output_settings": [{
                "type": "return-base64",
                "format": "jpg"
            }]
        });
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
            processScannedImage(scannedImage);
        }
    }

    /** Images scanned so far. */
    var imagesScanned = [];

    /** Processes a ScannedImage */
    function processScannedImage(scannedImage) {
        imagesScanned.push(scannedImage);
        var elementImg = scanner.createDomElementFromModel({
            'name': 'img',
            'attributes': {
                'class': 'scanned',
                'src': scannedImage.src
            }
        });
        document.getElementById('images').appendChild(elementImg);
    }

    // Function Upload Image
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

<style>
    img.scanned {
        height: 200px;
        /** Sets the display size */
        margin-right: 12px;
    }

    div#images {
        margin-top: 20px;
    }
</style>




<div id="dialog-enable-scan">
    <h1>Please enable scan app</h1>
    <p>1) <a class="underline" href="http://asprise.azureedge.net/scanapp/scan-setup.exe" target="_blank" text="Click here to download the setup file.">Click here to download the setup file</a>; 2) Double click to run; 3) Complete the setup.</p>
    <p><span text="Already have the scan app set up? ">Already have the scan app set up? </span><a class="underline" href="AspriseWebScan://browser" target="_top" text="Click here to enable it.">Click here to enable it.</a></p>
</div>

<div id="dialog-ready-to-scan">
    <h1>Ready to scan!</h1>
</div>

<button type="button" class="btn btn-primary" onclick="scanToJpg();">Scan</button>

<form class="form1" id="form1" action="http://asprise.com/scan/applet/upload.php?action=dump" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="sample-field" id="sample-field" value="<?= $no_rm; ?>" readonly>
        <button type="submit" class="btn btn-primary" onclick="submitFormWithScannedImages();">Upload</button>
    </div>
</form>

<div id="server_response"></div>
<div id="images"></div>

<!-- HELP_LINKS_START help links at the bottom -->
<style>
    .asprise-footer,
    .asprise-footer a:visited {
        font-family: Arial, Helvetica, sans-serif;
        color: #999;
        font-size: 13px;
    }

    .asprise-footer a {
        text-decoration: none;
        color: #999;
    }

    .asprise-footer a:hover {
        padding-bottom: 2px;
        border-bottom: solid 1px #9cd;
        color: #06c;
    }
</style>
<!-- <div class="asprise-footer" style="margin-top: 48px;">
        <a href="http://asprise.com/document-scan-upload-image-browser/direct-to-server-php-asp.net-overview.html" target="_blank" title="Opens in new tab">Scanner.js Homepage</a> |
        <a href="http://asprise.com/scan/scannerjs/docs/html/scannerjs-javascript-guide.html" target="_blank" title="Opens in new tab">Developer's Guide to ScannerJs</a> |
        <a href="https://github.com/Asprise/scannerjs.javascript-scanner-access-in-browsers-chrome-ie.scanner.js" target="_blank" title="Opens in new tab">Sample code on Github</a>
    </div> -->
<!-- HELP_LINKS_END -->