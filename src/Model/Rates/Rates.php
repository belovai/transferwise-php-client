<?php

namespace TransferWise\Model\Rates;


use TransferWise\Api\RatesApi;
use TransferWise\Api\RatesApiInterface;
use TransferWise\TransferWiseConfig;

/**
 * Class Rates
 *
 * @package TransferWise\Model\Rates
 */
class Rates
{

    const GROUP_DAILY = "day";
    const GROUP_HOURLY = "hour";
    const GROUP_10_MINS = "minute";

    /**
     * @var TransferWiseConfig
     */
    protected $config;

    /**
     * @var RatesApiInterface
     */
    protected $api;

    /**
     * Rates constructor.
     *
     * @param TransferWiseConfig     $config
     * @param RatesApiInterface|null $api
     */
    public function __construct(TransferWiseConfig $config, RatesApiInterface $api = null)
    {
        $this->config = $config;
        $this->api = $api ?: new RatesApi($config);
    }

    /**
     * Returns with the available group parameters
     *
     * @return array
     */
    protected static function availableGroups()
    {
        return [Rates::GROUP_DAILY, Rates::GROUP_HOURLY, Rates::GROUP_10_MINS];
    }

    /**
     * Fetch latest exchange rates of all currencies.
     *
     * @return array
     * @throws \TransferWise\ApiException
     */
    public function getAll()
    {
        return json_decode($this->api->getAll(), true);
    }

    /**
     * Fetch latest exchange rates of all currencies agenst the given currency.
     *
     * @param string $source 3 digit currency code
     *
     * @return array
     * @throws \TransferWise\ApiException
     */
    public function getAllBySource($source)
    {
        return json_decode($this->api->getAllBySource($source), true);
    }

    /**
     * Fetch latest exchange rates of all currencies agenst the given currency.
     *
     * @param $target
     *
     * @return array
     * @throws \TransferWise\ApiException
     */
    public function getAllByTarget($target)
    {
        return json_decode($this->api->getAllByTarget($target), true);
    }

    /**
     * Fetch latest exchange rate of one currency pair.
     *
     * @param string $source 3 digit currency code
     * @param string $target 3 digit currency code
     *
     * @return array
     * @throws \TransferWise\ApiException
     */
    public function getPair($source, $target)
    {
        return json_decode($this->api->getPair($source, $target), true);
    }

    /**
     * Fetch exchange rate of specific historical timestamp.
     *
     * @param string           $source 3 digit currency code
     * @param string           $target 3 digit currency code
     * @param string|\DateTime $time
     *
     * @return array
     * @throws \TransferWise\ApiException
     * @throws \InvalidArgumentException
     */
    public function getPairAt($source, $target, $time)
    {
        if (!$time instanceof \DateTime) {
            try {
                $time = new \DateTime($time);
            } catch (\Exception $e) {
                throw new \InvalidArgumentException('Incorrect "time" parameter');
            }
        }
        return json_decode($this->api->getPairAt($source, $target, $time->format(\DateTime::ISO8601)), true);
    }

    /**
     * @param string           $source 3 digit currency code
     * @param string           $target 3 digit currency code
     * @param string|\DateTime $from
     * @param string|\DateTime $to
     * @param string           $group  Use GROUP_DAILY, GROUP_HOURLY and GROUP_10_MINS constants
     *
     * @return array
     * @throws \TransferWise\ApiException
     * @throws \InvalidArgumentException
     */
    public function getPairInterval($source, $target, $from, $to, $group)
    {
        if (!$from instanceof \DateTime) {
            try {
                $from = new \DateTime($from);
            } catch (\Exception $e) {
                throw new \InvalidArgumentException('Incorrect "from" parameter');
            }
        }

        if (!$to instanceof \DateTime) {
            try {
                $to = new \DateTime($to);
            } catch (\Exception $e) {
                throw new \InvalidArgumentException('Incorrect "to" parameter');
            }
        }

        if (!in_array($group, self::availableGroups())) {
            throw new \InvalidArgumentException('Incorrect "group" parameter');
        }

        return json_decode(
            $this->api->getPairInterval(
                $source,
                $target,
                $from->format(\DateTime::ISO8601),
                $to->format(\DateTime::ISO8601),
                $group
            ),
            true
        );
    }

}