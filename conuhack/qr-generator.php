<?php
require_once 'vendor/autoload.php';
use Endroid\QrCode\QrCode;

if (isset($_POST['qr_text'])) {
    $qrText = $_POST['qr_text'];

    // Create a new QR code
    $qrCode = new QrCode($qrText);

    // Set the size of the QR code
    $qrCode->setSize(300);

    // Set the image format (png, jpeg, gif)
    $qrCode->setWriterByName('png');

    //Save the QR code image to server
    $qrCode->save('qrcode.png');

    echo "QR code saved as qrcode.png in the server";
}
?>
