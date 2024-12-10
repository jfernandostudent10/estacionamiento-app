<?php

namespace Services;

class SendEmailService
{

    public static function sendEmail($correo, $estado, $placa, $sede)
    {
        $client = new \GuzzleHttp\Client();
        $uriBase = config('services.email_java_api_uri_base') . '/api/sendEmail';
        $response = $client->request('POST', $uriBase, [
            'form_params' => [
                'correo' => $correo,
                'estado' => $estado,
                'placa' => $placa,
                'sede' => $sede
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }
}