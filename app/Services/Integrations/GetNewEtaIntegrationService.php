<?php

namespace App\Services\Integrations;

use Illuminate\Support\Facades\Http;
use Throwable;

class GetNewEtaIntegrationService
{
    public function eta(): mixed
    {
        $url = config('integrations.ETA.base_url');
        try {
            $response = Http::get($url);
            $result = json_decode($response->getBody()->getContents());
        } catch (Throwable $exception) {
            report($exception);
            return null;
        }
        if ($result->data->status) {
            return $result->data->eta;
        }
        return null;
    }
}
