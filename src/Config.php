<?php

namespace FluxEco\OpenApiClient;

use FluxEco\OpenApiClient\Core\{Ports};

class Config implements Ports\Config
{
    private string $clientId;
    private string $secret;
    private string $scope;
    private string $apiUrl;
    private string $authenticationUrl;

    private function __construct(
        string $clientId,
        string $secret,
        string $scope,
        string $apiUrl,
        string $authenticationUrl
    ) {
        $this->clientId = $clientId;
        $this->secret = $secret;
        $this->scope = $scope;
        $this->apiUrl = $apiUrl;
        $this->authenticationUrl = $authenticationUrl;
    }

    public static function new(
        string $clientId,
        string $secret,
        string $scope,
        string $apiUrl,
        string $authenticationUrl
    ) : self {
        return new self(
            $clientId,
            $secret,
            $scope,
            $apiUrl,
            $authenticationUrl
        );
    }

    public static function newFromEnv(string $envPrefix) : self
    {
        $apiEnv = Env::new($envPrefix);
        return new self(
            $apiEnv->getOpenApiClientId(),
            $apiEnv->getOpenApiSecret(),
            $apiEnv->getOpenApiScope(),
            $apiEnv->getOpenApiUrl(),
            $apiEnv->getOpenApiAuthenticationUrl()
        );
    }

    final public function getClientId() : string
    {
        return $this->clientId;
    }

    final public function getSecret() : string
    {
        return $this->secret;
    }

    final public function getScope() : string
    {
        return $this->scope;
    }

    final public function getApiUrl() : string
    {
        return $this->apiUrl;
    }

    final public function getAuthenticationUrl() : string
    {
        return $this->authenticationUrl;
    }
}

