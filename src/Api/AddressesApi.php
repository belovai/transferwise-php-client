<?php

namespace TransferWise\Api;


use TransferWise\ApiException;
use TransferWise\TransferWiseConfig;

/**
 * Class AddressesApi
 *
 * @package TransferWise\Api
 */
class AddressesApi implements AddressesApiInterface
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
     * List of addresses belonging to user profile.
     *
     * @param int $profileId
     *
     * @return string
     * @throws ApiException
     */
    public function getAll($profileId)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($this->config->apiUrl() . "addresses", [
                'query' => [
                    'profile' => $profileId
                ],
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
     * @param int $addressId
     *
     * @return string
     * @throws ApiException
     */
    public function getById($addressId)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($this->config->apiUrl() . "addresses/" . $addressId, [
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