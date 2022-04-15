<?php

namespace FluxEco\OpenApiClient\Core\Ports;

interface Outbounds
{
    public function getConfig(): Config;
}