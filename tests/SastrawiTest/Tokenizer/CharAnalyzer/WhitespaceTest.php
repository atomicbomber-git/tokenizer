<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Tokenizer\CharAnalyzer\Model;
use Sastrawi\Tokenizer\CharAnalyzer\Whitespace;

class WhitespaceTest extends TestCase
{
    private $analyzer;

    public function setUp(): void
    {
        $this->analyzer = new Whitespace();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testAlphanumeric()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model(' ', 0)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abc', 1)));
    }
}
