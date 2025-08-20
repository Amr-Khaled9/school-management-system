<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    public function generateAccessToken()
    {
        $response = Http::asForm()->withBasicAuth(
            config('services.zoom.client_id'),
            config('services.zoom.client_secret')
        )->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => config('services.zoom.account_id'),
        ]);

        if ($response->failed()) {
            throw new \Exception('Zoom Authentication Failed: ' . $response->body());
        }

        return $response->json()['access_token'];
    }


    public function createMeeting($topic, $startTime ,$duration,$type,$token )
    {

        $response = Http::withToken($token)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => $topic,
            'type' => $type, // Scheduled meeting
            'start_time' => $startTime,
            'duration' => $duration, // minutes
            'timezone' => 'Africa/Cairo',
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'waiting_room' => true,
            ],
        ]);

        if ($response->failed()) {
            throw new \Exception('Zoom Create Meeting Failed: ' . $response->body());
        }

        return $response->json();
    }
}

