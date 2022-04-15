<?php

namespace FluxEco\OpenApiClient\Adapters;
use FluxEco\OpenApiClient\Core\Ports;

class Outbounds implements Ports\Outbounds
{
    private Ports\Config $config;

    private function __construct(Ports\Config $config)
    {
        $this->config = $config;
    }

    public static function new(Ports\Config $config): self
    {
        return new self($config);
    }

    final public function getConfig(): Ports\Config
    {
        return $this->config;
    }

}