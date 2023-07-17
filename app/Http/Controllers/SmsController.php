<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Vonage\Client;
// use Vonage\Message\SMS;

// class SmsController extends Controller
// {
//     public function sendSms() 
//     {
//         // Get your Vonage API key and API secret from the .env file
//         $apiKey = env('NEXMO_API_KEY');
//         $apiSecret = env('NEXMO_API_SECRET');

//         // Initialize the Vonage client
//         $client = new Client(new \Vonage\Client\Credentials\Basic($apiKey, $apiSecret));

//         // Set the destination phone number and message body
//         $toPhoneNumber = 'RECIPIENT_PHONE_NUMBER';
//         $messageBody = 'This is a test message from Vonage!';

//         // Send an SMS message
//         $message = new SMS(env('NEXMO_FROM'), $toPhoneNumber, $messageBody);
//         $response = $client->message()->send($message);

//         dd($response->getResponseData());
//     }
// }
 
