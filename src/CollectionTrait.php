<?php

namespace TransferWise;

/**
 * Trait CollectionTrait
 *
 * @package TransferWise
 */
trait CollectionTrait
{

    /**
     * @var array Collection
     */
    protected $collection = [];

    /**
     * @var int Iterator position
     */
    protected $position = 0;

    /**
     * Return the current element
     *
     * @return mixed
     */
    public function current()
    {
        return $this->collection[$this->position];
    }

    /**
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     *
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     *
     * @return boolean
     */
    public function valid()
    {
        return isset($this->collection[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }
}