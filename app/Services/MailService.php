<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Services\MailServiceInterface;
use Mailjet\Resources;

class MailService implements MailServiceInterface
{

    public static function sendCurrencyRateEmail(string $email, string $from, string $to, float $rate): void
    {
        $mj = new \Mailjet\Client(env('MAILJET_APIKEY'),env('MAILJET_APISECRET'),true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "mary.shark.88@gmail.com",
                        'Name' => "Diana-Mariia"
                    ],
                    'To' => [
                        [
                            'Email' => $email
                        ]
                    ],
                    'Subject' => "Greetings from Diana.",
                    'TextPart' => "That is your currency rate for today",
                    'HTMLPart' => "<h3>Dear subscriber, that is your currency rate for today!</h3>",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $mj->post(Resources::$Email, ['body' => $body]);
    }

}

