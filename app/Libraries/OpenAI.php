<?php

namespace App\Libraries;

class OpenAI
{
    /**
     * prompt
     * @param $query prompt chatgpt
     * @return Array
     */
    public function prompt(string $query)
    {
        $apiKey = config('services.openai.api_key'); // Get API key from config
        $model =  'gpt-3.5-turbo-0125'; // Optional model selection

        $messages = [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.',
            ],
            [
                'role' => 'user',
                'content' => $query, // Get user message from request
            ],
        ];

        $url = "https://api.openai.com/v1/chat/completions";

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer $apiKey",
                ],
                'json' => [
                    'model' => $model,
                    'messages' => $messages,
                ],
            ]);

            $decodedResponse = json_decode($response->getBody());

            if (isset($decodedResponse->error)) {
                throw new Exception("OpenAI Error: " . $decodedResponse->error->message);
            }

            return [                
                'completion' => \Arr::first($decodedResponse->choices)->message
            ];
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return false;
        }
    }
}