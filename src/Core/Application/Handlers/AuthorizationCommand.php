<?php

namespace FluxEco\OpenApiClient\Core\Application\Handlers;

class AuthorizationCommand
{
    private string $client;
    private string $secret;
    private string $scope;
    private string $apiUrl;
    private string $authenticationUrl;

    private function __construct(
        string $client,
        string $secret,
        string $scope,
        string $apiUrl,
        string $authenticationUrl
    )
    {
        $this->client = $client;
        $this->secret = $secret;
        $this->scope = $scope;
        $this->apiUrl = $apiUrl;
        $this->authenticationUrl = $authenticationUrl;
    }

    public static function new(
        string $client,
        string $secret,
        string $scope,
        string $apiUrl,
        string $authenticationUrl
    ): self
    {
        return new self(
            $client,
            $secret,
            $scope,
            $apiUrl,
            $authenticationUrl
        );
    }

    final public function getClient(): string
    {
        return $this->client;
    }

    final public function getSecret(): string
    {
        return $this->secret;
    }

    final public function getScope(): string
    {
        return $this->scope;
    }

    final public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    final public function getAuthenticationUrl(): string
    {
        return $this->authenticationUrl;
    }
}