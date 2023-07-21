<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MailController extends Controller
{
    public function index()
    {



    }

    public function sendMail($email, $subject, $content){

        //Envio de correo
        $response = Http::withHeaders([
            'Content-Type' => 'application/json;charset=UTF-8',
            'authuser' => 'it@sertracen.com',
            'authpass' => 'I7IDFRBR',
        ])->post('https://api.turbo-smtp.com/api/v2/mail/send', [
            'from' => 'noreply@em.com.sv',
            'to' => $email,
            'subject' => $subject,
            'content' => 'html content',
            'html_content' => '<html>
            <head>
               <title>Bootstrap Example</title>
               <link href = "/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
               <script src = "/scripts/jquery.min.js"></script>
               <script src = "/bootstrap/js/bootstrap.min.js"></script>
            </head>
            <body>
               <img src = "https://scontent.fsal7-1.fna.fbcdn.net/v/t39.30808-6/348217263_815300549892162_8699646073188198388_n.png?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=FFe4wxRBgFUAX8pLdVA&_nc_oc=AQl4bl86bzjmXl55NUNKJqrx5EhEzAbXO88JgUWavj4RnQ9mq02HwguaIlv-X6nw6LE&_nc_ht=scontent.fsal7-1.fna&oh=00_AfCawV0xxO3x9L--iC61Jx84t14D-O18yGyvR718P9SnzA&oe=64BAE9F7" class = "img-responsive" alt = "Online Training">
               <br>
               <br>
               <h1>'.$content.'</h1>
               <br>
               <br>
               <br>
               <hr>
            </body>
         </html>'
        ]);


        return $response;
    }


}
