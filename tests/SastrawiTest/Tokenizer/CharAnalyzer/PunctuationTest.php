<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Tokenizer\CharAnalyzer\Model;
use Sastrawi\Tokenizer\CharAnalyzer\Punctuation;

class PunctuationTest extends TestCase
{
    private $analyzer;

    public function setUp(): void
    {
        $this->analyzer = new Punctuation();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testShouldSplit()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model('abc!', 3)));
        $this->assertFalse($this->analyzer->shouldSplit(new Model('!!!', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abdef', 3)));
    }
}
