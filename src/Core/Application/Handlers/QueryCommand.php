<?php

namespace FluxEco\OpenApiClient\Core\Application\Handlers;


class QueryCommand
{
    private string $authorization;
    private string $endpointUrl;
    private array $filter;

    private function __construct(string $authorization, string $endpointUrl, array $filter)
    {
        $this->authorization = $authorization;
        $this->endpointUrl = $endpointUrl;
        $this->filter = $filter;
    }

    public static function new(string $authorization, string $endpointUrl, array $filter): self
    {
        return new self(
            $authorization,
            $endpointUrl,
            $filter
        );
    }


    public function getEndpointUrl(): string
    {
        return $this->endpointUrl;
    }


    public function getFilter(): array
    {
        return $this->filter;
    }

    final public function getAuthorization(): string
    {
        return $this->authorization;
    }


    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}