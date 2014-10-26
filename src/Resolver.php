<?php
namespace Xenolope\Namespacery;

class Resolver
{

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var array
     */
    private $segments;

    /**
     * @param string $namespace
     */
    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return self
     */
    public function parseSegments()
    {
        $this->segments = explode('\\', ltrim($this->namespace, '\\'));

        return $this;
    }

    /**
     * @return array
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @return string
     */
    public function getFirstSegment()
    {
        return reset($this->segments);
    }

    /**
     * @return string
     */
    public function getLastSegment()
    {
        return end($this->segments);
    }

    /**
     * @param int $index
     * @return string
     * @throws \OutOfBoundsException
     */
    public function getSegment($index)
    {
        if (!array_key_exists($index, $this->segments)) {
            throw new \OutOfBoundsException(sprintf("Segment with an index of %d does not exist in namespace", $index));
        }

        return $this->segments[$index];
    }
}
