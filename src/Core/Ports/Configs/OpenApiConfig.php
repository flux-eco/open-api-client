<?php

namespace FluxEco\OpenApiClient\Core\Ports\Configs;

interface OpenApiConfig
{
    public function getClient(): string;

    public function getSecret(): string;

    public function getScope(): string;

    public function getApiUrl(): string;

    public function getAuthenticationUrl(): string;
}