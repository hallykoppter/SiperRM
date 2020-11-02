<?php
		require 'vendor/autoload.php';
		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		echo $generator->getBarcode($data_rm[0]['no_rm'], $generator::TYPE_CODE_128);
?>
<br>
<?= $data_rm[0]['nama_pasien'] ?>