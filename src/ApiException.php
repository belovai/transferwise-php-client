<?php

namespace TransferWise;


/**
 * Class ApiException
 *
 * @package TransferWise
 */
class ApiException extends \Exception
{

    /**
     * HTTP headers
     *
     * @var array
     */
    protected $responseHeaders;

    /**
     * HTTP body
     *
     * @var mixed
     */
    protected $responseBody;

    /**
     * ApiException constructor.
     *
     * @param string      $message
     * @param int         $code
     * @param array       $responseHeaders
     * @param string|null $responseBody
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);

        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return array
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body reponse
     *
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
}