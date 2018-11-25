<?php

namespace TransferWise\Api;


use TransferWise\ApiException;
use TransferWise\TransferWiseConfig;

/**
 * Class ProfilesApi
 *
 * @package TransferWise\Model\Api
 */
class ProfilesApi
{

    /**
     * @var TransferWiseConfig
     */
    protected $config;

    /**
     * ProfilesApi constructor.
     *
     * @param TransferWiseConfig $config
     */
    public function __construct(TransferWiseConfig $config)
    {
        $this->config = $config;
    }

    /**
     * List of all profiles belonging to user.
     *
     * @return string
     * @throws ApiException
     */
    public function getAll()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($this->config->apiUrl() . "profiles", [
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

    /**
     * Get profile info by id.
     *
     * @param int $profileId
     *
     * @return string
     * @throws ApiException
     */
    public function getById($profileId)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($this->config->apiUrl() . "profiles/" . $profileId, [
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
                $response->getBody()->getContents()
            );
        }

        return $response->getBody()->getContents();
    }
}