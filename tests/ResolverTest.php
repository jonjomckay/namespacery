<?php
namespace Xenolope\Namespacery;

class ResolverTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Resolver
     */
    private $plainResolver;

    /**
     * @var Resolver
     */
    private $prefixedResolver;

    public function setUp()
    {
        $this->plainResolver = new Resolver('Vendor\Package\Group\Class');
        $this->prefixedResolver = new Resolver('\Vendor\Package\Group\Class');
    }

    public function testGetSegments()
    {
        $this->assertCount(4, $this->plainResolver->parseSegments()->getSegments());

        $this->assertCount(4, $this->prefixedResolver->parseSegments()->getSegments());
    }

    public function testGetFirstSegment()
    {
        $this->assertSame('Vendor', $this->plainResolver->parseSegments()->getFirstSegment());
        $this->assertSame('Vendor', $this->prefixedResolver->parseSegments()->getFirstSegment());
    }

    public function testGetLastSegment()
    {
        $this->assertSame('Class', $this->plainResolver->parseSegments()->getLastSegment());
        $this->assertSame('Class', $this->prefixedResolver->parseSegments()->getLastSegment());
    }

    public function testGetSegment()
    {
        $this->assertSame('Vendor', $this->plainResolver->parseSegments()->getSegment(0));
        $this->assertSame('Package', $this->plainResolver->parseSegments()->getSegment(1));
        $this->assertSame('Group', $this->plainResolver->parseSegments()->getSegment(2));
        $this->assertSame('Class', $this->plainResolver->parseSegments()->getSegment(3));

        $this->assertSame('Vendor', $this->prefixedResolver->parseSegments()->getSegment(0));
        $this->assertSame('Package', $this->prefixedResolver->parseSegments()->getSegment(1));
        $this->assertSame('Group', $this->prefixedResolver->parseSegments()->getSegment(2));
        $this->assertSame('Class', $this->prefixedResolver->parseSegments()->getSegment(3));
    }

    public function testGetSegmentInvalidPlain()
    {
        $this->setExpectedException('\OutOfBoundsException', 'Segment with an index of 32 does not exist in namespace');

        $this->plainResolver->parseSegments()->getSegment(32);
    }

    public function testGetSegmentInvalidPrefixed()
    {
        $this->setExpectedException('\OutOfBoundsException', 'Segment with an index of 32 does not exist in namespace');

        $this->prefixedResolver->parseSegments()->getSegment(32);
    }
} 