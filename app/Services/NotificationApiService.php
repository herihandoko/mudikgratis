<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class NotificationApiService
{
    protected $client;
    protected $baseUrl;
    protected $token;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->baseUrl = config('services.whatsapp.base_url');
        $this->token = config('services.whatsapp.token');
    }

    public function sendNotification(array $params)
    {
        try {
            $response = $this->client->post($this->baseUrl . '/send', [
                RequestOptions::JSON => $params, // Set the request body as JSON
                'headers' => [
                    'Authorization' => $this->token,
                ],
            ]);
            return [
                'status' => true,
                'message' => 'success send notification.',
                'response' => json_decode($response->getBody(), true)
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'failed send notification.',
                'response' => $e->getMessage()
            ];
        }
    }

    public function sendEmail(array $params)
    {
        $params = array_merge($params, [
            "caller" => "short-cms-payout"
        ]);
        try {
            $response = $this->client->post($this->baseUrl . '/api/v1/job/push-notif', [
                RequestOptions::JSON => $params, // Set the request body as JSON
                'headers' => [
                    'apikey' => $this->apiKey, // Add API key to the request header
                    'Content-Type' => 'application/json', // Specify the content type
                ],
            ]);

            // Assuming the API returns JSON, you can decode it
            return [
                'status' => true,
                'message' => 'success send notification.',
                'response' => json_decode($response->getBody(), true)
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'failed send notification.',
                'response' => $e->getMessage()
            ];
        }
    }
}
