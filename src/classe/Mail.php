<?php

namespace App\classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key ='3f5915d0dd638ab4ac784af0255864c8';
    private $api_key_secret ='ee6a060610504fd7eb7d6e3ff9fc107d';

    public function send($to_email, $to_name, $subject, $content)
    {
      $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
      $body = [
        'Messages' => [
          [
            'From' => [
              'Email' => "djaaraphael5@gmail.com",
              'Name' => "SAFER"
            ],
            'To' => [
              [
                'Email' => $to_email,
                'Name' => $to_name
              ]
            ],
            'TemplateID' => 4481168,
            'TemplateLanguage' => true,
            'Subject' => $subject,
            'Variables' => [
                'content' => $content,
            ]
          ]
        ]
      ];
      $response = $mj->post(Resources::$Email, ['body' => $body]);
      $response->success() && dd($response->getData());

    }
}

