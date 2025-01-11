<?php

// Include Composer's autoloader
require_once 'vendor/autoload.php';

use GoLiveHost\QRCodeGen\QRCodeGenerator;

// Record the start time
$startTime = microtime(true);

// Instantiate the QRCodeGenerator class
$golivehost = new QRCodeGenerator();

// Set data to encode in the QR code
$golivehost->setData('Sample data for the QR code');

// Set QR code size
$golivehost->setSize('300x300');

// Save the generated QR code
$golivehost->saveQR('qr_code.png');

// Record the end time
$endTime = microtime(true);

// Calculate the time taken in seconds
$timeTaken = $endTime - $startTime;

// Calculate speed (in seconds per task, for simplicity)
$speed = round($timeTaken, 4);

// Output HTML and performance details with some CSS for styling
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>QR Code Generation Speed Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .output {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .qr-image {
            display: block;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .speed-info {
            font-size: 1.1em;
            color: #555;
        }
        .highlight {
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class='container'>
    <h1>QR Code Generation Speed Test</h1>
    <div class='output'>
        <p class='speed-info'>Time taken to generate the QR code: <span class='highlight'>{$timeTaken} seconds</span></p>
        <p class='speed-info'>Speed: <span class='highlight'>{$speed} seconds</span></p>
        <p class='speed-info'>Performance: Generated QR code in <span class='highlight'>{$speed} seconds</span></p>
    </div>
    <img src='qr_code.png' alt='Generated QR Code' class='qr-image'>
</div>

</body>
</html>
";
?>
