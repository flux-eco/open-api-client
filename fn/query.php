<?php

namespace fluxOpenApiClient;

use FluxEco\OpenApiClient;

function query(string $endpoint, array $filter = [], string $envPrefix = '') : array
{
    return OpenApiClient\Api::newFromEnv($envPrefix)->query($endpoint, $filter);
}