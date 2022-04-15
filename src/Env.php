<?php


namespace FluxEco\OpenApiClient;

use FluxEco\OpenApiClient\Core\{Ports};

class Env
{
    public const OPEN_API_CLIENT_ID='OPEN_API_CLIENT_ID';
    public const OPEN_API_SECRET='OPEN_API_SECRET';
    public const OPEN_API_SCOPE='OPEN_API_SCOPE';
    public const OPEN_API_API_URL='OPEN_API_API_URL';
    public const OPEN_API_AUTHENTICATION_URL='OPEN_API_AUTHENTICATION_URL';

    private string $envPrefix;

    private function __construct(string $envPrefix) {
        $this->envPrefix = $envPrefix;
    }

    public static function new(string $envPrefix = '') {
        return new self($envPrefix);
    }

    public function getOpenApiClientId(): string {
        return getenv($this->envPrefix.self::OPEN_API_CLIENT_ID);
    }

    public function getOpenApiSecret(): string {
        return getenv($this->envPrefix.self::OPEN_API_SECRET);
    }

    public function getOpenApiScope(): string {
        return getenv($this->envPrefix.self::OPEN_API_SCOPE);
    }

    public function getOpenApiUrl(): string {
        return getenv($this->envPrefix.self::OPEN_API_API_URL);
    }

    public function getOpenApiAuthenticationUrl(): string {
        return getenv($this->envPrefix.self::OPEN_API_AUTHENTICATION_URL);
    }
}