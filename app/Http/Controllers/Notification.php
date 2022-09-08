<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    //

    // public function sendnotification()
//     {
//         $basic  = new \Vonage\Client\Credentials\Basic("fc278fbb", "1DZ76PJcn8J29hmr");
//         $client = new \Vonage\Client($basic);

//         $response = $client->sms()->send(
//     new \Vonage\SMS\Message\SMS("917265912198", BRAND_NAME, 'A text message sent using the Nexmo SMS API')
// );

// $message = $response->current();

// if ($message->getStatus() == 0) {
//     echo "The message was sent successfully\n";
// } else {
//     echo "The message failed with status: " . $message->getStatus() . "\n";
// }
//     }
}
