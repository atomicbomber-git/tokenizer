<?php

namespace SastrawiTest\Tokenizer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Tokenizer\TokenizerFactory;

class TokenizerFactoryTest extends TestCase
{
    public function testCreateDefaultTokenizer()
    {
        $factory = new TokenizerFactory();
        $this->assertInstanceOf('Sastrawi\Tokenizer\DefaultTokenizer', $factory->createDefaultTokenizer());
    }
}
