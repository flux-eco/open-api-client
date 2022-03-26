<?php

namespace FluxEco\OpenApiClient\Core\Ports;

use FluxEco\OpenApiClient\Core\{Application, Ports};

class OpenApiService
{
    private Ports\Configs\OpenApiConfig $openApiConfig;

    private function __construct(
        Ports\Configs\OpenApiConfig $openApiConfig
    )
    {
        $this->openApiConfig = $openApiConfig;
    }

    public static function new(
        Ports\Configs\OpenApiOutbounds $openApiOutbounds
    ): self
    {
        return new self(
            $openApiOutbounds->getOpenApiConfig()
        );
    }

    public function query(string $endpoint, array $filter): array
    {
        $openApiConfig = $this->openApiConfig;
        $authorizationCommand = Application\Handlers\AuthorizationCommand::new(
            $openApiConfig->getClient(),
            $openApiConfig->getSecret(),
            $openApiConfig->getScope(),
            $openApiConfig->getApiUrl(),
            $openApiConfig->getAuthenticationUrl()
        );
        $authorization = Application\Handlers\AuthorizationHandler::new()->handle($authorizationCommand);

        echo "authorization: ".$authorization->getAuthorization();

        $queryCommand = Application\Handlers\QueryCommand::new($authorization->getAuthorization(), $endpoint, $filter);
        return Application\Handlers\QueryHandler::new()->handle($queryCommand);
    }
}