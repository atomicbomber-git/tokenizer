<?php

namespace SastrawiTest\Tokenizer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Tokenizer\DefaultTokenizer;

class DefaultTokenizerTest extends TestCase
{
    private $tokenizer;

    public function setUp(): void
    {
        $this->tokenizer = new DefaultTokenizer();
    }

    public function testGetDefaultAnalyzers()
    {
        $this->assertNotEmpty($this->tokenizer->getAnalyzers());
    }

    public function testAddGetAnalyzers()
    {
        $count = count($this->tokenizer->getAnalyzers());
        $this->tokenizer->addAnalyzer($this->createMock('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface'));
        $this->tokenizer->addAnalyzers(array($this->createMock('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface')));

        $this->assertCount($count + 2, $this->tokenizer->getAnalyzers());
    }

    public function testTokenize()
    {
        $this->assertEquals(array('Saya', 'belajar', '.'), $this->tokenizer->tokenize('Saya belajar.'));
    }
}
