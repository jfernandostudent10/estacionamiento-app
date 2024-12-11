<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SendEmailService
{

    public static function sendEmail($email, $subject, $body)
    {
        $client = new \GuzzleHttp\Client();
        $uriBase = config('services.email_java_api_uri_base') . '/api/sendEmail';
        $token = config('services.email_java_api_token');
        try {
            $response = $client->request('POST', $uriBase, [
                'json' => [
                    'correo' => $email,
                    'asunto' => $subject,
                    'cuerpo' => $body
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}