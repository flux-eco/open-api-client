<?php

namespace FluxEco\OpenApiClient;

use FluxEco\OpenApiClient\Adapters\Outbounds;

class Api
{
    private Core\Ports\OpenApiService $openApiService;

    private function __construct(
        Core\Ports\OpenApiService $openApiService
    ) {
        $this->openApiService = $openApiService;
    }

    public static function new(Config $config) : self
    {
        $outbounds = Outbounds::new($config);
        $openApiService = Core\Ports\OpenApiService::new($outbounds);
        return new self($openApiService);
    }

    public static function newFromEnv(string $envPrefix) : self
    {
        $outbounds = Outbounds::new(Config::newFromEnv($envPrefix));
        $openApiService = Core\Ports\OpenApiService::new($outbounds);
        return new self($openApiService);
    }

    public function query(string $endpoint, array $filter = []) : array
    {
        return $this->openApiService->query($endpoint, $filter);
    }
}