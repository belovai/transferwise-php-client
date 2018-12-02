<?php

namespace TransferWise\Api;


use TransferWise\ApiException;

/**
 * Class RatesApi
 *
 * @package TransferWise\Api
 */
class RatesApi extends AbstractApi implements RatesApiInterface
{

    /**
     * Fetch latest exchange rates of all currencies.
     *
     * @return string
     * @throws ApiException
     */
    public function getAll()
    {
        return $this->callApi("rates");
    }

    /**
     * Fetch latest exchange rates of all currencies agenst the given currency.
     *
     * @param string $source 3 digit currency code
     *
     * @return string
     * @throws ApiException
     */
    public function getAllBySource($source)
    {
        return $this->callApi("rates", ['source' => $source]);
    }

    /**
     * Fetch latest exchange rates of all currencies agenst the given currency.
     *
     * @param string $target 3 digit currency code
     *
     * @return string
     * @throws ApiException
     */
    public function getAllByTarget($target)
    {
        return $this->callApi("rates", ['target' => $target]);
    }

    /**
     * Fetch latest exchange rate of one currency pair.
     *
     * @param string $source 3 digit currency code
     * @param string $target 3 digit currency code
     *
     * @return string
     * @throws ApiException
     */
    public function getPair($source, $target)
    {
        return $this->callApi("rates", ['source' => $source, 'target' => $target]);
    }

    /**
     * Fetch exchange rate of specific historical timestamp.
     *
     * @param string $source 3 digit currency code
     * @param string $target 3 digit currency code
     * @param string $time   ISO8601 timestamp
     *
     * @return string
     * @throws ApiException
     */
    public function getPairAt($source, $target, $time)
    {
        return $this->callApi("rates", [
            'source' => $source,
            'target' => $target,
            'time' => $time
        ]);
    }

    /**
     * Fetch exchange rate history over period of time with daily,
     * hourly or every 10 minutes interval.
     *
     * @param string $source 3 digit currency code
     * @param string $target 3 digit currency code
     * @param string $from   ISO8601 timestamp
     * @param string $to     ISO8601 timestamp
     * @param string $group  Could be: day, hour, minute
     *
     * @return string
     * @throws ApiException
     */
    public function getPairInterval($source, $target, $from, $to, $group)
    {
        return $this->callApi("rates", [
            'source' => $source,
            'target' => $target,
            'from' => $from,
            'to' => $to,
            'group' => $group
        ]);
    }
}