<?php
/**
 * M-Pesa STK Push Mock Endpoint
 * 
 * Since credentials aren't ready and we're on localhost, 
 * this script mocks a successful STK push initiation.
 */

header('Content-Type: application/json');

// Get POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

// In production:
// 1. Generate OAuth Token from Safaricom Daraja
// 2. Format Phone Number (e.g. 07XX... to 2547XX...)
// 3. POST to /mpesa/stkpush/v1/processrequest
// 4. Return CheckoutRequestID to frontend for polling

// MOCK RESPONSE
$response = [
    'MerchantRequestID' => 'Mock-Req-12345',
    'CheckoutRequestID' => 'ws_CO_13092026123456789',
    'ResponseCode' => '0',
    'ResponseDescription' => 'Success. Request accepted for processing',
    'CustomerMessage' => 'Success. Request accepted for processing'
];

echo json_encode($response);
