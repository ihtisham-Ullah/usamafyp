<?php
$websiteUrl = $_GET['websiteUrl'];
// API endpoint
$endpoint = 'https://ea36-34-125-137-56.ngrok-free.app/predict';
//$url = 'www.tesla.com/';
// URL to be predicted
$url = $websiteUrl;

// Create the request payload
$data = array('url' => $url);

// Set the HTTP headers
$headers = array('Content-Type: application/json');

// Initialize cURL session
$ch = curl_init($endpoint);

// Set the request method to POST
curl_setopt($ch, CURLOPT_POST, 1);

// Set the request payload
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Set the HTTP headers
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Set the option to receive the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Get the response status code
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close the cURL session
curl_close($ch);

// Check the response status code
if ($status_code == 200) {
    // Decode the JSON response
    $response_data = json_decode($response, true);
    
    // Extract the prediction
    $prediction = $response_data['prediction'];
    
    echo 'Prediction: ' . $prediction;
} else {
    echo 'Request failed with status code: ' . $status_code;
}
?>