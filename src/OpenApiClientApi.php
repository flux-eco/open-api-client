<?php

namespace FluxEco\OpenApiClient;

class OpenApiClientApi
{
    private Core\Ports\OpenApiService $openApiService;

    private function __construct(
        Core\Ports\OpenApiService $openApiService
    ) {
        $this->openApiService = $openApiService;
    }

    public static function new(OpenApiClientConfig $openApiConfig) : self
    {
        $outbounds = Adapters\Configs\OpenApiOutbounds::new($openApiConfig);
        $openApiService = Core\Ports\OpenApiService::new($outbounds);
        return new self($openApiService);
    }

    public function query(string $endpoint, array $filter = []) : array
    {
        return $this->openApiService->query($endpoint, $filter);
    }
}