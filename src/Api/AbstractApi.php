<?php

namespace TransferWise\Api;


use TransferWise\ApiException;
use TransferWise\TransferWiseConfig;

/**
 * Class AbstractApi
 *
 * @package TransferWise\Api
 */
abstract class AbstractApi
{

    /**
     * @var TransferWiseConfig
     */
    protected $config;

    /**
     * RatesApi constructor.
     *
     * @param TransferWiseConfig $config
     */
    public function __construct(TransferWiseConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $endpoint
     * @param array  $query
     *
     * @return string
     * @throws ApiException
     */
    protected function callApi($endpoint, $query = [])
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($this->config->apiUrl() . $endpoint, [
                'query' => $query,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->config->apiKey(),
                ]
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $e->getRequest()->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        }

        return $response->getBody()->getContents();
    }
}