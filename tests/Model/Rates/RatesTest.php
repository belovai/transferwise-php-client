<?php

namespace Tests\Model\Rates;

use Tests\TestCase;
use TransferWise\Api\RatesApiInterface;
use TransferWise\Model\Rates\Rates;
use TransferWise\TransferWiseConfig;

/**
 * Class RatesTest
 *
 * @package Tests\Model\Rates
 */
class RatesTest extends TestCase
{

    private $instance;

    public function __construct()
    {
        parent::__construct();

        $this->instance = new Rates(new TransferWiseConfig('', ''));
    }

    /** @test */
    public function itConvertsDateCorrectly()
    {
        $ratesApiStub = $this->createMock(RatesApiInterface::class);
        $ratesApiStub->method("getPairAt")
            ->will(
                $this->returnCallback(
                    function ($source, $target, $time) {
                        return json_encode($time);
                    }
                )
            );

        $rates = new Rates(new TransferWiseConfig('', ''), $ratesApiStub);

        $this->assertEquals("2018-11-01T00:00:00+0000", $rates->getPairAt("EUR", "USD", "2018-11-01"));
        $this->assertEquals("2018-11-01T12:00:12+0000", $rates->getPairAt("EUR", "USD", "2018-11-01 12:00:12"));
        $this->assertEquals("2018-11-01T23:59:00+0000", $rates->getPairAt("EUR", "USD", "2018-11-01 23:59"));
        $this->assertEquals("2018-11-01T11:00:00+0000", $rates->getPairAt("EUR", "USD", "11/01/2018 11:00"));
        $this->assertEquals("2018-11-01T11:00:00+0000", $rates->getPairAt("EUR", "USD", "01-11-2018 11:00"));
    }

    /** @test */
    public function itThrowsExceptionOnInvalidTimeparameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect parameter: 0');
        $this->instance->getPairAt("EUR", "USD", "0");
    }

    /** @test */
    public function itThrowsExceptionOnInvalidFromParameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect parameter: 0');
        $this->instance->getPairInterval("EUR", "USD", "0", "0", "");
    }

    /** @test */
    public function itThrowsExceptionOnInvalidToParameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect parameter: 0');
        $this->instance->getPairInterval("EUR", "USD", "2018-11-01", "0", "");
    }

    /** @test */
    public function itThrowsExceptionOnInvalidGroupParameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Incorrect "group" parameter');
        $this->instance->getPairInterval("EUR", "USD", "2018-11-01", "2018-11-02", "");
    }
}
