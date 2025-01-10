<?php

namespace GoLiveHost\QRCodeGen;

/**
 * Utility class to handle QR code generation more easily.
 */
class QRCodeUtils
{
    /**
     * Static method to generate and save a QR code.
     *
     * @param string $data
     * @param string $filePath
     * @param string $size
     * @param string|null $label
     * @throws \Exception if any error occurs
     */
    public static function generateAndSave($data, $filePath, $size = '500x500', $label = null)
    {
        $qrCodeGenerator = new QRCodeGenerator();
        $qrCodeGenerator->setData($data);
        $qrCodeGenerator->setSize($size);
        $qrCodeGenerator->setLabel($label);
        $qrCodeGenerator->saveQR($filePath);
    }
}