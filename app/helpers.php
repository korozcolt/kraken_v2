<?php

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
                        'toNumber' => '57'.$number,
                        'sms' => $message,
                        'flash' => 0,
                        'sc' => '890202',
                        'request_dlvr_rcpt' => '0',
                    ]);
        return response()->json($response);
    }
}