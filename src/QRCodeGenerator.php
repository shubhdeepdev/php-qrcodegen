<?php

namespace GoLiveHost\QRCodeGen;

/**
 * Class QRCodeGenerator
 * 
 * A simple class to generate QR codes using GoLive.host's API.
 */
class QRCodeGenerator
{
    private $data;  // Data to encode in the QR code
    private $size;  // Size of the QR code
    private $label; // Label to display under the QR code (optional)

    /**
     * Set the data to encode in the QR code
     *
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Set the size of the QR code (default is 500x500)
     *
     * @param string $size
     */
    public function setSize($size = '500x500')
    {
        $this->size = $size;
    }

    /**
     * Set the label for the QR code (optional)
     *
     * @param string|null $label
     */
    public function setLabel($label = null)
    {
        $this->label = $label;
    }

    /**
     * Generate the QR code and return the binary image data.
     *
     * @return string Binary image data
     * @throws \Exception if QR code generation fails
     */
    public function generateQR()
    {
        $url = 'https://api.golive.host/Generator/QR/v3?data=' . urlencode($this->data) . '&size=' . urlencode($this->size);
        
        if ($this->label) {
            $url .= '&label=' . urlencode($this->label);
        }

        // Fetch QR code image from the API
        $image = file_get_contents($url);
        if ($image === false) {
            throw new \Exception("Failed to fetch QR code from API");
        }

        return $image;
    }

    /**
     * Save the generated QR code to a specified file.
     *
     * @param string $filePath
     * @throws \Exception if saving fails
     */
    public function saveQR($filePath)
    {
        $qrImage = $this->generateQR();
        $saved = file_put_contents($filePath, $qrImage);

        if ($saved === false) {
            throw new \Exception("Failed to save the QR code");
        }
    }
}
