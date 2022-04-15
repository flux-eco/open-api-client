<?php

namespace FluxEco\OpenApiClient\Core\Ports;

use FluxEco\OpenApiClient\Core\{Application, Ports};

class OpenApiService
{
    private Ports\Config $config;

    private function __construct(
        Ports\Config $config
    )
    {
        $this->config = $config;
    }

    public static function new(
        Ports\Outbounds $openApiOutbounds
    ): self
    {
        return new self(
            $openApiOutbounds->getConfig()
        );
    }

    public function query(string $endpoint, array $filter): array
    {
        $openApiConfig = $this->config;
        $authorizationCommand = Application\Handlers\AuthorizationCommand::new(
            $openApiConfig->getClientId(),
            $openApiConfig->getSecret(),
            $openApiConfig->getScope(),
            $openApiConfig->getApiUrl(),
            $openApiConfig->getAuthenticationUrl()
        );
        $authorization = Application\Handlers\AuthorizationHandler::new()->handle($authorizationCommand);

        echo "authorization: ".$authorization->getAuthorization();

        $endpointUrl = $openApiConfig->getApiUrl().$endpoint;
        $queryCommand = Application\Handlers\QueryCommand::new($authorization->getAuthorization(), $endpointUrl, $filter);
        return Application\Handlers\QueryHandler::new()->handle($queryCommand);
    }
}