<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NotificationController extends Controller
{
    public function index(){
        return view('notification');
    }

    public function send(Request $request){
        $url = 'https://fcm.googleapis.com/fcm/send'; 
        
        $headers = [
            'host' => 'fcm.googleapis.com',
            'Content-Type' => 'application/json',
            'Authorization' => 'key=AAAAZClNs6k:APA91bFkwHw-M31hK9J8dtvb9-abjVnge6dwi6plgYkDYfPibboF2sWwhhLoAcrla9NVuiPVAr-_NC60axM6l_xqVeq9zSpLSI2MT9VePhV1gO85OC_XbAZS97qJrZ52CyA1UqcVv-x0',
        ];

        $response = Http::withHeaders($headers)->post($url, [
            'to' => '/topics/budaya',
            'notification' => [
                "title" => $request->title,
                "body" => $request->body
            ],
        ]);

        $statusCode = $response->status();
        $content = $response->json();

        // Process the response as needed
        return redirect("notification");

        
    }


}
