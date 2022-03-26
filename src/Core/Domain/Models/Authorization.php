<?php

namespace FluxEco\OpenApiClient\Core\Domain\Models;

class Authorization implements \JsonSerializable
{

    private string $apiUrl;
    private string $authorization;

    private function __construct(string $apiUrl, string $authorization)
    {
        $this->apiUrl = $apiUrl;
        $this->authorization = $authorization;
    }

    public static function new(string $apiUrl, string $authorization): self
    {
        return new self($apiUrl, $authorization);
    }

    public function getAuthorization(): string
    {
        return $this->authorization;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function jsonSerialize(): array
    {
        return [
            'apiUrl' => $this->apiUrl,
            'authorization' => $this->authorization,
        ];
    }
}
