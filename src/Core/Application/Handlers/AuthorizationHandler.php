<?php

namespace FluxEco\OpenApiClient\Core\Application\Handlers;

use Exception;
use FluxEco\OpenApiClient\Core\Domain;

class AuthorizationHandler
{

    public static function new(): self
    {
        return new self();
    }

    public function handle(AuthorizationCommand $command): Domain\Models\Authorization
    {
        $curl = null;
        try {
            $client = $command->getClient();
            $secret = $command->getSecret();
            $scope = $command->getScope();
            $apiUrl = $command->getApiUrl();

            $curl = curl_init($command->getAuthenticationUrl());

            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($client . ':' . $secret),
            ];

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

            curl_setopt($curl, CURLOPT_POSTFIELDS, [
                'grant_type' => 'client_credentials',
                'scope' => $scope,
            ]);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array_map(fn(string $key, string $value): string => $key . ': ' . $value, array_keys($headers), $headers));

            $content = curl_exec($curl);

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($status !== 200) {
                throw new Exception($content, $status);
            }

            $content = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception(json_last_error_msg());
            }

            return Domain\Models\Authorization::new(
                $apiUrl,
                $content['token_type'] . ' ' . $content['access_token']
            );
        } finally {
            if ($curl !== null) {
                curl_close($curl);
            }
        }
    }
}