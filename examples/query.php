<?php

require_once __DIR__ . '/../vendor/autoload.php';

fluxDotEnv\loadDotEnv(__DIR__);

$result = fluxOpenApiClient\query('/api/ilias/accounts', [], 'EXAMPLE_');
print_r($result); exit;