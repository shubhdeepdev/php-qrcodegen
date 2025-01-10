<?php

// Include Composer's autoloader
require_once 'vendor/autoload.php';

use GoLiveHost\QRCodeGen\QRCodeGenerator;

// Instantiate the QRCodeGenerator class
$golivehost = new QRCodeGenerator();

// Set data to encode in the QR code
$golivehost->setData('Sample data for the QR code');

// Set QR code size
$golivehost->setSize('300x300');

// Do not set any label for the QR code
$golivehost->saveQR('qr_code_without_label.png');

echo "QR code without label saved as qr_code_without_label.png\n";
