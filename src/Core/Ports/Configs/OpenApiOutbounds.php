<?php

namespace FluxEco\OpenApiClient\Core\Ports\Configs;

interface OpenApiOutbounds
{
    public function getOpenApiConfig(): OpenApiConfig;
}