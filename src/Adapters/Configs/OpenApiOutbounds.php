<?php

namespace FluxEco\OpenApiClient\Adapters\Configs;
use FluxEco\OpenApiClient\Core\Ports;

class OpenApiOutbounds implements Ports\Configs\OpenApiOutbounds
{
    private Ports\Configs\OpenApiConfig $openApiConfig;

    private function __construct(Ports\Configs\OpenApiConfig $openApiConfig)
    {
        $this->openApiConfig = $openApiConfig;
    }

    public static function new(Ports\Configs\OpenApiConfig $openApiConfig): self
    {
        return new self($openApiConfig);
    }

    final public function getOpenApiConfig(): Ports\Configs\OpenApiConfig
    {
        return $this->openApiConfig;
    }

}