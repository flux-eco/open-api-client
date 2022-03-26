<?php

namespace FluxEco\OpenApiClient\Core\Application\Handlers;


class QueryCommand
{
    private string $authorization;
    private string $endpoint;
    private array $filter;

    private function __construct(string $authorization, string $endpoint, array $filter)
    {
        $this->authorization = $authorization;
        $this->endpoint = $endpoint;
        $this->filter = $filter;
    }

    public static function new(string $authorization, string $endpoint, array $filter): self
    {
        return new self(
            $authorization,
            $endpoint,
            $filter
        );
    }


    public function getEndpoint(): string
    {
        return $this->endpoint;
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