<?php


namespace FluxEco\OpenApiClient\Adapters\Api;
use FluxEco\OpenApiClient\{Core\Ports, Adapters};

class OpenApiClientApi
{
    private Ports\OpenApiService $openApiService;

    private function __construct(
        Ports\OpenApiService $openApiService
    )
    {
        $this->openApiService = $openApiService;
    }

    public static function new(OpenApiClientConfig $openApiConfig): self
    {
        $outbounds = Adapters\Configs\OpenApiOutbounds::new($openApiConfig);
        $openApiService = Ports\OpenApiService::new($outbounds);
        return new self($openApiService);
    }

    public function query(string $endpoint, array $filter = []): array {
        return $this->openApiService->query($endpoint, $filter);
    }
}