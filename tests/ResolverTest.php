<?php
namespace Xenolope\Namespacery;

class ResolverTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Resolver
     */
    private $resolver;

    public function setUp()
    {
        $this->resolver = new Resolver('Vendor\Package\Group\Class');
    }

    public function testGetSegments()
    {
        $this->assertCount(4, $this->resolver->parseSegments()->getSegments());
    }

    public function testGetSegment()
    {
        $this->assertSame('Vendor', $this->resolver->parseSegments()->getSegment(0));
        $this->assertSame('Package', $this->resolver->parseSegments()->getSegment(1));
        $this->assertSame('Group', $this->resolver->parseSegments()->getSegment(2));
        $this->assertSame('Class', $this->resolver->parseSegments()->getSegment(3));
    }

    public function testGetSegmentInvalid()
    {
        $this->setExpectedException('\OutOfBoundsException', 'Segment with an index of 32 does not exist in namespace');

        $this->resolver->parseSegments()->getSegment(32);
    }
} 