<?php

if(! function_exists('send_sms_bulk')){
    function send_sms_bulk($arrayNumbers,$message){
        
        $urlsms = env("HABLAME_URL_API");
        $apikeysms = env("HABLAME_API_KEY");
        $tokensms = env("HABLAME_TOKEN");
        $accountsms = env("HABLAME_ACCOUNT");
        $response = Http::withHeaders([
                        'account' => $accountsms,
                        'apikey' => $apikeysms,
                        'token' => $tokensms
                    ])->post($urlsms, [
                        'flash' => 0,
                        'sc' => '890202',
                        'request_dlvr_rcpt' => '0',
                        'sendDate' => \Carbon\Carbon::parse($on_revision->assignment->deadline)->diffForhumans(),
                        bulk => $arrayNumbers,
                    ]);
        return response()->json($response);
    }
}

if(! function_exists('send_sms')){
    function send_sms($number,$message){
        
        $urlsms = env("HABLAME_URL_API");
        $apikeysms = env("HABLAME_API_KEY");
        $tokensms = env("HABLAME_TOKEN");
        $accountsms = env("HABLAME_ACCOUNT");
        $response = Http::withHeaders([
                        'account' => $accountsms,
                        'apikey' => $apikeysms,
                        'token' => $tokensms
                    ])->post($urlsms, [
                        'flash' => 0,
                        'sc' => '890202',
                        'request_dlvr_rcpt' => '0',
                        'sendDate' => \Carbon\Carbon::parse($on_revision->assignment->deadline)->diffForhumans(),
                        'toNumber' => $number,
                        'message' => $message,
                    ]);
        return response()->json($response);
    }
}