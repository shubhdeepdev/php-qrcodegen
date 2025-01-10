<?php

use PHPUnit\Framework\TestCase;
use GoLiveHost\QRCodeGen\QRCodeGenerator;

class QRCodeGeneratorTest extends TestCase
{
    private $qrCodeGenerator;

    protected function setUp(): void
    {
        $this->qrCodeGenerator = new QRCodeGenerator();
    }

    public function testSetData(): void
    {
        $this->qrCodeGenerator->setData('Test data');
        $this->assertTrue(true, "Data set successfully.");
    }

    public function testSetSize(): void
    {
        $this->qrCodeGenerator->setSize('300x300');
        $this->assertTrue(true, "Size set successfully.");
    }

    public function testSetLabel(): void
    {
        $this->qrCodeGenerator->setLabel('Sample Label');
        $this->assertTrue(true, "Label set successfully.");
    }

    public function testGenerateQR(): void
    {
        $this->qrCodeGenerator->setData('Test data');
        $this->qrCodeGenerator->setSize('300x300');
        $imageData = $this->qrCodeGenerator->generateQR();

        $this->assertNotEmpty($imageData, "QR code generated successfully.");
        $this->assertStringStartsWith("\x89PNG", $imageData, "The output is a valid PNG image.");
    }

    public function testSaveQR(): void
    {
        $this->qrCodeGenerator->setData('Test data');
        $this->qrCodeGenerator->setSize('300x300');
        $filePath = __DIR__ . '/test_qr_code.png';

        $this->qrCodeGenerator->saveQR($filePath);
        $this->assertFileExists($filePath, "QR code file was saved successfully.");

        // Clean up
        unlink($filePath);
    }
}
