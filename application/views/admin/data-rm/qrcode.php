<?php $qrCode = new Endroid\QrCode\QrCode($data_rm['0']['no_rm']);
header('Content-Type: ' . $qrCode->getContentType());
echo $qrCode->writeString();
