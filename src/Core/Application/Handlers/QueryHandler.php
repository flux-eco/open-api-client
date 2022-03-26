<?php

namespace FluxEco\OpenApiClient\Core\Application\Handlers;

use Exception;
use function array_keys;
use function array_map;
use function json_decode;
use function json_last_error;
use function json_last_error_msg;
use function print_r;
use const JSON_ERROR_NONE;

class QueryHandler {

    private function __construct() {
    }

    public static function new(): self {
        return new self();
    }

    public function handle(QueryCommand $queryCommand): array {
        $curl = null;
        try {
            $curl = curl_init($queryCommand->getEndpoint());
            $headers = [
                'Authorization' => $queryCommand->getAuthorization()
            ];
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers['Accept'] = 'application/json';
            curl_setopt($curl, CURLOPT_HTTPHEADER, array_map(fn(string $key, string $value): string => $key . ': ' . $value, array_keys($headers), $headers));

            echo "curlExec ".var_dump($curl);

            $content = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($status !== 200) {
                echo "Exception".PHP_EOL;
                echo $status.PHP_EOL;
                echo "curlInfo";
                print_r(curl_getinfo($curl));
                echo PHP_EOL."content".PHP_EOL;
                print_r($content);
                throw new Exception($content, $status);
            }
            $content = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception(json_last_error_msg());
            }
            return $content;
        } finally {
            if ($curl !== null) {
                curl_close($curl);
            }
        }
    }
}