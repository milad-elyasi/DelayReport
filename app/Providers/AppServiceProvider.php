<?php

namespace App\Providers;

use App\Services\CandidateProduct\Process\Detectors\SimilarityDetectorService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SimilarityDetectorService::class);
    }

    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
