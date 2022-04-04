<?php

require_once __DIR__ . '/../vendor/autoload.php';

fluxy\loadDotEnv(__DIR__);

$client = FluxEco\OpenApiClient\OpenApiClientApi::new(
    FluxEco\OpenApiClient\OpenApiClientConfig::new(
        getenv('EXAMPLE_OPEN_API_CLIENT_ID'),
        getenv('EXAMPLE_OPEN_API_SECRET'),
        getenv('EXAMPLE_OPEN_API_SCOPE'),
        getenv('EXAMPLE_OPEN_API_API_URL'),
        getenv('EXAMPLE_OPEN_API_AUTHENTICATION_URL'),
    )
);
$result = $client->query('/api/ilias/accounts');
print_r($result); exit;