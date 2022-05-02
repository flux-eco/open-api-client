<?php


namespace FluxEco\OpenApiClient;

use FluxEco\OpenApiClient\Core\{Ports};

class Env
{
    public const OPEN_API_CLIENT_ID='OPEN_API_CLIENT_ID';
    public const OPEN_API_SECRET_FILE='OPEN_API_SECRET_FILE';
    public const OPEN_API_SCOPE='OPEN_API_SCOPE';
    public const OPEN_API_API_URL='OPEN_API_API_URL';
    public const OPEN_API_AUTHENTICATION_URL='OPEN_API_AUTHENTICATION_URL';
    public const OPEN_API_SECRET='OPEN_API_SECRET';

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
        if(is_null(getenv($this->envPrefix . self::OPEN_API_SECRET_FILE)) !== false) {
            $secretFile = getenv($this->envPrefix . self::OPEN_API_SECRET_FILE);
            return filter_var(file_get_contents($secretFile), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
        }

        return getenv($this->envPrefix . self::OPEN_API_SECRET);
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