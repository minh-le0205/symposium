<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CallingAllPaper
{
    protected $baseUrl = 'https://api.callingallpapers.com/v1/cfp';

    public function getCallForPapers()
    {
        $response = Http::get("{$this->baseUrl}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
