<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetalPriceController extends Controller
{
    public function getLatestPrices(Request $request)
    {
        $apiKey = 'fadaf6623489d9c0a288dcf2d5fd241c';
        $url = 'https://api.metalpriceapi.com/v1/latest';
        $fullUrl = $url . '?api_key=' . $apiKey . '&base=USD&currencies=EUR,XAU,XAG,INR';

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => $fullUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPGET => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);

        // Execute cURL session
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            $error_message = curl_error($curl);
            curl_close($curl);
            return response()->json([
                'error' => 'Unable to fetch data',
                'message' => $error_message
            ], 500);
        }

        // Close cURL session
        curl_close($curl);

        // Decode and return response
        $data = json_decode($response, true);
        return response()->json($data);
    }

    public function get_metal_Prices(Request $request)
{
    try {
        $apiKey = 'fadaf6623489d9c0a288dcf2d5fd241c';

        // Fetch main metal prices
        $url = 'https://api.metalpriceapi.com/v1/latest';
        $params = [
            'api_key' => $apiKey,
            'base' => 'USD',
            'currencies' => 'EUR,XAU,XAG,INR,USD'  // Include INR and USD for USD/INR
        ];
        $fullUrl = $url . '?' . http_build_query($params);

        // Initialize cURL session for main metal prices
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $fullUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPGET => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            $error_message = curl_error($curl);
            curl_close($curl);
            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch metal prices',
                'error' => $error_message
            ], 500);
        }

        // Decode main metal prices response
        $metalPrices = json_decode($response, true);
        curl_close($curl);

        // Fetch Gold Spot Price
        $goldSpotUrl = 'https://api.metalpriceapi.com/v1/gold/spot/latest';
        $goldSpotParams = [
            'api_key' => $apiKey,
            'currency' => 'USD'
        ];
        $goldSpotFullUrl = $goldSpotUrl . '?' . http_build_query($goldSpotParams);

        // Initialize cURL session for Gold Spot Price
        $curlGoldSpot = curl_init();
        curl_setopt_array($curlGoldSpot, [
            CURLOPT_URL => $goldSpotFullUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPGET => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);
        $goldSpotResponse = curl_exec($curlGoldSpot);

        // Check for cURL errors in Gold Spot Price request
        if (curl_errno($curlGoldSpot)) {
            $error_message = curl_error($curlGoldSpot);
            curl_close($curlGoldSpot);
            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch Gold Spot Price',
                'error' => $error_message
            ], 500);
        }

        // Decode Gold Spot Price response
        $goldSpotPrice = json_decode($goldSpotResponse, true);
        curl_close($curlGoldSpot);

        // Fetch Silver Spot Price
        $silverSpotUrl = 'https://api.metalpriceapi.com/v1/silver/spot/latest';
        $silverSpotParams = [
            'api_key' => $apiKey,
            'currency' => 'USD'
        ];
        $silverSpotFullUrl = $silverSpotUrl . '?' . http_build_query($silverSpotParams);

        // Initialize cURL session for Silver Spot Price
        $curlSilverSpot = curl_init();
        curl_setopt_array($curlSilverSpot, [
            CURLOPT_URL => $silverSpotFullUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPGET => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);
        $silverSpotResponse = curl_exec($curlSilverSpot);

        // Check for cURL errors in Silver Spot Price request
        if (curl_errno($curlSilverSpot)) {
            $error_message = curl_error($curlSilverSpot);
            curl_close($curlSilverSpot);
            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch Silver Spot Price',
                'error' => $error_message
            ], 500);
        }

        // Decode Silver Spot Price response
        $silverSpotPrice = json_decode($silverSpotResponse, true);
        curl_close($curlSilverSpot);

        // Prepare response without base and timestamp
        unset($metalPrices['base']);
        unset($metalPrices['timestamp']);

        // Add Gold Spot Price and Silver Spot Price to the response data if available
        $metalPrices['gold_spot_price'] = isset($goldSpotPrice['price']) ? $goldSpotPrice['price'] : 'Not available';
        $metalPrices['silver_spot_price'] = isset($silverSpotPrice['price']) ? $silverSpotPrice['price'] : 'Not available';

        // Return success response with all data
        return response()->json([
            'success' => true,
            'message' => 'Metal prices fetched successfully',
            'data' => $metalPrices
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'An error occurred',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
