<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Tokenizer\CharAnalyzer\Alphanumeric;
use Sastrawi\Tokenizer\CharAnalyzer\Model;

class AlphanumericTest extends TestCase
{
    private $analyzer;

    public function setUp(): void
    {
        $this->analyzer = new Alphanumeric();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testAlphanumeric()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model('abc', 0)));
        $this->assertTrue($this->analyzer->shouldSplit(new Model('.abc', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abc', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('9a', 1)));
        $this->assertFalse($this->analyzer->shouldSplit(new Model('bbc', 1)));
    }

    public function testNonAlphanumeric()
    {
        $this->assertNull($this->analyzer->shouldSplit(new Model('#$%', 1)));
    }
}
