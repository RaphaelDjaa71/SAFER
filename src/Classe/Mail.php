<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_Key = '1e461f458a0034fde157c2c162be9207';
    private $api_key_secret = '3110dcba2137d89c8d699d7f657f3610';

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_Key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "nanafalola0@gmail.com",
                        'Name' => "Safer"
                    ],
                    'To' => [
                        [
                        'Email' => $to_email,
                        'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 4476864 ,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content,
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
