<?php

namespace TransferWise\Api;


/**
 * Interface RatesApiInterface
 *
 * @package TransferWise\Api
 */
interface RatesApiInterface
{

    public function getAll();

    public function getAllBySource($source);

    public function getAllByTarget($target);

    public function getPair($source, $target);

    public function getPairAt($source, $target, $time);

    public function getPairInterval($source, $target, $from, $to, $group);
}