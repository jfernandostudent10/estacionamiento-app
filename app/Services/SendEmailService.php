<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SendEmailService
{

    public static function sendEmail($email, $subject, $body)
    {
        $client = new \GuzzleHttp\Client();
        $uriBase = config('services.email_java_api_uri_base') . '/api/sendEmail';
        try {
            $response = $client->request('POST', $uriBase, [
                'json' => [
                    'correo' => $email,
                    'asunto' => $subject,
                    'cuerpo' => $body
                ]
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}