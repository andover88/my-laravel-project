<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dotenv\Dotenv;

class ImageUploadController extends Controller
{
    private $apiKey;
    private $apiSecret;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();

        $this->apiKey = getenv('IMAGGA_API_KEY');
        $this->apiSecret = getenv('IMAGGA_API_SECRET');
    }

    private function uploadImage($imagePath) {
        $uploadUrl = 'https://api.imagga.com/v2/uploads';

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $uploadUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode("$this->apiKey:$this->apiSecret"),
        ]);

        // Add image file
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'image' => new \CURLFile($imagePath),
        ]);

        // Execute cURL request
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check for success
        if ($responseCode !== 200) {
            throw new \Exception("Error uploading image: " . $response);
        }

        // Decode response
        $responseData = json_decode($response, true);
        return $responseData['result']['upload_id'];
    }

    private function categorizeImage($uploadId) {
        $taggingUrl = "https://api.imagga.com/v2/tags?image_upload_id=$uploadId";

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $taggingUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode("$this->apiKey:$this->apiSecret"),
        ]);

        // Execute cURL request
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check for success
        if ($responseCode !== 200) {
            throw new \Exception("Error tagging image: " . $response);
        }

        // Decode response
        return json_decode($response, true);
    }

    private function isCarImage($tags) {
        foreach ($tags as $tag) {
            if (strcasecmp($tag['tag']['en'], 'car') === 0) {
                return true; // Image is a car
            }
        }
        return false; // Image is not a car
    }

    public function analyzeCarImage(Request $request) {
        $imagePath = $request->file('image')->getRealPath(); // Get image from request
        try {
            // Upload the image
            $uploadId = $this->uploadImage($imagePath);
            echo "Image uploaded successfully. Upload ID: $uploadId\n";

            // Categorize the image
            $taggingResponse = $this->categorizeImage($uploadId);
            $tags = $taggingResponse['result']['tags'];

            // Check if it's a car image
            if ($this->isCarImage($tags)) {
                return response()->json(["message" => "The image is a car!"], 200);
            } else {
                return response()->json(["error" => "The image is not an image of a car."], 400);
            }
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
