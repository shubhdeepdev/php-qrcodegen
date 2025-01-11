# GoLiveHost PHP QR Code Generator

**GoLiveHost PHP QR Code Generator** is a simple PHP library designed to easily generate QR codes using the GoLive.host QR Generator API.

### Requirements

- **cURL** extension enabled in PHP
- **PHP version**: 7.3 or higher (compatible with PHP 8.0+)

## Installation

To install this library, use Composer. Run the following command:

```
composer require golivehost/php-qrcodegen
```

This will download and install the library and its dependencies into your project.

## Usage

### Example 1: Generate QR Code with Label

This example demonstrates how to generate a QR code with a label below it.

```php
<?php

// Include Composer's autoloader
require 'vendor/autoload.php';

use GoLiveHost\QRCodeGen\QRCodeGenerator;

// Instantiate the QRCodeGenerator class
$golivehost = new QRCodeGenerator();

// Set data to encode in the QR code
$golivehost->setData('Sample data for the QR code');

// Set QR code size
$golivehost->setSize('300x300');

// Set label for the QR code
$golivehost->setLabel('Sample QR Code Label');

// Save the generated QR code
$golivehost->saveQR('qr_code_with_label.png');

echo "QR code with label saved as qr_code_with_label.png\n";
```

### Example 2: Generate QR Code without Label

This example demonstrates how to generate a QR code without a label.

```php
<?php

// Include Composer's autoloader
require 'vendor/autoload.php';

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
```

### Utility: Generate and Save QR Code (One-liner)

You can also use the utility class for a simpler approach.

```php
<?php

// Include Composer's autoloader
require 'vendor/autoload.php';

use GoLiveHost\QRCodeGen\QRCodeUtils;

// Generate and save the QR code with a label
QRCodeUtils::generateAndSave('Sample data for the QR code', 'qr_code_sample.png', '300x300', 'Sample QR Code Label');

echo "QR code with label saved as qr_code_sample.png\n";
```

### API Documentation

The GoLive.host QR Code Generator API allows you to generate QR codes. The full documentation for the API can be found here:

[GoLive.host QR Code Generator API Docs](https://api.golive.host/Generator/QR/v3_docs)

### License

This library is licensed under the **[GoSecuredns Open License](https://license.gosecuredns.org/open)**.
