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
 * Generate the QR code and return the binary image data using cURL without SSL verification.
 *
 * @return string Binary image data
 * @throws \Exception if QR code generation fails
 */
public function generateQR()
{
    // Build the API URL
    $url = 'https://api.golive.host/Generator/QR/v3?data=' . urlencode($this->data) . '&size=' . urlencode($this->size);

    if ($this->label) {
        $url .= '&label=' . urlencode($this->label);
    }

    // Initialize cURL
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,       // Return the response as a string
        CURLOPT_FAILONERROR => true,          // Fail on HTTP error codes (4xx, 5xx)
        CURLOPT_TIMEOUT => 5,                 // Set a timeout for the request
        CURLOPT_CONNECTTIMEOUT => 3,          // Connection timeout
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2TLS, // Use HTTP/2 if available
        CURLOPT_SSL_VERIFYPEER => false,      // Disable SSL certificate verification
        CURLOPT_SSL_VERIFYHOST => 0,          // Disable hostname verification
        CURLOPT_TCP_FASTOPEN => true,         // Enable TCP Fast Open (if supported)
        CURLOPT_ENCODING => "",               // Accept all encodings (gzip, deflate, etc.)
        CURLOPT_USERAGENT => 'GoLiveHost-QRCodeGen/1.0', // Custom User-Agent
    ]);

    // Execute the request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP status code

    // Handle errors
    if ($response === false || $httpCode >= 400) {
        $error = curl_error($ch) ?: "HTTP Error: $httpCode";
        curl_close($ch);
        throw new \Exception("Failed to fetch QR code from API: $error");
    }

    // Close cURL
    curl_close($ch);

    return $response;
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
