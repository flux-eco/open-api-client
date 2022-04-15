<?php

namespace FluxEco\OpenApiClient\Core\Ports;

interface Config
{
    public function getClientId(): string;

    public function getSecret(): string;

    public function getScope(): string;

    public function getApiUrl(): string;

    public function getAuthenticationUrl(): string;
}